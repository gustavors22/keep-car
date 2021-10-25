<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Piece extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'quantity'];

    protected $searchableFields = ['*'];

    public function vehicles()
    {
        return $this->belongsToMany(
            Vehicle::class,
            'piece_vehicles',
            'piecie_id'
        );
    }
}
