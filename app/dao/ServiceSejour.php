<?php
/**
 * Created by PhpStorm.
 * User: christian
 * Date: 01/10/2019
 * Time: 13:47
 */

namespace App\DAO;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use App\metier\Sejour;
use  App\Exceptions\MonException;

class ServiceSejour
{

    //SELECT BY ID
    public function getById($id) {
        try {
            $sejour = DB::table('sejour')
                ->where('NumSej', '=', $id)
                ->first();
            return $sejour;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }

    //SELECT * FROM SEJOUR
    public function getListeSejours() {
        try {
            $mesSejours = DB::table('sejour')
                ->Select('NumSej', 'NomCli', 'NumEmpl', 'DatedebSej', 'DateFinSej', 'NbPersonnes')
                ->join('client', 'sejour.NumCli', '=', 'client.NumCli')
                ->get();
            return $mesSejours;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }

    public function ajoutSejour($NumCli, $NumEmpl, $DatedebSej,
                                $DateFinSej, $NbPersonnes) {
        try {
            DB::table('sejour')->insert(
                [ 'NumCli' => $NumCli,
                    'NumEmpl' => $NumEmpl, 'DatedebSej' => $DatedebSej,
                    'DateFinSej' => $DateFinSej,
                    'NbPersonnes' => $NbPersonnes]
            );
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }

    public function modifSejour($NumSej, $NumEmpl, $DatedebSej, $DateFinSej, $NbPersonnes) {
        try {
            DB::table('sejour')
                ->where('NumSej', $NumSej)
                ->update([
                    'NumEmpl' => $NumEmpl,
                    'DatedebSej' => $DatedebSej,
                    'DateFinSej' => $DateFinSej,
                    'NbPersonnes' => $NbPersonnes,
                ]);
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function supprimeSejour($id)
    {
        try {
            DB::table('sejour')
                ->where('NumSej', $id)
                ->delete();
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function rechercheSejour($annee, $mois)
    {
        try {
            DB::table('sejour')
                ->select('NumSej', 'NomCli', 'NumEmp', 'DateFiniSej', 'NbPersonnes')
                ->join('client', 'sejour.NumCli', '=', 'Client.NumCli')
                ->whereMonth('DatedebSej', '=', $mois)
                ->whereYear('DatedebSej', '=', $annee)
                ->get();

        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

}
