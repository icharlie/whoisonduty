Feature: Edit Periods
    In  order to edit a periods 
    As a administrator
    I want to go to periodss page and click edit link for target

    Scenario: Periods Page
        Given I create a period "2015-01-15" "2015-01-22"
        Then I should have a new period
        Then I should be on "/periods"
        Then I should see "Periods"
        When I follow "Edit"
        Then I should be on "/periods/1/edit"
        Then the response should contain "2015-01-15"
        Then the response should contain "2015-01-22"
        # Then I should see "2015-01-15" in the "#start" element
        # Then I should see "2015-01-22"


