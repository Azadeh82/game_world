<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    use HasFactory;
    public function avis(){
        return $this->hasMany(Avis::class);
    } 

    public function commandes(){
        return $this->belongsToMany(Commande::class , 'commande_articles')->withPivot('quantite', 'reduction');
    }

    public function gamme(){
        return $this->belongsTo(Gamme::class);
    }

    public function promotions(){
        return $this->belongsToMany(Promotion::class , 'promotion_articles');
    }

    public function users(){
        return $this->belongsToMany(User::class , 'favoris');
    }

    protected $fillable = ['nom', 'description_courte', 'description_longue', 'image', 'prix', 'stock', 'note', 'gamme_id'];

}
