<?php declare(strict_types=1);

namespace PhpLinkedList;

use PhpLinkedList\Node;
use Exception;


class LinkedList
{
    private $first_node;
    private $count;

    public function __construct()
    {
        $this->first_node = new Node(null);
        $this->count = 0;
    }

    /**
     * Insert the value newData at the specified index
     * @param mixed $newData New data to register.
     * @param int $index
     */
    public function add($newData, int $index=1): bool
    {
        if ($index < 1) {
            throw new Exception('Only integers greater than 1 can be specified');
        }
        $previous_node = $this->getNode($index - 1);
        if (is_null($previous_node)) {
            return false;
        }
        $new_node = new Node($newData);

        if (! is_null($previous_node->getNextNode())) {
            $new_node->setNextNode($previous_node->getNextNode());
        }
        $previous_node->setNextNode($new_node);

        return true;
    }

    public function count()
    {
        $current_node = $this->first_node->getNextNode();
        $length = 0;
        while($current_node != null) {
            $length++;
            $current_node = $current_node->getNextNode();
        }
        return $length;
    }

    public function get(int $index)
    {
        $target_node = $this->getNode($index);
        if (is_null($target_node)) {
            throw new Exception('There are no node in the specified index');
        }
        
        return $target_node->getData();
    }

    public function pop()
    {
        $last_index = $this->count();
        // var_dump($last_index);exit;
        $pre_last_node = $this->getNode($last_index - 1);
        $last_data = $pre_last_node->getNextNode()->getData();
        $pre_last_node->setNextNode(null);
        return $last_data;
    }

    public function remove(int $index): bool
    {
        if ($index < 1) {
            throw new Exception('Only integers greater than 1 can be specified');
        }

        $previous_node = $this->getNode($index - 1);
        $current_node = $previous_node->getNextNode();
        if (is_null($previous_node) || is_null($current_node)) {
            return false;
        }
        if ($index === $this->count()) {
            $this->pop();
        } else {
            $previous_node->setNextNode($current_node->getNextNode());
            unset($current_node);
        }
        
        return true;
    }

    private function getNode(int $index): Node
    {
        $current_node = $this->first_node;
        
        for ($i = 0; $i < $index; $i++) {
            if (is_null($current_node)) {
                return null;
            }
            $current_node = $current_node->getNextNode();
        }

        return $current_node;
    }
}

