<?php

namespace App\services;

use App\Helpers\StoragesHelpers;
use Illuminate\Http\Request;
use App\interfaces\UserInterface;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public $userRepositorie;

    function __construct(
        UserInterface $userRepositorie

    ) {
        $this->userRepositorie = $userRepositorie;
    }

    public function create($request): mixed
    {
        $fileResponse = "";
        if ($request->hasFile('file')) {
            $fileResponse = StoragesHelpers::create($request->file);
            if ($fileResponse['error']) {
                return $fileResponse;
            }
        }

        $request['cv_path'] = $fileResponse["response"]->path;

        $response = $this->userRepositorie->create($request->all());

        return  $response;
    }


    public function read($id, $uid)
    {
        $response = $this->userRepositorie->read([
            "users_uid" => $uid,
            "id" => $id
        ]);
        return $response;
    }

    public function readAll()
    {
        $response = $this->userRepositorie->readAll();
        return $response;
    }

    public function update(Request $request)
    {

        $data2 = $request->except('password');

        if ($request->password) {
            $data2["password"] =  Hash::make($request->password);
        }
        $response = $this->userRepositorie->update($request->all());

        return  $response;
    }

    public function delete($id, $uid)
    {
        $data['id'] = $id;
        $data["users_uid"] = $uid;
        $response = $this->userRepositorie->delete($data);

        return $response;
    }
}
