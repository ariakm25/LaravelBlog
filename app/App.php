<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    protected $fillable = [
        'title', 'content', 'platform', 'category_app_id', 'license', 'size', 'version', 'rating', 'featured', 'slug', 'keyword', 'description'
    ];
    
    public function category_app()
    {
        return $this->belongsTo('App\CategoryApp');
    }
}
