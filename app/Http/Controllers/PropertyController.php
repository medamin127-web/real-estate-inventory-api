<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PropertyController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|in:House,Apartment',
            'address' => 'required|string|max:255',
            'size' => 'required|numeric|min:0',
            'size_unit' => 'required|in:SQFT,m2',
            'bedrooms' => 'required|integer|min:0',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'price' => 'required|numeric|min:0'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $property = Property::create($validator->validated());

        return response()->json($property, 201);
    }

    public function search(Request $request)
    {
        $filters = $request->only([
            'type', 'address', 'min_size', 'max_size',
            'bedrooms', 'min_price', 'max_price'
        ]);

        $properties = Property::search($filters)->get(); // Ensure this is .get()

        return response()->json($properties);
    }

    public function nearby(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'radius' => 'nullable|numeric|min:0'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $radius = $request->input('radius', 10);

        $properties = Property::nearby(
            $request->latitude,
            $request->longitude,
            $radius
        )->get();

        return response()->json($properties);
    }
}
