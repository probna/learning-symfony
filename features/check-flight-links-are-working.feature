Feature: Check flight links are working
  In order to check that the flight links are working
  As a regular user with no admin privileges
  I need to click on links related to flights

  Scenario: Check that flights list page actions work
    Given I am authenticated as "user_tester"
    And I am on "/flight/"
    When I click "show"
    Then I should see "Flight"
    Then the url should match "[flight\/\d+]"
