<?php

namespace Model\Entities;

use App\Entity;

final class User extends Entity {

    private $id;
    private $pseudonyme;
    private $email;
    private $password;
    private $role;
    private $registerdate;
    private $status;

    public function __construct($data)
    {
        $this->hydrate($data);
    }

    /**
     * Get the value of ID user
     *
     * @return void
     */
    public function getId() {

        return $this->id;
    }

    /**
     * Set the value of ID user
     *
     * @return void
     */
    public function setId($id) {

        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of pseudonyme user
     *
     * @return void
     */
    public function getPseudonyme() {

        return $this->pseudonyme;
    }

    /**
     * Set the value of pseudonyme user
     *
     * @return void
     */
    public function setPseudonyme($pseudonyme) {

        $this->pseudonyme = $pseudonyme;

        return $this;
    }

    /**
     * Get the value of email user
     *
     * @return void
     */
    public function getEmail() {

        return $this->email;
    }

    /**
     * Set the value of email user
     *
     * @return void
     */
    public function setEmail($email) {

        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password user
     *
     * @return void
     */
    public function getPassword() {

        return $this->password;
 
    }

    /**
     * Set the value of password user
     *
     * @return void
     */
    public function setPassword($password) {

        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of role user
     *
     * @return void
     */
    public function getRole() {

        return $this->role;

        // Garrantie que tous les user obtienne le Role User
        // $role[] = 'ROLE_USER';

        // return array_unique($role);

    }

    /**
     * Set the value of role user
     *
     * @return void
     */
    public function setRole($role) {

        $this->role = $role;

        return $this;
    }

    /**
     * Get the value of registerdate user
     *
     * @return void
     */
    public function getRegisterdate() {

        $formattedDate = $this->creationdate->format("d/m/Y, H:i:s");

        return $formattedDate;
    }

    /**
     * Set the value of creationdate user
     *
     * @return void
     */
    public function setRegisterdate($date) {

        $this->creationdate = new \DateTime($date);

        return $this;
    }

    public function getStatus() {

        return $this->status;
    }


    public function setStatus($status) {

        $this->status = $status;

        return $this;
    }


}