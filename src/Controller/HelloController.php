<?php

namespace App\Controller;

class HelloController extends AppController
{

    public function initialize(): void{
		$this->viewBuilder()->setLayout('hello');
        $this->set('msg', 'Hello/index');
        $this->set('footer', 'Hello/footer2');		
	}

	public function index(){
        
	}


    public function other()
    {
        // $this->viewBuilder()->isAutoLayoutEnabled();
        // 同じ意味でこれも使える
           $this->viewBuilder()->disableAutoLayout();
        $this->autoRender = true;
    }

    public function sendForm()
    {
        $str = $this->request->getQuery('text1');
        $result = "";
        if ($str != ""){
            $result = "you type:" . $str;
        } else {
            $result = "empty.";
        }
        $this->set("result", $result);

    }
}
