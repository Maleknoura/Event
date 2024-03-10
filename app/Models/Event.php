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
        'localisation',
        'image',
        'date',
        'place_available',
        'categorie_id',
        'statut',
        'mode',
        'organiser_id'


    ];

    public function category()
    {
        return $this->belongsTo(category::class, 'categorie_id');
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
