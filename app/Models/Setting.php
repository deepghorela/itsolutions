<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
     * Get All Settings
     *
     * @return object
     */
    public static function getSettings(){
        return self::orderBy('order')->get();
    }
}
