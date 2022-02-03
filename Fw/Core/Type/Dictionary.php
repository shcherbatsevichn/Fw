<?php

namespace Fw\Core\Type;

use Traversable;
use IteratorAggregate;
use ArrayAccess;
use Countable;
use ArrayIterator;

class Dictionary implements IteratorAggregate, ArrayAccess, Countable {

    private $container =[];
    
    public function getIterator() : Traversable {
        return new ArrayIterator($this);
    }
    
    public function offsetSet($offset, $value): void {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    public function offsetExists($offset) : bool {
        return isset($this->container[$offset]);
    }

    public function offsetUnset($offset): void {
        unset($this->container[$offset]);
    }

    public function offsetGet($offset) {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    public function count(): int{
        return count($this->container);
    }

}