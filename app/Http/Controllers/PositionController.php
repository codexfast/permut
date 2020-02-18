<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use App\Models\Position;
    use JWTAuth;
    use DB;
    use Tymon\JWTAuth\Exceptions\JWTException;


    class PositionController extends Controller
    {
        public function get(){
            $positions = Position::orderBy('state')->get();
            return response()->json(['message' => "Operação realizada com sucesso.", 'positions' => $positions, 'success' => true]);
        }
        public function create(Request $request) {
            $validator = Validator::make($request->all(), [
                'position' => 'required|string|max:255|unique:positions',
            ]);
            if($validator->fails()){
                return response()->json([$validator->errors(), 'success' => false], 400);
            }
            $position = Position::create([
                'position' => $request->position,
            ]);
            if($position)
            return response()->json(['message' => 'Cargo cadastrado com sucesso!', 'success' => true]); 
        }
        
        public function update(Request $request){
            $position = Position::findOrFail($request->id);   
            $position->position=$request->position;
            if ($position->save())
            return response()->json(['message' => 'Cargo actualizado com sucesso!', 'success' => true]);
            else 
            return response()->json(['message' => 'Falha ao realizar a operação!', 'success' => false]);
        }

        public function destroy(Request $request){
            Position::findOrFail($request->id)->delete();
            return response()->json(['message' => 'Cargo apagado com sucesso!', 'success' => true]);   
        }
    }