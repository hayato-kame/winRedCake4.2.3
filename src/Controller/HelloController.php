<?php
namespace App\Controller;

class HelloController extends AppController {
    
    public $name = 'Hello';
    public $autoRender = false;

    public function index() {
        // $this->setAction("other"); 
       
        $this->redirect(['action' => 'other']);
    }

    public function other() {
        echo "これは、indexではない";
    }
}