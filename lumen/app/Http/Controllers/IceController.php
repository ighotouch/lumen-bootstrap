<?php

namespace App\Http\Controllers;
use App\Services\Ice\IceServiceInterface;
use Illuminate\Http\Request;

use Exception;

class IceController extends Controller
{
    // This would be a label that enable us log this service in a cluster
    protected $service;
    const LOG_TITLE = 'Ice-Service';


    public function __construct(IceServiceInterface $service, Request $request)
    {
        // we can log this service as soon as the instance comes alive
        $this->logRequest($request, self::LOG_TITLE);
        $this->service = $service;
    }

    public function getByName(){
        try {
            $params = $this->request->all();

            $res = $this->service->getByName($params['name']);
            $this->logResponse();
            return $this->respondWithArray($res);
        } catch (Exception $e) {
            return $this->buildErrorResponse($e);
        }
    }


    public function read(Request $request){
        try {
            $params = $this->request->all();

            $res = $this->service->read($params);
            $this->logResponse();
            return $this->respondWithArray($res);
        } catch (Exception $e) {
            return $this->buildErrorResponse($e);
        }
    }


    public function show(Request $request){
        try {
            $params = $this->request->all();

            $res = $this->service->show($params);
            $this->logResponse();
            return $this->respondWithArray($res);
        } catch (Exception $e) {
            return $this->buildErrorResponse($e);
        }
    }



    // am not adding any validation factory as this was not part of the test
    public function create(Request $request){
        try {
            $params = $this->request->all();

            $res = $this->service->create($params);
            $this->logResponse();
            return $this->respondWithArray($res);
        } catch (Exception $e) {
            return $this->buildErrorResponse($e);
        }
    }

    //
}
