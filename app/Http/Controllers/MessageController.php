<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use App\Models\Message;
    use JWTAuth;
    use DB;
    use Tymon\JWTAuth\Exceptions\JWTException;
    use App\Events\MessageEventPrivate;


    class MessageController extends Controller
    {
        public function getAll(){
            $messages = Message::paginate(10);
            return response()->json(['message' => "Operação realizada com sucesso.", 'messages' => $messages, 'success' => true]);
        }
        public function get(Request $request){
            $messages = Message::whereId($request->user()->id)->paginate(10);
            return response()->json(['message' => "Operação realizada com sucesso.", 'messages' => $messages, 'success' => true]);
        }
        public function create(Request $request) {
            $validator = Validator::make($request->all(), [
                'body' => 'required|string',
                'status' => 'required|string',
                'permut_id' => 'required',
            ]);
            if($validator->fails()){
                return response()->json([$validator->errors(), 'success' => false], 400);
            }
            $permut = Permut::findOrFail($request->permut_id); 
            $message = Message::create([
                'body' => $request->body,
                'status' => '0',
                'sender_id' => $request->user()->id,
                'permut_id' => $request->permut_id,
            ]);
            if($message)
            event(new MessageEventPrivate($user, $permut, $message));
            return response()->json(['message' => 'Mensagem enviada com sucesso!', 'success' => true]); 
        }
        
    }