<?php

namespace App\Controller;

use \Exception;
use Cake\Log\Log;

class BoardsController extends AppController
{


    public function index($id = null){
        $this->set('entity', $this->Boards->newEmptyEntity());
        if($id != null) {
            try {
                $entity = $this->Boards->get($id);
                $this->set('entity', $entity);
            } catch(Exception $e){
                Log::write('debug', $e->getMessage());
            }
        }
        $data = $this->Boards->find('all')->order(['id' => 'DESC']);
        $this->set('data', $data->toArray());
        $this->set('count', $data->count());
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
