Feature: Check country links are working
  In order to check that the country links are working
  As a user
  I need to click on links related to countries

  Scenario: Check that countries list page actions work
    Given I am on "/country/"
    When I click "show"
    Then I should see "Country"
    And I should be on "/country/1"


