<?php namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Ice;

class IceTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [

    ];

    protected $availableIncludes = [

    ];

    public function transform(\stdClass $ice)
    {
        return [
            'name' => (string) $ice->name,
            'isbn' => (string) $ice->isbn,
            'authors' => (array) $ice->authors,
            'number_of_pages' => (int) $ice->numberOfPages,
            'publisher' => (string) $ice->publisher,
            'country' => (string) $ice->country,
            'release_date' => (string) $ice->released,
        ];
    }
}
