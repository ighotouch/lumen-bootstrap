<?php namespace App\Repositories\Ice;

use App\Models\Ice;
use App\Repositories\RepositoryAbstract;
use App\Transformers\IceTransformer;
use GuzzleHttp\Client;

class IceRepository extends RepositoryAbstract implements IceRepositoryInterface
{
    protected $model;
    protected $transformer;

    public function __construct()
    {
        $this->model = app(Ice::class);
        $this->transformer = app(IceTransformer::class);
    }



    public function create($params)
    {
        $ice = new Ice();
        $ice->name = $params['name'];
        $ice->isbn = $params['isbn'];
        $ice->authors = $params['authors'];
        $ice->country = $params['country'];
        $ice->number_of_pages = $params['number_of_pages'];
        $ice->publisher = $params['publisher'];
        $ice->release_date = $params['release_date'];

        $ice->save();

        return ["data"=> $params];
    }

    public function update($id, $params)
    {

    }

    public function delete($id)
    {

    }


    public function getById($id)
    {
        // TODO: Implement getById() method.
    }

    public function read($params)
    {
        $name = array_key_exists("name",$params) ? $params['name'] : null;
        $country = array_key_exists("country",$params) ? $params['country'] : null;
        $release = array_key_exists("release_date",$params) ? $params['release_date'] : null;
        $publisher = array_key_exists("publisher",$params) ? $params['publisher'] : null;



        $client = new Client(['base_uri' => 'https://www.anapioficeandfire.com/api/']);

        $res = $client->request('GET', 'books', [
            'query' => ['name' => $name, 'country'=> $country, 'publisher'=>$publisher, 'releaseDate'=> $release]
        ]);

        $res->getStatusCode();
        $res->getHeaderLine('content-type');
        $responseObj = \GuzzleHttp\json_decode($res->getBody());

        return $this->collection($responseObj, $this->transformer);
    }

    public function show($params)
    {
        // TODO: Implement show() method.
    }

    public function getByName($name)
    {
        $client = new Client(['base_uri' => 'https://www.anapioficeandfire.com/api/']);

        $res = $client->request('GET', 'books', [
            'query' => ['name' => $name]
        ]);

        $res->getStatusCode();
        $res->getHeaderLine('content-type');
        $responseObj = \GuzzleHttp\json_decode($res->getBody());

        return $this->collection($responseObj, $this->transformer);
    }
}
