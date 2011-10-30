<?php
use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;
use Phabric\Phabric;

$phaLoader = new \Doctrine\Common\ClassLoader('Phabric', realpath(__DIR__ . '/../../../../lib/Vendor/Phabric/lib'));
$phaLoader->register();

class PhabricContext extends BehatContext
{
    private $dbConn;
    
    private $phabric;
    
    public function __construct($parameters, $db)
    {
        $this->dbConn = $db;
        
        $datasource = new \Phabric\Datasource\Doctrine($db, $parameters['Phabric']['entities']);

        $this->phabric = new Phabric($datasource);

        $this->phabric->createEntitiesFromConfig($parameters['Phabric']['entities']);
        
        // Function to change UK date to MYSQL date format. 
        // Applied when configured in behat.yml
        
        $this->phabric->addDataTransformation(
                'UKTOMYSQLDATE', function($date) {
                    $date = \DateTime::createFromFormat('d/m/Y H:i', $date);
                    return $date->format('Y-m-d H:i:s');
                }
                
        );
        
        // Function to look up the id of a conference.
        // Used when linking sessions to conferences. 
        // Applied when configured in behat.yml      
        
        $this->phabric->addDataTransformation(
                'CONFLOOKUP', function($confName, $bus) {
                    $ent = $bus->getEntity('conference');
                    $id = $ent->getNamedItemId($confName);
                    return $id;
               }
        );
               
    }
    
    /**
     * @Given /^The following conference exists$/
     */
    public function theFollowingConferenceExists(TableNode $table)
    {
        $this->phabric->insertFromTable('conference', $table);
    }
    
    /**
     * @Given /^the following sessions exist$/
     */
    public function theFollowingSessionsExist(TableNode $table)
    {
        $this->phabric->insertFromTable('session', $table);
    }
    
    /**
     * @Given /^I wait for (\d+) seconds$/
     */
    public function iWaitForSeconds($secs)
    {
        sleep($secs);
    }
    
}

