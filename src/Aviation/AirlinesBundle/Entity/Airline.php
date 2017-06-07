<?php

namespace Aviation\AirlinesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Airline.
 *
 * @ORM\Table(name="airline")
 * @ORM\Entity(repositoryClass="Aviation\AirlinesBundle\Repository\AirlineRepository")
 */
class Airline
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $title;

    /**
     * @var \Aviation\AirlinesBundle\Entity\Country
     *
     * Many Airlines have One Country
     * @ORM\ManyToOne(targetEntity="Country")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     */
    private $country;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Airline
     */
    public function setName($name)
    {
        $this->title = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->title;
    }

    /**
     * Set country.
     *
     * @param int $country_id
     *
     * @return Airline
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country.
     *
     * @return \Aviation\AirlinesBundle\Entity\Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    public function __toString()
    {
        return $this->title;
    }
}
