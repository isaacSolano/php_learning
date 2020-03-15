<?php

    class User{
        public $name;
        public $age;
        public $password;

        function __construct($name, $age, $password){
            $this->name = $name;
            $this->age = $age;
            $this->password = $password;
        }

        function getName(){
            return $this->name;
        }

        function getAge(){
            return $this->age;
        }

        function getPassword(){
            return $this->password;
        }

        function toString(){
            echo($this->name .' is '. $this->age .' and its password is not this one =>'. $this->password);
        }
    }

?>