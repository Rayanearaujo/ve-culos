<?php

namespace App\Repositories;

interface IBaseRepository
{
    public function find($id);
    public function create($attributes);
    public function update($attributes, $id);
    public function remove($id);
    public function all();

}