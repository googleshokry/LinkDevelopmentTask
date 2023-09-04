<?php

namespace App\Http\Controllers;

use App\Http\Requests\sendEmailRequest;
use App\Jobs\sendEmail;
use Illuminate\Http\JsonResponse;

class EmailController extends Controller
{

    public function send(sendEmailRequest $request): JsonResponse
    {
        sendEmail::dispatch($request->validated());
        return response()->json(['message' => 'Sent Email']);
    }

}
