<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="CRUD API Test",
 *      description="تست API در لاراول",
 *      @OA\Contact(
 *          email="vreyazat@gmail.com"
 *      ),
 *      @OA\License(
 *          name="Vahid Reyazat",
 *          url=""
 *      )
 * )
 *  @OAS\SecurityScheme(
 *      securityScheme="sanctum",
 *      type="http",
 *      scheme="bearer"
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
