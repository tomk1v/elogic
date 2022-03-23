<?php
/**
 * Store Locator
 * Unit Test for testing getters and setter programmatically
 *
 * @category  Learning
 * @package   Learning\StoreLocator
 * @author    Andrii Tomkiv <tomkivandrii18@gmail.com>
 * @copyright 2022 Elogic
 */

namespace Learning\StoreLocator\Test\Unit\Model;

use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use Learning\StoreLocator\Model\Location;

class LocationTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Location
     */
    private $location;

    /**
     * Is called before running a test
     */
    public function setUp(): void
    {
        $this->objectManager = new ObjectManager($this);
        $this->location = $this->objectManager->getObject(Location::class);
    }

    /**
     * The test of getters and setters
     */
    public function testGettersAndSetters()
    {
        $name = 'name';
        $description = 'text';
        $openTime = '2';
        $closeTime = '5';
        $longitude = '11112222333';
        $latitude = '4444555666';

        $this->location->setName($name);
        $this->assertEquals($name, $this->location->getName());

        $this->location->setDescription($description);
        $this->assertEquals($description, $this->location->getDescription());

        $this->location->setOpenTime($openTime);
        $this->assertEquals($openTime, $this->location->getOpenTime());

        $this->location->setCloseTime($closeTime);
        $this->assertEquals($closeTime, $this->location->getCloseTime());

        $this->location->setLongitude($longitude);
        $this->assertEquals($longitude, $this->location->getLongitude());

        $this->location->setLatitude($latitude);
        $this->assertEquals($latitude, $this->location->getLatitude());
    }
}
