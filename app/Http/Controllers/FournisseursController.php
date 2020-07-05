<?php

namespace App\Http\Controllers;

use App\Commande;
use Illuminate\Http\Request;
use App\fournisseur;
use\App\Http\Requests\FournisseurRequest;
use\App\Http\Requests\UpdateFournisseurRequest;
use App\Http\Requests;
use App\produit;

use Illuminate\Support\Facades\Storage;

class FournisseursController extends Controller
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
        return view('fournisseurs.index')-> with('fournisseurs',fournisseur::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fournisseurs.create')->with('produits',produit::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
       $fournisseur=  fournisseur::create([
            'name'=>$request->name,
            'ville'=>$request->ville,
            'numero'=>$request->numero,
            'email'=>$request->email
            ]);
    
           
        
       
    
    session()->flash('success','fournisseur created successfully');
return redirect(route ('fournisseurs.index '));

        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(fournisseur $fournisseur)
    {
        
            return view('fournisseurs.create', ['fournisseur'=> $fournisseur, 'produits' => produit::all()]);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFournisseurRequest $request,fournisseur $fournisseur )
    {
        
        $data=$request->only(['name','ville','numero','email']); 
        $fournisseur->update($data);
        if ($request->produits){
            $fournisseur->produits()->sync($request->produits);
        }
  
        session()->flash('success','fournisseur updated successfully');
return redirect(route ('fournisseurs.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(fournisseur $fournisseur)
    {
        $fournisseur->Delete();
        return redirect(route('fournisseurs.index'))->withSuccess('Task Created Successfully!');
    }
}

