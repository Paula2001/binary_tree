<?php
require "./Node.php";

class Tree { 
    public $root = null;
    
    public function insertIntoTree($value ,$initRoot){
        if(!$this->root){
            $this->root = new Node($value);
        }else{
            $previousNode = $this->root;
            if($this->root->value < $value){ 
                // go right
                // echo "go right";
                if(!$this->root->right){
                    $this->root->right = new Node($value);
                    $this->root = $initRoot;
                    return;
                }
                $this->root = $this->root->right; 
            }else{
                // go left 
                // echo "go left";
                if(!$this->root->left){
                    $this->root->left = new Node($value);
                    $this->root = $initRoot; // Todo : add to method init root
                    return;
                }
                $this->root = $this->root->left;
            }   
            $this->insertIntoTree($value ,$initRoot);   
        }

    }

    public function getRootValue(){
        return $this->root->value;
    }

    public function getInitRoot(){
        return $this->root;
    }

    /**
     * Description [Left] [Right] [Root]
     */
    public function printPostOrder($initRoot ,$previousNode = null){

        if(!$initRoot->left && !$initRoot->right){
            // if left and right null go back and delete nodes left then right
            if($previousNode->left){
                $previousNode->left = null;
            }else if($previousNode->right){
                $previousNode->right = null;
            }
            if($previousNode->value === $initRoot->value){
                echo $initRoot->value;
                // Print root at the end
                return;
            }
            $initRoot = $previousNode;
        }else{
            $previousNode = $initRoot;
            if($initRoot->left){
                $initRoot = $initRoot->left;
            }else{
                $initRoot = $initRoot->right;
            }
            // Print values
            echo $initRoot->value;
        }

        $this->printPostOrder($initRoot, $previousNode);   
    }

    /**
     * Description [Root] [Left] [Right] 
     */
    public function printPreOrder($initRoot ,$previousNode = null){
        print_r($this->root);
        if(!$previousNode){
            echo $initRoot->value;
        }
        if(!$initRoot->left && !$initRoot->right){
            // if left and right null go back and delete nodes left then right
            if($previousNode->left){
                $previousNode->left = null;
            }else if($previousNode->right){
                $previousNode->right = null;
            }
            if($previousNode->value === $initRoot->value){
                return;
            }
            $initRoot = $previousNode;
        }else{
            $previousNode = $initRoot;
            if($initRoot->left){
                $initRoot = $initRoot->left;
            }else{
                $initRoot = $initRoot->right;
            }
            // Print values
            echo $initRoot->value;
        }

        $this->printPreOrder($initRoot, $previousNode);   
    }
};


$tree = new Tree();

$tree->insertIntoTree(11, $tree->getInitRoot());
$tree->insertIntoTree(12, $tree->getInitRoot());
$tree->insertIntoTree(10, $tree->getInitRoot());
$tree->insertIntoTree(13, $tree->getInitRoot());
$tree->insertIntoTree(14, $tree->getInitRoot());
$tree->insertIntoTree(9, $tree->getInitRoot());
$tree->insertIntoTree(8, $tree->getInitRoot());
$tree->insertIntoTree(7, $tree->getInitRoot());
// $tree->insertIntoTree(9, $tree->getInitRoot());
// print_r($tree->root);
$x = $tree->root;
$tree->printPostOrder($x);
print_r($x);
// print_r($tree->root);
echo "\n";
// $tree->printPreOrder($tree->getInitRoot());