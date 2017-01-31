<?php
use mPixelz\AmazonMws\AmazonParticipationList;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2012-12-12 at 13:17:14.
 */
class AmazonParticipationListTest extends PHPUnit_Framework_TestCase {

    /**
     * @var AmazonParticipationList
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        resetLog();
        $this->object = new AmazonParticipationList('testStore', true, null);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }
    
    public function testSetUseToken(){
        $this->assertNull($this->object->setUseToken());
        $this->assertNull($this->object->setUseToken(true));
        $this->assertNull($this->object->setUseToken(false));
        $this->assertFalse($this->object->setUseToken('wrong'));
    }
    


    public function testFetchParticipationList(){
        resetLog();
        $this->object->setMock(true,'fetchParticipationList.xml'); //no token
        $this->assertNull($this->object->fetchParticipationList());
        
        $o = $this->object->getOptions();
        $this->assertEquals('ListMarketplaceParticipations',$o['Action']);
        
        $r = $this->object->getMarketplaceList(null);
        $this->assertArrayHasKey(0,$r);
        $this->assertInternalType('array',$r[0]);
        
        
        $check = parseLog();
        $this->assertEquals('Single Mock File set: fetchParticipationList.xml',$check[1]);
        $this->assertEquals('Fetched Mock File: mock/fetchParticipationList.xml',$check[2]);
        
        
        $this->assertFalse($this->object->hasToken());
        
        return $this->object;
    }
    
    /**
     * @depends testFetchParticipationList
     */
    public function testGetMarketplaceList($o){
        $list = $o->getMarketplaceList(null);
        $this->assertInternalType('array',$list);
        $x = array();
        $x[0]['MarketplaceId'] = 'ATVPDKIKX0DER';
        $x[0]['Name'] = 'Amazon.com';
        $x[0]['Country'] = 'US';
        $x[0]['Currency'] = 'USD';
        $x[0]['Language'] = 'en_US';
        $x[0]['Domain'] = 'www.amazon.com';
        
        $this->assertEquals($x,$list);
        
        $this->assertFalse($this->object->getMarketplaceList()); //not fetched yet for this object
    }
    
    /**
     * @depends testFetchParticipationList
     */
    public function testGetParticipationList($o){
        $list = $o->getParticipationList(null);
        $this->assertInternalType('array',$list);
        $x = array();
        $x[0]['MarketplaceId'] = 'ATVPDKIKX0DER';
        $x[0]['SellerId'] = 'A135KKEKJAIBJ56';
        $x[0]['Suspended'] = 'No';
        
        $this->assertEquals($x,$list);
        
        $this->assertFalse($this->object->getParticipationList()); //not fetched yet for this object
    }
    
    /**
     * @depends testFetchParticipationList
     */
    public function testGetMarketplaceId($o){
        $get = $o->getMarketplaceId(0);
        $this->assertEquals('ATVPDKIKX0DER',$get);
        
        $this->assertFalse($o->getMarketplaceId(null)); //not a number
        $this->assertFalse($o->getMarketplaceId(2)); //does not exist
        $this->assertFalse($this->object->getMarketplaceId()); //not fetched yet for this object
    }
    
    /**
     * @depends testFetchParticipationList
     */
    public function testGetSellerId($o){
        $get = $o->getSellerId(0);
        $this->assertEquals('A135KKEKJAIBJ56',$get);
        
        $this->assertFalse($o->getSellerId(null)); //not a number
        $this->assertFalse($o->getSellerId(2)); //does not exist
        $this->assertFalse($this->object->getSellerId()); //not fetched yet for this object
    }
    
    /**
     * @depends testFetchParticipationList
     */
    public function testGetSuspensionStatus($o){
        $get = $o->getSuspensionStatus(0);
        $this->assertEquals('No',$get);
        
        $this->assertFalse($o->getSuspensionStatus(null)); //not a number
        $this->assertFalse($o->getSuspensionStatus(2)); //does not exist
        $this->assertFalse($this->object->getSuspensionStatus()); //not fetched yet for this object
    }
    
