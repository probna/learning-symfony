<?php

namespace Resources\Behat;

use Behat\MinkExtension\Context\MinkContext;
use Behat\Symfony2Extension\Context\KernelAwareContext;

/**
 * Behat context class.
 */
class WebContext extends MinkContext implements KernelAwareContext
{
    use Symfony2Trait;

    /**
     * @When I click :text
     */
    public function iClick(string $text)
    {
        $this->clickLink($text);
    }

    /**
     * @When I visit :url
     */
    public function iVisit(string $url)
    {
        $this->visit($url);
    }

    /**
     * @Given there is no airport named :airportName
     */
    public function thereIsNoAirportNamed(string $airportName)
    {
        $airportRepository = $this->getService('aviation.repository.airports');
        $airports          = $airportRepository->findByName($airportName);

        if (null !== $airports) {
            $em = $this->getEntityManager();

            foreach ($airports as $airport) {
                $this->delete($airport);
            }
        }
    }
}
