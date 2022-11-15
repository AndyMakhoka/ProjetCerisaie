<?php
/**
 * Created by PhpStorm.
 * User: christian
 * Date: 01/10/2019
 * Time: 13:46
 */

namespace App\DAO;

use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use DB;
use App\metier\Client;

class ServiceClient
{
    //SELECT * FROM CLIENT
    public function getListeClients() {
        try {
            $mesClients = DB::table('client')->get();
            return $mesClients;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }
}