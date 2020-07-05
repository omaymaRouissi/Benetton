@extends('layouts.app')
@section ('content')
<div class="card card-default">
<div class="alert alert-warning">
<div class="card-header" >
{{isset($Commande) ? "Update command":"Add a new command"}}
</div>
<div class="card-body" >
<form action="{{isset($Commande) ? route('commande.update',$Commande->id) : route('commande.store')}}" method="POST" enctype ="multipart/form-data">
@csrf
@if(isset($Commande))
@method('PUT')
@endif

<div class="form-group">
<label for="Commande quantite">Quantity:</label>
<input type="text"class="form-control"  name="quantite" placeholder=" Ajouter quantite"value="{{ isset($Commande) ? $Commande->quantity:''}}">
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
<div class="form-group ">
      <label for="Commande date" class="col-2 col-form-label">Date:</label>
       <input class="form-control" type="date" id="example-date-input"value="{{ isset($Commande) ? $Commande->date:''}}">
      </div>

 <div class="form-group">
  <button type="submit"  class="btn btn-success">
     {{isset($Commande) ? "Update":"Add"}}
  </button>
</div>
</form>
</div>
</div>
@endsection