<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Christian Kuhn <lolli@schwarzbu.ch>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *  A copy is found in the textfile GPL.txt and important notices to the license
 *  from the author is found in LICENSE.txt distributed with these scripts.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Get username from backend user id
 *
 * @author Christian Kuhn <lolli@schwarzbu.ch>
 * @package TYPO3
 * @subpackage belog
 */
class Tx_Belog_ViewHelpers_UsernameViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {
	/**
	 * @var Tx_Belog_Domain_Repository_BackendUserRepository
	 */
	protected $backendUserRepository = NULL;

	/**
	 * Inject the backend user repository
	 *
	 * @param Tx_Belog_Domain_Repository_BackendUserRepository $backendUserRepository
	 * @return void
	 */
	public function injectBeUserRepository(Tx_Belog_Domain_Repository_BackendUserRepository $backendUserRepository) {
		$this->backendUserRepository = $backendUserRepository;
	}

	/**
	 * Resolve user name from backend user id.
	 *
	 * @param integer $uid Uid of the user
	 * @return string Username or an empty string if there is no user with that UID
	 */
	public function render($uid) {
		/** @var $user Tx_Belog_Domain_Model_BackendUser */
		$user = $this->backendUserRepository->findByUid($uid);
		if ($user === NULL) {
			return '';
		}

		return $user->getUsername();
	}
}
?>