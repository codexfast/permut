<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use App\Models\State;
    use App\Models\City;
    use JWTAuth;
    use DB;
    use Tymon\JWTAuth\Exceptions\JWTException;


    class LocationController extends Controller
    {
        //Start states methods
        public function getStates(){
            $states = State::select('states.id', 'states.state',
            DB::raw('(SELECT COUNT(*) FROM cities WHERE cities.state_id = states.id) as count')
            
            )->orderBy('state')->get();
            return response()->json(['message' => "Operação realizada com sucesso.", 'states' => $states, 'success' => true]);
        }
        public function createState(Request $request) {
            $validator = Validator::make($request->all(), [
                'state' => 'required|string|max:255|unique:states',
            ]);
            if($validator->fails()){
                return response()->json([$validator->errors(), 'success' => false], 400);
            }
            $state = State::create([
                'state' => $request->state,
            ]);
            if($state)
            return response()->json(['message' => 'Estado cadastrado com sucesso!', 'success' => true]); 
        }
        public function updateState(Request $request){
            $state = State::findOrFail($request->id);   
            $state->state=$request->state;
            if ($state->save())
            return response()->json(['message' => 'Estado actualizado com sucesso!', 'success' => true]);
            else 
            return response()->json(['message' => 'Falha ao realizar a operação!', 'success' => false]);
        }
        public function destroyState(Request $request){
            State::findOrFail($request->id)->delete();
            return response()->json(['message' => 'Estado apagado com sucesso!', 'success' => true]);   
        }
        //End states methods
        
        //Start city methods
        public function getCities(Request $request){
            $cities = City::
            join('states', 'states.id','cities.state_id' )
            ->select('cities.*', 'states.state',
            DB::raw('(SELECT COUNT(*) FROM insititutions WHERE insititutions.city_id = cities.id) as count')
            )->orderBy('state')->get();
            $states = State::orderBy('state')->get();
            return response()->json(['message' => "Operação realizada com sucesso.", 'cities' => $cities,   'states'=> $states, 'success' => true]);
        }
        public function createCity(Request $request) {
            $validator = Validator::make($request->all(), [
                'city' => 'required|string|max:255|unique:cities',
                'state_id' => 'required',
            ]);
            if($validator->fails()){
                return response()->json([$validator->errors(), 'success' => false], 400);
            }
            $city = City::create([
                'city' => $request->city,
                'state_id' => $request->state_id,
            ]);
            if($city)
            return response()->json(['message' => 'Cidade cadastrado com sucesso!', 'success' => true]);  
        }
        public function updateCity(Request $request){
            $city = City::findOrFail($request->id); 
            $city->city=$request->city;  
            $city->state_id=$request->state_id;  
            if ($city->save())
            return response()->json(['message' => 'Cidade actualizada com sucesso!', 'success' => true]);
            else 
            return response()->json(['message' => 'Falha ao realizar a operação!', 'success' => false]);
        }
        public function destroyCity(Request $request){
            City::findOrFail($request->id)->delete();
            return response()->json(['message' => 'Cidade apagado com sucesso!', 'success' => true]);
        }
        //End city methods
        
    }