<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="Article API",
 *     description="Article API",
 *     @OA\Contact(
 *          email="tesleemolamilekan902@gmail.com",
 *          name="Tesleem Olamilekan MUTIULAHI",
 *
 *    ),
 * * @OA\Server(
 *    description="Article API",
 *    url="http://localhost:8000"
 * )
 * )
 */


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
