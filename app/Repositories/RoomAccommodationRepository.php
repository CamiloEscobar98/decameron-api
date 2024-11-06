<?php

namespace App\Repositories;

use App\Models\RoomAccommodation;

use Illuminate\Database\Eloquent\Collection;

final class RoomAccommodationRepository extends AbstractRepository
{
    /**
     * RoomAccommodationRepository constructor.
     *
     * @param RoomAccommodation $model
     */
    public function __construct(RoomAccommodation $model)
    {
        parent::__construct($model);
    }

    /**
     * Search RoomAccommodations with specific filters.
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

        if (!empty($filters['name'])) {
            $query->byName($filters['name']);
        }

        return $query->get();
    }
}
