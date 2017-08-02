Feature: Add new airline
  In order to see airlines
  As an airport employee
  I need to add airline

  Scenario: There is a link to add new airline on airlines page
    Given I am authenticated as "admin_tester"
    And I am on "/airlines/"
    When I click "Create a new airline"
    Then I should see "Airline creation"


  Scenario: Add new airline
    Given I am authenticated as "admin_tester"
    And I am on "/airlines/new"
    And there is no airline named "Flughafen des Hauptstadt"
    When I fill in "aviation_airlinesbundle_airline[name]" with "Flughafen des Hauptstadt"
    And I select "Deutschland" from "aviation_airlinesbundle_airline[country]"
    And I press "Create"
    Then the url should match "[airline\/\d+]"

