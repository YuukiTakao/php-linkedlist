<?php declare(strict_types=1);

namespace PhpLinkedList;


class Node
{
    private $current_data;

    private $next_node;

    public function __construct($current_data)
    {
        $this->current_data = $current_data;
    }

    public function getData()
    {
        return $this->current_data;
    }

    public function setNextNode(Node $next_node)
    {
        $this->next_node = $next_node;
    }

    public function getNextNode()
    {
        return $this->next_node;
    }
}