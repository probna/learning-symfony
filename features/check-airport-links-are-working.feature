Feature: Check airport links are working
  In order to check that the airport links are working
  As a user
  I need to click on links related to airports

  Scenario: Check that airports list page actions work
    Given I am on "/airport/"
    When I click "show"
    Then I should see "Airport"
    And I should be on "/airport/1"

  Scenario: Check that airport edit page works
    Given I am on "/airport/1"
    When I visit "/airport/1/edit"
    Then I should see "Airport edit"
    And I should be on "/airport/1/edit"

