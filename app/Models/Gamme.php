<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Gamme extends Model
{
    use HasFactory;
    public function articles(){
        return $this->hasMany(Article::class);
    }

    protected $fillable = ['nom', 'id'];

}
