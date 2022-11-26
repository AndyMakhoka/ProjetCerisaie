<?php

namespace App\dao;



class ServiceControle
{
    private $modelle = '/[0-9a-zA-Z.+_]/';
    private $CaracSpeci = "%";

    public function _UserOK($user){
        //if(preg_match($this.$this->chiffres . $this.$this->CaracSpeci, $user))
        if(preg_match('/^[a-z\d_]{2,20}$/i', $user))
        {
            return true;
        }

        else
        {
            echo "

            user not ok";
            return true;
        }
    }

}
