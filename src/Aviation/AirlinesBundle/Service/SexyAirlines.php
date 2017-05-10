<?php


namespace Aviation\AirlinesBundle\Service;


use Aviation\AirlinesBundle\Repository\AirlineRepository;
use Aviation\AirlinesBundle\Repository\CountryRepository;

class SexyAirlines {
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
     */
    public function __construct(CountryRepository $countryRepository, AirlineRepository $airlineRepository, int $limit)
    {

        $this->countryRepository = $countryRepository;
        $this->airlineRepository = $airlineRepository;
        $this->limit = $limit;
    }

    public function blablabla(string $countryID)
    {
        $country = $this->countryRepository->find($countryID);

        $airlines = $this->airlineRepository->getAllByCountry($country, $this->limit);
        return $airlines;
    }
}