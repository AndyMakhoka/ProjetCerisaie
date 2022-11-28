@extends('layouts.master');
@section('content')
    <div class="well">
        <h1>Choisissez un employé</h1>
        {!! Form::open(array('route' => array ('rechercheSejoursMois','method'=>'post'))) !!}
        <select class="form-control" name="cbEmplyes" id="idEmploye" required>
            <option value="0">Selectionner un employé</option>
            @foreach($mesEmployes as $unE){
            <option value="{{$unE->numEmp}}">{{$unE->nom}}</option>
            }
            @endforeach
        </select>
        <input type="submit" value="Envoyer">
    </div>
@stop

