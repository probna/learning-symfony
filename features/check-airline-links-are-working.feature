Feature: Check airline links are working
  In order to check that the airline links are working
  As an ordinary visitor
  I need to click on links related to airlines

  Scenario: Check that airlines list page actions work
    Given I am on "/airlines/"
    When I click "show"
    Then I should see "Airline"
    And the url should match "[airlines\/\d+]"


