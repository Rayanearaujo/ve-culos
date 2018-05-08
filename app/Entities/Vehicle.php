<?php

namespace App\Entities;

use App\Entities\BaseEntity;

class Vehicle extends BaseEntity {

    protected $fillable =  [
        'veiculo', 'marca', 'ano', 'descricao', 'vendido'
    ];

    public function path()
    {
        return 'veiculos/' . $this->id;
    }
}