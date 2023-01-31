<?php

class Cart extends Model{

    private static $instance;
    private $productList = [];
    private $total;

    public function __construct ()
    {

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

    public static function getInstance(): Cart
    {
        if (!isset(self::$instance)) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    public function add($product) {

        $_SESSION["cart"]->productList[$product["id"]] = $product;
        $_SESSION["cart"]->total += $product["price"] * $product["qty"];
    }

    public function delete($product) {

        $_SESSION["cart"]->total -= $product->price * $_SESSION["cart"]->productList[$product->id]["qty"];
        unset($_SESSION["cart"]->productList[$product->id]);  

    }

    public function deleteAll() {
        $_SESSION["cart"]->productList = [];
        $_SESSION["cart"]->total = 0;
    }
    
}