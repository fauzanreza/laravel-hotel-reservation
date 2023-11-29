<?php

namespace App\Http\Controllers;

use App\Http\Resources\HotelResource;
use App\Models\Hotels;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HotelsController extends Controller
{
    public function index()
    {
        return HotelResource::collection(Hotels::paginate(5));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'province' => 'required|string',
            'country' => 'required|string',
            'rating' => 'required|decimal:2',
            'image_url' => 'required|string'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' =>
            $validator->errors()], 400);
        }

        $name = $request->input('name');
        $description = $request->input('description');
        $address = $request->input('address');
        $city = $request->input('city');
        $province = $request->input('province');
        $country = $request->input('country');
        $rating = $request->input('rating');
        $image_url = $request->input('image_url');

        $hotel = Hotels::create([
            'name' => $name,
            'description' => $description,
            'address' => $address,
            'city' => $city,
            'province' => $province,
            'country' => $country,
            'rating' => $rating,
            'image_url' => $image_url,
        ]);
            return response()->json([
                'data' => new HotelResource($hotel)
            ], 201);
    }

    public function show(Hotels $hotel)
    {
    return new HotelResource($hotel);
    }

    public function update(Request $request, Hotels $hotel)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'province' => 'required|string',
            'country' => 'required|string',
            'rating' => 'required|decimal:2',
            'image_url' => 'required|string'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' =>
            $validator->errors()], 400);
        }
    
        $name = $request->input('name');
        $description = $request->input('description');
        $address = $request->input('address');
        $city = $request->input('city');
        $province = $request->input('province');
        $country = $request->input('country');
        $rating = $request->input('rating');
        $image_url = $request->input('image_url');

        $hotel = Hotels::create([
            'name' => $name,
            'description' => $description,
            'address' => $address,
            'city' => $city,
            'province' => $province,
            'country' => $country,
            'rating' => $rating,
            'image_url' => $image_url,
        ]);
            return response()->json([
                'data' => new HotelResource($hotel)
            ], 200);
    }

    public function destroy(Hotels $hotel)
    {
        $hotel->delete();
        return response()->json(null,204);
     }
}
