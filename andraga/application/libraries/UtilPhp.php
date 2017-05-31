<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UtilPh
 *
 * @author alvaro
 */
require_once 'vendor/autoload.php';

class UtilPhp {
    /**
     * 
     * @param type $texto
     * 
     * Sanea el texto introducido por parametros para evitar que haya 
     * inyecciones XSS
     */
    public function sanear($texto){
        //quitamos los espacios del principio y fin
        $texto = trim($texto);
       //quita los tags de html "<>"
        $texto= strip_tags($texto);
        
     return $texto;
         
    }
       
        
}
