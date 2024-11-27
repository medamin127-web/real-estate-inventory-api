<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'address',
        'size',
        'size_unit',
        'bedrooms',
        'latitude',
        'longitude',
        'price'
    ];

    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
        'price' => 'float',
        'size' => 'float'
    ];

    public function scopeSearch($query, $filters)
    {
        return $query->when($filters['type'] ?? null, function($q, $type) {
            return $q->where('type', $type);
        })
            ->when($filters['address'] ?? null, function($q, $address) {
                return $q->where('address', 'like', "%{$address}%");
            })
            ->when($filters['min_size'] ?? null, function($q, $minSize) {
                return $q->where('size', '>=', $minSize);
            })
            ->when($filters['max_size'] ?? null, function($q, $maxSize) {
                return $q->where('size', '<=', $maxSize);
            })
            ->when($filters['bedrooms'] ?? null, function($q, $bedrooms) {
                return $q->where('bedrooms', $bedrooms);
            })
            ->when($filters['min_price'] ?? null, function($q, $minPrice) {
                return $q->where('price', '>=', $minPrice);
            })
            ->when($filters['max_price'] ?? null, function($q, $maxPrice) {
                return $q->where('price', '<=', $maxPrice);
            });
    }

    public function scopeNearby($query, $latitude, $longitude, $radiusKm = 10)
    {
        $earthRadius = 6371;

        return $query->selectRaw(
            "*, ({$earthRadius} * acos(cos(radians(?)) * cos(radians(latitude)) * " .
            "cos(radians(longitude) - radians(?)) + sin(radians(?)) * sin(radians(latitude)))) AS distance",
            [$latitude, $longitude, $latitude]
        )
            ->havingRaw('distance <= ?', [$radiusKm])
            ->orderBy('distance');
    }
}
