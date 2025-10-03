<?php

namespace App\Models;

use App\Models\TripModel;
use App\Models\CustomerModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ticketsModel extends Model
{
    use HasFactory;
    protected $table = 'tickets';
    protected $fillable = ['trip_id', 'seat_number', 'name', 'cnic', 'user_id'];

     // Relations
     public function trip()
     {
         return $this->belongsTo(TripModel::class, 'trip_id');
     }
 
     public function user()
     {
         return $this->belongsTo(CustomerModel::class);
     }
}
