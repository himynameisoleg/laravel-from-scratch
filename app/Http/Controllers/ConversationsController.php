<?php

namespace App\Http\Controllers;

use App\Conversation;
use Illuminate\Http\Request;

class ConversationsController extends Controller
{
    public function index()
    {
        return view('conversations.index', [
            'conversations' => Conversation::all()
        ]);
    }

    public function show(Conversation $conversation)
    {
        // lets say we want only the person who created the conversation to be able to view it
        $this->authorize('view', $conversation);

        return view('conversations.show', [
            'conversation' => $conversation
        ]);
    } 
}
