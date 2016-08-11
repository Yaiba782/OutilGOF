<?php
    /**
     * Created by Yaiba.
     * Date: 08/04/2016
     * Time: 11:49
     */

    class typeAlerte
    {
        protected $id_typeAlerte;
        protected $obj = null;
        protected $objOld = null;
        protected $connexion = null;
        public $functionList = [];


        /**
         * typeAlerte constructor.
         */
        public function __construct($type, $connexion)
        {
            $this->findAlertes($type,$connexion);
        }
        /**
         * @return array
         */
        public function getFunctionList()
        {
            return $this->functionList;
        }

        /**
         * @param array $functionList
         */
        public function setFunctionList($functionList)
        {
            $this->functionList = $functionList;
        }

        /**
         * @return mixed
         */
        public function getIdTypeAlerte()
        {
            return $this->id_typeAlerte;
        }

        /**
         * @param mixed $id_typeAlerte
         */
        public function setIdTypeAlerte($id_typeAlerte)
        {
            $this->id_typeAlerte = $id_typeAlerte;
        }

        /**
         * @return null
         */
        public function getObj()
        {
            return $this->obj;
        }

        /**
         * @param null $obj
         */
        public function setObj($obj)
        {
            $this->obj = $obj;
        }

        /**
         * @return null
         */
        public function getObjOld()
        {
            return $this->objOld;
        }

        /**
         * @param null $objOld
         */
        public function setObjOld($objOld)
        {
            $this->objOld = $objOld;
        }

        /*
         *
         * FUNCTIONS
         *
         * */

        protected function findAlertes($type,$connexion){
            $query ='SELECT functionName from type_alerte WHERE class="'.strtolower(htmlspecialchars($type)).'"';
            $send = $connexion->prepare($query);
            $send->execute();

            $this->setFunctionList($send->fetchAll(PDO::FETCH_ASSOC));
        }
        public function checkDatesIntervention($obj,$objOld,$connexion){
            if($obj->getDateFinPrevisionnelle() != $objOld->getDateFinPrevisionnelle()){
                $MR = $obj->getMrByIntervention($connexion);
                $array['id_type_alerte']=8;
                $array['texte_alerte']="La date de fin prévisionnelle de la DI ".$obj->getIdIntervention()." a été modifiée";
                $array['id_stf']=$MR['id_stf'];
                $array['id_gof']=null;
                $array['id_materiel']=$MR['id_materiel'];

                alerte::createAlerte($array, $GLOBALS['connexion']);
            }
            if($obj->getDateFinReelle() != $objOld->getDateFinReelle()){
                $MR = $obj->getMrByIntervention($connexion);
                $array['id_type_alerte']=9;
                $array['texte_alerte']="La date de fin réelle de la DI ".$obj->getIdIntervention()." a été modifiée";
                $array['id_stf']=$MR['id_stf'];
                $array['id_gof']=null;
                $array['id_materiel']=$MR['id_materiel'];

                alerte::createAlerte($array, $GLOBALS['connexion']);
            }
            if($obj->getDateDebutPrevisionnel() != $objOld->getDateDebutPrevisionnel()){
                $MR = $obj->getMrByIntervention($connexion);
                $array['id_type_alerte']=10;
                $array['texte_alerte']="La date de début prévisionnel de la DI ".$obj->getIdIntervention()." a été modifiée";
                $array['id_stf']=$MR['id_stf'];
                $array['id_gof']=null;
                $array['id_materiel']=$MR['id_materiel'];

                alerte::createAlerte($array, $GLOBALS['connexion']);
            }
        }
        public function checkDatesRdv($obj,$objOld,$connexion){
            if($obj->getDateDebutRdv() != $objOld->getDateDebutRdv()){
                $MR = $obj->getMrByIdMateriel($connexion);
                $array['id_type_alerte']=11;
                $array['texte_alerte'] = "la date de début du RDV ".$obj->getIdRdv()." a été modifiée";
                $array['id_gof']=null;
                $array['id_materiel']=$MR['id_materiel'];
                $array['id_stf']=$MR['id_stf'];

                alerte::createAlerte($array, $GLOBALS['connexion']);
            }
            if($obj->getDateFinRdv() != $objOld->getDateFinRdv()){
                $MR = $obj->getMrByIdMateriel($connexion);
                $array['id_type_alerte']=11;
                $array['texte_alerte'] = "la date de fin du RDV ".$obj->getIdRdv()." a été modifiée";
                $array['id_gof']=null;
                $array['id_materiel']=$MR['id_materiel'];
                $array['id_stf']=$MR['id_stf'];

                alerte::createAlerte($array, $GLOBALS['connexion']);
            }
        }

        public function dispoMR($obj, $objOld,$connexion){
            $MR = $obj->getMrByIntervention($connexion);

            if($obj->getStatutIntervention() == "ENCOURSREAL" && $MR['statut_operationnel'] == "Dispo exploqitation" ){
                $array['id_type_alerte']=7;
                $array['texte_alerte']="Le matériel ".$MR['numero']." est disponible alors que la DI ".$obj->getIdIntervention()." est en cours de réalisation.";
                $array['id_stf']=$MR['id_stf'];
                $array['id_gof']=null;
                $array['id_materiel']=$MR['id_materiel'];

                alerte::createAlerte($array, $GLOBALS['connexion']);
            }
        }
    }