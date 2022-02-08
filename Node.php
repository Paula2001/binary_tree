<?php

class Node {
    public $left = null;
    public $right = null;
    public $value = null;

    public function __construct($value, $left = null, $right = null){
        $this->left = $left;
        $this->right = $right;
        $this->value = $value;
    }
}