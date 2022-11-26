<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;


use Exception;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use App\DAO\ServiceSejour;
use App\DAO\ServiceClient;
use App\DAO\ServiceEmplacement;
use App\Exceptions\MonException;
use Illuminate\Support\Facades\Session;
use function Sodium\compare;

class SejourController extends Controller {
    private $erreur = "";
    // On recherche tous les séjours
    public function listeSejours() {
        try {
            $erreur = "";
            $unSejour = new ServiceSejour();
            $mesSejours = $unSejour->getListeSejours();
            return view('vues/listerSejours', compact('mesSejours', 'erreur'));
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('error', compact('erreur'));
        } catch (Exception $ex) {
            $erreur = $ex->getMessage();
            return view('error', compact('erreur'));
        }
    }

    public function ajoutSejour() {
        if (Session::get('role') == "admin") {
            try {
                $erreur = "";
                $unClient = new ServiceClient();
                $mesClients = $unClient->getListeClients();
                $unEmp = new ServiceEmplacement();
                $mesEmplacements = $unEmp->getListeEmplacements();
                return view('vues/ajouterSejour',
                      compact('mesClients', 'mesEmplacements', 'erreur'));
            } catch (MonException $e) {
                $erreur = $e->getMessage();
                return view('error', compact('erreur'));
            } catch (Exception $ex) {
                $erreur = $ex->getMessage();
                return view('error', compact('erreur'));
            }
        } else {
            $erreur = "Vous n'avez pas l'autorisation d'ajouter";
            return view('error', compact('erreur'));
        }
    }

    public function postAjoutSejour() {
        try {
            $erreur = "";
            $NumCli = Request::input('cbClient');
            $NumEmpl = Request::input('cbEmplacement');
            $DatedebSej = Request::input('DatedebSej');
            $DateFinSej = Request::input('DateFinSej');
            $NbPersonnes = Request::input('NbPersonnes');
            $unSejour = new ServiceSejour();
            $unSejour->ajoutSejour($NumCli, $NumEmpl, $DatedebSej, $DateFinSej, $NbPersonnes);
            return redirect('getListeSejour')->with('erreur');
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            //return view('error', compact('erreur'));
            return redirect('getListeSejour', compact('erreur'));
        } catch (Exception $ex) {
            $erreur = $ex->getMessage();
            return view('error', compact('erreur'));
        }
    }

    public function modification($id) {

        try {
            $erreur = "";
            $unSejour = new ServiceSejour();
            $unS = $unSejour->getById($id);

            $unClient = new ServiceClient();
            $mesClients = $unClient->getListeClients();
            $unEmp = new ServiceEmplacement();
            $mesEmplacements = $unEmp->getListeEmplacements();

            return view('vues/modifierSejour', compact('unS', 'mesClients', 'unEmp', 'mesEmplacements', 'erreur'));
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('error', compact('erreur'));
        } catch (Exception $ex) {
            $erreur = $ex->getMessage();
            return view('error', compact('erreur'));
        }
    }

    public function postmodifierSejour($NumCli) {

        try {

            // Récupération des données
            $NumEmpl = Request::input('cbEmplacement');
            $DatedebSej = Request::input('DatedebSej');
            $DateFinSej = Request::input('DateFinSej');
            $NbPersonnes = Request::input('NbPersonnes');
            $unSejour = new ServiceSejour();

            $unSejour->modifSejour($NumCli, $NumEmpl, $DatedebSej, $DateFinSej, $NbPersonnes);
            return redirect('getListeSejour')->with('erreur');
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('error', compact('erreur'));
        } catch (Exception $ex) {
            $erreur = $ex->getMessage();
            return view('error', compact('erreur'));
        }
    }



     public function suppression($id) {

        try {
            $erreur = "";
            $unSejour = new ServiceSejour();
             $unSejour->supprimeSejour($id);
               return redirect('getListeSejour')->with('erreur');
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return redirect('getListeSejour', compact('erreur'));
        } catch (Exception $ex) {
            $erreur = $ex->getMessage();
            return view('error', compact('erreur'));
        }
    }

}
