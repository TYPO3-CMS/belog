<?php
namespace TYPO3\CMS\Belog\Tests\Unit\Domain\Repository;

/**
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
class WorkspaceRepositoryTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @test
	 */
	public function initializeObjectSetsRespectStoragePidToFalse() {
		$querySettings = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\QuerySettingsInterface');
		$objectManager = $this->getMock('TYPO3\\CMS\\Extbase\\Object\\ObjectManagerInterface');
		$objectManager->expects($this->any())->method('get')->with('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\QuerySettingsInterface')->will($this->returnValue($querySettings));
		$querySettings->expects($this->atLeastOnce())->method('setRespectStoragePage')->with(FALSE);
		$subject = $this->getMock('TYPO3\\CMS\\Belog\\Domain\\Repository\\WorkspaceRepository', array('setDefaultQuerySettings'), array($objectManager));
		$subject->expects($this->once())->method('setDefaultQuerySettings')->with($querySettings);
		$subject->initializeObject();
	}
}
