@extends('layouts/master')
@section('content')
 {!! Form::open(['url' => 'ajoutSejour', 'files' => true]) !!}
<div class="well">
   
    <h1>Ajouter Séjour</h1>
    <div class="form-group">
        <label for="numClient"> Numéro Client : </label>
        <select class="form-control" name="cbClient" required>
            <option value=0>Sélectionner un client</option>
            @foreach ($mesClients as $unC)
            {
            <option value="{{ $unC->NumCli }}">{{ $unC->NomCli }}</option>
            }
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="numEmplacement"> Numéro Emplacement : </label>
        <select class="form-control" name="cbEmplacement" required>
            <option value=0>Sélectionner un emplacement</option>
            @foreach ($mesEmplacements as $unE)
            {
            <option value="{{ $unE->NumEmpl }}">{{ $unE->NumEmpl }}</option>
            }
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="DatedebSej"> Date de début :</label>
        <input type ="date" name="DatedebSej" id ="DatedebSej" class="form-control" min="0">
    </div>
    <script>$("#DatedebSej").datepicker();</script>
    <div class="form-group">
        <label for="DateFinSej"> Date de fin :</label>
        <input type ="date" name="DateFinSej" id ="DateFinSej" class="form-control" min="0"> 
    </div>
     <script>$("#DateFinSej").datepicker();</script>
    <div class="form-group">
        <label for="NbPersonnes">Nombre de personnes :</label>
        <input type="text" class="form-control" name="NbPersonnes" value="">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-ok"></span>
            Valider
        </button>
        
        <button type="button" class="btn btn-default btn-primary"
                onclick="{
                            window.location = '../public/home';
                        }"
            <span class="glyphicon glyphicon-remove"></span> Annuler
                     
        </button>
    </div>
 </div>
@stop
