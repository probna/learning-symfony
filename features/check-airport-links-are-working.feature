Feature: Check airport links are working
  In order to check that the airport links are working
  As an ordinary visitor
  I need to click on links related to airports

  Scenario: Check that airports list page actions work
    Given I am on "/airport/"
    When I click "show"
    Then I should see "Airport"
    And the url should match "[airport\/\d+]"

