<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    public function articles(){
        return $this->belongsToMany(Article::class , 'promotion_articles');
    }
}
