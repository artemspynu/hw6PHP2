<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12.07.2018
 * Time: 8:36
 */

namespace app\models;


class Product {
    public $id;
    public $name;
    public $description;
    public $price;

    public function __construct($id = null, $name = null, $description = null, $price = null) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }
}