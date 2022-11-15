
@extends('layouts/master')
@section('content')
 {!! Form::open(array('route' => array('postmodifierSejour', $unS->NumSej), 'methode' => 'post', 'files' => true)) !!}
<div class="well">

    <h1>Modifier Séjour</h1>
     <div class="form-group">
        <label for="NumSejour">Numéro de séjour:</label>
        <input type="text" disabled="disabled" class="form-control" name="NumSejour" value="{{$unS->NumSej ?? ''}}">
    </div>

    <div class="form-group">
        <label for="numClient"> Numéro Client : </label>
        <select class="form-control" name="cbClient" required>
            <option value=0>Sélectionner un client</option>
            @foreach ($mesClients as $unC)
            {
            <option value="{{ $unC->NumCli }}"
                     @if($unC->NumCli == $unS->NumCli)
                           selected
                       @endif
                    >{{ $unC->NomCli }}</option>
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
            <option value="{{ $unE->NumEmpl }}"
                     @if($unE->NumEmpl == $unS->NumEmpl)
                           selected
                       @endif

                    >{{ $unE->NumEmpl }}</option>
            }
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="DatedebSej"> Date de début :</label>
        <input type ="date" name="DatedebSej" id ="DatedebSej" class="form-control"  value="{{$unS->DateDebSej ?? ''}}">
    </div>
    <script>$("#DatedebSej").datepicker();</script>
    <div class="form-group">
        <label for="DateFinSej"> Date de fin :</label>
        <input type ="date" name="DateFinSej" id ="DateFinSej" class="form-control" value="{{$unS->DateFinSej ?? ''}}" >
    </div>
     <script>$("#DateFinSej").datepicker();</script>
    <div class="form-group">
        <label for="NbPersonnes">Nombre de personnes :</label>
        <input type="text" class="form-control" name="NbPersonnes" value="{{$unS->NbPersonnes ?? ''}}">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-ok"></span>
            Valider
        </button>
        <a class="btn btn-default btn-primary"   href="{{ url('/') }}">
                <span class="glyphicon glyphicon-home"></span> Annuler </a>
    </div>
 </div>
@stop
