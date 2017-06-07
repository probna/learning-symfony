Feature: Basic site check
	In order to see that site works
	As a user
	I need to check few pages around

  Scenario: Check that homepage works
    Given I am on "/"
    When I click "Home"
    Then I should see "Find your flight here"
    And I should be on "/"

