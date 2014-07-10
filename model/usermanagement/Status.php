<?php


/**
 * Status
 *
 * @Table(name="status")
 * @Entity
 */
class Status
{
    /**
     * @var integer
     *
     * @Column(name="status_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $statusId;

    /**
     * @var string
     *
     * @Column(name="status_name", type="string", length=45, nullable=false)
     */
    private $statusName;


    /**
     * Get statusId
     *
     * @return integer 
     */
    public function getStatusId()
    {
        return $this->statusId;
    }

    /**
     * Set statusName
     *
     * @param string $statusName
     * @return Status
     */
    public function setStatusName($statusName)
    {
        $this->statusName = $statusName;

        return $this;
    }

    /**
     * Get statusName
     *
     * @return string 
     */
    public function getStatusName()
    {
        return $this->statusName;
    }
}
