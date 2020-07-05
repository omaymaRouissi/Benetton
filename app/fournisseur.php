<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\produit;
use App\Commande;
class fournisseur extends Model
{
    
    protected $fillable=['name','ville','numero','email'];
  
    public function produits(){

        return $this->hasMany(produit::class);
    }
    public function commandes(){

        return $this->hasMany(Commande::class);
    }
    






}
