@extends('layouts.app')
@section ('content')
<div class="card card-default">
    <div class="card-header">
        {{isset($fournisseur) ? "Update provider":"Add a new provider"}}
    </div>
    <div class="card-body" >
        <form action="{{ isset($fournisseur) ? route('fournisseurs.update',$fournisseur->id) : route('fournisseurs.store')}}" method="POST" enctype ="multipart/form-data">
        @csrf
        @if(isset($fournisseur))
        @method('PUT')
        @endif
        <div class="form-group">
            <label for="produit title "> Name:</label>
            <input type="text" class="form-control" name="title" placeholder="Add new provider" value="{{ isset($fournisseur) ? $fournisseur->name:''}}">
        </div>
        <div class="mb-3">
            <div class="form-group">
                <label for="produit title "> Ville:</label>
                <select class="form-control" required>
                    <option selected disabled >Tunis</option>
                    <option>Ariana</option>
                    <option>Manouba</option>
                    <option>Ben Arous</option>
                    <option>Sousse</option>
                    <option>Kairouan</option>
                    <option>Bizert</option>
                    <option>Gabes</option>
                    <option>Gafsa</option>
                    <option>Monastir</option>
                    <option>Sfax</option>
                    <option>Medenine</option>
                    <option>Nabeul</option>
                    <option>Beja</option>
                    <option>Tatouine</option>
                    <option>Kef</option>
                    <option>Sidi Bouzid</option>
                    <option>Jandouba</option>
                    <option>Tozeur</option>
                    <option>Siliana</option>
                    <option>Zaghouan</option>
                    <option>Kebili</option>
                    <option>Mehdia</option>
                    <option>Kasserine</option>
              </select>
            </div>
        </div>
        <div class="form-group">
            <label for="fournisseur numero"> Numero:</label>
            <input type="text"class="form-control"  name="numero" placeholder="Add new numero"value="{{ isset($fournisseur) ? $fournisseur->numero :''}}" >
        </div>
        <div class="form-group">
            <label for="fournisseur email"> Email:</label>
                 <div class="input-group-prepend">
                     <span class="input-group-text">@</span>
                     <input type="text" class="form-control rounded-right" value="{{ isset($fournisseur) ? $fournisseur->email :''}}"required> 
                 </div> 
        </div>  
        <div class="form-group">
              <label for="SelectProduct"> Select a Product:</label> 
              <select class="form-control"  name="product[]"required>
                    @foreach ($produits as $produit)
                    <option value="{{$produit->id}}" selected >
                            {{$produit->title}}
                    </option>
                    @endforeach
              </select>
        </div> 
        <div class="form-group">
            <button type="submit"  class="btn btn-success">
                  {{isset($fournisseur) ? "Update ":"Add "}}
            </button>
        </div>
        </form>
    </div>
</div>
@endsection
