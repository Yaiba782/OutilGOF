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
    protected $debut_rdv;
    protected $fin_rdv;
    protected $date_debut_previsionnel_intervention;
    protected $date_fin_previsionnelle;
    protected $date_fin_reelle;
    protected $site_realisateur;
    protected $date_fin_optimale;
    protected $id_coupon;

    function __construct($id_intervention, $id_materiel, $libelle_intervention, $type_intervention, $statut_intervention, $code_operation_intervention, $debut_rdv,$fin_rdv, $date_debut_previsionnel_intervention, $date_fin_previsionnelle, $date_fin_reelle=null, $site_realisateur=null, $date_fin_optimale=null, $id_coupon=null)
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
        return $this->libelle_intervention;
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
    public function getIdSiteRealisateur()
    {
        return $this->id_site_realisateur;
    }

    /**
     * @param mixed $site_realisateur
     */
    public function setIdSiteRealisateur($site_realisateur)
    {
        $this->id_site_realisateur = $site_realisateur;
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

    /*
     *
     * FUNCTIONS
     *
     */



    // TODO | ATTENTION AUX DI AVEC DU TEXTE QUI POURRAIT CASSER UNE REQUETE SQL; (" \ ;)





















}