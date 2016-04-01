<?php

    /**
     * Created by Yaiba.
     * Date: 01/04/2016
     * Time: 15:00
     */
    class restriction
    {
        protected $id_restriction;
        protected $description;
        protected $categorie;
        protected $motif_de_pose;
        protected $date_de_pose;
        protected $numero_materiel;
        protected $id_flotte;
        protected $clef_gmao;

        /**
         * restriction constructor.
         * @param $id_restriction
         * @param $description
         * @param $categorie
         * @param $motif_de_pose
         * @param $date_de_pose
         * @param $numero_materiel
         * @param $id_flotte
         * @param $clef_gmao
         */
        public function __construct($id_restriction, $description, $categorie, $motif_de_pose, $date_de_pose, $numero_materiel, $id_flotte, $clef_gmao)
        {
            $this->id_restriction = $id_restriction;
            $this->description = $description;
            $this->categorie = $categorie;
            $this->motif_de_pose = $motif_de_pose;
            $this->date_de_pose = $date_de_pose;
            $this->numero_materiel = $numero_materiel;
            $this->id_flotte = $id_flotte;
            $this->clef_gmao = $clef_gmao;
        }

        /**
         * @return mixed
         */
        public function getIdRestriction()
        {
            return $this->id_restriction;
        }

        /**
         * @param mixed $id_restriction
         */
        public function setIdRestriction($id_restriction)
        {
            $this->id_restriction = $id_restriction;
        }

        /**
         * @return mixed
         */
        public function getDescription()
        {
            return $this->description;
        }

        /**
         * @param mixed $description
         */
        public function setDescription($description)
        {
            $this->description = $description;
        }

        /**
         * @return mixed
         */
        public function getCategorie()
        {
            return $this->categorie;
        }

        /**
         * @param mixed $categorie
         */
        public function setCategorie($categorie)
        {
            $this->categorie = $categorie;
        }

        /**
         * @return mixed
         */
        public function getMotifDePose()
        {
            return $this->motif_de_pose;
        }

        /**
         * @param mixed $motif_de_pose
         */
        public function setMotifDePose($motif_de_pose)
        {
            $this->motif_de_pose = $motif_de_pose;
        }

        /**
         * @return mixed
         */
        public function getDateDePose()
        {
            return $this->date_de_pose;
        }

        /**
         * @param mixed $date_de_pose
         */
        public function setDateDePose($date_de_pose)
        {
            $this->date_de_pose = $date_de_pose;
        }

        /**
         * @return mixed
         */
        public function getNumeroMateriel()
        {
            return $this->numero_materiel;
        }

        /**
         * @param mixed $numero_materiel
         */
        public function setNumeroMateriel($numero_materiel)
        {
            $this->numero_materiel = $numero_materiel;
        }

        /**
         * @return mixed
         */
        public function getid_flotte()
        {
            return $this->id_flotte;
        }

        /**
         * @param mixed $id_flotte
         */
        public function setid_flotte($id_flotte)
        {
            $this->id_flotte = $id_flotte;
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
        

    }