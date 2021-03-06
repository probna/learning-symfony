<?php

namespace Aviation\CountryBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Country.
 *
 * @ORM\Table(name="country")
 * @ORM\Entity(repositoryClass="Aviation\CountryBundle\Repository\CountryRepository")
 */
class Country
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
     * @ORM\Column(name="country_code", type="string", length=255, unique=true)
     */
    private $countryCode;

    /**
     * @var string
     *
     * @ORM\Column(name="country_name", type="string", length=255, unique=true)
     */
    private $countryName;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    private $airlines;

    public function __construct()
    {
        $this->airlines = new ArrayCollection();
    }

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
     * Set countryCode.
     *
     * @param string $countryCode
     *
     * @return Country
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * Get countryCode.
     *
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * Set countryName.
     *
     * @param string $countryName
     *
     * @return Country
     */
    public function setCountryName($countryName)
    {
        $this->countryName = $countryName;

        return $this;
    }

    /**
     * Get countryName.
     *
     * @return string
     */
    public function getCountryName()
    {
        return $this->countryName;
    }

    public function __toString()
    {
        return $this->countryName.' ('.$this->getCountryCode().')';
    }

    public function getAirlines()
    {
        return $this->airlines;
    }
}
