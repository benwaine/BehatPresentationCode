<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

//
// Require 3rd-party libraries here:
//
   require_once 'PHPUnit/Autoload.php';
   require_once 'PHPUnit/Framework/Assert/Functions.php';

$libPath = realpath(__DIR__ . '/../../../../lib');    
   
require_once $libPath . '/Vendor/doctrine2-dbal/lib/vendor/doctrine-common/lib/Doctrine/Common/ClassLoader.php';



$dLoader = new \Doctrine\Common\ClassLoader('Doctrine\DBAL', $libPath . '/Vendor/doctrine2-dbal/lib');
$dLoader->register();

$dcLoader = new \Doctrine\Common\ClassLoader('Doctrine\Common', $libPath . '/Vendor/doctrine2-dbal/lib/vendor/doctrine-common/lib');
$dcLoader->register();


$phpConLoader = new \Doctrine\Common\ClassLoader('PHPCon', $libPath . '/');
$phpConLoader->register();
   

/**
 * Features context.
 */
class FeatureContext extends BehatContext
{

    protected $service;
    
    protected $result;
    
    protected static $db;
    
    protected static $dataDir;

    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param   array   $parameters     context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        $this->useContext('subcontext_alias', new UIContext($parameters));
        
        $path = __DIR__ . '/' . $parameters['database']['dbPath'];
        
        $params = array(
            'user' => $parameters['database']['username'],
            'password' => $parameters['database']['password'],
            'driver' => $parameters['database']['driver'],
            'path' => $path,
        );

        $con = \Doctrine\DBAL\DriverManager::getConnection($params);

        $confMapper = new \PHPCon\Conference\Mapper($con);
        $confService = new \PHPCon\Conference\Service($confMapper);

        self::$db = $con;
        self::$dataDir = __DIR__ . '/' . $parameters['database']['dataPath'];
        $this->service = $confService;
    }

    /**
     * @BeforeSuite
     */
    public static function createDB()
    {
        $fileName = self::$dataDir . 'init.sql';
        self::executeQueriesInFile($fileName);
        
    }
    
    /**
     * @BeforeScenario
     */
    public static function resetDB()
    {
        $fileName = self::$dataDir . 'truncate-data.sql';
        self::executeQueriesInFile($fileName);
    }

    /**
     * @Given /^there is confernece data in the database$/
     */
    public function thereIsConferneceDataInTheDatabase()
    {
        $fileName = self::$dataDir . 'sample-conf-session-data.sql';
        self::executeQueriesInFile($fileName);
    }

    /**
     * @When /^I use the findConferences method$/
     */
    public function iUseTheFindConferencesMethod()
    {
        $this->result = $this->service->findConferences();
        
    }

    /**
     * @Then /^I should get a array of (\d+) conferences$/
     */
    public function iShouldGetAArrayOfConferences($numberOfCons)
    {
        assertInternalType('array', $this->result);
        assertEquals($numberOfCons, count($this->result));
    }

    /**
     * @Then /^it should contain the conference "([^"]*)"$/
     */
    public function itShouldContainTheConference($confName)
    {
        $names = array();
        
        foreach($this->result as $conf)
        {
            $names[$conf->getName()] = true;    
        }
        
        if(!array_key_exists($confName, $names))
        {
            throw new \Exception("Conference " . $confName . " not found in result");
        }
    }
    
    protected static function executeQueriesInFile($path)
    {
        $sql = file_get_contents($path);
        $queries = explode('|', $sql);
        
        foreach($queries as $q)
        {
            self::$db->query($q);
        }
    }

}
