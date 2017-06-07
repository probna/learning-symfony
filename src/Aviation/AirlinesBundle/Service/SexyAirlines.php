<?php

namespace Aviation\AirlinesBundle\Service;

use Aviation\AirlinesBundle\Repository\AirlineRepository;
use Aviation\AirlinesBundle\Repository\CountryRepository;

class SexyAirlines
{
    /**
     * @var \Aviation\AirlinesBundle\Repository\CountryRepository
     */
    private $countryRepository;
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
     * @param \Aviation\AirlinesBundle\Repository\CountryRepository $countryRepository
     * @param \Aviation\AirlinesBundle\Repository\AirlineRepository $airlineRepository
     * @param int                                                   $limit
     */
    public function __construct(CountryRepository $countryRepository, AirlineRepository $airlineRepository, int $limit)
    {
        $this->countryRepository = $countryRepository;
        $this->airlineRepository = $airlineRepository;
        $this->limit             = $limit;
    }

    /**
     * @param string $countryID
     *
     * @return array
     */
    public function getAirlinesByCountry(string $countryID): array
    {
        $country = $this->countryRepository->find($countryID);

        $airlines = $this->airlineRepository->getAllByCountry($country, $this->limit);

        return $airlines;
    }
}
