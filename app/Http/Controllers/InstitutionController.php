<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use App\Models\Institution;
    use JWTAuth;
    use DB;
    use Tymon\JWTAuth\Exceptions\JWTException;


    class InstitutionController extends Controller
    {
        public function get(){
            $institutions = Institution::orderBy('state')->get();
            return response()->json(['message' => "Operação realizada com sucesso.", 'institutions' => $institutions, 'success' => true]);
        }

        public function getInstitutionByCity($id) {
            $institutions = Institution::where('institutions.city_id', $id)
                ->select('institutions.*')
                ->orderBy('institutions.name')->get();


            return response()->json(['message' => "Operação realizada com sucesso.", 'institutions' => $institutions, 'success' => true]);
        }

        public function create(Request $request) {
            $validator = Validator::make($request->all(), [
                'institution' => 'required|string|max:255|unique:institutions',
            ]);
            if($validator->fails()){
                return response()->json([$validator->errors(), 'success' => false], 400);
            }
            $institution = Institution::create([
                'institution' => $request->institution,
            ]);
            if($institution)
            return response()->json(['message' => 'Instituição cadastrada com sucesso!', 'success' => true]); 
        }
        
        public function update(Request $request){
            $institution = Institution::findOrFail($request->id);   
            $institution->institution=$request->institution;
            if ($institution->save())
            return response()->json(['message' => 'Instituição actualizada com sucesso!', 'success' => true]);
            else 
            return response()->json(['message' => 'Falha ao realizar a operação!', 'success' => false]);
        }

        public function destroy(Request $request){
            Institution::findOrFail($request->id)->delete();
            return response()->json(['message' => 'Instituição apagada com sucesso!', 'success' => true]);   
        }
    }