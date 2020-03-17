<?php
    include('../service/users_service.php');

    class register_controller{
        public $name;
        public $last_name;
        public $id;

        private $errObj;

        // receive the info from UI and set attributes
        function __construct($name, $last_name, $id){
            $this->name = $name;
            $this->last_name = $last_name;
            $this->id = $id;
        
            $this->errObj = new \stdClass();
        }

        // check info and set errors
        function verifyInfo(){
            $this->errObj->name = $this->name == '';
            $this->errObj->last_name = $this->last_name == '';
            $this->errObj->id = $this->id == '';
        }

        function result(){
            $result = new \stdClass();

            if(!$this->errObj->name && !$this->errObj->last_name && !$this->errObj->id){
                $query = "insert into users (name, last_name, id_user) values ('".$this->name."', '".$this->last_name."', ".$this->id.")";

                $db = new connection();
                if(@$db->connect()){
                    // proceed with the query
                    @$result = $db->insert($query);
                }else{                    
                    $result->status = 'Error connecting to the database';
                    $result->err = true;
                }
            }else{
                // return info ab the errs with the info
                $result->status = 'Error with the fields';
                $result->err = true;
            }

            return $result;
        }
    }

?>