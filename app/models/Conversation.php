<?php

class Conversation {

    private $id;
    private $message;
    private $time;

    public function __construct() {
        $this->id = md5(uniqid("", true));
    }

    public function __get( $property )
    {
        if (property_exists( $this , $property )) {
            return $this -> $property ;
        }
    }

    public function __set( $property , $value )
    {
        if (property_exists( $this , $property )) {
            $this -> $property = $value ;
        }
    }

    public function add(string $message) {
        if(isset($_SESSION['conversation'])){
            $_SESSION['conversation']->message = $_SESSION['conversation']->message . '</br> </br>' . $message . ' ' . date('d-m-y h:i:s');
        } else {
            var_dump($_SESSION['conversation']);
        } 
    }

    // TODO: find all conversations
    
}