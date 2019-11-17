<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use PhpLinkedList\LinkedList;

class LinkedListTest extends TestCase
{
    public function testCount()
    {
        $linked_list = new LinkedList();
        $linked_list->add("One");
        $linked_list->add("Two");
        $linked_list->add("Three");
        $this->assertEquals($linked_list->count(), 3);
    }

    public function testGet()
    {
        $linked_list = new LinkedList();
        $linked_list->add('One');
        $linked_list->add('Two');
        $this->assertEquals($linked_list->get(2), 'One');
        $this->assertEquals($linked_list->get(1), 'Two');
    }

    public function testPop()
    {
        $linked_list = new LinkedList();
        $linked_list->add('One');
        $linked_list->add('Two'); 
        
        $last_data = $linked_list->pop();
        $this->assertEquals($last_data, 'One');
        
        $last_data = $linked_list->pop();
        $this->assertEquals($last_data, 'Two');
    }

    public function testPush()
    {
        $numbers = new LinkedList();
        $numbers->add('One');
        $numbers->add('Two');
        $this->assertEquals($numbers->count(), 2);

        $numbers->push('Zero');
        $last_index = $numbers->count();
        $this->assertEquals($last_index, 3);
        $this->assertEquals($numbers->get($last_index), 'Zero');

        $fruits = new LinkedList();
        $fruits->push('Apple');
        $count = $fruits->count();
        $this->assertEquals($count, 1);
        $this->assertEquals($fruits->get($count), 'Apple');
    }

    public function testRemove() 
    {
        $linked_list = new LinkedList();

        $linked_list->add('One');
        $linked_list->add('Two');
        $linked_list->add('Three');
        $this->assertEquals($linked_list->get(2), 'Two');

        $linked_list->remove(1);
        $this->assertEquals($linked_list->get(2), 'One');

        $linked_list->remove(2);
        $this->assertEquals($linked_list->get(1), 'Two');
    }

    public function testCurrent()
    {
        $linked_list = new LinkedList();
        $linked_list->add('One');
        $linked_list->add('Two');
        $this->assertEquals($linked_list->current(), 'One');
    }
}