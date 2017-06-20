<?php

declare(strict_types=1);

namespace AppBundle\DataFixtures\ORM;

use Aviation\AirlinesBundle\Entity\Airport;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class AirportFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $FranjoTudmanAirport = new Airport();
        $FranjoTudmanAirport->setCountry($this->getReference('country_croatia'));
        $FranjoTudmanAirport->setName('Franjo Tuđman Airport');
        $FranjoTudmanAirport->setLocation('IATA: ZAG');

        $manager->persist($FranjoTudmanAirport);

        $plesoAirport = new Airport();
        $plesoAirport->setCountry($this->getReference('country_croatia'));
        $plesoAirport->setName('Pleso Airport');
        $plesoAirport->setLocation('IATA: ZAG/Former Pleso');

        $manager->persist($plesoAirport);

        $splitAirport = new Airport();
        $splitAirport->setCountry($this->getReference('country_croatia'));
        $splitAirport->setName('Split Airport');
        $splitAirport->setLocation('IATA: SPU');

        $manager->persist($splitAirport);

        $dubrovnikAirport = new Airport();
        $dubrovnikAirport->setCountry($this->getReference('country_croatia'));
        $dubrovnikAirport->setName('Dubrovnik Airport');
        $dubrovnikAirport->setLocation('IATA: DBV');

        $manager->persist($dubrovnikAirport);

        $frankfurtAMAirport = new Airport();
        $frankfurtAMAirport->setCountry($this->getReference('country_deutschland'));
        $frankfurtAMAirport->setName('Frankfurt Airport');
        $frankfurtAMAirport->setLocation('IATA: FRA');

        $manager->persist($frankfurtAMAirport);

        $leonardoDaVinciAirport = new Airport();
        $leonardoDaVinciAirport->setCountry($this->getReference('country_italy'));
        $leonardoDaVinciAirport->setName('Leonardo da Vinci–Fiumicino Airport');
        $leonardoDaVinciAirport->setLocation('IATA: FCO');

        $manager->persist($leonardoDaVinciAirport);

        $manager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 20;
    }
}
