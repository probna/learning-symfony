Feature: Show user their profile page
  In order to see my profile page
  As a registered user
  I need to be log in first

  Scenario: As a registered user, I need to log in to see my profile page
    Given I am on "/login"
    And I fill in "_username" with "tomo.omot"
    And I fill in "_password" with "12345"
    And I press "Prijava"
    Then I should be on "/"
    And I visit "/profile"
    Then I should see text matching "Prijavljen kao tomo.omot"
    And I should see text matching "Korisničko ime: tomo.omot"
