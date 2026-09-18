<?php

namespace App\Services;

use App\Models\Course;
use Illuminate\Support\Facades\Http;

class ChatbotService
{
    public function chat(string $message): string
    {
        $courses = Course::all([
            'Course_ID',
            'Course_Name',
            'Course_Fee',
        ]);

        $courseContext = $courses->map(function ($course) {
            return "Course ID: {$course->Course_ID}, Name: {$course->Course_Name}, Fee: {$course->Course_Fee}";
        })->implode("\n");

        $prompt = <<<PROMPT
You are a university assistant.

Use the following data from the university database when answering questions about courses:

{$courseContext}

User question:
{$message}

Answer based on the database data when the question is about courses.
If the database does not contain the requested information, say that the information is not available in the university database.
PROMPT;

        $response = Http::withHeaders([
            'x-goog-api-key' => config('services.gemini.key'),
            'Content-Type' => 'application/json',
        ])->post(
            'https://generativelanguage.googleapis.com/v1beta/models/gemini-3.5-flash-lite:generateContent',
            [
                'contents' => [
                    [
                        'parts' => [
                            [
                                'text' => $prompt,
                            ],
                        ],
                    ],
                ],
            ]
        );

        $response->throw();

        return $response->json('candidates.0.content.parts.0.text');
    }
}