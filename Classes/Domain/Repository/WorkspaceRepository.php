<?php
namespace TYPO3\CMS\Belog\Domain\Repository;

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
 * Repository for workspaces
 * @todo This should be moved to EXT:workspaces if EXT:belog works no matter if workspaces are installed or not
 */
class WorkspaceRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    /**
     * Initializes the repository.
     */
    public function initializeObject()
    {
        /** @var \TYPO3\CMS\Extbase\Persistence\Generic\QuerySettingsInterface $querySettings */
        $querySettings = $this->objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\QuerySettingsInterface::class);
        $querySettings->setRespectStoragePage(false);
        $this->setDefaultQuerySettings($querySettings);
    }
}
