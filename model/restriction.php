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
        protected $id_materiel;
        protected $id_flotte;
        protected $statut;
        protected $intervention_origine;

        /**
         * restriction constructor.
         * @param $id_restriction
         * @param $statut
         * @param $description
         * @param $categorie
         * @param $motif_de_pose
         * @param $date_de_pose
         * @param $numero_materiel
         * @param $id_flotte
         * @param $clef_gmao
         */
        public function __construct($id_restriction, $description, $categorie, $motif_de_pose, $date_de_pose, $id_flotte, $id_materiel,$intervention_origine,$statut="POSEE")
        {
            $this->id_restriction = intval($id_restriction);
            $this->statut = $statut;
            $this->description = $description;
            $this->categorie = $categorie;
            $this->motif_de_pose = $motif_de_pose;
            $this->date_de_pose = $date_de_pose;
            $this->id_flotte = intval($id_flotte);
            $this->id_materiel= intval($id_materiel);
            $this->intervention_origine= $intervention_origine;
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
            $this->id_restriction = intval($id_restriction);
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
        public function getStatut()
        {
            return $this->statut;
        }

        /**
         * @param mixed $statut
         */
        public function setStatut($statut)
        {
            $this->statut = $statut;
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
        public function getInterventionOrigine()
        {
            return $this->intervention_origine;
        }

        /**
         * @param mixed $intervention_origine
         */
        public function setInterventionOrigine($intervention_origine)
        {
            $this->intervention_origine = $intervention_origine;
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
        public function getIdMateriel()
        {
            return $this->id_materiel;
        }

        /**
         * @param mixed $id_materiel
         */
        public function setIdMateriel($id_materiel)
        {
            $this->id_materiel = intval($id_materiel);
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

        public function replaceDb($connexion){
            $query = 'REPLACE INTO restriction
                          (id_restriction,
                          description,
                          categorie,
                          motif_de_pose,
                          date_de_pose,
                          id_materiel,
                          id_flotte,
                          statut)
                      VALUES(
                          '.$this->getIdRestriction().',
                          "'.htmlspecialchars($this->getDescription()).'",
                          "'.$this->getCategorie().'",
                          "'.$this->getMotifDePose().'",
                          "'.$this->getDateDePose().'",
                          '.$this->getIdMateriel().',
                          '.$this->getIdFlotte().',
                          "'.$this->getStatut().'"
                      )';

            $send = $connexion->prepare($query);
            $send->execute();
        }
        

    }