Feature: In order to display conferences on my wordpress widget
        As an API consumer
        I need to get data on conferences from the PHPCon API

Scenario: Get all conferences
    Given there is confernece data in the database
    When I make a request to the Conference resource 
    Then There should be three conferences in the response