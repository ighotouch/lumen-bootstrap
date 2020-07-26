<?php namespace App\Repositories;

use Illuminate\Support\Facades\Request;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Item;

use Illuminate\Pagination\AbstractPaginator;

abstract class RepositoryAbstract
{
    public function setPaginationLinks(AbstractPaginator $paginate, $params)
    {
        $paginate->setPageName('offset')->appends(array_except($params, 'offset'));
        return $paginate;
    }

    protected function getFractalInstance()
    {
        $manager = new Manager();
        $get = Request::input('include');

        if ($get) {
            $manager = $manager->parseIncludes($get);
        }
        return $manager;
    }

    public function item($item, $callback)
    {
        $fractal = $this->getFractalInstance();
        $resource = new Item($item, $callback);
        $rootScope = $fractal->createData($resource);
        return $rootScope->toArray();
    }

    public function collection($collection, $callback)
    {
        $fractal = $this->getFractalInstance();
        $resource = new Collection($collection, $callback);
        $rootScope = $fractal->createData($resource);
        return $rootScope->toArray();
    }

    public function paginatedCollection(LengthAwarePaginator $paginate, $callback)
    {
        $fractal = $this->getFractalInstance();
        $resource = new Collection($paginate->getCollection(), $callback);
        $resource->setPaginator(new IlluminatePaginatorAdapter($paginate));
        $rootScope = $fractal->createData($resource);
        return $rootScope->toArray();
    }
}
