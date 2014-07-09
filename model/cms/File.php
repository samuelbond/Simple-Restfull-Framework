<?php
/**
 *
 * Simple MVC Framework aka Baseframework
 * @version 2.0
 *
 * Created By Samuel Izuchi Amaziro
 * Copyright 2014 Plati Tech Limited, All Rights Reserved
 */


namespace model\cms;

use Doctrine\ORM\EntityRepository;

/**
 * @Entity(repositoryClass="model\cms\FileRepository")
 * @Table(name="files")
 **/

class File{

    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     * @var int
     **/
    protected  $file_id;
    /**
     * @Column(type="string")
     * @var string
     **/
    protected  $file_name;
    /**
     * @Column(type="string")
     * @var string
     **/
    protected $file_path;
    /**
     * @Column(type="integer")
     * @var int
     **/
    protected $file_size;
    /**
     * @Column(type="datetime")
     * @var timestamp
     **/
    protected $date_created;
    /**
     * @Column(type="datetime")
     * @var timestamp
     **/
    protected $date_modified;
    /**
     * @Column(type="string")
     * @var string
     **/
    protected $owner;

    /**
     * @param \DateTime $date_created
     * @return File
     */
    public function setDateCreated($date_created)
    {
        $this->date_created = $date_created;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {
        return $this->date_created;
    }

    /**
     * @param mixed $id
     */
    public function setFileId($id)
    {
        $this->file_id = $id;
    }

    /**
     * @return mixed
     */
    public function getFileId()
    {
        return $this->file_id;
    }

    /**
     * @param \DateTime $date_modified
     * @return File
     */
    public function setDateModified($date_modified)
    {
        $this->date_modified = $date_modified;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateModified()
    {
        return $this->date_modified;
    }

    /**
     * @param mixed $name
     */
    public function setFileName($name)
    {
        $this->file_name = $name;
    }

    /**
     * @return mixed
     */
    public function getFileName()
    {
        return $this->file_name;
    }

    /**
     * @param mixed $owner
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
    }

    /**
     * @return mixed
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param mixed $path
     */
    public function setFilePath($path)
    {
        $this->file_path = $path;
    }

    /**
     * @return mixed
     */
    public function getFilePath()
    {
        return $this->file_path;
    }

    /**
     * @param mixed $size
     */
    public function setFileSize($size)
    {
        $this->file_size = $size;
    }

    /**
     * @return mixed
     */
    public function getFileSize()
    {
        return $this->file_size;
    }



} 