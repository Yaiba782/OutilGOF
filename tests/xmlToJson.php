<?php
/**
 * Created by Yaiba.
 * Date: 17/12/15
 * Time: 15:42
 */

    $url = '../files/xml/SR.xml';

    $xml = fopen($url, 'r');
    $fileread = fread($xml, filesize($url));
    fclose($xml);

    $filepropre = preg_replace('^(:SITE_REALISATEUR)^', "",$fileread);
    $xml = simplexml_load_string($filepropre);
    $json = json_encode($xml);
    $array = json_decode($json, 1);

    echo '<pre>';
    var_dump($array['Donnees']['pivot']);
