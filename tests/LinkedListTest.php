<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use PhpLinkedList\LinkedList;

class LinkedListTest extends TestCase
{
    public function testGet()
    {
        $linked_list = new LinkedList();
        $linked_list->add('One');
        $linked_list->add('Two');
        $this->assertEquals($linked_list->get(2), 'One');
        $this->assertEquals($linked_list->get(1), 'Two');
    }

    public function testRemove() 
    {
        $linked_list = new LinkedList();
        $linked_list->add('One');
        $linked_list->add('Two');
        $this->assertEquals($linked_list->get(2), 'One');
        $linked_list->remove(1);
        $this->assertEquals($linked_list->get(1), 'One');
    }

    public function testCount()
    {
        $linked_list = new LinkedList();
        $linked_list->add("One");
        $linked_list->add("Two");
        $linked_list->add("Three");
        $this->assertEquals($linked_list->count(), 3);
    }
}