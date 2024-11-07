<?php

namespace App\Http\Controllers\Api;

use App\Enums\RoomEnum;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;

use App\Repositories\RoomRepository;

class RoomController extends Controller
{
    protected $repository;

    /**
     * RoomController constructor.
     *
     * @param RoomRepository $roomRepository
     */
    public function __construct(RoomRepository $roomRepository)
    {
        $this->repository = $roomRepository;
    }

    /**
     * Display a listing  of Rooms with optional filters.
     * 
     * @param Request $request
     * 
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $filters = $request->only([RoomEnum::Id, RoomEnum::RoomTypeId, RoomEnum::RoomAccommodationId, RoomEnum::CountRooms]);
        $rooms = $this->repository->search($filters);

        return response()->json($rooms);
    }

    /**
     * Store a newly created Room in storage.
     * 
     * @param StoreRoomRequest $request
     * 
     * @return JsonResponse
     */
    public function store(StoreRoomRequest $request): JsonResponse
    {
        $room = $this->repository->create($request->validated());

        return response()->json($room, 201);
    }

    /**
     * Display the specified room accommodation.
     * 
     * @param int $id
     * 
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $room = $this->repository->find($id);

        return $room ? response()->json($room) : response()->json(['error' => 'Room not found'], Response::HTTP_NOT_FOUND);
    }

    /**
     * Update the specified Room in storage.
     * 
     * @param UpdateRoomRequest $request
     * @param int $id
     * 
     * @return JsonResponse
     */
    public function update(UpdateRoomRequest $request, int $id): JsonResponse
    {
        $room = $this->repository->update($id, $request->validated());

        return $room ? response()->json($room) : response()->json(['error' => 'Room not found'], Response::HTTP_NOT_FOUND);
    }

    /**
     * Remove the specified Room from storage.
     * 
     * @param int $id
     */
    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->repository->delete($id);

        return $deleted ? response()->json(['message' => 'Room deleted']) : response()->json(['error' => 'Room not found'], Response::HTTP_NOT_FOUND);
    }
}
