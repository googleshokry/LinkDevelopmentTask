<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
use Spatie\Health\Commands\RunHealthChecksCommand;
use Spatie\Health\ResultStores\ResultStore;

class HealthCheckController extends Controller
{
    public function __invoke(Request $request, ResultStore $resultStore): JsonResponse
    {
        if (isset($request->service) && $request->service == "apigateway") {
            if ($request->has('fresh') || config('health.oh_dear_endpoint.always_send_fresh_results')) {
                Artisan::call(RunHealthChecksCommand::class);
            }
            if (!($resultStore->latestResults()?->allChecksOk())) {
                return response()->json(["message" => "Application not healthy"]);
            }
            return response()->json(["message" => "Application is healthy"]);

        } elseif (isset($request->service) && $request->service == "catalog") {
            $response = Http::acceptJson()->get(env('CATALOG_SERVICE_API') . '/health');
            return response()->json($response->json());
        } elseif (isset($request->service) && $request->service == "email") {
            $response = Http::acceptJson()->get(env('EMAIL_SERVICE_API') . '/health');
            return response()->json($response->json());
        } elseif (isset($request->service) && $request->service == "shopingcart") {
            $response = Http::acceptJson()->get(env('SHPPINGCART_SERVICE_API') . '/health');
            return response()->json($response->json());
        }

        return response()->json(['message' => 'not found service']);
    }

}
