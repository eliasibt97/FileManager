<?php

class Validator {

    public function __construct() {}

    public function numero(int $numero, int $numeroMinimo, int $numeroMaximo): bool {
        if( $numero < $numeroMinimo || $numero > $numeroMaximo ) {
            return false; 
        }
        return true;
    }

    public function comando(string $comand, int $numeroComando): bool {
        if(preg_match("/[a-zA-Z0-9]/", $comand)) return true;
        return false;
    }

    public function esComando(string $comando): bool {
        $splitedComando = explode(" ", $comando);
        
        if(count($splitedComando) > 1) {
            return false;
        }
        return true;
    }

}