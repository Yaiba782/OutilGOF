<?php
/**
 * Created by Yaiba.
 * Date: 11/12/15
 * Time: 11:40
 */

class materiel extends flotte {
    protected $id_materiel;
    protected $serie;
    protected $numero;
    protected $numero_europe;
    protected $id_stf;
    protected $id_flotte;
    protected $statut_operationnel;
    protected $clef_gmao;
    protected $etat_acquisition;
    protected $situation_materiel;
    protected $site_realisateur;
    protected $coupon;

    function __construct($clef_gmao, $serie, $numero, $numero_europe = null, $nom_stf = null, $id_flotte = null, $statut_operationnel = null, $etat_acquisition = null, $situation_materiel = null, $site_realisateur = null, $coupon = null, $connexion)
    {
        $this->id_materiel = $clef_gmao;
        $this->serie = $serie;
        $this->numero = $numero;
        $this->numero_europe = $numero_europe;
        $this->id_stf = stf::getIdByName($nom_stf, $connexion);
        $this->id_flotte = $id_flotte;
        $this->statut_operationnel = $statut_operationnel;
        $this->etat_acquisition = $etat_acquisition;
        $this->situation_materiel = $situation_materiel;
        $this->site_realisateur = $site_realisateur;
        $this->coupon = $coupon;
    }

    /*
     *
     * GETTERS AND SETTERS
     *
     */

    /**
     * @return mixed
     */
    public function getIdMateriel()
    {
        return $this->id_materiel;
    }

    /**
     * @param mixed $id_materiel
     */
    public function setIdMateriel($id_materiel)
    {
        $this->id_materiel = $id_materiel;
    }

    /**
     * @return mixed
     */
    public function getSerie()
    {
        return $this->serie;
    }

    /**
     * @param mixed $serie
     */
    public function setSerie($serie)
    {
        $this->serie = $serie;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getNumeroEurope()
    {
        return $this->numero_europe;
    }

    /**
     * @param mixed $numero_europe
     */
    public function setNumeroEurope($numero_europe)
    {
        $this->numero_europe = $numero_europe;
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
    public function getIdFlotte()
    {
        return $this->id_flotte;
    }

    /**
     * @param mixed $id_flotte
     */
    public function setIdFlotte($id_flotte)
    {
        $this->id_flotte = $id_flotte;
    }

    /**
     * @return mixed
     */
    public function getStatutOperationnel()
    {
        return $this->statut_operationnel;
    }

    /**
     * @param mixed $statut_operationnel
     */
    public function setStatutOperationnel($statut_operationnel)
    {
        $this->statut_operationnel = $statut_operationnel;
    }

    /**
     * @return mixed
     */
    public function getClefGmao()
    {
        return $this->clef_gmao;
    }

    /**
     * @param mixed $clef_gmao
     */
    public function setClefGmao($clef_gmao)
    {
        $this->clef_gmao = $clef_gmao;
    }

    /**
     * @return mixed
     */
    public function getEtatAcquisition()
    {
        return $this->etat_acquisition;
    }

    /**
     * @param mixed $etat_acquisition
     */
    public function setEtatAcquisition($etat_acquisition)
    {
        $this->etat_acquisition = $etat_acquisition;
    }

    /**
     * @return mixed
     */
    public function getSituationMateriel()
    {
        return $this->situation_materiel;
    }

    /**
     * @param mixed $situation_materiel
     */
    public function setSituationMateriel($situation_materiel)
    {
        $this->situation_materiel = $situation_materiel;
    }

    /**
     * @return mixed
     */
    public function getSiteRealisateur()
    {
        return $this->site_realisateur;
    }

    /**
     * @param mixed $site_realisateur
     */
    public function setSiteRealisateur($site_realisateur)
    {
        $this->site_realisateur = $site_realisateur;
    }

    /**
     * @return mixed
     */
    public function getCoupon()
    {
        return $this->coupon;
    }

    /**
     * @param mixed $coupon
     */
    public function setCoupon($coupon)
    {
        $this->coupon = $coupon;
    }

    /*
     *
     * FUNCTIONS
     *
     */

    /*
     * Crée le matériel dans la base de données
     * */
    public function createMaterielInDatabase($diminutifStf,$connexion){

        // Trouve l'id de la STF auquel appartient le MR
        $this->setIdStf(stf::getIdByName($diminutifStf,$connexion));

        $query = 'INSERT INTO materiel
                  (serie, numero, numero_europe, id_stf, id_flotte, statut_operationnel,clef_gmao, etat_acquisition, situation_materiel, id_site_realisateur, id_coupon)
                  VALUES ("'.$this->getSerie().'","'.$this->getNumero().'","'.$this->getNumeroEurope().'","'.$this->getIdStf().'",'.$this->getIdFlotte().',"'.$this->getStatutOperationnel().'","'.$this->getClefGmao().'","'.$this->getEtatAcquisition().'","'.$this->getSituationMateriel().'","'.$this->getSiteRealisateur().'","'.$this->getCoupon().'")';
        $insert = $connexion->prepare($query);
        $insert->execute();
    }

    protected function findIdByNumero($id, $connexion){
        // TODO | Créer la fonction pour chercher l'id par le numéro EF


    }









}