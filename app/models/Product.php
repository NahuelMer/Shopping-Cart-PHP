<?php

class Product extends Model {

    private $id;
    private $name;
    private $price;
    private $discount;
    private $stock;
    private $unit;
    private $qty;

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

    public function findAll() {
        $SQL = 'SELECT * FROM product';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'product');
        return $stmt->fetchAll();
    }

    public function create() {
        $SQL = 'INSERT INTO product(name, price, discount, stock, unit) VALUE(:name, :price, :discount, :stock, :unit)';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['name'=>$this->name, 'price'=>$this->price, 'discount'=>$this->discount, 'stock'=>$this->stock, 'unit'=>$this->unit]);
        return $stmt->rowCount();
    }

    // PARA VER UN SOLO PRODUCTO, IMPLEMENTAR CONTROLLER Y VIEW
    public function find($id) {
        $SQL = 'SELECT * FROM product WHERE id = :id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['id'=>$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'product');
        return $stmt->fetch();
    }

    // SOLO ACTUALIZA STOCK
    public function update() {
        $SQL = 'UPDATE product SET stock = :stock WHERE id = :id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['stock'=>$this->stock, 'id'=>$this->id]);
        return $stmt->rowCount();
    }

}