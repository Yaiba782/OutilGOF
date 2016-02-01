<?php
/**
 * Created by Yaiba.
 * Date: 11/12/15
 * Time: 12:04
 */

    $_SESSION['debug'] = TRUE;

    if($_SESSION['debug']){
        function vardump($var){
            echo "<pre>";
            var_dump($var);
            echo "</pre>";
        }
    }