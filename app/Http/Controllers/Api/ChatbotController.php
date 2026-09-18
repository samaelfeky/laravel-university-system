<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ChatbotService;
use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    public function chat(Request $request, ChatbotService $chatbotService)
    {
        $request->validate([
            'message' => ['required', 'string'],
        ]);

        $reply = $chatbotService->chat($request->message);

        return response()->json([
            'reply' => $reply,
        ]);
    }
}