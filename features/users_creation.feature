Feature: Testing
    In  order to access user creation page
    As a administrator
    I want to go to users page and click new user button

    Scenario: Users Page
        Given I am on "/users"
        Then I should see "Users"
        When I follow "New"
        Then I should be on "/users/create"

    Scenario: User Create Page
        Given I create a user "demo" "demo@example.com"
        Then I should have a new user

    Scenario: Prvent to create a duplicated user
        Given I create a user "demo" "demo@example.com"
        Then I should have a new user
        Given I create a user "demo" "demo@example.com"
        Then I should not have a new user