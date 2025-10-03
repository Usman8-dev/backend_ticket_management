<?php

namespace App\Models;

use App\Models\BusModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TripModel extends Model
{
    use HasFactory;
    protected $table = 'trip';
    protected $fillable = ['route', 'bus_id', 'departure_time', 'arrival_time', 'price', 'date'];

    public function bus()
{
    return $this->belongsTo(BusModel::class);
}

}
