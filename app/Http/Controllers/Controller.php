<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      x={
 *          "logo": {
 *              "url": "https://via.placeholder.com/190x90.png?text=L5-Swagger"
 *          }
 *      },
 *      title="Notebook REST API",
 *      description="Rest API for notebook version 1.0",
 *      @OA\Contact(
 *          email="elk.dev.official@gmail.com"
 *      ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="https://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 * @OA\Get(
 *     path="/api/resource.json",
 *     @OA\Response(response="200", description="api json resource")
 * )
 * @OA\Serve(
 *      url="http://localhost:8000/api/v1",
 *     description="Demo API Server"
 * )
 *@OA\Tag(
 *     name="Notebook",
 *     description="API Endpoints of Notebook"
 * )
 */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}