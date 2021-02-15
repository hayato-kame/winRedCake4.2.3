<?php

namespace App\Controller;

class HelloController extends AppController
{

    public function initialize(): void
    {
        $this->name = 'Hello';
        $this->autoRender = false;
        $this->viewBuilder()->disableAutoLayout();
    }

    public function index()
    {
        $this->viewBuilder()->enableAutoLayout();
        $this->autoRender = true;
    }

    public function other()
    {
        // $this->viewBuilder()->isAutoLayoutEnabled();
        // 同じ意味でこれも使える
           $this->viewBuilder()->disableAutoLayout();
        $this->autoRender = true;
    }
}
