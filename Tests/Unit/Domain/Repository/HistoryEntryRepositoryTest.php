<?php
namespace TYPO3\CMS\Belog\Tests\Unit\Domain\Repository;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

/**
 * Test case
 */
class HistoryEntryRepositoryTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings|\TYPO3\TestingFramework\Core\AccessibleObjectInterface
     */
    protected $querySettings = null;

    protected function setUp()
    {
        $this->querySettings = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\Generic\QuerySettingsInterface::class)->getMock();
        $this->objectManager = $this->getMockBuilder(\TYPO3\CMS\Extbase\Object\ObjectManagerInterface::class)->getMock();
        $this->objectManager->expects($this->any())->method('get')->with(\TYPO3\CMS\Extbase\Persistence\Generic\QuerySettingsInterface::class)->will($this->returnValue($this->querySettings));
    }

    /**
     * @test
     */
    public function initializeObjectSetsRespectStoragePidToFalse()
    {
        $this->querySettings->expects($this->atLeastOnce())->method('setRespectStoragePage')->with(false);
        $fixture = $this->getMockBuilder(\TYPO3\CMS\Belog\Domain\Repository\HistoryEntryRepository::class)
            ->setMethods(['setDefaultQuerySettings'])
            ->setConstructorArgs([$this->objectManager])
            ->getMock();
        $fixture->expects($this->once())->method('setDefaultQuerySettings')->with($this->querySettings);
        $fixture->initializeObject();
    }
}
