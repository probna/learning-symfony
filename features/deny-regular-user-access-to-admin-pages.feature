Feature: Deny regular users access to admin pages
  In order to prevent unauthorised data manipulation
  As a regular user with no admin privileges
  I need to be denied access to admin pages

  Scenario: Ordinary visitors get denied access when trying to create a new airport
    Given I am authenticated as "user_tester"
    When I visit "/airport/new"
    Then I should be on "/airport/new"
    And I should see text matching "Access Denied."
    And I should see text matching "403 Forbidden"

  Scenario: Ordinary visitors get denied access when trying to edit an airport record
    Given I am authenticated as "user_tester"
    When I visit "/airport/1/edit"
    Then I should be on "/airport/1/edit"
    And I should see text matching "Access Denied."
    And I should see text matching "403 Forbidden"

  Scenario: Ordinary visitors get denied access when trying to create a new airline
    Given I am authenticated as "user_tester"
    When I visit "/airlines/new"
    Then I should be on "/airlines/new"
    And I should see text matching "Access Denied."
    And I should see text matching "403 Forbidden"

  Scenario: Ordinary visitors get denied access when trying to edit an airline record
    Given I am authenticated as "user_tester"
    When I visit "/airlines/1/edit"
    Then I should be on "/airlines/1/edit"
    And I should see text matching "Access Denied."
    And I should see text matching "403 Forbidden"

  Scenario: Ordinary visitors get denied access when trying to create a new flight
    Given I am authenticated as "user_tester"
    When I visit "/flight/new"
    Then I should be on "/flight/new"
    And I should see text matching "Access Denied."
    And I should see text matching "403 Forbidden"

  Scenario: Ordinary visitors get denied access when trying to edit a flight record
    Given I am authenticated as "user_tester"
    When I visit "/flight/1/edit"
    Then I should be on "/flight/1/edit"
    And I should see text matching "Access Denied."
    And I should see text matching "403 Forbidden"
