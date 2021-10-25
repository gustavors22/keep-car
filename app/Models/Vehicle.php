<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicle extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'type', 'identifier', 'client_id'];

    protected $searchableFields = ['*'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function piecies()
    {
        return $this->belongsToMany(
            Piece::class,
            'piece_vehicles',
            'vehicle_id',
            'piecie_id'
        );
    }
}
