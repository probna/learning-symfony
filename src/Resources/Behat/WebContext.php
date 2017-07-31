<?php

namespace Resources\Behat;

use Behat\Mink\Driver\BrowserKitDriver;
use Behat\MinkExtension\Context\MinkContext;
use Behat\Symfony2Extension\Context\KernelAwareContext;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

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

    /**
     * @Given there is no airline named :airlineName
     */
    public function thereIsNoAirlineNamed(string $airlineName)
    {
        $airlineRepository = $this->getService('aviation.repository.airlines');
        $airlines          = $airlineRepository->findByTitle($airlineName);

        if (null !== $airlines) {
            foreach ($airlines as $airline) {
                $this->delete($airline);
            }
        }
    }

    /**
     * @Given there is no flight with flight number :flightNumber
     */
    public function thereIsNoFlightWithFlightNumber(string $flightNumber)
    {
        $flightRepository = $this->getService('aviation.repository.flights');
        $flights          = $flightRepository->findByflightNumber($flightNumber);

        if (null !== $flights) {
            $em = $this->getEntityManager();

            foreach ($flights as $flight) {
                $this->delete($flight);
            }
        }
    }

    /**
     * @Given /^I am authenticated as "([^"]*)"$/
     */
    public function iAmAuthenticatedAs($username)
    {
        $driver = $this->getSession()->getDriver();
        if (!$driver instanceof BrowserKitDriver) {
            throw new UnsupportedDriverActionException('This step is only supported by the BrowserKitDriver');
        }

        $client = $driver->getClient();
        $client->getCookieJar()->set(new Cookie(session_name(), true));

        $session = $client->getContainer()->get('session');

        $user        = $this->kernel->getContainer()->get('fos_user.user_manager')->findUserByUsername($username);
        $providerKey = $this->kernel->getContainer()->getParameter('fos_user.firewall_name');

        $token = new UsernamePasswordToken($user, null, $providerKey, $user->getRoles());
        $session->set('_security_'.$providerKey, serialize($token));
        $session->save();

        $cookie = new Cookie($session->getName(), $session->getId());
        $client->getCookieJar()->set($cookie);
    }
}
