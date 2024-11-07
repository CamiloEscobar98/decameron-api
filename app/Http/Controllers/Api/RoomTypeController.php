<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoomTypeRequest;
use App\Http\Requests\UpdateRoomTypeRequest;

use App\Repositories\RoomTypeRepository;

class RoomTypeController extends Controller
{
    protected $repository;

    /**
     * RoomTypeController constructor.
     *
     * @param RoomTypeRepository $roomTypeRepository
     */
    public function __construct(RoomTypeRepository $roomTypeRepository)
    {
        $this->repository = $roomTypeRepository;
    }

    /**
     * Display a listing of room types.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $roomTypes = $this->repository->all();
        return response()->json($roomTypes, Response::HTTP_OK);
    }

    /**
     * Store a newly created room type.
     *
     * @param StoreRoomTypeRequest $request
     * 
     * @return JsonResponse
     */
    public function store(StoreRoomTypeRequest $request): JsonResponse
    {
        $roomType = $this->repository->create($request->validated());
        return response()->json($roomType, Response::HTTP_CREATED);
    }

    /**
     * Display the specified room type.
     *
     * @param int $id
     * 
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $roomType = $this->repository->find($id);
        return response()->json($roomType, Response::HTTP_OK);
    }

    /**
     * Update the specified room type.
     *
     * @param UpdateRoomTypeRequest $request
     * @param int $id
     * 
     * @return JsonResponse
     */
    public function update(UpdateRoomTypeRequest $request, int $id): JsonResponse
    {
        $roomType = $this->repository->update($id, $request->validated());
        return response()->json($roomType, Response::HTTP_OK);
    }

    /**
     * Remove the specified room type.
     *
     * @param int $id
     * 
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $this->repository->delete($id);
        return response()->json(['message' => 'Room type deleted successfully'], Response::HTTP_OK);
    }
}
