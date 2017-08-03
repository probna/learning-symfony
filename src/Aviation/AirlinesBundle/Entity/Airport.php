<?php

namespace Aviation\AirlinesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Airport.
 *
 * @ORM\Table(name="airport")
 * @ORM\Entity(repositoryClass="Aviation\AirlinesBundle\Repository\AirportRepository")
 */
class Airport
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\OneToMany(targetEntity="Aviation\AirlinesBundle\Entity\Flight", mappedBy="departureAirport, arrivalAirport")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var \Aviation\CountryBundle\Entity\Country
     *
     * @ORM\ManyToOne(targetEntity="Aviation\CountryBundle\Entity\Country")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255)
     */
    private $location;

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
     * @return Airport
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set Country.
     *
     * @param int $countryId
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get countryId.
     *
     * @return int
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set location.
     *
     * @param string $location
     *
     * @return Airport
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location.
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Return Airport name.
     */
    public function __toString(): string
    {
        return $this->name;
    }
}
