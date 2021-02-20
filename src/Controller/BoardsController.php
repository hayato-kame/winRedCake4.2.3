<?php
declare(strict_types=1);

namespace App\Controller;

use \Exception;
use Cake\Log\Log;

class BoardsController extends AppController
{

    public function index($id = null){
        $data = $this->Boards->find('all')->toArray();
        $this->set('data',$data);
    }

    public function addRecord()
    {
        if ($this->request->is('post')) {
            $board = $this->Boards->newEntity($this->request->getData());
            $this->Boards->save($board);
        }
        $this->autoRender = false;
        echo "<pre>";
        print_r($this->request->getData());
        echo "</pre>";
    }

    public function editRecord() {
        if ($this->request->is('post')){
            $arr1 = ['name' => $this->request->getData('name')];
            $arr2 = ['title' => $this->request->getData('title')];
            $this->Boards->updateAll($arr2, $arr1);
        }
        return $this->redirect(['action' => 'index']);
    }


    public function delRecord()
    {

        if ($this->request->is('post')) {
            $this->Boards->deleteAll(
                ['name like' => "%" . $this->request->getData('name') . "%"]
            );
        }
        $this->redirect(['action' => 'index']);
    }
}
