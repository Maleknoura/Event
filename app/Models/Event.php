<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'description',
        'image',
        'date',
        'places_availables',
        'category_id',
        'status',
         'mode',
       
    ];

    public function category()
    {
        return $this->belongsTo(category::class,'categorie_id');
    }

    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }
    public function organizer()
    {
        return $this->belongsTo(Organiser::class);
    }
}
