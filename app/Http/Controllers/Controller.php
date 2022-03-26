<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Traits\TransactionTrait;

/**
 
 * @OA\Info(
 *     version="1.0",
 *     title="Test Logistic",
 *     description="REST API PT X ",
 *     @OA\Contact(name="wisnubaldas"),
 * ) 
    * @OA\Tag(
    *     name="Auth",
    *     description="Authentication user login token",
    * )
    * @OA\Tag(
    *     name="Barang",
    *     description="Data barang",
    * )
    * @OA\Tag(
    *     name="Transaksi",
    *     description="Data transaksi",
    * )
    * @OA\Tag(
    *     name="Report",
    *     description="Data report",
    * )
*
 * @OA\SecurityScheme(
 *     type="http",
 *     description="Login with email and password to get the authentication token",
 *     name="Token based Based",
 *     in="header",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     securityScheme="apiAuth",
 * )

 * @OA\PathItem(path="/api")
 * @OA\Server(
 *     url="http://localhost:8000",
 *     description="Api Logistic Backend"
 * )
*/

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, TransactionTrait;
    
}
