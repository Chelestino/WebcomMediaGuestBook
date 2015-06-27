<?php


/**
 * Messages
 *
 * @Table(name="messages")
 * @Entity
 * @HasLifecycleCallbacks
 */
class Messages
{
    /**
     * @var integer
     *
     * @Id
     * @Column(name="message_id", type="integer")
     * @GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var \DateTime
     *
     * @Column(name="added", type="datetime", nullable=true)
     */
    protected $added;

    /**
     * @var \DateTime
     *
     * @Column(name="update_message", type="datetime", nullable=true)
     */
    protected $updateMessage;

    /**
     *
     * @var type string
     * 
     * @Column(name="user_message", type="string", nullable=false)
     */
    protected $message;

    /**
     *
     * @var type string
     * 
     * @Column(name="user", type="string", nullable=false)
     */
    protected $user;
    
    /**
     *
     * @var type string
     * 
     * @Column(name="media", type="string", nullable=true)
     */
    protected $media;


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
     * Set added
     *
     * @param \DateTime $added
     *
     * @return Messages
     */
    public function setAdded($added)
    {
        $this->added = $added;

        return $this;
    }

    /**
     * Get added
     *
     * @return \DateTime
     */
    public function getAdded()
    {
        return $this->added;
    }

    /**
     * Set update
     *
     * @param \DateTime $update
     *
     * @return Messages
     */
    public function setUpdate($update)
    {
        $this->update = $update;

        return $this;
    }

    /**
     * Get update
     *
     * @return \DateTime
     */
    public function getUpdate()
    {
        return $this->update;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return Messages
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set user
     *
     * @param string $user
     *
     * @return Messages
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }
    
     /**
     * Set media
     *
     * @param string $media
     *
     * @return Messages
     */
    public function setMedia($media)
    {
        $this->media = $media;

        return $this;
    }

    /**
     * Get media
     *
     * @return string
     */
    public function getMedia()
    {
        return $this->media;
    }
    
    /**
     * @PrePersist
     */
    public function setUpTimeOnPrePersist() {
        $this->added = new \DateTime("now");
    }
    
    /**
     * @PreUpdate
     */
    public function setUpTimeOnPreUpdate() {
        $this->updateMessage = new \DateTime("now");
    }
    
    function __toString() {
        return $this->getAdded();
    }
}