    /**
     * @depends testFetchParticipationList
     */
    public function testGetName($o){
        $get = $o->getName(0);
        $this->assertEquals('Amazon.com',$get);
        
        $this->assertFalse($o->getName(null)); //not a number
        $this->assertFalse($o->getName(2)); //does not exist
        $this->assertFalse($this->object->getName()); //not fetched yet for this object
    }
    
    /**
     * @depends testFetchParticipationList
     */
    public function testGetCountry($o){
        $get = $o->getCountry(0);
        $this->assertEquals('US',$get);
        
        $this->assertFalse($o->getCountry(null)); //not a number
        $this->assertFalse($o->getCountry(2)); //does not exist
        $this->assertFalse($this->object->getCountry()); //not fetched yet for this object
    }
    
    /**
     * @depends testFetchParticipationList
     */
    public function testGetCurreny($o){
        $get = $o->getCurreny(0);
        $this->assertEquals('USD',$get);
        
        $this->assertFalse($o->getCurreny(null)); //not a number
        $this->assertFalse($o->getCurreny(2)); //does not exist
        $this->assertFalse($this->object->getCurreny()); //not fetched yet for this object
    }
    
    /**
     * @depends testFetchParticipationList
     */
    public function testGetLanguage($o){
        $get = $o->getLanguage(0);
        $this->assertEquals('en_US',$get);
        
        $this->assertFalse($o->getLanguage(null)); //not a number
        $this->assertFalse($o->getLanguage(2)); //does not exist
        $this->assertFalse($this->object->getLanguage()); //not fetched yet for this object
    }
    
    /**
     * @depends testFetchParticipationList
     */
    public function testGetDomain($o){
        $get = $o->getDomain(0);
        $this->assertEquals('www.amazon.com',$get);
        
        $this->assertFalse($o->getDomain(null)); //not a number
        $this->assertFalse($o->getDomain(2)); //does not exist
        $this->assertFalse($this->object->getDomain()); //not fetched yet for this object
    }
    
    public function testFetchParticipationListToken1(){
        resetLog();
        $this->object->setMock(true,'fetchParticipationListToken.xml'); //no token
        
        //without using token
        $this->assertNull($this->object->fetchParticipationList());
        $check = parseLog();
        $this->assertEquals('Single Mock File set: fetchParticipationListToken.xml',$check[1]);
        $this->assertEquals('Fetched Mock File: mock/fetchParticipationListToken.xml',$check[2]);
        
        $this->assertTrue($this->object->hasToken());
        $o = $this->object->getOptions();
        $this->assertEquals('ListMarketplaceParticipations',$o['Action']);
        $p = $this->object->getParticipationList(null);
        $this->assertArrayHasKey(0,$p);
        $this->assertEquals('A135KKEKJAIBJ56',$p[0]['SellerId']);
        $this->assertArrayNotHasKey(1,$p);
    }
    
    public function testFetchParticipationListToken2(){
        resetLog();
        $this->object->setMock(true,array('fetchParticipationListToken.xml','fetchParticipationListToken2.xml'));
        
        //with using token
        $this->object->setUseToken();
        $this->assertNull($this->object->fetchParticipationList());
        $check = parseLog();
        $this->assertEquals('Mock files array set.',$check[1]);
        $this->assertEquals('Fetched Mock File: mock/fetchParticipationListToken.xml',$check[2]);
        $this->assertEquals('Recursively fetching more Participationseses',$check[3]);
        $this->assertEquals('Fetched Mock File: mock/fetchParticipationListToken2.xml',$check[4]);
        $this->assertFalse($this->object->hasToken());
        $o = $this->object->getOptions();
        $this->assertEquals('ListMarketplaceParticipationsByNextToken',$o['Action']);
        $this->assertArrayNotHasKey('NextToken',$o);
        $p = $this->object->getParticipationList();
        $this->assertEquals(2,count($p));
        $this->assertEquals('A135KKEKJAIBJ56',$p[0]['SellerId']);
        $this->assertEquals('A135KKEKWF1JAI6',$p[1]['SellerId']);
        $this->assertNotEquals($p[0],$p[1]);
    }
    
}

require_once(__DIR__.'/../helperFunctions.php');