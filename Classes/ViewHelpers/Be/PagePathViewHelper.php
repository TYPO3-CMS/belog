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

namespace TYPO3\CMS\Belog\ViewHelpers\Be;

use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Fluid\ViewHelpers\Be\AbstractBackendViewHelper;

/**
 * Get page path string from page id
 *
 * @internal
 */
final class PagePathViewHelper extends AbstractBackendViewHelper
{
    public function initializeArguments(): void
    {
        parent::initializeArguments();
        $this->registerArgument('pid', 'int', 'Pid of the page', true);
        $this->registerArgument('titleLimit', 'int', 'Limit of the page title', false, 20);
    }

    /**
     * Resolve page id to page path string (with automatic cropping to maximum given length).
     */
    public function render(): string
    {
        return BackendUtility::getRecordPath($this->arguments['pid'], '', $this->arguments['titleLimit']);
    }
}
