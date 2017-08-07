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

        $user = $this->kernel->getContainer()->get('fos_user.user_manager')->findUserByUsername($username);

        $providerKey = $this->kernel->getContainer()->getParameter('fos_user.firewall_name');

        $token = new UsernamePasswordToken($user, null, $providerKey, [$roleLevel]);
        $session->set('_security_'.$providerKey, serialize($token));
        $session->save();

        $cookie = new Cookie($session->getName(), $session->getId());
        $client->getCookieJar()->set($cookie);
    }

    /**
     * @BeforeSuite
     */
    public static function setup()
    {
        $kernel = new \AppKernel('test', true);
        $kernel->boot();

        $userManager = $kernel->getContainer()->get('fos_user.user_manager');

        $admin_tester        = $userManager->createUser();
        $admin_tester->setUsername('admin_tester');
        $admin_tester->setEmail('admin_tester@email.com');
        $admin_tester->setEmailCanonical('admin_tester@email.com');
        $admin_tester->setEnabled(1);
        $admin_tester->setPlainPassword('12345');

        $user_tester        = $userManager->createUser();
        $user_tester->setUsername('user_tester');
        $user_tester->setEmail('user_tester@email.com');
        $user_tester->setEmailCanonical('user_tester@email.com');
        $user_tester->setEnabled(1);
        $user_tester->setPlainPassword('12345');

        $userManager->updateUser($user_tester);
        $userManager->updateUser($admin_tester);
    }

    /** @AfterSuite */
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
}
