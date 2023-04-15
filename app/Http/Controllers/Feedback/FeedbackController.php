<?php

namespace App\Http\Controllers\Feedback;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\UseCases\AcceptFeedbackData;
use App\UseCases\FeedbackUseCases;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(FeedbackStoreRequest $request): JsonResponse
    {
        $data = $request->validated();

        $feedback = app(FeedbackUseCases::class)->acceptFeedback(new AcceptFeedbackData(
            title: $data['title'],
            description: $data['description'],
        ));

        return response()->json([
            'id' => $feedback->id
        ], 201);
    }

    public function show(Feedback $feedback): JsonResponse
    {
        return response()->json([
            'title' => $feedback->title,
            'description' => $feedback->description
        ]);
    }
}
