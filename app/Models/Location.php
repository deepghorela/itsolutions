<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public static function getList(){
        return self::where('is_active', 1)
        ->orderBy('display_order')
        ->orderBy('is_registered_office', 'desc')
        ->get();
    }

    /**
     * Get registered Office details
     *
     * @return object \App\Location
     */
    public static function getRegisteredOffice(){
        return self::where('is_active', 1)
        ->where('is_registered_office', 1)
        ->orderBy('id', 'desc')
        ->first();
    }
}
