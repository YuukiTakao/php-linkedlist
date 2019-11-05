<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use PhpLinkedList\Node;


class NodeTest extends TestCase
{
    public function testGetData()
    {
        $node = new Node('hoge');
        $this->assertEquals($node->getData(), 'hoge');
    }

    public function testGetNext()
    {
        $first_node = new Node("I'm first node.");
        $first_node->setNextNode(new Node("I'm next node."));

        $this->assertEquals($first_node->getNextNode()->getData(), "I'm next node.");
    }
}