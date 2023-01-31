<?php

class CartController extends Controller {

    public function index(){

        $this->model("Conversation")->add("El usuario ingreso al carrito de compras");

        $this->view('cart/index');
    }

    public function addToCart($id){

        if(!array_key_exists($id, $_SESSION["cart"]->productList)){

            $product = $this->model('Product')->find($id);

            $qty = ($product->unit == "Kg") ? (float) $_POST['qty'] : (int) $_POST['qty'];
            
            $productToAdd = [
                "id"=>$product->id,
                "name"=>$product->name,
                "price"=>$product->price,
                "discount"=>$product->discount,
                "qty"=>$qty,
                "unit"=>$product->unit,
                "stock"=>$product->stock
                ];

            $this->model('Cart')->add($productToAdd);

            $this->model("Conversation")->add("El usuario agrego el producto " . $product->name . " al carrito");

            $this->view('cart/index');

        } else {
            $this->view('cart/index');
        }
       
    }
    
    public function deleteFromCart($id){

        $product = $this->model('Product')->find($id);

        $this->model('Cart')->delete($product);

        $this->model("Conversation")->add("El usuario elimino el producto " . $product->name . " del carrito");

        $this->view('cart/index');

    }

    public function deleteAll() {
        $this->model('Cart')->deleteAll();

        $this->model("Conversation")->add("El usuario vacio el carrito de compras");

        $this->view('cart/index');
    }

    public function confirm() {

        foreach($_SESSION['cart']->productList as $key=>$value){

            $product = $this->model('Product')->find($key);
            $product->stock -= $value['qty'];

            if (!($product->stock < 0)){
                $product->update();
            } else {
                $this->model("Conversation")->add("Se agoto el stock del producto " . $product->name);
                $this->view('cart/error');
                return false;
            } 

            ($product->stock == 0) ? $this->model("Conversation")->add("Se agoto el stock del producto " . $product->name) : '';
            
        }

        $this->model('Cart')->deleteAll();

        //TODO: finalizar y abrir un nuevo conversation

        $this->model("Conversation")->add("El usuario confirmo la compra de sus productos");

        $this->view('cart/confirm');

    }
}

