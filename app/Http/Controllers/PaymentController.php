<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use App\Models\Payment;
    use JWTAuth;
    use DB;
    use Tymon\JWTAuth\Exceptions\JWTException;


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
            $payment = Validator::make($request->all(), [
                'institution' => 'required|string|max:255|unique:institutions',
            ]);
            if($validator->fails()){
                return response()->json([$validator->errors(), 'success' => false], 400);
            }
            $payment = Payment::create([
                'institution' => $request->institution,
            ]);
            if($institution)
            return response()->json(['message' => 'Instituição cadastrada com sucesso!', 'success' => true]); 
        }
        
    }