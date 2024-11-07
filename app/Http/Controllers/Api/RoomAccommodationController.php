<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoomAccommodationRequest;
use App\Http\Requests\UpdateRoomAccommodationRequest;

use App\Repositories\RoomAccommodationRepository;

class RoomAccommodationController extends Controller
{
    protected $repository;

    /**
     * RoomAccommodationController constructor.
     *
     * @param RoomAccommodationRepository $roomAccommodationRepository
     */
    public function __construct(RoomAccommodationRepository $roomAccommodationRepository)
    {
        $this->repository = $roomAccommodationRepository;
    }

    /**
     * Display a listing of room accommodations with optional filters.
     * 
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $accommodations = $this->repository->all();
        return response()->json($accommodations, Response::HTTP_OK);
    }

    /**
     * Store a newly created Room Accommodation in storage.
     * 
     * @param StoreRoomAccommodationRequest $request
     * 
     * @return JsonResponse
     */
    public function store(StoreRoomAccommodationRequest $request): JsonResponse
    {
        $accommodation = $this->repository->create($request->validated());
        return response()->json($accommodation, Response::HTTP_CREATED);
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
        $accommodation = $this->repository->find($id);
        return response()->json($accommodation, Response::HTTP_OK);
    }

    /**
     * Update the specified room accommodation in storage.
     * 
     * @param UpdateRoomAccommodationRequest $request
     * @param int $id
     * 
     * @return JsonResponse
     */
    public function update(UpdateRoomAccommodationRequest $request, int $id): JsonResponse
    {
        $accommodation = $this->repository->update($id, $request->validated());
        return response()->json($accommodation, Response::HTTP_OK);
    }

    /**
     * Remove the specified room accommodation from storage.
     * 
     * @param int $id
     * 
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $this->repository->delete($id);
        return response()->json(['message' => 'Accommodation deleted successfully'], Response::HTTP_OK);
    }
}
