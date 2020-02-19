<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use App\Models\Permut;
    use JWTAuth;
    use DB;
    use Tymon\JWTAuth\Exceptions\JWTException;


    class PermutController extends Controller
    {
        public function getAll(){
            $permuts = Permut::paginate(10);
            return response()->json(['message' => "Operação realizada com sucesso.", 'permuts' => $permuts, 'success' => true]);
        }
        public function get(Request $request){
            $permuts = Permut::whereId($request->user()->id)->paginate(10);
            return response()->json(['message' => "Operação realizada com sucesso.", 'permuts' => $permuts, 'success' => true]);
        }
        public function create(Request $request) {
            $validator = Validator::make($request->all(), [
                'requester_id' => 'required',
                'requested_id' => 'required',

            ]);
            if($validator->fails()){
                return response()->json([$validator->errors(), 'success' => false], 400);
            }
            $permut = Permut::create([
                'status' => '0',
                'requester_id' =>$request->requester_id,
                'requested_id' =>$request->requested_id,
            ]);
            if($permut)
            return response()->json(['message' => 'Processo de permuta cadastrada com sucesso!', 'success' => true]); 
        }
        
        public function update(Request $request){
            $permut = Permut::findOrFail($request->id);   
            $permut->status=$request->status;
            if ($permut->save())
            return response()->json(['message' => 'Permuta actualizada com sucesso!', 'success' => true]);
            else 
            return response()->json(['message' => 'Falha ao realizar a operação!', 'success' => false]);
        }

    }