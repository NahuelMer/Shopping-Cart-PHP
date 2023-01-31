<?php

class ProductController extends Controller{

    public function index() {

        $this->model("Conversation")->add("El usuario ingreso a la lista de productos");
        $products = $this->model('Product')->findAll();
        $this->view('product/index', ['products'=>$products]);

    }

    public function create() {
        if(isset($_POST['action'])){
            var_dump($_POST);
            $newProduct = $this->model('Product');
            $newProduct->name = $_POST['name'];
            $newProduct->price = $_POST['price'];
            $newProduct->discount = $_POST['discount'];
            $newProduct->stock = $_POST['stock'];
            $newProduct->unit = $_POST['unit'];
            $newProduct->create();

            $this->model("Conversation")->add("Se creo el producto" . $newProduct->name);

            header('location:/bootcamp/carrito/public/product/index');
        }else{
 
            $this->view('product/create');
        }
        
    }
    
    public function find() {
        
    }
    
    public function update() {
    
    }
    
    public function delete() {
    
    }
}

