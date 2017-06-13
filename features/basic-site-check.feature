Feature: Basic site check
	In order to see that site works
	As a user
	I need to check few pages around

  Scenario: Check that homepage works
    Given I am on "/"
    When I click "Home"
    Then I should see "Find your flight here"
    And I should be on "/"

  Scenario: Check that flights list page is accessible
    Given I am on "/"
    When I click "Flights"
    Then I should see "Flights list"
    And I should be on "/flight/"

  Scenario: Check that airlines list page is accessible
    Given I am on "/"
    When I click "Airlines"
    Then I should see "Airlines list"
    And I should be on "/airlines/"

  Scenario: Check that airports list page is accessible
    Given I am on "/"
    When I click "Airports"
    Then I should see "Airports list"
    And I should be on "/airport/"

  Scenario: Check that countries list page is accessible
    Given I am on "/"
    When I click "Countries"
    Then I should see "Countries list"
    And I should be on "/country/"
