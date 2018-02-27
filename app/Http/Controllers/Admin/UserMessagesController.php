<?php

namespace App\Http\Controllers\Admin;


use App\Admin\UserMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserMessagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $userMessages = UserMessage::orderBy('created_at', 'desc')->get();
        
        return view('admin.user_messages.index')->with('userMessages', $userMessages)->with('title', 'Всички съобщения от потребители');
    }

    public function markAnswer($id)
    {
        $userMessage = UserMessage::find($id);
        $userMessages = UserMessage::orderBy('created_at', 'desc')->get();
        
        if ($userMessage->answer == 1)
        {
            $userMessage->answer = 0;
        }
        else
        {
            $userMessage->answer = 1;
        }

        $userMessage->save();
        
        return redirect()->back()->with('userMessages', $userMessages)->with('userMessage', $userMessage)->with('success', 'Съобщението е маркирано')->with('title', 'Преглед на съобщения');
    }
    
    public function destroy($id)
    {
        $userMessage = UserMessage::find($id);
        $userMessage->delete();

        return redirect('/admin/user_messages')->with('success', 'Подкатегорията е изтрита');
    }
}
