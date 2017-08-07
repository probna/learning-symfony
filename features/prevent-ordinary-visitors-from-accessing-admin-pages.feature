Feature: Prevent ordinary visitors from accessing admin pages
  In order to prevent unauthorised data manipulation
  As an ordinary visitor
  I need to be denied access to admin pages

  Scenario: Ordinary visitors get denied access when trying to create a new airport
    Given I am on "homepage"
    When I visit "/airport/new"
    Then I should be on "/login"
