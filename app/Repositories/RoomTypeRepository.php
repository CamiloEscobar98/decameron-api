<?php

namespace App\Repositories;

use App\Models\RoomType;

use Illuminate\Database\Eloquent\Collection;

final class RoomTypeRepository extends AbstractRepository
{
    /**
     * RoomTypeRepository constructor.
     *
     * @param RoomType $model
     */
    public function __construct(RoomType $model)
    {
        parent::__construct($model);
    }

    /**
     * Search RoomTypes with specific filters.
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
