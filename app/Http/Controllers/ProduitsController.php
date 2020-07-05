<?php

namespace App\Http\Controllers;

use App\fournisseur;
use Illuminate\Http\Request;
use App\produit;
use\App\Http\Requests\ProduitRequest;
use\App\Http\Requests\UpdateProduitRequest;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
class ProduitsController extends Controller
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
    return view('produits.index')-> with('produits',produit::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produits.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProduitRequest $request)
    {
       produit::create([
          'Name'=>$request->Name,
          'Reference'=>$request->Reference,
          'Category'=>$request->Description,
          'Quantity'=>$request->Quantite,
          'fournisseur_id'=>$request->fournisseurID,
          'Location'=>$request->Location,
         
]);
session()->flash('success','produit created successfully');
return redirect(route ('produits.index'));
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
    public function edit( produit $produit)
    {
    return view('produits.create')->with('produit',$produit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProduitRequest $request,produit $produit )
    {
        
        $data=$request->only(['Name','Reference','Categorie','Quantity','Location']); 
        $produit->update($data);
        session()->flash('success','produit updated successfully');
return redirect(route ('produits.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(produit $produit)
    {
        $produit->Delete();
        return redirect(route('produits.index'))->withSuccess('Task Created Successfully!');
    }
}