<?php
    include('../service/users_service.php');

    class list_users_controller{
        public $aUsers;
        public $err;

        function __construct(){
            $this->aUsers = array();
            $this->err = '';
        }

        function getUsers(){
            $db = new connection();
            
            if($db->connect()){
                $query = "select name, last_name, id_user from users";
                
                $this->aUsers = $db->get($query);
            
                return $this->aUsers;
            }else{
                $this->err = 'There was an error with the connection';

                return $this->err;
            }
        }
    }
?>