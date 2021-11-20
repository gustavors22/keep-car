<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VehicleImage extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['vehicle_id', 'path'];

    protected $searchableFields = ['*'];

    protected $table = 'vehicle_images';

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
