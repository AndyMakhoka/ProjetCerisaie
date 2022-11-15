<?php

namespace App\metier;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use DB;

class Utilisateur extends Model {

    //On déclare la table visiteur
    protected $table = 'utilisateur';
    public $timestamps = false;
    protected $fillable = [
        'NumUtil',
        'NomUtil',
        'MotPasse',
        'role'
    ];
    public $timetamps = true;
}
?>

