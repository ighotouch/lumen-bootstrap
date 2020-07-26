<?php namespace App\Services\Ice;

interface IceServiceInterface
{

    public function read($params);

    public function getByName($name);

    public function show($id);

    public function update($id, $params);

    public function delete($id);

    public function create($params);
}
