@extends('layouts.app')
@section ('content')
<div class="card card-default">
<div class="card-header">
{{isset($produit) ? "Update prodect":"Add a new prodect"}}
</div>
<div class="card-body" >
<form action="{{isset($produit)? route('produits.update',$produit->id) : route('produits.store')}}" method="POST" enctype ="multipart/form-data">
@csrf
@if(isset($produit))
@method('PUT')
@endif
<div class="form-group">
<label for="produit title "> Name:</label>
<input type="text" class="form-control" name="Name" placeholder="Add new prodect" value="{{ isset($produit) ? $produit->Name :''}}" required>
</div>
<div class="form-group">
    <label for="produit reference "> Reference:</label>
    <input type="text" class="form-control" name="Reference" placeholder="Add new Reference" value="{{ isset($produit) ? $produit->Reference :''}}" required>
    </div>
    <div class="mb-3">
        <div class="form-group">
            <label for="produit category "> Category</label>
            <select class="form-control" value="{{ isset($produit) ? $produit->Category :''}}" required>
                <option selected disabled >filtre</option>
                <option> mecanique</option>
                <option>electrique</option>
                <option>tuyauterie </option>
                <option>pneumatique </option>
                <option>brazzoli </option>
                <option>ventilateur </option>
                <option>OMI</option>
                <option>corde </option>
                <option>tonello </option>
                <option>flygt </option>
                <option>roue </option>
                <option>TEXA</option>
                <option>Station B1</option>
                <option>benetton 1</option>
                <option>DAIKIN</option>
                <option>TAPIS </option>
                <option>Station </option>
                <option>flainox </option>
                <option>incendie </option>
                <option>Rameuse (RAM52)</option>
                <option>menuiserie </option>
                <option>monforts</option>
                <option>filtre press</option>
          </select>
        </div>
    </div>
<div class="form-group">
<label for="produit quantity"> Quantity:</label>
<input type="text"class="form-control"  name="Quantity" placeholder="Add new Quantity"value="{{ isset($produit) ? $produit->Quantity :''}}"required >
</div>
<div class="form-group">
    <label for="selectFournisseur"> Select a Fournisseur:</label>
<select name="fournisseurID" class="form-control" id="selectFournisseur">
    @foreach ($fournisseurs as $fournisseur)
          <option value="{{$fournisseur->id}}">
          {{$fournisseur->name}}
          </option>
    @endforeach
  
  </select>
</div>
<div class="form-group">
    <label for="produit location"> Location:</label>
    <input type="text" class="form-control" name="Location" placeholder="Add new Location" value="{{ isset($produit) ? $produit->Location :''}}" required>
    </div>
<div class="form-group">
<button type="submit"  class="btn btn-success">
{{isset($produit) ? "Update ":"Add "}}
</button>
</div>
</form>
</div>
</div>

@endsection