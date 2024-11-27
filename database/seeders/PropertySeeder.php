<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;

class PropertySeeder extends Seeder
{
    public function run()
    {
        $properties = [
            // New York Area
            [
                'type' => 'House',
                'address' => '123 Manhattan St, New York, NY',
                'size' => 2500,
                'size_unit' => 'SQFT',
                'bedrooms' => 4,
                'latitude' => 40.7128,
                'longitude' => -74.0060,
                'price' => 1500000
            ],
            [
                'type' => 'Apartment',
                'address' => '456 Brooklyn Ave, Brooklyn, NY',
                'size' => 1200,
                'size_unit' => 'SQFT',
                'bedrooms' => 2,
                'latitude' => 40.6782,
                'longitude' => -73.9442,
                'price' => 800000
            ],
            // New Jersey Area
            [
                'type' => 'House',
                'address' => '789 Jersey City Blvd, Jersey City, NJ',
                'size' => 3000,
                'size_unit' => 'SQFT',
                'bedrooms' => 5,
                'latitude' => 40.7282,
                'longitude' => -74.0776,
                'price' => 1200000
            ],
            // Queens Area
            [
                'type' => 'Apartment',
                'address' => '321 Queens Terrace, Queens, NY',
                'size' => 1500,
                'size_unit' => 'm2',
                'bedrooms' => 3,
                'latitude' => 40.7282,
                'longitude' => -73.7949,
                'price' => 650000
            ],
            // Far Locations
            [
                'type' => 'House',
                'address' => '567 Long Island Rd, Long Island, NY',
                'size' => 4000,
                'size_unit' => 'SQFT',
                'bedrooms' => 6,
                'latitude' => 40.7891,
                'longitude' => -73.1350,
                'price' => 2000000
            ],
            [
                'type' => 'Apartment',
                'address' => '890 Newark St, Newark, NJ',
                'size' => 900,
                'size_unit' => 'SQFT',
                'bedrooms' => 1,
                'latitude' => 40.7357,
                'longitude' => -74.1724,
                'price' => 350000
            ]
        ];

        foreach ($properties as $propertyData) {
            Property::create($propertyData);
        }
    }
}
