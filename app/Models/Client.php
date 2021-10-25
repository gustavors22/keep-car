<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'email', 'cellphone'];

    protected $searchableFields = ['*'];

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
