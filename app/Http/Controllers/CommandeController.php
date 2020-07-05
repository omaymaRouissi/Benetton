<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Commande;
use\App\Http\Requests\CommandeRequest;
use\App\Http\Requests\UpdateCommandeRequest;
use App\Http\Requests;
use App\produit;
use Illuminate\Support\Facades\Storage;


class CommandeController extends Controller
{
public function __construct()

{
    $this->middleware('auth');
    
}
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
    return view('commandes.index')-> with('commandes',Commande::all());
}

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
public function create()
{
    return view('commandes.create');  
}

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request)
{
    Commande::create([
       
        'quantity'=>$request->quantity,
        'fournisseur_id'=>$request->fournisseurID,
        'date'=>$request->date     
]);
session()->flash('success','command created successfully');
return redirect(route ('commandes.index'));
     }



/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function show($id)
{
    //
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function edit(Commande $Commande)
{
    return view('commandes.create')->with('Commande',$Commande);

}

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function update(UpdateCommandeRequest $request,Commande $Commande)
{
    $data=$request->only(['quantity','date']); 
    $Commande->update($data);
    session()->flash('success','command updated successfully');
return redirect(route ('commandes.index'));
}

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy(Commande $Commande)
{
    $Commande->Delete();
    return redirect(route('commandes.index'))->withSuccess('Task Created Successfully!');
}
}
