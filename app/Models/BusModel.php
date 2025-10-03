<?php

namespace App\Models;

use App\Models\TripModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BusModel extends Model
{
    use HasFactory;
    protected $table = 'buses';
    protected $fillable = ['bus_number', 'capacity', 'type'];

    public function trips()
{
    return $this->hasMany(TripModel::class);
}

}
