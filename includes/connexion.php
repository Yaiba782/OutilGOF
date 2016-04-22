<?php
/**
 * Created by Yaiba.
 * Date: 11/12/15
 * Time: 12:01
 */
    $GLOBALS['connexion'] = new PDO('mysql:host=localhost;dbname=wip__outilgof', 'root', '');
    $GLOBALS['connexion']->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);