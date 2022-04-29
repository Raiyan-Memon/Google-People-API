<?php

namespace App\Interface\Modules;

interface ContactGroupRepositoryInterface
{

    public function all();
    public function create($input);
    public function find($contactgroup);
    public function update($request, $id);
    public function updateApi($request, $id);
    public function delete($id);

}
