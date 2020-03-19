<?php
    include('../service/cars_service.php');

    class register_car_controller{
        public $brand;
        public $color;
        public $id_car;
        public $id_user;

        function __construct($brand, $color, $id_car, $id_user){
            $this->brand = $brand;
            $this->color = $color;
            $this->id_car = $id_car;
            $this->id_user = $id_user;

            $this->result = new \stdClass();
        }

        function verifyInfo(){
            if($this->brand == '' || $this->color == '' || $this->id_car == '' || $this->id_user == ''){
                return false;
            }else{
                return true;
            }
        }

        function insert(){
            $db = new connection();
            $result = new \stdClass();

            if($db->connect()){
                $query = "insert into cars (brand, color, id_car, id_user) values ('". $this->brand ."', '". $this->color ."', '". $this->id_car ."', ". $this->id_user .")";

                $result = $db->insert($query);
            }else{
                $result->status = 'There was an error with the connection, try again later';
                $result->err = false;
            }

            return $result;
        }
    }

?>