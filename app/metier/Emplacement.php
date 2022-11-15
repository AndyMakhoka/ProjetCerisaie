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

class Emplacement extends Model {

    //On déclare la table Sejour
    protected $table = 'Emplacement';
    public $timestamps = false;
    protected $fillable = [
        'NumEmpl',
        'CodeTypeE',
        'SurfaceEmpl',
        'NbPersMaxEmpl'
    ];
    public $timetamps = true;



}
