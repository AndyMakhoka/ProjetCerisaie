<?php
/**
 * Created by PhpStorm.
 * User: christian
 * Date: 01/10/2019
 * Time: 13:47
 */

namespace App\DAO;

use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use DB;
use App\metier\Emplacement;

class ServiceEmplacement
{

    //SELECT * FROM EMPLACEMENT
    public function getListeEmplacements() {
        try {
            $mesEmplacements = DB::table('emplacement')->get();
            return $mesEmplacements;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }
}