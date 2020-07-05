<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\fournisseur;

class Commande extends Model
{
    protected $fillable=['quantity','fournisseur_id','date'];
    
    public function fournisseurs(){

        return $this->belongsTo(fournisseur::class);
    }
}
