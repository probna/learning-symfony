<?php

namespace Aviation\AirlinesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Flight
 *
 * @ORM\Table(name="flight")
 * @ORM\Entity(repositoryClass="Aviation\AirlinesBundle\Repository\FlightRepository")
 */
class Flight {
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="flightNumber", type="integer")
     */
    private $flightNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="flightCode", type="string", length=255)
     */
    private $flightCode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="departureTime", type="datetime")
     */
    private $departureTime;

    /**
     * @var \Aviation\AirlinesBundle\Entity\Airport
     *
     * @ORM\ManyToOne(targetEntity="Aviation\AirlinesBundle\Entity\Airport")
     *
     * @ORM\JoinColumn(name="departureAirport", referencedColumnName="id")
     */
    private $departureAirport;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="arrivalTime", type="datetime")
     */
    private $arrivalTime;

    /**
     * @var \Aviation\AirlinesBundle\Entity\Airport
     *
     * @ORM\ManyToOne(targetEntity="Aviation\AirlinesBundle\Entity\Airport")
     *
     * @ORM\JoinColumn(name="arrivalAirport", referencedColumnName="id")
     */
    private $arrivalAirport;

    /**
     * @var \Aviation\AirlinesBundle\Entity\Airline
     * @ORM\ManyToOne(targetEntity="Aviation\AirlinesBundle\Entity\Airline")
     *
     * @ORM\JoinColumn(name="airline", referencedColumnName="id")
     */
    private $airline;


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
     * Set flightNumber
     *
     * @param integer $flightNumber
     *
     * @return Flight
     */
    public function setFlightNumber($flightNumber)
    {
        $this->flightNumber = $flightNumber;

        return $this;
    }

    /**
     * Get flightNumber
     *
     * @return int
     */
    public function getFlightNumber()
    {
        return $this->flightNumber;
    }

    /**
     * Set flightCode
     *
     * @param string $flightCode
     *
     * @return Flight
     */
    public function setFlightCode($flightCode)
    {
        $this->flightCode = $flightCode;

        return $this;
    }

    /**
     * Get flightCode
     *
     * @return string
     */
    public function getFlightCode()
    {
        return $this->flightCode;
    }

    /**
     * Set departureTime
     *
     * @param \DateTime $departureTime
     *
     * @return Flight
     */
    public function setDepartureTime($departureTime)
    {
        $this->departureTime = $departureTime;

        return $this;
    }

    /**
     * Get departureTime
     *
     * @return \DateTime
     */
    public function getDepartureTime()
    {
        return $this->departureTime;
    }

    /**
     * Set departureAirport
     *
     * @param integer $departureAirport
     *
     * @return Flight
     */
    public function setDepartureAirport($departureAirport)
    {
        $this->departureAirport = $departureAirport;

        return $this;
    }

    /**
     * Get departureAirport
     *
     * @return int
     */
    public function getDepartureAirport()
    {
        return $this->departureAirport;
    }

    /**
     * Set arrivalTime
     *
     * @param \DateTime $arrivalTime
     *
     * @return Flight
     */
    public function setArrivalTime($arrivalTime)
    {
        $this->arrivalTime = $arrivalTime;

        return $this;
    }

    /**
     * Get arrivalTime
     *
     * @return \DateTime
     */
    public function getArrivalTime()
    {
        return $this->arrivalTime;
    }

    /**
     * Set arrivalAirport
     *
     * @param integer $arrivalAirport
     *
     * @return Flight
     */
    public function setArrivalAirport($arrivalAirport)
    {
        $this->arrivalAirport = $arrivalAirport;

        return $this;
    }

    /**
     * Get arrivalAirport
     *
     * @return int
     */
    public function getArrivalAirport()
    {
        return $this->arrivalAirport;
    }

    /**
     * Set airline
     *
     * @param integer $airline
     *
     * @return Flight
     */
    public function setAirline($airline)
    {
        $this->airline = $airline;

        return $this;
    }

    /**
     * Get airline
     *
     * @return int
     */
    public function getAirline()
    {
        return $this->airline;
    }
}

