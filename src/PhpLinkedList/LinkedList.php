<?php declare(strict_types=1);

namespace PhpLinkedList;

use PhpLinkedList\Node;
use Exception;

class LinkedList
{
    private $count;
    private $current;
    private $default_node;
    private $current_key;

    public function __construct()
    {
        $this->default_node = new Node(null);
        $this->count = 0;
        $this->current = $this->default_node;
        $this->current_key = 0;
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
        $current_node = $this->default_node->getNextNode();
        $length = 0;
        while($current_node != null) {
            $length++;
            $current_node = $current_node->getNextNode();
        }
        return $length;
    }

    public function current()
    {
        return $this->current->getData();
    }

    /**
     * the first node is 1
     * $param $index
     * @return  a data in specified last node.
     */
    public function get(int $index)
    {
        $target_node = $this->getNode($index);
        if (is_null($target_node)) {
            throw new Exception('There are no node in the specified index');
        }
        
        return $target_node->getData();
    }

    public function isEmpty(): bool
    {
        return $this->default_node->getNextNode() === null ? true : false;
    }

    public function key(): int
    {
        return $this->current_key;
    }

    public function next(): void
    {
        $this->current = $this->current->getNextNode();
        $this->current_key += 1;
    }

    public function pop()
    {
        $last_index = $this->count();
        $pre_last_node = $this->getNode($last_index - 1);
        $last_data = $pre_last_node->getNextNode()->getData();

        if ($this->current_key === $this->count()) {
            $this->current_key -= 1;
        }
        $this->current = $pre_last_node;
        $pre_last_node->setNextNode(null);

        return $last_data;
    }

    public function push($new_data)
    {
        $last_index = $this->count();
        $last_node = $this->getNode($last_index);
        $last_node->setNextNode(new Node($new_data));
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

    public function rewind(): void
    {
        if (! is_null($this->default_node->getNextNode())) {
            $this->current = $this->default_node->getNextNode();
        }
    }

    public function valid(): bool
    {
        if (is_null($this->current->getNextNode())) {
            return false;
        } else {
            return true;
        }
    }

    private function getNode(int $index): Node
    {
        $current_node = $this->default_node;
        
        for ($i = 0; $i < $index; $i++) {
            if (is_null($current_node)) {
                return null;
            }
            $current_node = $current_node->getNextNode();
        }

        return $current_node;
    }
}

