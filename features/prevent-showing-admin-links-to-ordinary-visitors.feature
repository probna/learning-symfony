Feature: Prevent showing admin links to ordinary visitors
  In order to prevent unauthorised data manipulation
  As an ordinary visitor
  I must not see links to admin pages

  Scenario: Ordinary visitors don't see links to edit an airport
    Given I am on the homepage
    When I visit "/airport/"
    Then I should see text matching "Airports list"
    And I should see text matching "Franjo Tuđman Airport"
    And I should not see text matching "edit"