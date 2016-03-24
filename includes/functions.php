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
