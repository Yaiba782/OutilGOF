<?php
/**
 * Created by Yaiba.
 * Date: 09/12/15
 * Time: 17:00
 */

class intervention extends materiel{
    protected $id_intervention;
    protected $id_materiel;
    protected $libelle_intervention;
    protected $type_intervention;
    protected $statut_intervention;
    protected $code_operation_intervention;
    protected $id_rdv;
    protected $has_rdv;
    protected $debut_rdv;
    protected $fin_rdv;
    protected $date_debut_previsionnel_intervention;
    protected $date_fin_previsionnelle;
    protected $date_fin_reelle;
    protected $site_realisateur;
    protected $date_fin_optimale;
    protected $id_coupon;
    protected $butee_technique;

    function __construct($id_intervention, $id_materiel, $libelle_intervention, $type_intervention, $statut_intervention, $code_operation_intervention, $debut_rdv,$fin_rdv, $date_debut_previsionnel_intervention, $date_fin_previsionnelle, $date_fin_reelle=null, $site_realisateur=null, $date_fin_optimale=null, $id_coupon=null, $butee_technique=null)
    {
        $this->id_intervention = $id_intervention;
        $this->id_materiel = $id_materiel;
        $this->libelle_intervention = $libelle_intervention;
        $this->type_intervention = $type_intervention;
        $this->statut_intervention = $statut_intervention;
        $this->code_operation_intervention = $code_operation_intervention;
        $this->debut_rdv = $debut_rdv;
        $this->fin_rdv = $fin_rdv;
        $this->date_debut_previsionnel_intervention = $date_debut_previsionnel_intervention;
        $this->date_fin_previsionnelle = $date_fin_previsionnelle;
        $this->date_fin_reelle = $date_fin_reelle;
        $this->site_realisateur = $site_realisateur;
        $this->date_fin_optimale = $date_fin_optimale;
        $this->id_coupon = $id_coupon;
        $this->butee_technique = $butee_technique;

    }

    /*
     *
     * GETTERS AND SETTERS
     *
     */


    /**
     * @return mixed
     */
    public function getIdIntervention()
    {
        return $this->id_intervention;
    }

    /**
     * @param mixed $id_intervention
     */
    public function setIdIntervention($id_intervention)
    {
        $this->id_intervention = $id_intervention;
    }

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
    public function getLibelleIntervention()
    {
        return htmlspecialchars($this->libelle_intervention);
    }

    /**
     * @param mixed $libelle_intervention
     */
    public function setLibelleIntervention($libelle_intervention)
    {
        $this->libelle_intervention = $libelle_intervention;
    }

    /**
     * @return mixed
     */
    public function getTypeIntervention()
    {
        return $this->type_intervention;
    }

    /**
     * @param mixed $type_intervention
     */
    public function setTypeIntervention($type_intervention)
    {
        $this->type_intervention = $type_intervention;
    }

    /**
     * @return mixed
     */
    public function getStatutIntervention()
    {
        return $this->statut_intervention;
    }

    /**
     * @param mixed $statut_intervention
     */
    public function setStatutIntervention($statut_intervention)
    {
        $this->statut_intervention = $statut_intervention;
    }

    /**
     * @return mixed
     */
    public function getCodeOperationIntervention()
    {
        return $this->code_operation_intervention;
    }

    /**
     * @param mixed $code_operation_intervention
     */
    public function setCodeOperationIntervention($code_operation_intervention)
    {
        $this->code_operation_intervention = $code_operation_intervention;
    }

    /**
     * @return null
     */
    public function getIdRdv()
    {
        return $this->id_rdv;
    }

    /**
     * @param null $id_rdv
     */
    public function setIdRdv($id_rdv)
    {
        $this->id_rdv = $id_rdv;
    }

    /**
     * @return mixed
     */
    public function getDateDebutPrevisionnelIntervention()
    {
        return $this->date_debut_previsionnel_intervention;
    }

    /**
     * @param mixed $date_debut_previsionnel_intervention
     */
    public function setDateDebutPrevisionnelIntervention($date_debut_previsionnel_intervention)
    {
        $this->date_debut_previsionnel_intervention = $date_debut_previsionnel_intervention;
    }

    /**
     * @return mixed
     */
    public function getDateFinPrevisionnelle()
    {
        return $this->date_fin_previsionnelle;
    }

    /**
     * @param mixed $date_fin_previsionnelle
     */
    public function setDateFinPrevisionnelle($date_fin_previsionnelle)
    {
        $this->date_fin_previsionnelle = $date_fin_previsionnelle;
    }

