<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoomAccommodationRequest;
use App\Http\Requests\UpdateRoomAccommodationRequest;

use App\Repositories\RoomAccommodationRepository;

class RoomAccommodationController extends Controller
{
    protected $roomAccommodationRepository;

    public function __construct(RoomAccommodationRepository $roomAccommodationRepository)
    {
        $this->roomAccommodationRepository = $roomAccommodationRepository;
    }

    /**
     * Display a listing of room accommodations.
     */
    public function index(): JsonResponse
    {
        $accommodations = $this->roomAccommodationRepository->all();
        return response()->json($accommodations, Response::HTTP_OK);
    }

    /**
     * Store a newly created room accommodation in storage.
     */
    public function store(StoreRoomAccommodationRequest $request): JsonResponse
    {
        $accommodation = $this->roomAccommodationRepository->create($request->validated());
        return response()->json($accommodation, Response::HTTP_CREATED);
    }

    /**
     * Display the specified room accommodation.
     */
    public function show(int $id): JsonResponse
    {
        $accommodation = $this->roomAccommodationRepository->find($id);
        return response()->json($accommodation, Response::HTTP_OK);
    }

    /**
     * Update the specified room accommodation in storage.
     */
    public function update(UpdateRoomAccommodationRequest $request, int $id): JsonResponse
    {
        $accommodation = $this->roomAccommodationRepository->update($id, $request->validated());
        return response()->json($accommodation, Response::HTTP_OK);
    }

    /**
     * Remove the specified room accommodation from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        $this->roomAccommodationRepository->delete($id);
        return response()->json(['message' => 'Accommodation deleted successfully'], Response::HTTP_OK);
    }
}
