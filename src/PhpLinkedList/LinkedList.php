<?php declare(strict_types=1);

namespace PhpLinkedList;

use PhpLinkedList\Node;
use Exception;


class LinkedList
{
    private $first_node;
    private $size;

    public function __construct()
    {
        $this->first_node = new Node(null);
        $this->size = 0;
    }

    public function insert($data, int $order_number=1): bool
    {
        if ($order_number < 1) {
            throw new Exception('指定できるのは1以上の整数のみです');
        }
        $previous_node = $this->getNode($order_number - 1);
        if (is_null($previous_node)) {
            return false;
        }
        $new_node = new Node($data);

        if (! is_null($previous_node->getNextNode())) {
            $new_node->setNextNode($previous_node->getNextNode());
        }
        $previous_node->setNextNode($new_node);

        return true;
    }

    public function get(int $position)
    {
        $target_node = $this->getNode($position);
        if (is_null($target_node)) {
            // throw new Exception("指定の場所に要素が存在しません");
            var_dump('指定の要素はありません');
            return null;
        }
        
        return $target_node->getData();
    }

    public function size()
    {
        $current_node = $this->first_node->getNextNode();
        $length = 0;
        while($current_node != null) {
            $length++;
            $current_node = $current_node->getNextNode();
        }
        return $length;
    }

    private function getNode(int $position): Node
    {
        $current_node = $this->first_node;
        
        for ($i = 0; $i < $position; $i++) {
            if (is_null($current_node)) {
                return null;
            }
            $current_node = $current_node->getNextNode();
        }

        // var_dump('hogehoge');
        // var_dump($current_node);
        return $current_node;
    }
}

