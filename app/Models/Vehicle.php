<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicle extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'brand', 'model', 'year',
        'color', 'vehicle_plate',
        'client_id'
    ];

    protected $searchableFields = ['*'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function vehicleImages()
    {
        return $this->hasMany(VehicleImage::class);
    }

    public function piecies()
    {
        return $this->hasMany(
            Piece::class,
        );
    }
}
