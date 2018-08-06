<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Http\Models\Messages;
class Conversation extends Model
{
    //

    protected $table = "conversation";
    protected $primaryKey = "cid";

    public function getSender()
    {
        return User::find($this->sender_id);
    }

    public function getReciever()
    {
        return User::find($this->reciever_id);

    }

    public function getRecieverLastMessage()
    {
        return Messages::where(['reciever_id' => $this->reciever_id])->orderBy('mid','Desc')->first();
    }
}
