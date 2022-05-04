<?php

namespace App\Interface\Modules;

interface UserRepositoryInterface
{
    public function all(); //index
    public function create($input); //store
    public function find($user); //store,edit
    public function update($request, $id); //update
    public function delete($user); //destroy
}
