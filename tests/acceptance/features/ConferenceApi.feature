Feature: In order to display conferences on PHPCon site 
         As a developer
         I need to be able to retrieve an array of conference objects.
@demo1
Scenario: Get all conferences
    Given there is confernece data in the database
    When I use the findConferences method
    Then I should get a array of 3 conferences
    And it should contain the conference "PHPNW"