<?php
/**
 * Created by Yaiba.
 * Date: 11/12/15
 * Time: 12:04
 */

    $_SESSION['debug'] = TRUE;

    function vardump($var){
        if($_SESSION['debug']){
            echo "<pre class=\"col-lg-12 bg-danger\">";
            var_dump($var);
            echo "</pre>";
        }
    }
    function testConnexion(){
        if(!isset($_SESSION['gof'])){
            header('Location: /outilgof/view/login/login.php');
        }
    }
    function dateOsmoseToDateMysql($date){
        // On brise la chaine pour récupérer l'heure, puis la date afin de la mettre en forme DATETIME MySQL
        $explode = explode(' ',$date);

        if(isset($explode[1])){
        $heure = $explode[1];

        $date = explode('/',$explode[0]);
            $jour = $date[0];
            $mois = $date[1];
            $annee = $date[2];
            return "20".$annee."-".$mois."-".$jour." ".$heure.":00";
        }else{
            return "2000-01-01 00:00:00";
        }
    }