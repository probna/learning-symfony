Feature: Register new user
  In order to be able to use the site fully
  As an ordinary visitor
  I need to be able to register with the site

  Scenario: As an ordinary visitor, I should be able to register with the site
    Given I am on "/register/"
    When I fill in "fos_user_registration_form[email]" with "hcs@omot.com"
    And I fill in "fos_user_registration_form[username]" with "tomo.omot"
    And I fill in "fos_user_registration_form[plainPassword][first]" with "12345"
    And I fill in "fos_user_registration_form[plainPassword][second]" with "12345"
    And I press "Registracija"
    Then I should be on "/register/confirmed"
    And I should see text matching "Pozdrav tomo.omot, vaš korisnički račun je sada aktiviran."
