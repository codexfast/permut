<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

use App\User;
use App\Models\Permut;
class Message extends Model
{
    protected $fillable = ['body','status','sender_id','permut_id' ];
    public function permuts(){
        return $this->belongsTo('App\Models\Permut');
    }
    public function toArray(){
        $user_id = null;
        try {
            $user = JWTAuth::parseToken()->authenticate();
            $user_id = $user ?$user->id: '';
        } catch (JWTException  $e){
            
        } catch (TokenInvalidException $e){
          
        } catch (TokenExpiredException $e){
    
        }
        $permut = Permut::whereId($this->permut_id)->first();
        $isRequester = $permut->requester_id ==  $user_id;
        return [
            'id' =>$this->id,
            'body' => $this->body,
            'isSender' => $this->sender_id == $user_id,
            'isRequester' => $isRequester,
            'isOnline' =>true,
            'status' => $this->status,
            'permut_id' => $this->permut_id,
            'sender_id' => $this->sender_id,
            'name' => User::whereId($isRequester? $permut->requested_id: $permut->requester_id)->first()->name,
            'avatar' => User::whereId($isRequester? $permut->requested_id: $permut->requester_id)->first()->avatar,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
