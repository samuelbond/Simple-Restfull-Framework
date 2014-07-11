<?php
namespace model\usermanagement;

/**
 * Privileges
 *
 * @Table(name="privileges", uniqueConstraints={@UniqueConstraint(name="privilege_level_UNIQUE", columns={"privilege_level"})})
 * @Entity
 */
class Privileges
{
    /**
     * @var integer
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @Column(name="privilege_level", type="integer", nullable=false)
     */
    private $privilegeLevel;

    /**
     * @var string
     *
     * @Column(name="privilege_name", type="string", length=45, nullable=false)
     */
    private $privilegeName;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set privilegeLevel
     *
     * @param integer $privilegeLevel
     * @return Privileges
     */
    public function setPrivilegeLevel($privilegeLevel)
    {
        $this->privilegeLevel = $privilegeLevel;

        return $this;
    }

    /**
     * Get privilegeLevel
     *
     * @return integer 
     */
    public function getPrivilegeLevel()
    {
        return $this->privilegeLevel;
    }

    /**
     * Set privilegeName
     *
     * @param string $privilegeName
     * @return Privileges
     */
    public function setPrivilegeName($privilegeName)
    {
        $this->privilegeName = $privilegeName;

        return $this;
    }

    /**
     * Get privilegeName
     *
     * @return string 
     */
    public function getPrivilegeName()
    {
        return $this->privilegeName;
    }
}
