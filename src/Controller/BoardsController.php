<?php

namespace App\Controller;

use \Exception;
use Cake\Log\Log;

class BoardsController extends AppController
{


    public function index()
    {
        $this->set('entity', $this->Boards->newEmptyEntity());
        if ($this->request->is('post')) {
            $id = $this->request->getData('id');
            $data = $this->Boards->findByIdOrName($id, $id);
        } else {
            $data = $this->Boards->find('all');
        }
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
