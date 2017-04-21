<?php

namespace TwoESystems\AirlinesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Airline
 *
 * @ORM\Table(name="airline")
 * @ORM\Entity(repositoryClass="TwoESystems\AirlinesBundle\Repository\AirlineRepository")
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
    private $name;

    /**
     * @var int
     *
     * Many Airlines have One Country.
     * @ORM\ManyToOne(targetEntity="Country", inversedBy="Airline")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     *
     */
    private $country_id;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Airline
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set country
     *
     * @param integer $country_id
     *
     * @return Airline
     */
    public function setCountryId($country_id)
    {
        $this->country_id = $country_id;

        return $this;
    }

    /**
     * Get country
     *
     * @return int
     */
    public function getCountryId()
    {
        return $this->country_id;
    }
}

