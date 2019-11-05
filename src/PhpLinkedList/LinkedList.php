<?php declare(strict_types=1);

namespace PhpLinkedList;
use PhpLinkedList\Node;

class LinkedList
{
    private $first_node = null;
    private $size = null;

    public function __construct()
    {
        $this->first_node = new Node(null);
    }

    public function insert()
    {

    }

    public function get()
    {

    }

    public function size()
    {
        if (isset($this->size)) {
            return $this->size;
        } else {
            $current_node = $this->first_node->getNextNode();
            $length = 0;
            while($current_node != null) {
                ++$length;
                $current_node = $current_node->getNextNode();
            }
            return $length;
        }
    }
}

