<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('chat');
    }

    public function sendMessage(Request $request)
    {
        $message = $request->input('message');

        broadcast(new MessageSent($message, Auth::user()->name));

        return response()->json(['status' => 'Message sent']);
    }
}
