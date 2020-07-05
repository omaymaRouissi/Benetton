<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\fournisseur;

class produit extends Model
{
    protected $fillable=['Name', 'Reference','Category','Quantity','fournisseur_id','Location'];

    public function fournisseurs(){

        return $this->belongsTo(fournisseur::class);
    }

}
