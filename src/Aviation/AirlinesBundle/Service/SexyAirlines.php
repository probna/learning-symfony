<?php

namespace Aviation\AirlinesBundle\Service;

use Aviation\AirlinesBundle\Repository\AirlineRepository;
use Aviation\CountryBundle\Entity\Country;

class SexyAirlines
{
    /**
     * @var \Aviation\AirlinesBundle\Repository\AirlineRepository
     */
    private $airlineRepository;
    /**
     * @var int
     */
    private $limit;

    /**
     * SexyAirlines constructor.
     *
     * @param \Aviation\AirlinesBundle\Repository\AirlineRepository $airlineRepository
     * @param int                                                   $limit
     */
    public function __construct(AirlineRepository $airlineRepository, int $limit)
    {
        $this->airlineRepository = $airlineRepository;
        $this->limit             = $limit;
    }

    /**
     * @param \Aviation\CountryBundle\Entity\Country $country
     *
     * @return array
     */
    public function getAirlinesByCountry(Country $country): array
    {
        $airlines = $this->airlineRepository->getAllByCountry($country, $this->limit);

        return $airlines;
    }
}
