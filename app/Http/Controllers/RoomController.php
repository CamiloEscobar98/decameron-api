<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Repositories\RoomRepository;
use Illuminate\Http\Response;

class RoomController extends Controller
{
    protected $roomRepository;

    public function __construct(RoomRepository $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }

    public function index(Request $request): JsonResponse
    {
        $filters = $request->only(['id', 'room_type', 'room_accommodation', 'capacity']);
        $rooms = $this->roomRepository->search($filters);

        return response()->json($rooms);
    }

    public function store(StoreRoomRequest $request): JsonResponse
    {
        $room = $this->roomRepository->create($request->validated());

        return response()->json($room, 201);
    }

    public function show($id): JsonResponse
    {
        $room = $this->roomRepository->find($id);

        return $room ? response()->json($room) : response()->json(['error' => 'Room not found'], Response::HTTP_NOT_FOUND);
    }

    public function update(UpdateRoomRequest $request, $id): JsonResponse
    {
        $room = $this->roomRepository->update($id, $request->validated());

        return $room ? response()->json($room) : response()->json(['error' => 'Room not found'], Response::HTTP_NOT_FOUND);
    }

    public function destroy($id): JsonResponse
    {
        $deleted = $this->roomRepository->delete($id);

        return $deleted ? response()->json(['message' => 'Room deleted']) : response()->json(['error' => 'Room not found'], Response::HTTP_NOT_FOUND);
    }
}
