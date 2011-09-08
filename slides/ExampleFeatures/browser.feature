Feature: When visting the PHPCon site 
         As a site visitor
         I need to be able to see what conferences are coming up

Scenario: Get all conferences
    Given there is confernece data in the database
    When I go to the homepage
    Then I should see three conferences in a table