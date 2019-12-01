<?php declare(strict_types=1);

namespace PhpLinkedList;

use PhpLinkedList\Node;
use Exception;
use Iterator;
use Countable;

class LinkedList implements Iterator, Countable
{
    private $count;
    private $current;
    private $default_node;
    private $current_key;
    public $arr;

    public function __construct()
    {
        $this->default_node = new Node(null);
        $this->count = 0;
        $this->current = $this->default_node;
        $this->current_key = 0;
        $this->arr = [];
    }

    /**
     * Insert the value newData at the specified index
     * @param mixed $newData New data to register.
     * @param int $index
     */
    public function add(int $index, $newData): void
    {
        if ($index < 0) {
            throw new OutOfRangeException('Only integer greater than 1 can be specified');
        }
        $new_node = new Node($newData);
        $previous_node = $this->getNode($index - 1);

        if (! is_null($previous_node->getNextNode())) {
            $new_node->setNextNode($previous_node->getNextNode());
        }

        $this->array_insert($index, $new_node);

        $previous_node->setNextNode($new_node);
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
        return $this->count() === 0
            ? null
            : $this->arr[$this->current_key]->getData();
    }

    /**
     * the first node is 1
     * $param $index
     * @return  a data in specified last node.
     */
    public function get(int $index)
    {
        if ($this->count() < $index) {
            throw new OutOfRangeException('Only integer greater than 1 can be specified');
        }
        $target_node = $this->arr[$index];
        
        return $target_node->getData();
    }

    public function isEmpty(): bool
    {
        return is_null($this->default_node->getNextNode());
    }

    public function key(): int
    {
        return $this->current_key;
    }

    public function next(): void
    {
        ++$this->current_key;
    }

    public function pop()
    {
        $last_index = $this->count();
        $pre_last_node = $this->getNode($last_index - 1);
        $last_data = $pre_last_node->getNextNode()->getData();

        if ($this->current_key === $this->count()) {
            --$this->current_key;
        }
        $this->current = $pre_last_node;

        $pre_last_node->setNextNode(null);

        array_pop($this->arr);

        return $last_data;
    }

    public function push($new_data)
    {
        $last_index = $this->count();
        $last_node = $this->getNode($last_index);
        $new_node = new Node($new_data);
        $last_node->setNextNode($new_node);

        array_push($this->arr, $new_node);
    }

    public function remove(int $index): bool
    {
        if ($index < 1) {
            throw new Exception('Only integers greater than 1 can be specified');
        }
        $previous_node = $this->getNode($index);
        $current_node = $previous_node->getNextNode();
        if (is_null($previous_node) || is_null($current_node)) {
            return false;
        }
        if ($index === $this->count()) {
            $this->pop();
        } else {
            $previous_node->setNextNode($current_node->getNextNode());
            unset($current_node);
            array_splice($this->arr, $index, 1);
        }
        
        return true;
    }

    public function rewind(): void
    {
        if (! is_null($this->default_node->getNextNode())) {
            $this->current = $this->default_node->getNextNode();
            $this->current_key = 0;
        }
    }

    public function valid(): bool
    {
        return isset($this->arr[$this->current_key]);
    }

    private function getNode(int $index): Node
    {
        $current_node = $this->default_node;

        for ($i = 0; $i < $index; $i++) {
            $current_node = $current_node->getNextNode();
        }

        return $current_node;
    }

    private function array_insert(int $offset, $new_data): array
    {
        $array_count = $this->count();

        if (isset($this->arr[$offset])) {
            if ($array_count >= 1) {

                $this->arr = array_merge(
                    array_slice($this->arr, 0, $offset),
                    [$new_data],
                    array_slice($this->arr, $offset)
                );

            } else {
                array_unshift($this->arr, $new_data);
            }
        } else {

            if ($array_count === $offset) {
                array_push($this->arr, $new_data);
            }

        }
        return $this->arr;
    }
}

