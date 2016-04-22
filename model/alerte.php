<?php

    /**
     * Created by Yaiba.
     * Date: 06/04/2016
     * Time: 16:48
     */
    class alerte extends typeAlerte
    {
        protected $id_alerte;
        protected $id_type_alerte;
        protected $id_stf;
        protected $id_gof;
        protected $id_materiel;
        protected $id_intervention;
        protected $texte_alerte;
        protected $alerte_vue;
        protected $alerte_supprimee;
        protected $timestamp;

        /**
         * alerte constructor.
         * @param $id_alerte
         * @param $id_type_alerte
         * @param $id_stf
         * @param $id_gof
         * @param $id_materiel
         * @param $texte_alerte
         */
        public function __construct($id_alerte, $id_type_alerte, $texte_alerte,$id_stf=null, $id_gof=null, $id_materiel=null)
        {
            $this->id_alerte = $id_alerte;
            $this->id_type_alerte = $id_type_alerte;
            $this->id_stf = $id_stf;
            $this->id_gof = $id_gof;
            $this->id_materiel = $id_materiel;
            $this->texte_alerte = $texte_alerte;
        }

        /**
         * @return mixed
         */
        public function getIdAlerte()
        {
            return $this->id_alerte;
        }

        /**
         * @param mixed $id_alerte
         */
        public function setIdAlerte($id_alerte)
        {
            $this->id_alerte = $id_alerte;
        }
        /**
         * @return mixed
         */
        public function getTimestamp()
        {
            return $this->timestamp;
        }

        /**
         * @param mixed $timestamp
         */
        public function setTimestamp($timestamp)
        {
            $this->timestamp = $timestamp;
        }
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
        public function getIdTypeAlerte()
        {
            return $this->id_type_alerte;
        }

        /**
         * @param mixed $id_type_alerte
         */
        public function setIdTypeAlerte($id_type_alerte)
        {
            $this->id_type_alerte = $id_type_alerte;
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
        public function getIdGof()
        {
            return $this->id_gof;
        }

        /**
         * @param mixed $id_gof
         */
        public function setIdGof($id_gof)
        {
            $this->id_gof = $id_gof;
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
        public function getTexteAlerte()
        {
            return $this->texte_alerte;
        }

        /**
         * @param mixed $texte_alerte
         */
        public function setTexteAlerte($texte_alerte)
        {
            $this->texte_alerte = $texte_alerte;
        }

        /**
         * @return mixed
         */
        public function getAlerteVue()
        {
            return $this->alerte_vue;
        }

        /**
         * @param mixed $alerte_vue
         */
        public function setAlerteVue($alerte_vue)
        {
            $this->alerte_vue = $alerte_vue;
        }

        /**
         * @return mixed
         */
        public function getAlerteSupprimee()
        {
            return $this->alerte_supprimee;
        }

        /**
         * @param mixed $alerte_supprimee
         */
        public function setAlerteSupprimee($alerte_supprimee)
        {
            $this->alerte_supprimee = $alerte_supprimee;
        }


    }