    /**
     * @return mixed
     */
    public function getDateFinReelle()
    {
        return $this->date_fin_reelle;
    }

    /**
     * @param mixed $date_fin_reelle
     */
    public function setDateFinReelle($date_fin_reelle)
    {
        $this->date_fin_reelle = $date_fin_reelle;
    }

    /**
     * @return mixed
     */
    /**
     * @return mixed
     */
    public function getHasRdv()
    {
        return $this->has_rdv;
    }

    /**
     * @param mixed $has_rdv
     */
    public function setHasRdv($has_rdv)
    {
        $this->has_rdv = $has_rdv;
    }

    /**
     * @return null
     */
    public function getDebutRdv()
    {
        return $this->debut_rdv;
    }

    /**
     * @param null $debut_rdv
     */
    public function setDebutRdv($debut_rdv)
    {
        $this->debut_rdv = $debut_rdv;
    }

    /**
     * @return null
     */
    public function getFinRdv()
    {
        return $this->fin_rdv;
    }

    /**
     * @param null $fin_rdv
     */
    public function setFinRdv($fin_rdv)
    {
        $this->fin_rdv = $fin_rdv;
    }

    /**
     * @return null
     */
    public function getSiteRealisateur()
    {
        return $this->site_realisateur;
    }

    /**
     * @param null $site_realisateur
     */
    public function setSiteRealisateur($site_realisateur)
    {
        $this->site_realisateur = $site_realisateur;
    }
    /**
     * @return mixed
     */
    public function getDateFinOptimale()
    {
        return $this->date_fin_optimale;
    }

    /**
     * @param mixed $date_fin_optimale
     */
    public function setDateFinOptimale($date_fin_optimale)
    {
        $this->date_fin_optimale = $date_fin_optimale;
    }

    /**
     * @return mixed
     */
    public function getIdCoupon()
    {
        return $this->id_coupon;
    }

    /**
     * @param mixed $id_coupon
     */
    public function setIdCoupon($id_coupon)
    {
        $this->id_coupon = $id_coupon;
    }

    /**
     * @return mixed
     */
    public function getButeeTechnique()
    {
        return $this->butee_technique;
    }

    /**
     * @param mixed $butee_technique
     */
    public function setButeeTechnique($butee_technique)
    {
        $this->butee_technique = $butee_technique;
    }



    /*
     *
     * FUNCTIONS
     *
     */

    public function findRdv($connexion){
        $clefIntervention = "-".$this->debut_rdv."-".$this->fin_rdv."-".$this->id_materiel."-";

        $query = 'SELECT * FROM rdv WHERE clef_concat LIKE "%'.$clefIntervention.'%" ;';
        $search = $connexion->prepare($query);
        $search->execute();

        $result = $search->fetch(PDO::FETCH_ASSOC);

        if($result['id_rdv']){
            $this->setIdRdv(intval($result['id_rdv']));
            $this->setHasRdv(1);
        }else{
            $this->setIdRdv(0);
            $this->setHasRdv(0);
        }
        return $result;
    }

    public function insertDb($connexion){

        $query = 'INSERT INTO intervention (
                  id_intervention,
                  id_materiel,
                  libelle_intervention,
                  type_intervention,
                  statut_intervention,
                  code_operation_intervention,
                  id_rdv,
                  debut_previsionnel_intervention,
                  date_fin_previsionnelle,
                  date_fin_reelle,
                  site_realisateur,
                  date_optimale,
                  butee_technique,
                  id_coupon,
                  has_rdv,
                  debut_rdv,
                  fin_rdv,
                  updated)

                  VALUES (
                  '.intval($this->getIdIntervention()).',
                  '.intval($this->getIdMateriel()).',
                  "'.$this->getLibelleIntervention().'",
                  "'.$this->getTypeIntervention().'",
                  "'.$this->getStatutIntervention().'",
                  "'.$this->getCodeOperationIntervention().'",
                  '.$this->getIdRdv().',
                  "'.$this->getDateDebutPrevisionnelIntervention().'",
                  "'.$this->getDateFinPrevisionnelle().'",
                  "'.$this->getDateFinReelle().'",
                  "'.$this->getSiteRealisateur().'",
                  "'.$this->getDateFinOptimale().'",
                  "'.$this->getButeeTechnique().'",
                  "'.intval($this->getIdCoupon()).'",
                  '.$this->getHasRdv().',
                  "'.$this->getDebutRdv().'",
                  "'.$this->getFinRdv().'",
                  1)';

        $send = $connexion->prepare($query);
        if (!$send) {
            echo "\nPDO::errorInfo():\n";
            vardump($connexion->errorInfo());
        }
        $send->execute();
    }

}
