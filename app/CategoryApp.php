<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryApp extends Model
{
    public function apps()
    {
        return $this->hasMany('App\App');
    }
}
