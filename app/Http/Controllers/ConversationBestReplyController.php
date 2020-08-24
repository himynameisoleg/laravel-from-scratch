<?php

namespace App\Http\Controllers;

use App\Reply;
use Illuminate\Http\Request;

class ConversationBestReplyController extends Controller
{
    public function store(Reply $reply)
    {
        // authorize that the current user has  permission to set the best reply for the conversation
        $this->authorize('update', $reply->conversation);

        // optionally we can remove the explicit 'update' argument and Laravel will check the controller 
        // method name. If it matched the laravel conventions then it will assume the user is authorized
        // Generally, you probbaly want to be explicit.
        // $this->authorize($reply->conversation);

        // then set it
        $reply->conversation->setBestReply($reply);

        // redirect back to the conversation page 
        return back();
    }
}
