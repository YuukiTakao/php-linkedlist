<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use PhpLinkedList\LinkedList;

class LinkedListTest extends TestCase
{
    public function testAdd()
    {
        $linked_list = new LinkedList();
        $linked_list->add(0, 'One');
        $linked_list->add(0, 'Two');
        $linked_list->rewind();
        $this->assertEquals(2, $linked_list->count());
    }

    public function testCount()
    {
        $linked_list = new LinkedList();
        $linked_list->add(0,"One");
        $linked_list->add(0, "Two");
        $linked_list->add(0, "Three");
        $this->assertEquals($linked_list->count(), 3);
    }

    public function testGet()
    {
        $linked_list = new LinkedList();
        $linked_list->add(0, 'One');
        $linked_list->add(0, 'Two');
        // var_dump($linked_list);
        $this->assertEquals($linked_list->get(1), 'One');
        $this->assertEquals($linked_list->get(0), 'Two');
    }

    public function testIsEmpty()
    {
        $linked_list = new LinkedList();
        $this->assertEquals(true, $linked_list->isEmpty());

        $linked_list->add(0, 'One');
        $this->assertEquals(false, $linked_list->isEmpty());
    }

    public function testKey()
    {
        $linked_list = new LinkedList();
        $this->assertEquals(0, $linked_list->key());

        $linked_list->add(0, 'One');
        $linked_list->next();
        $this->assertEquals(1, $linked_list->key());

        $linked_list->pop();
        $this->assertEquals(0, $linked_list->key());
    }

    public function testPop()
    {
        $linked_list = new LinkedList();
        $linked_list->add(0, 'One');
        $linked_list->add(0, 'Two'); 
        
        $last_data = $linked_list->pop();
        $this->assertEquals('One', $last_data);
        
        $last_data = $linked_list->pop();
        $this->assertEquals('Two', $last_data);
    }

    public function testPush()
    {
        $numbers = new LinkedList();
        $numbers->add(0, 'One');
        $numbers->add(0, 'Two');
        $this->assertEquals(2, $numbers->count());

        $numbers->push('Zero');
        $count = $numbers->count();
        $this->assertEquals(3, $count);
        $this->assertEquals('Zero', $numbers->get($count - 1));

        $fruits = new LinkedList();
        $fruits->push('Apple');
        $count = $fruits->count();
        $this->assertEquals($count, 1);
        $this->assertEquals('Apple', $fruits->get($count - 1));
    }

    public function testRemove() 
    {
        $linked_list = new LinkedList();

        $linked_list->add(0, 'One');
        $linked_list->add(0, 'Two');
        // $linked_list->add(0, 'Three');
        // var_dump($linked_list);
        $this->assertEquals('Two', $linked_list->get(0));

        // $linked_list->remove(1);
        // $this->assertEquals('Three', $linked_list->get(1));

        // $linked_list->remove(1);
        // $this->assertEquals('Two', $linked_list->get(0));
    }

    public function testRewind()
    {
        $numbers = new LinkedList();
        $this->assertEquals($numbers->current(), null);

        $numbers->push('One');
        $numbers->push('Two');

        $numbers->rewind();
        $this->assertEquals('One', $numbers->current());

        $numbers->next();
        $this->assertEquals('Two', $numbers->current());
    }

    public function testCurrent()
    {
        $numbers = new LinkedList();
        $this->assertEquals($numbers->current(), null);
        
        $numbers->add(0, 'One');
        $numbers->add(0, 'Two');
        $numbers->rewind();
        $this->assertEquals('Two', $numbers->current());
    }

    public function testValid()
    {
        $numbers = new LinkedList();
        $numbers->push('One');
        $numbers->push('Two');
        $numbers->rewind();
        $this->assertEquals(true, $numbers->valid());
        $this->assertEquals(0, $numbers->key());
        $this->assertEquals('One', $numbers->current());
        $numbers->next();
        $this->assertEquals(true, $numbers->valid());
        $this->assertEquals(1, $numbers->key());
        $this->assertEquals('Two', $numbers->current());
    }
}