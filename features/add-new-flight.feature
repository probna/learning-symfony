Feature: Add new flight
	In order to see flights
	As an airport employee
	I need to add flight

  Scenario: There is a link to add new flight on flight page
    Given I am authenticated as "admin_user"
    And I am on "/flight/"
    When I click "Create a new flight"
    Then I should see "Flight creation"


  Scenario: Add new flight
    Given I am authenticated as "admin_user"
    And I am on "/flight/new"
    And there is no flight with flight number "123"
    When I fill in "aviation_airlinesbundle_flight[flightNumber]" with "123"
    And I fill in "aviation_airlinesbundle_flight[flightCode]" with "B234"
    And I select "2015" from "aviation_airlinesbundle_flight[arrivalTime][date][year]"
    And I select "Lufthansa" from "aviation_airlinesbundle_flight[airline]"
    And I select "Pleso" from "aviation_airlinesbundle_flight[departureAirport]"
    And I select "Split" from "aviation_airlinesbundle_flight[arrivalAirport]"
    And I press "Create"
    Then the url should match "[flight\/\d+]"

