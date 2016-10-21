<?php
namespace Golem\Auth\Storage\AuraSession\Test;

use Aura\Session\SegmentInterface;
use Golem\Auth\Storage\AuraSessionStorage;

class AuraSessionStorageTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AuraSessionStorage
     */
    private $storage;

    /**
     * @var SegmentInterface
     */
    private $session;

    public function setUp()
    {
        $session_factory = new \Aura\Session\SessionFactory;
        $session = $session_factory->newInstance($_COOKIE);
        $this->session = $session->getSegment('session_segment');
        $this->storage = new AuraSessionStorage($this->session, 'namespace');
    }

    public function tearDown()
    {
        $this->session->clear();
    }

    public function test_storing_and_reading()
    {
        $this->storage->store(1);
        $this->assertEquals(1, $this->storage->read());
    }

    public function test_checking_if_data_exists()
    {
        $this->assertFalse($this->storage->exists());
        $this->storage->store(1);
        $this->assertTrue($this->storage->exists());
    }

    public function test_clearing_data()
    {
        $this->storage->store(1);
        $this->assertTrue($this->storage->exists());
        $this->storage->clear();
        $this->assertFalse($this->storage->exists());
    }

    public function test_reading_returns_null_when_there_is_no_data()
    {
        $this->assertNull($this->storage->read());
    }
}
