<?php

namespace App\Repositories;

use App\Models\Hotel;

use Illuminate\Database\Eloquent\Collectionl;

final class HotelRepository extends AbstractRepository
{
    /**
     * HotelRepository constructor.
     *
     * @param Hotel $model
     */
    public function __construct(Hotel $model)
    {
        parent::__construct($model);
    }

    /**
     * Search hotels with specific filters.
     *
     * @param array $filters
     * @return Collection
     */
    public function search(array $filters)
    {
        $query = $this->model->query();

        if (!empty($filters['id'])) {
            $query->byId($filters['id']);
        }

        if (!empty($filters['nit'])) {
            $query->byNit($filters['nit']);
        }

        if (!empty($filters['name'])) {
            $query->byName($filters['name']);
        }

        if (!empty($filters['city_name'])) {
            $query->byCityName($filters['city_name']);
        }

        return $query->get();
    }
}
