<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;

class BoardsTable extends Table {

    public function initialize(array $config): void {
        parent::initialize($config);

       
    }
    
    public static function defaultConnectionName(): string {
        return 'default';
    }

    


}