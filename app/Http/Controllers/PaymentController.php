<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use App\Models\Payment;
    use App\Models\RateSetting;
    use App\User;
    use JWTAuth;
    use DB;
    use Tymon\JWTAuth\Exceptions\JWTException;
    use MP;


    class PaymentController extends Controller
    {
        public function getAll(){
            $payments = Payment::get();
            return response()->json(['message' => "Operação realizada com sucesso.", 'payments' => $payments, 'success' => true]);
        }
        public function get(Request $request){
            $payments = Payment::whereId($request->user()->id)->get();
            return response()->json(['message' => "Operação realizada com sucesso.", 'payments' => $payments, 'success' => true]);
        }
        public function create(Request $request) {
            if ($request->user()->licensed != 1){
                
                $amount = DB::table('rate_settings')->first()->rate_initial;

                $preference_data = array (
                    "items" => array (
                        array (
                            "title" => "Conta Premium ".env('APP_NAME'),
                            "quantity" => 1,
                            "currency_id" => "BRL",
                            "unit_price" =>  $amount
                        )
                    ),
                    "payer" => array (
                        "email" => $request->user()->email,
                        "name" => $request->user()->name,
                        "phone" =>  array (
                            "area_code" => "55",
                            "number" => $request->user()->whatsapp
                        )
                    ),
                    "auto_return" => "all",
                    "notification_url" => env('APP_URL')."/api/payment-notify",
                    "back_urls" => array (
                        "success" => env('APP_URL')."/mercadopago",
                        "pending"=>   env('APP_URL')."/mercadopago",
                        "failure"=>   env('APP_URL')."/mercadopago"
                    )
                );
                try {
                    $preference = MP::create_preference($preference_data);
                    $payment = Payment::create([
                        'via'=>'Mercado Pago',
                        'reference'=>$preference['response']['id'],
                        'status'=>'0',
                        'amount'=>$amount,
                        'user_id'=> $request->user()->id
                    ]);
                    return response()->json(['message' => "Operação realizada com sucesso.", 'url'=>$preference['response']['init_point'], 'success' => true]);
                } catch (Exception $e){
                    return response()->json(['message'=>$e->getMessage(), 'success' => false]);
                }
            }
            else{
                return response()->json(['message' => "Está conta já é uma conta premium.", 'success' => false]);
            }
            
        }
        public function check(Request $request) {
            DB::beginTransaction();
            try {
                $preference = MP::get_preference($request->preference_id);
                $payment = Payment::whereReference($request->preference_id)->first();
                $user = User::whereId($payment?$payment->user_id: null)->first();
                if ($payment && $user && array_key_exists('collection_status',  $preference['response'])){
                    if ($preference['response']['collection_status']=='approved'){
                        $payment->status = '1';
                        $user->licensed ='1';
    
                        $payment->save();
                        $user->save();
                        DB::commit();
                        return response()->json(['message' => "Operação realizada com sucesso.",'preference'=> $preference, 'success' => true]);
                    }
                    else {
                        DB::rollback();
                        return response()->json(['message' => "O seu pagamento não foi aprovado.", 'success' => false]);
                    }
                }
                else if ($payment && $user && array_key_exists('collection_status',  $preference['response'])==false){
                    DB::rollback();
                    return response()->json(['message' => "O seu pagamento ainda não foi aprovado.", 'preference'=> $preference, 'success' => false]);
                }
                else{
                    DB::rollback();
                    return response()->json(['message'=>'Falha ao relizar a operação', 'preference'=> $preference,  'success' => false]);
                }
            } catch (Exception $e){
                DB::rollback();
                return response()->json(['message'=>'Falha ao relizar a operação', 'success' => false]);
            }
        }
        
    }