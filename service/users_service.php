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
                $userObj->age = oci_result($stid, 'AGE');
                $userObj->password = oci_result($stid, 'PASSWORD');
            
                array_push($aUsers, $userObj);
            }

            return $aUsers;
        }
    }



    // $query = 'select * from users';
    // $stid = oci_parse($conn, $query);
    // oci_execute($stid);

    // while(oci_fetch($stid)){
    //     echo oci_result($stid, 'NAME');
    //     echo oci_result($stid, 'AGE');
    //     echo oci_result($stid, 'PASSWORD');
    // }
?>