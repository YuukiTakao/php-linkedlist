<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use PhpLinkedList\LinkedList;

class LinkedListTest extends TestCase
{
    public function testAdd()
    {
        $linked_list = new LinkedList();
        $linked_list->add('One');
        $linked_list->add('Two');
        $linked_list->rewind();
        $this->assertEquals(2, $linked_list->count());
    }

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
        $this->assertEquals($linked_list->get(9), null);
        $this->assertEquals($linked_list->get(0), null);
    }

    public function testIsEmpty()
    {
        $linked_list = new LinkedList();
        $this->assertEquals(true, $linked_list->isEmpty());

        $linked_list->add('One');
        $this->assertEquals(false, $linked_list->isEmpty());
    }

    public function testKey()
    {
        $linked_list = new LinkedList();
        $this->assertEquals(0, $linked_list->key());

        $linked_list->add('One');
        $linked_list->next();
        $this->assertEquals(1, $linked_list->key());

        $linked_list->pop();
        $this->assertEquals(0, $linked_list->key());
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

    public function testRewind()
    {
        $numbers = new LinkedList();
        $this->assertEquals($numbers->current(), null);

        $numbers->push('One');
        $numbers->push('Two');
        $numbers->next();
        $numbers->next();
        $this->assertEquals($numbers->current(), 'Two');

        $numbers->rewind();
        $this->assertEquals($numbers->current(), 'One');
    }

    public function testCurrent()
    {
        $numbers = new LinkedList();
        $this->assertEquals($numbers->current(), null);
        
        $numbers->add('One');
        $numbers->add('Two');
        $numbers->next();
        $this->assertEquals($numbers->current(), 'Two');
    }

    public function testValid()
    {
        $numbers = new LinkedList();
        $numbers->add('One');
        $this->assertEquals($numbers->valid(), true);

        $numbers->pop();
        $this->assertEquals($numbers->valid(), false);
    }
}