<?php
    /**
     * Created by Yaiba.
     * Date: 07/04/2016
     * Time: 17:37
     */

    /*  Finds wich functions are used with the $obj (wich is the type of the object)

        example :
            $obj = "Intervention"
            Fetch all functions that are used to check the Intervention
    */
    function findAlertes($class,$connexion){
        $query ='SELECT functionName from type_alerte WHERE class="'.strtolower(htmlspecialchars($class)).'"';
        $send = $connexion->prepare($query);
        $send->execute();

        return $send->fetchAll(PDO::FETCH_ASSOC);
    }


    /*
     *
     * Functions used to create des Alerte
     *
     * */

    function test1(){
        echo "test1 marche bien <br />";
    }
    function test2(){
        echo "test2 marche aussi <br />";
    }
