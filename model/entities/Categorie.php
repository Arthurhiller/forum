<?php

namespace Model\Entities;

use App\Entity;

final class Categorie extends Entity {

    private $id;
    private $title;

    public function __construct($data)
    {
        $this->hydrate($data);
    }

    /**
     * Get the value of id categorie
     *
     * @return void
     */
    public function getId() {
        
        return $this->id;
    }

    /**
     * Set the value of id categorie
     *
     * @param [int] $id
     * @return void
     */
    public function setId($id) {

        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title categorie
     *
     * @return void
     */
    public function getTitle() {

        return $this->title;
    }

    /**
     * Set the value of title categorie
     *
     * @return void
     */
    public function SetTitle($title) {

        $this->title = $title;

        return $this;
    }

}