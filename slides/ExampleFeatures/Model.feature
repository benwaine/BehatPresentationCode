Feature: In order to display conferences on PHPCon site 
         As a developer
         I need to be able to retrieve an array of conference objects.

Scenario: Get all conferences
    Given there is confernece data in the database
    When I use the findConferences method
    Then I should get a array of three conferences 