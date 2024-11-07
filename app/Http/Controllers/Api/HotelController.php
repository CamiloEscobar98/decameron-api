<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use App\Http\Controllers\Controller;

use App\Repositories\HotelRepository;

use App\Enums\HotelEnum;

class HotelController extends Controller
{
    protected $repository;

    /**
     * HotelController constructor.
     *
     * @param HotelRepository $hotelRepository
     */
    public function __construct(HotelRepository $hotelRepository)
    {
        $this->repository = $hotelRepository;
    }

    /**
     * Display a listing of hotels with optional filters.
     *
     * @param Request $request
     * 
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $filters = $request->only([HotelEnum::Id, HotelEnum::Nit, HotelEnum::Name, HotelEnum::CityName]);
        $hotels = $this->repository->search($filters);

        return response()->json($hotels, Response::HTTP_OK);
    }

    /**
     * Store a newly created Room Accommodation in storage.
     * 
     * @param StoreHotelRequest $request
     * 
     * @return JsonResponse
     */
    public function store(StoreHotelRequest $request): JsonResponse
    {
        // $request->validate(['nit' => ['required']]);
        $hotel = $this->repository->create($request->validated());

        return response()->json($hotel, Response::HTTP_CREATED);
    }

    /**
     * Display the specified hotel.
     *
     * @param int $id
     * 
     * @return JsonResponse
     */
    public function show($id)
    {
        $hotel = $this->repository->find($id);

        if (!$hotel) {
            return response()->json(['error' => 'Hotel not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($hotel, Response::HTTP_OK);
    }

    /**
     * Update the specified hotel in storage.
     *
     * @param UpdateHotelRequest $request
     * @param int $id
     * 
     * @return JsonResponse
     */
    public function update(UpdateHotelRequest $request, int $id)
    {
        $hotel = $this->repository->update($id, $request->validated());

        if (!$hotel) {
            return response()->json(['error' => 'Hotel not found or not updated'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($hotel, Response::HTTP_OK);
    }

    /**
     * Remove the specified hotel from storage.
     *
     * @param int $id
     * 
     * @return JsonResponse
     */
    public function destroy(int $id)
    {
        $deleted = $this->repository->delete($id);

        if (!$deleted) {
            return response()->json(['error' => 'Hotel not found or not deleted'], Response::HTTP_NOT_FOUND);
        }

        return response()->json(['message' => 'Hotel deleted successfully'], Response::HTTP_OK);
    }
}
