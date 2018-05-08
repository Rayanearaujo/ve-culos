<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

abstract class BaseEntity extends Model {
    private $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return BaseEntity
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
}