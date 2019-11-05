<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use PhpLinkedList\LinkedList;

class LinkedListTest extends TestCase
{
    public function testSize()
    {
        $linked_list = new LinkedList();
        $linked_list->insert("One");
        $linked_list->insert("Two");
        $this->assertEquals($linked_list->size(), 2);
    }
}