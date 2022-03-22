<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Learning\StoreLocator\Test\Unit\Model;

use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use Learning\StoreLocator\Model\Location;

class LocationTest extends \PHPUnit\Framework\TestCase
{
    /** @var Location */
    private $location;

    public function setUp(): void
    {
        $objectManager = new ObjectManager($this);
        $this->location = $objectManager->getObject(Location::class);
    }

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
