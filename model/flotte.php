<?php
/**
 * Created by Yaiba.
 * Date: 17/12/15
 * Time: 11:03
 */

class flotte extends stf{
    protected $id_flotte;
    protected $id_stf;
    protected $nom_flotte;

    function __construct($id_flotte, $nom_flotte=null, $nomStf=null, $connexion=null)
    {
        $this->id_flotte = $id_flotte;
        $this->nom_flotte = $nom_flotte;
        if($nom_flotte != null){
            $this->setIdStf(parent::getIdByName($nomStf, $connexion));
        }
    }


    /**
     * @return mixed
     */
    public function getIdFlotte()
    {
        return $this->id_flotte;
    }

    /**
     * @param mixed $id_flotte
     */
    public function setIdFlotte($id_flotte)
    {
        $this->id_flotte = intval($id_flotte);
    }

    /**
     * @return mixed
     */
    public function getIdStf()
    {
        return $this->id_stf;
    }

    /**
     * @param mixed $id_stf
     */
    public function setIdStf($id_stf)
    {
        $this->id_stf = intval($id_stf);
    }

    /**
     * @return mixed
     */
    public function getNomFlotte()
    {
        return $this->nom_flotte;
    }

    /**
     * @param mixed $nom_flotte
     */
    public function setNomFlotte($nom_flotte)
    {
        $this->nom_flotte = $nom_flotte;
    }

    public function createFlotteInDatabase($connexion){

        $query = 'REPLACE INTO flotte
                  (id_flotte, id_stf, nom_flotte)
                  VALUES
                  ("'.$this->getIdFlotte().'", "'.$this->getIdStf().'", "'.$this->getNomFlotte().'")
        ';
        $insert = $connexion->prepare($query);
        $insert->execute();

    }
    public function getNomFlotteById($connexion){
        $flotteQuery = ' SELECT nom_flotte
                      FROM flotte f
                      WHERE f.id_flotte
                      LIKE "'.intval($this->getIdFlotte()).'"';

        $flotte = $connexion->prepare($flotteQuery);
        $flotte->execute();
        $result = $flotte->fetch(PDO::FETCH_ASSOC);

        foreach ($result as $key => $value){
            $id_flotte = $value;
        }

        return $id_flotte;
    }
}