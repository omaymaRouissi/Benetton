@extends('layouts.app')
@section ('content')
<div class="clearfix">
<a href ="{{route('fournisseurs.create')}}"class="btn btn-primary float-right" style="margin-bottom:10px">add a new provider</a>
</div>
<div class="card card-default">
@if(Session::has('success'))
    <div class="alert alert-success" role= "alert">
        <strong>Successful:</strong>
            {{ Session::get('success') }}
    </div>
@endif
<div class="card-header">All provider</div>
<table class="card-body" >
<table class="table">
    <thead>
        <tr>
        <th>name</th>
        <th>ville</th>
        <th>numero </th>
        <th>email </th>
        <th>action</th>
        </tr>
        </thead>
<tbody>
@foreach($fournisseurs as $fournisseur)
<tr>
 <td>
 {{$fournisseur->name}}
  </td>
  <td>
{{$fournisseur->ville}}
 </td>
<td>
{{$fournisseur->numero}}
</td>
<td>
{{$fournisseur->email}}
</td>

    <td>
        <div class="col-sm-6">
        <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons"></i> <span>Delete</span></a>						
                            </div>
        <div id="deleteEmployeeModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <form class="float_rigtht ml-2" action="{{route('fournisseurs.destroy',$fournisseur->id)}} " method ="POST">
                    @csrf
        @method('DELETE')
                            <div class="modal-header">						
                                <h4 class="modal-title">Delete provider</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            </div>
                            <div class="modal-body">					
                                <p>Are you sure you want to delete these Records?</p>
                                <p class="text-warning"><small>This action cannot be undone.</small></p>
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                <input type="submit" class="btn btn-danger" value="validate">
                            </div>
                    </form>
                    </td>
                    </div>
                </div>
            </div>
            <td>
        <a href ="{{route('fournisseurs.edit',$fournisseur->id)}}" class="btn btn-primary float_right btn-sm  " >Edit</a>
        </td>
        </tr>
        @endforeach
        </tbody>
        </table>
        </table>
        </div>
@endsection