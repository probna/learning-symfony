Feature: Add new airport
  In order to see airports
  As an airport employee
  I need to add an airport

  Scenario: There is a link to add new airport on airports page
    Given I am authenticated as "admin_tester"
    And I am on "/airport/"
    When I click "Create a new airport"
    Then I should see "Airport creation"


  Scenario: Add new airport
    Given I am authenticated as "admin_tester"
    And I am on "/airport/new"
    And there is no airport named "Pleso"
    When I fill in "aviation_airlinesbundle_airport[name]" with "Pleso"
    And I fill in "aviation_airlinesbundle_airport[location]" with "Pleso Location PL-H311"
    And I select "Croatia (HR)" from "aviation_airlinesbundle_airport[country]"
    And I press "Create"
    Then the url should match "[airport\/\d+]"
    And I should see "Pleso Location PL-H311"

