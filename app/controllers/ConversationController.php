<?php

class ConversationController extends Controller {

    public function index() {

        $this->view('conversation/index');

    }

    public function update(string $message) {

        $this->model("Conversation")->add($message);

    }

    public function deleteAll() {

        unset($_SESSION["conversation"]);
        //$this->view('conversation/index');
        header('location:/bootcamp/carrito/public/conversation/index');

    }

}