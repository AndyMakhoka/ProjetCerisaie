@extends('layouts/master')
@section('content')
<h1>Liste Séjours</h1>
<div class="well">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Numéro Séjour</th>
                <th>Nom Client</th>
                <th>Numéro Emplacement</th>
                <th>Date début</th>
                <th>Date de fin</th>
                <th>Nombre de personnes</th>
                <th>Modification</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        @foreach($mesSejours as $unSejour)
        <tr>
            <td>{{$unSejour->NumSej}}</td>
            <td><b>{{$unSejour->NomCli}}</b></td>
            <td>{{$unSejour->NumEmpl}}</td>
            <td>{{ Carbon\Carbon::parse($unSejour->DatedebSej)->format('d/m/Y')}} </td>
            <td>{{Carbon\Carbon::parse($unSejour->DateFinSej)->format('d/m/Y')}}</td>
            <td>{{$unSejour->NbPersonnes}}</td>
            <td style="text-align:center;"><a href="{{ url('/modifierSejour')}}/{{$unSejour->NumSej}}">
                    <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="modfier"</span></a>
            </td>
            <td style="text-align:center;">                   
                     <a class="glyphicon glyphicon-remove-sign" data-toggle="tooltip" data-placement="top" title="Supprimer" href="#"
                       onclick="javascript:if (confirm('Suppression confirmée ?')) window.location ='{{ url('/supprimerSejour')}}/{{$unSejour->NumSej}}';">
                    </a>
            </td>


        </tr>
        @endforeach
    </table>
    <div class="espace">
        <div class="col-md-12"></div>    
    </div>
    <div class="form-group">
        <div class="col-md-12 col-md-offset-11">
            <a class="btn btn-default btn-primary"   href="{{ url('/') }}"> 
                <span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
        </div>
    </div>
</div>

@stop
