<?php

namespace Aviation\AirlinesBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * FlightSearch
 *
 */
class FlightSearch {


    /**
     * @var \DateTime
     *
     */
    private $date;

    /**
     * @var Airport
     *
     */
    private $departureAirport;


    /**
     * @var Airport
     *
     */
    private $arrivalAirport;

    /**
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
    }

    /**
     */
    public function getDepartureAirport()
    {
        return $this->departureAirport;
    }

    /**
     * @param Airport $departureAirport
     */
    public function setDepartureAirport(Airport $departureAirport)
    {
        $this->departureAirport = $departureAirport;
    }

    /**
     */
    public function getArrivalAirport()
    {
        return $this->arrivalAirport;
    }

    /**
     * @param Airport $arrivalAirport
     */
    public function setArrivalAirport(Airport $arrivalAirport)
    {
        $this->arrivalAirport = $arrivalAirport;
    }


    /**
     *
     * @Assert\IsTrue(message="Departure and destination airports cannot be the same.")
     */
    public function isDepartureAirportSameAsDestination(): bool
    {
        return $this->arrivalAirport !== $this->departureAirport;
    }


}

