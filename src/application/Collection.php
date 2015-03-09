<?php
/**
 * @author Samuel I Amaziro
 */

namespace application;


use exception\CollectionKeyAlreadyExist;
use exception\InvalidCollectionKey;
use exception\NoSuchElementException;

/**
 * Class Collection
 * @package application
 * @version 1.0 First collection implementation
 */
class Collection {

    /**
     * @var array
     */
    private $list;

    public function __construct(array $list = [])
    {
        $this->list = $list;
    }

    /**
     * Adds a new element to the collection
     * If key is null the element will be added
     * To the end of the collection
     * @param $item
     * @param null $key
     * @throws \exception\CollectionKeyAlreadyExist
     */
    public function add($item, $key = null)
    {
        if(is_null($key))
        {
            $this->list[] = $item;
        }
        else
        {
            if(isset($this->list[$key]))
            {
                throw new CollectionKeyAlreadyExist("The key provided has already been used in this collection");
            }
            else
            {
                $this->list[$key] = $item;
            }
        }

    }

    /**
     * Inserts elements of the specified collection into
     * This collection in the index specified, if index
     * Is null the elements of the specified collection
     * Will be added to this collection using their
     * current index, if the index already exist then
     * The element will be added to the end of this
     * Collection
     * @param Collection $c
     * @param null $index
     * @throws CollectionKeyAlreadyExist
     */
    public function addAll(Collection $c, $index = null)
    {
        if(is_null($index))
        {
            foreach($c->getAll() as $key => $element)
            {
                if(isset($this->list[$key]))
                {
                    $this->list[] = $element;
                }
                else
                {
                    $this->list[$key] = $element;
                }
            }
        }
        else
        {
            if(isset($this->list[$index]))
            {
                throw new CollectionKeyAlreadyExist("The key provided has already been used in this collection");
            }
            else
            {
                $this->list[$index] = $c->getAll();
            }
        }
    }

    /**
     * Removes all elements in the specified collection
     * If no collection is specified the elements of this
     * Collection will be will be removed
     * @param Collection $c
     */
    public function removeAll(Collection $c = null)
    {
        if(is_null($c))
        {
            unset($this->list);
            $this->list = array();
        }
        else
        {
            $c->removeAll();
        }
    }

    /**
     * Gets an element by the key from the collection
     * @param $key
     * @return mixed
     * @throws \exception\InvalidCollectionKey
     */
    public function get($key)
    {
        if(isset($this->list[$key]))
        {
            return $this->list[$key];
        }else
        {
            throw new InvalidCollectionKey("The key provided does not exist");
        }
    }

    /**
     * Returns all elements of the collection
     * @return array
     */
    public function getAll()
    {
        return $this->list;
    }

    /**
     * Remove an element by the key from the collection
     * @param $key
     * @throws \exception\InvalidCollectionKey
     */
    public function remove($key)
    {
        if(isset($this->list[$key]))
        {
            unset($this->list[$key]);
        }else
        {
            throw new InvalidCollectionKey("The key provided does not exist");
        }
    }

    /**
     * Returns the first element of the collection
     * When used as a sequence
     * @return mixed
     * @throws \exception\NoSuchElementException
     */
    public function first()
    {
        if(isset($this->list[0]))
        {
            return $this->list[0];
        }
        else
        {
            throw new NoSuchElementException("no element found in the first position of the sequence");
        }
    }

    /**
     * Returns the last element of the collection
     * When Used as a sequence
     * @return mixed
     * @throws \exception\NoSuchElementException
     */
    public function last()
    {
        $lastIndex = $this->size() - 1;
        if(isset($this->list[$lastIndex]))
        {
            return $this->list[$lastIndex];
        }
        else
        {
            throw new NoSuchElementException("no element found in the first position of the sequence");
        }
    }

    /**
     * Gets the size of the collection
     * @return int
     */
    public function size()
    {
        return sizeof($this->list);
    }

    /**
     * Returns true if the key given exist
     * @param $key
     * @return bool
     */
    public function isKeyExist($key)
    {
        if(isset($this->list[$key]))
        {
            return true;
        }

        return false;
    }

    /**
     * Returns an array of all keys in the collection
     * @return array
     */
    public function keys()
    {
        return array_keys($this->list);
    }

    /**
     * Returns an iterator over the elements in the collection
     * @return CollectionIterator
     */
    public function iterator()
    {
        $i = new CollectionIterator($this);
        return $i;
    }

} 