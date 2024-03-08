<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $table ='reservation';
    protected $fillable = [
        'event_id',
        'client_id',
        'status'
    ];
    public function events(){
        return $this->belongsTo(Event::class);
    }
}
