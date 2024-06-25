<?php

namespace App\repositories;

use App\interfaces\UserInterface;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepositories implements UserInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function create($data): mixed
    {
        try {
            DB::beginTransaction();

            $user = User::create($data);
            DB::commit();


            return (object) [
                'error' => null,
                'data' => $user,
                'message' => "utilisateur enregistré",
                'status' => true,
            ];
        } catch (\Throwable $th) {
            DB::rollBack();

            return [
                'error' => $th,
                'data' => null,
                'message' => "une erreur s'est produite",
                'status' => false,
            ];
        }
    }



    public function readAll(): mixed
    {

        try {
            $user = User::orderBy('created_at', 'desc')
                ->get();
            return [
                "data" => $user,
                "error" => null,
                "code" => 200,
                "status" => true
            ];
        } catch (\Throwable $th) {

            return [
                "data" => null,
                "error" => $th,
                "code" => 500,
                "status" => false
            ];
        }
    }
}