<?php

declare(strict_types=1);

namespace AppBundle\DataFixtures\ORM;

use Aviation\AirlinesBundle\Entity\Airline;
use Aviation\AirlinesBundle\Entity\Airport;
use Aviation\CountryBundle\Entity\Country;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class EmptyFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $croatia = new Country();
        $croatia->setCountryName('Croatia');
        $croatia->setCountryCode('HR');

        $manager->persist($croatia);

        $lufthansa = new Airline();
        $lufthansa->setName('Luthansa');
        $lufthansa->setCountry($croatia);

        $manager->persist($lufthansa);

        $pleso = new Airport();
        $pleso->setCountry($croatia);
        $pleso->setName('Pleso');
        $pleso->setLocation('GPS');

        $manager->persist($pleso);

        $split = new Airport();
        $split->setCountry($croatia);
        $split->setName('Split');
        $split->setLocation('GPS');

        $manager->persist($split);

        //$obj = new \stdClass();
        //$manager->persist($obj);

        $manager->flush();
        //$this->addReference('obj', $obj);
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 10;
    }
}
