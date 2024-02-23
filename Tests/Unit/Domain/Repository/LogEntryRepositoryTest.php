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

use PHPUnit\Framework\Attributes\Test;
use TYPO3\CMS\Belog\Domain\Repository\LogEntryRepository;
use TYPO3\CMS\Extbase\Persistence\Generic\QuerySettingsInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

final class LogEntryRepositoryTest extends UnitTestCase
{
    #[Test]
    public function initializeObjectSetsRespectStoragePidToFalse(): void
    {
        $querySettings = $this->getMockBuilder(QuerySettingsInterface::class)->getMock();
        $querySettings->expects(self::atLeastOnce())->method('setRespectStoragePage')->with(false)->willReturn($querySettings);
        $subject = $this->getMockBuilder(LogEntryRepository::class)
            ->onlyMethods(['setDefaultQuerySettings'])
            ->addMethods(['getBackendUsers'])
            ->getMock();
        $subject->injectQuerySettings($querySettings);
        $subject->expects(self::once())->method('setDefaultQuerySettings')->with($querySettings);
        $subject->initializeObject();
    }
}
