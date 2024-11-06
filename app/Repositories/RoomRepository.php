<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

use App\Enums\RoomEnum;

use App\Models\Room;

final class RoomRepository extends AbstractRepository
{
    /**
     * RoomRepository constructor.
     *
     * @param Room $model
     */
    public function __construct(Room $model)
    {
        parent::__construct($model);
    }

    /**
     * Search Rooms with specific filters.
     *
     * @param array $filters
     * @return Collection
     */
    public function search(array $filters)
    {
        $query = $this->model->query();

        if (!empty($filters[RoomEnum::Id])) {
            $query->byId($filters[RoomEnum::Id]);
        }

        if (isset($filters[RoomEnum::RoomTypeId])) {
            $query->byRoomType($filters[RoomEnum::RoomTypeId]);
        }

        if (isset($filters[RoomEnum::RoomAccommodationId])) {
            $query->byRoomAccommodation($filters[RoomEnum::RoomAccommodationId]);
        }

        if (isset($filters[RoomEnum::CountRooms])) {
            $query->byCountRooms($filters[RoomEnum::CountRooms]);
        }

        return $query->get();
    }
}
