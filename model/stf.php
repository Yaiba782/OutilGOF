<?php
/**
 * Created by Yaiba.
 * Date: 11/12/15
 * Time: 16:40
 */

class stf {
    protected $id_stf;
    protected $nom_stf;
    protected $diminutif_stf;
    protected $adresse_stf;

    function __construct($id_stf, $nom_stf, $diminutif_stf, $adresse_stf)
    {
        $this->id_stf = $id_stf;
        $this->nom_stf = $nom_stf;
        $this->diminutif_stf = $diminutif_stf;
        $this->adresse_stf = $adresse_stf;
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
        $this->id_stf = $id_stf;
    }

    /**
     * @return mixed
     */
    public function getNomStf()
    {
        return $this->nom_stf;
    }

    /**
     * @param mixed $nom_stf
     */
    public function setNomStf($nom_stf)
    {
        $this->nom_stf = $nom_stf;
    }

    /**
     * @return mixed
     */
    public function getDiminutifStf()
    {
        return $this->diminutif_stf;
    }

    /**
     * @param mixed $diminutif_stf
     */
    public function setDiminutifStf($diminutif_stf)
    {
        $this->diminutif_stf = $diminutif_stf;
    }

    /**
     * @return mixed
     */
    public function getAdresseStf()
    {
        return $this->adresse_stf;
    }

    /**
     * @param mixed $adresse_stf
     */
    public function setAdresseStf($adresse_stf)
    {
        $this->adresse_stf = $adresse_stf;
    }

    protected function getIdByName($name, $connexion){
        $stfQuery = ' SELECT id_stf
                      FROM stf
                      WHERE diminutif_stf
                      LIKE "'.trim($name).'"';

        $stf = $connexion->prepare($stfQuery);
        $stf->execute();
        $result = $stf->fetch(PDO::FETCH_ASSOC);

        foreach ($result as $key => $value){
            $id_stf = $value;
        }

        return $id_stf;
    }
}