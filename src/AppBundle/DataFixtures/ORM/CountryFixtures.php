<?php

declare(strict_types=1);

namespace AppBundle\DataFixtures\ORM;

use Aviation\CountryBundle\Entity\Country;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class CountryFixtures extends AbstractFixture implements OrderedFixtureInterface
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

        $deutschland = new Country();
        $deutschland->setCountryName('Deutschland');
        $deutschland->setCountryCode('DE');

        $manager->persist($deutschland);

        $italy = new Country();
        $italy->setCountryName('Italy');
        $italy->setCountryCode('IT');

        $manager->persist($italy);

        $manager->flush();

        $this->addReference('country_croatia', $croatia);
        $this->addReference('country_deutschland', $deutschland);
        $this->addReference('country_italy', $italy);
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 10;
    }
}
