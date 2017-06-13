Feature: Check airline links are working
  In order to check that the airline links are working
  As a user
  I need to click on links related to airlines



  Scenario: Check that airlines list page actions work
    Given I am on "/airlines/"
    When I click "show"
    Then I should see "Airline"
    And I should be on "/airlines/1"

  Scenario: Check that airline edit page works
    Given I am on "/airlines/1"
    When I visit "/airlines/1/edit"
    Then I should see "Airline edit"
    And I should be on "/airlines/1/edit"


