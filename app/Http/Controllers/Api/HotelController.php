<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;

use App\Http\Controllers\Controller;
use App\Repositories\HotelRepository;

class HotelController extends Controller
{
    protected $hotelRepository;

    /**
     * HotelController constructor.
     *
     * @param HotelRepository $hotelRepository
     */
    public function __construct(HotelRepository $hotelRepository)
    {
        $this->hotelRepository = $hotelRepository;
    }

    /**
     * Display a listing of hotels with optional filters.
     *
     * @param StoreHotelRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $filters = $request->only(['id', 'nit', 'name', 'city_name']);
        $hotels = $this->hotelRepository->search($filters);

        return response()->json($hotels, Response::HTTP_OK);
    }

    public function store(StoreHotelRequest $request)
    {
        $hotel = $this->hotelRepository->create($request->validated());

        return response()->json($hotel, Response::HTTP_CREATED);
    }

    /**
     * Display the specified hotel.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $hotel = $this->hotelRepository->find($id);

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
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateHotelRequest $request, $id)
    {
        $hotel = $this->hotelRepository->update($id, $request->validated());

        if (!$hotel) {
            return response()->json(['error' => 'Hotel not found or not updated'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($hotel, Response::HTTP_OK);
    }

    /**
     * Remove the specified hotel from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $deleted = $this->hotelRepository->delete($id);

        if (!$deleted) {
            return response()->json(['error' => 'Hotel not found or not deleted'], Response::HTTP_NOT_FOUND);
        }

        return response()->json(['message' => 'Hotel deleted successfully'], Response::HTTP_OK);
    }
}
