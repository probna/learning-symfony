<?php


namespace Aviation\AirlinesBundle\Service;


use Aviation\AirlinesBundle\Entity\Airport;
use Aviation\AirlinesBundle\Repository\AirportRepository;
use Aviation\AirlinesBundle\Repository\FlightRepository;

/**
 * Class FlightSearch
 *
 * @package Aviation\AirlinesBundle\Service
 */
class FlightSearch {
    /**
     * @var \Aviation\AirlinesBundle\Repository\AirportRepository;
     */
    private $airportRepository;
    /**
     * @var \Aviation\AirlinesBundle\Repository\FlightRepository;
     */
    private $flightRepository;


    /**
     * FlightSearch constructor.
     *
     * @param \Aviation\AirlinesBundle\Repository\AirportRepository $airportRepository
     * @param \Aviation\AirlinesBundle\Repository\FlightRepository $flightRepository
     */
    public function __construct(AirportRepository $airportRepository, FlightRepository $flightRepository)
    {

        $this->airportRepository = $airportRepository;
        $this->flightRepository = $flightRepository;
    }

    /**
     * @param \Aviation\AirlinesBundle\Entity\Airport $departureAirport
     * @param \Aviation\AirlinesBundle\Entity\Airport $destinationAirport
     * @param \DateTime $flightDate
     *
     * @return array
     */
    public function getFlightsBetweenAirportsOn(Airport $departureAirport, Airport $destinationAirport, \DateTime
    $flightDate): array
    {
        $flights = $this->flightRepository->findBy([
            'departureAirport' => $departureAirport,
            'arrivalAirport' => $destinationAirport
        ]);
        return $flights;
    }
}