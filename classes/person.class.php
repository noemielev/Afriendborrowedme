<?php
    class Person{
        
        protected int $id;
        protected string $name;
        protected string $lastName;

        public function __construct(int $id, string $name, string $lastName){
            $this->id = $id;
            $this->name = $name;
            $this->lastName = $lastName;
        }

        public function getFullName (){
            return $this->name.' '.$this->lastName;
        }
        public function getId (){
            return $this->id;
        }


    }
?>