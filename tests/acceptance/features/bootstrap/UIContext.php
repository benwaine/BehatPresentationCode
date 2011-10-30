<?php # features/bootstrap/FeatureContext.php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException,
    Behat\Behat\Context\Step\Then,
    Behat\Behat\Context\Step\When;

use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

// Uncomment if using behat.phar
 require_once __DIR__ . '/../../../../lib/Vendor/mink.phar'; 

//require_once 'mink/autoload.php';

class UIContext extends Behat\Mink\Behat\Context\MinkContext
{
    protected $pageList = array(
                            "home" => '/index.php',
                          );
    
    protected $elementList = array(
                            "conferences table" => '.conferences',
                          );
    
    /**
     * @When /^I am on the "([^"]*)" page$/
     */
    public function iAmOnThePage($pageName) {
        
        if(!isset($this->pageList[$pageName])) {
            throw new Exception('Page Name: ' . ' not in page list');
        }
        
        $page = $this->pageList[$pageName];
        
        return new When("I am on \"$page\"");
    }

    /**
     * @Then /^I should see "([^"]*)" in the "([^"]*)"$/
     */
    public function iShouldSeeInThe($text, $element) {
        if(!isset($this->elementList[$element])) {
            throw new Exception('Element: ' . $element . ' not in element list');
        }
        
        $element = $this->elementList[$element];
        
        return new Then("I should see \"$text\" in the \"$element\" element");
    }
    
    /**
     * @When /^I wait for the suggestion box to appear$/
     */
    public function iWaitForTheSuggestionBoxToAppear()
    {
        $this->getSession()->wait(5000,
            "$('.suggestions-results').children().length > 0"
        );
    }

   

}