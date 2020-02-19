<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use App\User;
    use JWTAuth;
    use DB;
    use Tymon\JWTAuth\Exceptions\JWTException;


    class SearchController extends Controller
    {
        public function index(){
            $count = User::where('users.name', 'like', "%{$request->name}%")
            ->orWhere('users.position', 'like', "%{$request->position}%")
            ->orWhere('users.institution', 'like', "%{$request->institution}%")
            ->get()->count();
            $users = User::where('users.name', 'like', "%{$request->name}%")
            ->orWhere('users.position', 'like', "%{$request->position}%")
            ->orWhere('users.institution', 'like', "%{$request->institution}%")
            ->paginate(15);
           
            return response()->json(['message' => "Operação realizada com sucesso.",

                'search_fields'  =>['name'=>$request->name, 'position'=>$request->position, 'institution'=>$request->institution],
                'users'  => $users, 
                'count'  => $count ]);
        }
    }