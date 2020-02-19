<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use App\Models\Payment;
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
            $amount = 5;
            $preference_data = array (
                "items" => array (
                    array (
                        "title" => "Conta Premium ".env('APP_NAME'),
                        "quantity" => 1,
                        "currency_id" => "BRL",
                        "unit_price" => 5
                    )
                )
            );
            try {
                $preference = MP::create_preference($preference_data);
                return response()->json(['message' => "Operação realizada com sucesso.", 'url'=>$preference['response']['init_point'], 'success' => true]);
                //return redirect()->to($preference['response']['init_point']);
            } catch (Exception $e){
                return response()->json(['message'=>$e->getMessage(), 'success' => false]);
            }
        }
        public function check(Request $request) {
            DB::beginTransaction();
            try {
               $payment = Payment::create([
                    'via'=>'Mercado Pago',
                    'status'=>'1',
                    'amount'=>$amount,
                    'user_id'=> $request->user()->id
                ]);
                $user = JWTAuth::parseToken()->authenticate();
                $user->licensed ='1';
                $user->save();
                DB::commit();
                return response()->json(['message' => "Operação realizada com sucesso.", 'success' => true]);
            } catch (Exception $e){
                DB::rollback();
                return response()->json(['message'=>'Falha ao relizar a operação', 'success' => false]);
            }
        }
        
    }