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
     * @var \Aviation\AirlinesBundle\Entity\Airport
     *
     */
    private $departureAirport;



    /**
     * @var \Aviation\AirlinesBundle\Entity\Airport
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
     * @param \Aviation\AirlinesBundle\Entity\Airport $departureAirport
     */
    public function setDepartureAirport(\Aviation\AirlinesBundle\Entity\Airport $departureAirport)
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
     * @param \Aviation\AirlinesBundle\Entity\Airport $arrivalAirport
     */
    public function setArrivalAirport(\Aviation\AirlinesBundle\Entity\Airport $arrivalAirport)
    {
        $this->arrivalAirport = $arrivalAirport;
    }


    /**
     *
     * @Assert\IsTrue(message="Departure and destination airports cannot be the same.")
     */
    public function isDepartureAirportSameAsDestination(){
        if ($this->arrivalAirport !== $this->departureAirport){
            return true;
        }
        return false;
    }


}

