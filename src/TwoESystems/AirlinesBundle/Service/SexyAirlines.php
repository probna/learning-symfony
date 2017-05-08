<?php


namespace TwoESystems\AirlinesBundle\Service;


use TwoESystems\AirlinesBundle\Repository\AirlineRepository;
use TwoESystems\AirlinesBundle\Repository\CountryRepository;

class SexyAirlines {
    /**
     * @var \TwoESystems\AirlinesBundle\Repository\CountryRepository
     */
    private $countryRepository;
    /**
     * @var \TwoESystems\AirlinesBundle\Repository\AirlineRepository
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