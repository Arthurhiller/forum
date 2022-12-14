<?php

namespace Model\Entities;

use App\Entity;

final class Post extends Entity {

    private $id;
    private $text;
    private $creationdate;
    private $user;
    private $topic;


    public function __construct($data)
    {
        $this->hydrate($data);
    }

    /**
     * Get the value of idPost post
     *
     * @return void
     */
    public function getId() {

        return $this->id;
    }


    /**
     * Set the value of idPost post
     *
     * @return void
     */
    public function setId($id) {

        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of text post
     *
     * @return void
     */
    public function getText() {

        return $this->text;
    }

    /**
     * Set the value of text post
     *
     * @return void
     */
    public function setText($text) {

        $this->text = $text;

        return $this;
    }

    /**
     * Get the value of creationdate post
     *
     * @return void
     */
    public function getCreationdate() {

        $formattedDate = $this->creationdate->format("d/m/Y, H:i:s");

        return $formattedDate;
    }

    /**
     * Set the value of creationdate post
     *
     * @return void
     */
    public function setCreationdate($date) {

        $this->creationdate = new \DateTime($date);

        return $this;
    }

    /**
     * Get the value of user post
     *
     * @return void
     */
    public function getUser() {

        return $this->user;
    }

    /**
     * Set the value of user post
     *
     * @return void
     */
    public function setUser($user) {

        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of topicId
     * 
     * @return void
     */ 
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * Set the value of topicId
     *
     * @return  void
     */ 
    public function setTopicId($topic)
    {
        $this->topic = $topic;

        return $this;
    }
}