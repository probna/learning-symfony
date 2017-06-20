Feature: Add new airport
  In order to see airports
  As an airport employee
  I need to add an airport

  Scenario: There is a link to add new airport on airports page
    Given I am on "/airport/"
    When I click "Create a new airport"
    Then I should see "Airport creation"


  Scenario: Add new airport
    Given there is no airport named "Pleso"
    And I am on "/airport/new"
    When I fill in "aviation_airlinesbundle_airport[name]" with "Pleso"
    And I fill in "aviation_airlinesbundle_airport[location]" with "Pleso Location PL-H311"
    And I select "Croatia (HR)" from "aviation_airlinesbundle_airport[country]"
    And I press "Create"
    And I should see "Pleso Location PL-H311"

