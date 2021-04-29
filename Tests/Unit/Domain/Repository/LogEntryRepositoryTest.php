<?php

declare(strict_types=1);

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

namespace TYPO3\CMS\Belog\Tests\Unit\Domain\Repository;

use TYPO3\CMS\Belog\Domain\Repository\LogEntryRepository;
use TYPO3\CMS\Extbase\Object\ObjectManagerInterface;
use TYPO3\CMS\Extbase\Persistence\Generic\QuerySettingsInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 */
class LogEntryRepositoryTest extends UnitTestCase
{
    /**
     * @test
     */
    public function initializeObjectSetsRespectStoragePidToFalse(): void
    {
        $querySettings = $this->getMockBuilder(QuerySettingsInterface::class)->getMock();
        $querySettings->expects(self::atLeastOnce())->method('setRespectStoragePage')->with(false)->willReturn($querySettings);
        $subject = $this->getMockBuilder(LogEntryRepository::class)
            ->setMethods(['setDefaultQuerySettings', 'getBackendUsers'])
            ->setConstructorArgs([$this->getMockBuilder(ObjectManagerInterface::class)->getMock()])
            ->getMock();
        $subject->injectQuerySettings($querySettings);
        $subject->expects(self::once())->method('setDefaultQuerySettings')->with($querySettings);
        $subject->initializeObject();
    }
}
