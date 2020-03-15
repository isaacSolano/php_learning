<?php

    class register_controller{
        public $name;
        public $age;
        public $password;

        private $errObj;

        // receive the info from UI and set attributes
        function __construct($name, $age, $password){
            $this->name = $name;
            $this->age = $age;
            $this->password = $password;
        
            $this->errObj = new \stdClass();
        }

        // check info and set errors
        function verifyInfo(){
            $this->errObj->name = $this->name == '';
            $this->errObj->age = $this->age == '' || $this->age < 18;
            $this->errObj->password = $this->password == '';
        }

        function result(){
            // return the errors
            return json_encode($this->errObj);
        }
    }

?>