<?php namespace App\Services\Ice;

use Illuminate\Support\Facades\App;
use Illuminate\Validation\Validator;
use App\Repositories\Ice\IceRepositoryInterface;

class IceService  implements IceServiceInterface
{
    protected $repository;

    public function __construct(IceRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getByName($name)
    {
        return $this->repository->getByName($name);
    }

    public function read($params)
    {
        return $this->repository->read($params);
    }

    public function show($params)
    {
        return $this->repository->show($params);
    }

    public function getById($id)
    {
        return $this->repository->getById($id);
    }

    public function create($params)
    {
        return $this->repository->create($params);
    }

    public function update($group_id, $params)
    {
        // TODO: Implement update() method.
    }

    public function delete($group_id)
    {
        // TODO: Implement delete() method.
    }


}
