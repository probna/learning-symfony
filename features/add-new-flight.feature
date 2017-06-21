Feature: Add new flight
	In order to see flights
	As a airport employee
	I need to add flight

  Scenario: There is a link to add new flight on flight page
    Given I am on "/flight/"
    When I click "Create a new flight"
    Then I should see "Flight creation"


  Scenario: Add new flight
    Given I am on "/flight/new"
    When I fill in "aviation_airlinesbundle_flight[flightNumber]" with "123"
    And I fill in "aviation_airlinesbundle_flight[flightCode]" with "B234"
    And I select "2015" from "aviation_airlinesbundle_flight[arrivalTime][date][year]"
    And I select "Lufthansa" from "aviation_airlinesbundle_flight[airline]"
    And I select "Pleso" from "aviation_airlinesbundle_flight[departureAirport]"
    And I select "Split" from "aviation_airlinesbundle_flight[arrivalAirport]"
    And I press "Create"
    Then I should be on "/flight/1"

