<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Spatie\Health\Commands\RunHealthChecksCommand;
use Spatie\Health\ResultStores\ResultStore;

class HealthCheckController extends Controller
{
    public function __invoke(Request $request, ResultStore $resultStore): JsonResponse
    {
        if ($request->has('fresh') || config('health.oh_dear_endpoint.always_send_fresh_results')) {
            Artisan::call(RunHealthChecksCommand::class);
        }

        if (!($resultStore->latestResults()?->allChecksOk())) {
            return response()->json(["message" => "Application not healthy"]);
        }
        return response()->json(["message" => "Application is healthy"]);
    }

}
