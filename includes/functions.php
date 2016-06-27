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
        $regex = "^(((\d{4})(-)(0[13578]|10|12)(-)(0[1-9]|[12][0-9]|3[01]))|((\d{4})(-)(0[469]|1‌​1)(-)(0[1-9]|[12][0-9]|30))|((\d{4})(-)(02)(-)(0[1-9]|[12][0-9]|2[0-8]))|(([02468‌​][048]00)(-)(02)(-)(29))|(([13579][26]00)(-)(02)(-)(29))|(([0-9][0-9][0][48])(-)(‌​02)(-)(29))|(([0-9][0-9][2468][048])(-)(02)(-)(29))|(([0-9][0-9][13579][26])(-)(0‌​2)(-)(29)))(\s)(([0-1][0-9]|2[0-4]):([0-5][0-9]):([0-5][0-9]))$";
        if(preg_match($regex,$date)){
            return $date;
        }else{
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
    }
    // Crée une fonction formattant le format de l'heure de l'API vision
    function apiTime($time){
        $explode = explode('T',$time);

        if(isset($explode[1])){
            $date = $explode[0];
            // On supprime le "Z"
            $heure = substr($explode[1],0,-1);
            return "$date $heure";
        }else{
            return "2000-01-01 00:00:00";
        }
    }