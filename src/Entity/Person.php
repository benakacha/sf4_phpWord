<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ApiResource
 */
class Person
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column
     * @ApiProperty(iri="http://schema.org/name")
     */
    public $name;

    /**
     * @var Greeting[]
     *
     * @ORM\OneToMany(targetEntity="Greeting", mappedBy="person", cascade={"persist"})
     */
    public $greetings;

    public function __construct()
    {
        $this->greetings = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function addGreeting(Greeting $greeting)
    {
        $greeting->person = $this;
        $this->greetings->add($greeting);
    }

    public function removeGreeting(Greeting $greeting)
    {
        $greeting->person = null;
        $this->greetings->removeElement($greeting);
    }
}