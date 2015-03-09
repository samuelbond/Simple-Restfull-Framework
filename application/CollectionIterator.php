<?php
/**
 * @author Samuel I Amaziro
 */

namespace application;


use exception\NoSuchElementException;

class CollectionIterator {

    /**
     * @var array
     */
    private $collection;

    /**
     * @var int
     */
    private static $index = 0;

    /**
     * @var array
     */
    private $indexList = array();

    /**
     * @var int
     */
    private static $currentIndex = 0;

    public function __construct(Collection $c)
    {
        $collection = $c->getAll();
        $this->setCollection($collection);
        $this->indexList = $c->keys();
    }

    /**
     * Returns true if this Collection iterator has more elements when traversing the Collection in the forward direction
     * @return bool
     */
    public function hasNext()
    {
        self::$currentIndex = self::$index;

        if(isset($this->indexList[self::$index]))
        {
            if(isset($this->collection[$this->indexList[self::$index]]))
            {
                self::$index++;
                return true;
            }
        }

        return false;

    }


    /**
     * Returns true if this Collection iterator has more elements when traversing the Collection in the reverse direction
     * @return bool
     */
    public function hasPrevious()
    {
        self::$currentIndex = self::$index;

        if(isset($this->indexList[self::$index]))
        {
            if(isset($this->collection[$this->indexList[self::$index]]))
            {
                self::$index--;
                return true;
            }
        }

        return false;

    }


    /**
     * Returns the next element in the Collection Iterator
     * @return mixed
     * @throws NoSuchElementException
     */
    public function next()
    {
        if(isset($this->indexList[self::$currentIndex]))
        {
            if(isset($this->collection[$this->indexList[self::$currentIndex]]))
            {
                return $this->collection[$this->indexList[self::$currentIndex]];
            }
        }

        throw new NoSuchElementException("The specified element was not found");
    }


    /**
     * Returns the previous element in the Collection Iterator
     * @return mixed
     * @throws NoSuchElementException
     */
    public function previous()
    {
        if(isset($this->indexList[self::$currentIndex]))
        {
            if(isset($this->collection[$this->indexList[self::$currentIndex]]))
            {
                return $this->collection[$this->indexList[self::$currentIndex]];
            }
        }

        throw new NoSuchElementException("The specified element was not found");
    }

    /**
     * Resets the index to the first element of the collection
     */
    private function resetCollection()
    {
        reset($this->collection);
    }

    /**
     * Rewinds the index of the collection to the previous element
     */
    private function rewindCollection()
    {
        prev($this->collection);
    }

    private function setCollection(&$collection)
    {
        $this->collection = $collection;
    }
} 