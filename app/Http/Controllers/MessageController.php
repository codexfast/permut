<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use App\Models\Message;
    use App\Models\Permut;
    use App\User;
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
        public function get($id, Request $request){
            $messages = Message::join('permuts', 'permuts.id', 'messages.permut_id')
            ->wherePermutId($id)
            ->paginate(10);
            $permut = Permut::whereId($id)->first();
            $isRequester = $permut->requester_id == $request->user()->id;
            $info = [
                'status' =>  $permut->status,
                'isRequester' =>  $isRequester,
                'name' => User::whereId($isRequester? $permut->requested_id: $permut->requester_id)->first()->name,
                'whatsapp' => User::whereId($isRequester? $permut->requested_id: $permut->requester_id)->first()->whatsapp,
                'email' => User::whereId($isRequester? $permut->requested_id: $permut->requester_id)->first()->email,
                'avatar' => User::whereId($isRequester? $permut->requested_id: $permut->requester_id)->first()->avatar,
            ];
            return response()->json(['message' => "Operação realizada com sucesso.", 'info'=>$info,'messages' => $messages, 'success' => true]);
        }
        public function conversations(Request $request){

            $conversations = Message::join('permuts', 'permuts.id', 'permut_id')
            ->where('permuts.requested_id',$request->user()->id)
            ->orWhere('permuts.requester_id' ,$request->user()->id)
            ->orderBy('messages.created_at', 'DESC')
            ->paginate(10);
            return response()->json(['message' => "Operação realizada com sucesso.", 'conversations' => $conversations, 'success' => true]);
        }
        
        public function create(Request $request) {
            $validator = Validator::make($request->all(), [
                'body' => 'required|string',
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
            event(new MessageEventPrivate($request->user(), $permut, $message));
            return response()->json(['message' => 'Mensagem enviada com sucesso!', 'success' => true]); 
        }
        
    }