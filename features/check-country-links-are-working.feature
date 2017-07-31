Feature: Check country links are working
  In order to check that the country links are working
  As a regular user with no admin privileges
  I need to click on links related to countries

  Scenario: Check that countries list page actions work
    Given I am authenticated as "regular_user"
    And I am on "/country/"
    When I click "show"
    Then I should see "Country"
    And the url should match "[country\/\d+]"


