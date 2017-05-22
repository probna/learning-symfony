<?php


namespace Aviation\AirlinesBundle\Service;


use Aviation\AirlinesBundle\Entity\Airport;
use Aviation\AirlinesBundle\Repository\AirportRepository;
use Aviation\AirlinesBundle\Repository\FlightRepository;

/**
 * Class FlightsService
 *
 * @package Aviation\AirlinesBundle\Service
 */
class FlightsService {
    /**
     * @var \Aviation\AirlinesBundle\Repository\AirportRepository;
     */
    private $airportRepository;
    /**
     * @var \Aviation\AirlinesBundle\Repository\FlightRepository;
     */
    private $flightRepository;


    /**
     * FlightsService constructor.
     *
     * @param \Aviation\AirlinesBundle\Repository\AirportRepository $airportRepository
     * @param \Aviation\AirlinesBundle\Repository\FlightRepository $flightRepository
     */
    public function __construct(AirportRepository $airportRepository, FlightRepository $flightRepository)
    {

        $this->airportRepository = $airportRepository;
        $this->flightRepository = $flightRepository;
    }

    public function getFlightsBetweenAirportsOn(Airport $formAirport, Airport $toAirport, \DateTime $onDate)
    {
    }
}