<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'adresse',
        'ville',
        'code_postal',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function commandes(){
        return $this->hasMany(Commande::class);
    }
}
