<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Server(url="http://app-test-api"),
 * @OA\Info(
 *      version="0.0.1",
 *      title="Darkaonline L5 Swagger RestFull Api",
 *      description="Darkaonline L5 Swagger RestFull Api Products"
 * )
 *
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
