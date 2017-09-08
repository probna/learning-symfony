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

        $flightRepository = $this->getService('aviation.repository.flights');

        if (null !== $airports) {
            foreach ($airports as $airport) {
                $departingFlights = $flightRepository->findByDepartureAirport($airport);
                $arrivingFlights  = $flightRepository->findByArrivalAirport($airport);

                foreach ($departingFlights as $departingFlight) {
                    $this->delete($departingFlight);
                }

                foreach ($arrivingFlights as $arrivingFlight) {
                    $this->delete($arrivingFlight);
                }
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
        $roleLevel = $username === 'admin_tester' ? 'ROLE_ADMIN' : 'ROLE_USER';

        $driver = $this->getSession()->getDriver();
        if (!$driver instanceof BrowserKitDriver) {
            throw new UnsupportedDriverActionException('This step is only supported by the BrowserKitDriver');
        }

        $client = $driver->getClient();
        $client->getCookieJar()->set(new Cookie(session_name(), true));

        $session = $client->getContainer()->get('session');

        $providerKey = $this->kernel->getContainer()->getParameter('fos_user.firewall_name');

        $token = new UsernamePasswordToken($user, null, $providerKey, [$roleLevel]);
        $session->set('_security_'.$providerKey, serialize($token));
        $session->save();

        $cookie = new Cookie($session->getName(), $session->getId());
        $client->getCookieJar()->set($cookie);
    }

    private function handleTestUser($username)
    {

        $userManager = $this->getContainer()->get('fos_user.user_manager');
        $user        = $userManager->findUserByUsername($username);

        if ($user !== null) {
            return $user;
        }

        $user        = $userManager->createUser();
        $user->setUsername($username);
        $user->setEmail("{$username}@email.com");
        $user->setEmailCanonical("{$username}@email.com");
        $user->setEnabled(1);
        $user->setPlainPassword('12345');

    }

    public static function teardown()
    {
        $kernel = new \AppKernel('test', true);
        $kernel->boot();

        $userManager = $kernel->getContainer()->get('fos_user.user_manager');

        $admin_tester = $userManager->findUserByUsername('admin_tester');
        $user_tester  = $userManager->findUserByUsername('user_tester');

        $userManager->deleteUser($admin_tester);
        $userManager->deleteUser($user_tester);
    }

    /**
     * @Given there is no user with username :username
     */
    public function thereIsNoUserWithUsername($username)
    {
        $userManager = $this->getContainer()->get('fos_user.user_manager');

        $user = $userManager->findUserByUsername($username);

        if (null !== $user) {
            $userManager->deleteUser($user);
        }
    }
}
