<?php namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class ApiController extends BaseController
{
    protected $headers = [];

    protected function setHeader()
    {

    }

    public function respondWithNotFoundError()
    {
        return true;
    }

    public function respondWithInvalidArgumentError($data)
    {
        return true;

    }

    public function respondWithInternalError()
    {
        return true;

    }

    public function respondWithUnAuthorizedError()
    {
        return true;

    }

    public function respondWithSuccess($data)
    {
        return true;

    }

    public function respondWithCreated($data)
    {
        return true;

    }

    public function respondWithArray($data)
    {
        $res['status_code'] = 200;
        $res['status'] = 'success';
        $res['data'] = $data['data'];

        return $res;
    }
}
