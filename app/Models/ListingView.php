<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingView extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address',
        'user_agent',
        'listing_id',
        'user_id'
    ];
}
