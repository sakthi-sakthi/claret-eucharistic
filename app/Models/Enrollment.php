<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date_of_join',
        'door_no',
        'district',
        'street_nagar',
        'pin',
        'village',
        'post_office',
        'state',
        'country',
        'diocese',
        'mobile_no',
        'whatsapp_no',
        'email',
        'family_details',
        'death_anniversary',
        'any_other_intention',
        'signature'
    ];

    protected $casts = [
        'family_details' => 'array',
        'death_anniversary' => 'array',
    ];
}
