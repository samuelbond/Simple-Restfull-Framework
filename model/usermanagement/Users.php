<?php


/**
 * Users
 *
 * @Table(name="users", uniqueConstraints={@UniqueConstraint(name="user_id_UNIQUE", columns={"user_id"})}, indexes={@Index(name="fk_users_1_idx", columns={"status"}), @Index(name="fk_users_2_idx", columns={"profile"}), @Index(name="fk_users_3_idx", columns={"privilege"})})
 * @Entity
 */
class Users
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
     * @var string
     *
     * @Column(name="user_id", type="string", length=10, nullable=false)
     */
    private $userId;

    /**
     * @var string
     *
     * @Column(name="username", type="string", length=45, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var \Status
     *
     * @ManyToOne(targetEntity="Status")
     * @JoinColumns({
     *   @JoinColumn(name="status", referencedColumnName="status_id")
     * })
     */
    private $status;

    /**
     * @var \Profiles
     *
     * @ManyToOne(targetEntity="Profiles")
     * @JoinColumns({
     *   @JoinColumn(name="profile", referencedColumnName="profile_id")
     * })
     */
    private $profile;

    /**
     * @var \Privileges
     *
     * @ManyToOne(targetEntity="Privileges")
     * @JoinColumns({
     *   @JoinColumn(name="privilege", referencedColumnName="id")
     * })
     */
    private $privilege;


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
     * Set userId
     *
     * @param string $userId
     * @return Users
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return string 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return Users
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Users
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set status
     *
     * @param \Status $status
     * @return Users
     */
    public function setStatus(\Status $status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \Status 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set profile
     *
     * @param \Profiles $profile
     * @return Users
     */
    public function setProfile(\Profiles $profile = null)
    {
        $this->profile = $profile;

        return $this;
    }

    /**
     * Get profile
     *
     * @return \Profiles 
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * Set privilege
     *
     * @param \Privileges $privilege
     * @return Users
     */
    public function setPrivilege(\Privileges $privilege = null)
    {
        $this->privilege = $privilege;

        return $this;
    }

    /**
     * Get privilege
     *
     * @return \Privileges 
     */
    public function getPrivilege()
    {
        return $this->privilege;
    }
}
