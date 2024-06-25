<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //  //

    public $userServices;

    function __construct(
        UserService $userServices,

    ) {
        $this->userServices = $userServices;
    }


    public function create(Request $request)
    {
        // return "douma";

        $request->validate([
            "nom" => "required",
            "prenoms" => "required",
            "pays" => "required",
            "ville" => "nullable",
            "email" => "required",
            "telephone" => "required",
            "whatsapp" => "required",
            "file" => "required",
        ]);

        $response = $this->userServices->create($request);
        return  $response;
    }




    public function readAll()
    {

        $response = $this->userServices->readAll();

        return response()->json($response, $response["code"]);
    }
}