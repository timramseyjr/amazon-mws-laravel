<?php
use mPixelz\AmazonMws\AmazonServiceStatus;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2012-12-12 at 13:17:14.
 */
class AmazonCoreTest extends PHPUnit_Framework_TestCase {

    /**
     * @var AmazonServiceStatus
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        resetLog();
        $this->object = new AmazonServiceStatus('testStore', 'Inbound', true, null);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
    * @return array
    */
    public function mockProvider() {
        return array(
            array(true,null, 'Mock Mode set to ON'),
            array(false,null, null),
            array(true,'test', 'Mock Mode set to ON','Single Mock File set: test'),
            array(true,array('test'), 'Mock Mode set to ON','Mock files array set.'),
            array(false,'test', 'Single Mock File set: test'),
            array(false,array('test'), 'Mock files array set.'),
            array('no',null, null),
        );
    }
    
    /**
     * @covers AmazonCore::setMock
     * @dataProvider mockProvider
     */
    public function testSetMock($a, $b, $c, $d = null) {
        resetLog();
        $this->object->setMock($a, $b);
        $check = parseLog();
        if ((is_bool($a) && $a) || $b){
            $this->assertEquals($c,$check[0]);
        }
        if ($d){
            $this->assertEquals($d,$check[1]);
        }
    }

    /**
     * @covers AmazonCore::setConfig
     * @expectedException Exception
     * @expectedExceptionMessage Config file does not exist or cannot be read! (no)
     */
    public function testSetConfig() {
        $this->object->setConfig('no');
    }

    /**
     * @covers AmazonCore::setLogPath
     * @expectedException Exception
     * @expectedExceptionMessage Log file does not exist or cannot be read! (no)
     */
    public function testSetLogPath() {
        $this->object->setLogPath('no');
    }

    /**
     * @covers AmazonCore::setStore
     * @todo   Implement testSetStore().
     */
    public function testSetStore() {
        $this->object->setStore('no');
        $check = parseLog();
        $this->assertEquals('Mock Mode set to ON',$check[0]);
        $this->assertEquals('Store no does not exist!',$check[1]);
        resetLog();
        $this->object->setStore('bad');
        $bad = parseLog();
        $this->assertEquals('Merchant ID is missing!',$bad[0]);
        $this->assertEquals('Access Key ID is missing!',$bad[1]);
        $this->assertEquals('Secret Key is missing!',$bad[2]);
    }
    
    public function testGetOptions(){
        $o = $this->object->getOptions();
        $this->assertInternalType('array',$o);
        $this->assertArrayHasKey('SellerId',$o);
        $this->assertArrayHasKey('AWSAccessKeyId',$o);
        $this->assertArrayHasKey('SignatureVersion',$o);
        $this->assertArrayHasKey('SignatureMethod',$o);
        $this->assertArrayHasKey('Version',$o);
    }
    
}

require_once(__DIR__.'/../helperFunctions.php');
