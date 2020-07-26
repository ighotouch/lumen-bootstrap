<?php namespace App\Repositories\Ice;

interface IceRepositoryInterface
{
    public function getById($id);

    public function read($params);

    public function show($params);

    public function create($data);

    public function update($id, $data);

    public function delete($id);

    public function getByName($name);
}
