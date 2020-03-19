<?php

    class connection{
        private $username;
        private $pass;
        private $conn;

        function __construct(){
            $this->username = 'php';
            $this->pass = 'mypass';
        }

        function connect(){
            $this->conn = oci_connect($this->username, $this->pass, 'localhost/xe');
            
            if($this->conn){
                return true;
            }else{
                return false;
            }
        }

        function insert($query){
            $stid = oci_parse($this->conn, $query);
            $result = new \stdClass();
            
            if(oci_execute($stid)){
                $result->status = 'Car correctly registered';
                $result->err = false;
            }else{
                $result->status = 'Error while registering';
                $result->err = true;
            }

            return $result;
        }
    }

?>