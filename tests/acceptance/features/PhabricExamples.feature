Feature: Phabric demonstration
         As a user I would like to see the various Phabric features.

@javascript @phdemo1
Scenario: Basic Data Insert
Given The following conference exists
    | name        | description                       | cdate               |
    | Symfony Day | Anual Symfony conference in Paris | 2011-10-21 09:00:00 |
    | Zend Con    | Zend Conference in San Fran       | 2011-10-17 09:00:00 |
When I am on "/index.php"
And I wait for 10 seconds
Then I should see "Zend Con" in the "conferences table"

@javascript @phdemo2
Scenario: Change Column Names  
Given The following conference exists
    | Conf Name   | Conf Description                  | Conf Date           |
    | Symfony Day | Anual Symfony conference in Paris | 2011-10-21 09:00:00 |
    | Zend Con    | Zend Conference in San Fran       | 2011-10-17 09:00:00 |
When I am on "/index.php"
And I wait for 10 seconds
Then I should see "Zend Con" in the "conferences table"

@javascript @phdemo3
Scenario: Change Column Data - Reformat date
Given The following conference exists
    | Conf Name   | Conf Description                  | Conf Date        |
    | Symfony Day | Anual Symfony conference in Paris | 21/10/2011 09:00 |
    | Zend Con    | Zend Conference in San Fran       | 17/10/2011 09:00 |
When I am on "/index.php"
And I wait for 10 seconds
Then I should see "Zend Con" in the "conferences table"

@javascript @phdemo4
Scenario: Use a default value - use default value for conference description. 
Given The following conference exists
    | Conf Name   | Conf Date        |
    | Symfony Day | 21/10/2011 09:00 |
    | Zend Con    | 17/10/2011 09:00 |
When I am on "/index.php"
And I wait for 10 seconds
Then I should see "Zend Con" in the "conferences table"


@javascript @phdemo5
Scenario: Add relational data - add sessions to a conference
Given The following conference exists
    | Conf Name   | Conf Description                  | Conf Date        |
    | Symfony Day | Anual Symfony conference in Paris | 21/10/2011 09:00 |
    | Zend Con    | Zend Conference in San Fran       | 17/10/2011 09:00 |
And the following sessions exist
    | Conf Name | Session Name   | Speaker Name                             | Time             |
    | Zend Con  | Zend Framework | Supreme Allied Commander Weier O'Phinney | 17/10/2011 10:00 |
When I am on "/index.php"
And I wait for 5 seconds
When I follow "Zend Con Info"
And I wait for 10 seconds
Then I should see "Zend Framework" in the "sessions table"
