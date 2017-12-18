<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource
 * @ORM\Entity
 */
class Greeting
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column
     * @Assert\NotBlank
     * @ApiProperty(iri="http://schema.org/name")
     */
    public $name = '';

    /**
     * @ORM\ManyToOne(targetEntity="Person", inversedBy="greetings")
     */
    public $person;

    public function getId(): ?int
    {
        return $this->id;
    }
}