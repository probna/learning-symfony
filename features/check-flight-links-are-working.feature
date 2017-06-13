Feature: Check flight links are working
  In order to check that the flight links are working
  As a user
  I need to click on links related to flights

  Scenario: Check that flights list page actions work
    Given I am on "/flight/"
    When I click "show"
    Then I should see "Flight"
    And I should be on "/flight/1"

  Scenario: Check that flight edit page works
    Given I am on "/flight/1"
    When I visit "/flight/1/edit"
    Then I should see "Flight edit"
    And I should be on "/flight/1/edit"

