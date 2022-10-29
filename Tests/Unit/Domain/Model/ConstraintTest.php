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

namespace TYPO3\CMS\Belog\Tests\Unit\Domain\Model;

use TYPO3\CMS\Belog\Domain\Model\Constraint;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

class ConstraintTest extends UnitTestCase
{
    protected Constraint $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = new Constraint();
    }

    /**
     * @test
     */
    public function setManualDateStartForDateTimeSetsManualDateStart(): void
    {
        $date = new \DateTime();
        $this->subject->setManualDateStart($date);
        self::assertEquals($date, $this->subject->getManualDateStart());
    }

    /**
     * @test
     */
    public function setManualDateStartForNoArgumentSetsManualDateStart(): void
    {
        $this->subject->setManualDateStart();
        self::assertNull($this->subject->getManualDateStart());
    }

    /**
     * @test
     */
    public function setManualDateStopForDateTimeSetsManualDateStop(): void
    {
        $date = new \DateTime();
        $this->subject->setManualDateStop($date);
        self::assertEquals($date, $this->subject->getManualDateStop());
    }

    /**
     * @test
     */
    public function setManualDateStopForNoArgumentSetsManualDateStop(): void
    {
        $this->subject->setManualDateStop();
        self::assertNull($this->subject->getManualDateStop());
    }
}
