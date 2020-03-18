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
                $result->status = 'User correctly registered';
                $result->err = false;
            }else{
                $result->status = 'Error while registering';
                $result->err = true;
            }

            return $result;
        }

        function get($query){
            $stid = oci_parse($this->conn, $query);
            $aUsers = array();
            
            oci_execute($stid);
            while(oci_fetch($stid)){
                $userObj = new \stdClass();

                $userObj->name = oci_result($stid, 'NAME');
                $userObj->last_name = oci_result($stid, 'LAST_NAME');
                $userObj->id = oci_result($stid, 'ID_USER');
            
                array_push($aUsers, $userObj);
            }

            return $aUsers;
        }
    }
    
?>