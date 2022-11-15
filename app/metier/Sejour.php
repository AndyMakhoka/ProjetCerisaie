<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\metier;

use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use DB;

class Sejour extends Model {

    //On déclare la table Sejour
    protected $table = 'sejour';
    public $timestamps = false;
    protected $fillable = [
        'NumSej',
        'NumCli',
        'NumEmpl',
        'DatedebSej',
        'DateFinSej',
        'NbPersonnes'
    ];
    public $timetamps = true;


}
