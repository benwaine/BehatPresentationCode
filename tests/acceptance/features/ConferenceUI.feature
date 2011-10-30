Feature: Home Page Conference Table & Search
         As a website user I want to see upcoming conferences on the PHPCon
         website

@demo2
Scenario: View all conferences on the homepage
    Given there is confernece data in the database
    When I am on "/index.php"
    Then I should see "PHPNW" in the ".conferences" element
    And I should see "PHPNW" in the ".conferences" element
    And I should see "PHPNW" in the ".conferences" element
    And print last response
    
@demo3
Scenario: View all conferences on the homepage
    Given there is confernece data in the database
    When I am on the "home" page
    Then I should see "PHPNW" in the "conferences table" 
    And I should see "PHPUK" in the "conferences table"
    And I should see "PBC11" in the "conferences table" 

@javascript @demo4
Scenario: Use autocomplete functionality to complete a input field
    Given there is confernece data in the database
    When I am on the "home" page
    When I fill in "search-text" with "PHP"
    And I wait for the suggestion box to appear
    Then I should see "PHPNW"