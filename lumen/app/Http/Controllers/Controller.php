<?php namespace App\Http\Controllers;

use Exception;

class Controller extends ApiController
{
    protected $request;
    protected $logger_service;
    protected $audit_service;

    protected function logRequest($request, $log_title)
    {
        $this->request = $request;

    }

    protected function logResponse()
    {
        return true;
    }

    protected function addTrail($user_id, $action)
    {
        return true;
    }

    // this is not part of the test so am not making any effort to parse this.
    public function buildErrorResponse(Exception $error)
    {
        $res['status_code'] = 400;
        $res['status'] = 'failed';
        $res['data'] = [];
        $res['message'] = $error->getMessage();
        return $res;
    }
}
