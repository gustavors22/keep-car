<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Piece extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'duration', 'vehicle_id', 'should_change'];

    protected $searchableFields = ['*'];

    public function vehicle()
    {
        return $this->belongsTo(
            Vehicle::class
        );
    }
}
