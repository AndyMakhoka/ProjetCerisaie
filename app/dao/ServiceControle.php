<?php

namespace App\dao;



class ServiceControle
{
    private $modeleUser = "/^[A-Z][A-Za-z]{3,19}$/";
    private $modelePwd = "[!]";

    public function _UserOK($user){
        //if(preg_match($this.$this->chiffres . $this.$this->CaracSpeci, $user))
        if(preg_match($this->modeleUser, $user))
        {
            return true;
        }

        else
        {
            echo "

            Nom utilisateur pas conforme";
            return false;
        }
    }

    public function PwdOK($pwd){
        //if(preg_match($this.$this->chiffres . $this.$this->CaracSpeci, $user))
        if(preg_match($this->modeleUser, $pwd))
        {

            return true;
        }

        else
        {

            echo "

            Mot de passe pas conforme";
            return false;
        }
    }

}
