<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function getUserMessages(Request $request)
    {
    $attrs = $request->validate([
        'id' => 'required|string'
    ]);

    event(new \App\Events\TestEvent($attrs['id']));

    }


    public function sendMessage(Request $request)
    {
    $attrs = $request->validate([
        'id' => 'required|string',
        'message' => 'required|string'
    ]);

    $alert = Message::create([
        'user_id' => $attrs['id'],
        'message' =>  $attrs['message'],
    ]);

    event(new \App\Events\TestEvent($attrs['id']));

    return response([
        'message' =>  $alert
    ], 200);


    }
}
