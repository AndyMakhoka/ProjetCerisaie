@extends('layouts.master');
@section('content')
    {//!! Form::open(array('route' => array('rechercheSejoursMois', $i), 'methode' => 'post', 'files' => true)) !!}
    <div class="well">
        <h1>Recherche un séjour sur critère</h1>
        <label> Mois :
        <select class="form-control" name="MoisChoisi" id="MoisChoisi" required>
            <option value="0">Selectionner un mois</option>


            @foreach ($lesMois as $unMois)
                {{$i = $i + 1}}
                <option value="{{$i}}">{{$unMois}}</option>
            @endforeach

        </select>
        </label>
        <br>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-ok"></span>
                Valider
            </button>
            <a class="btn btn-default btn-primary"   href="{{ url('/') }}">
                <span class="glyphicon glyphicon-home"></span> Annuler </a>
        </div>
    </div>
@stop

