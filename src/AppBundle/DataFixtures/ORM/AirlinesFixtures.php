<?php


declare(strict_types=1);

namespace AppBundle\DataFixtures\ORM;

use Aviation\AirlinesBundle\Entity\Airline;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class AirlinesFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $croatiaAirlines = new Airline();
        $croatiaAirlines->setName('Croatia Airlines');
        $croatiaAirlines->setCountry($this->getReference('country_croatia'));

        $manager->persist($croatiaAirlines);

        $deutscheZeppelin = new Airline();
        $deutscheZeppelin->setName('Deutsche Zeppelin Reederei');
        $deutscheZeppelin->setCountry($this->getReference('country_deutschland'));

        $manager->persist($deutscheZeppelin);

        $lufthansa = new Airline();
        $lufthansa->setName('Lufthansa');
        $lufthansa->setCountry($this->getReference('country_deutschland'));

        $manager->persist($lufthansa);

        $alitalia = new Airline();
        $alitalia->setName('Alitalia');
        $alitalia->setCountry($this->getReference('country_italy'));

        $manager->persist($alitalia);

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
