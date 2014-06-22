<?php
namespace TYPO3\CMS\Belog\Domain\Model;

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
 * A sys log entry
 * This model is 'complete': All current database properties are in there.
 *
 * @todo : This should be stuffed to some more central place
 * @author Christian Kuhn <lolli@schwarzbu.ch>
 */
class LogEntry extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * Storage page ID of the log entry
	 *
	 * @var integer
	 */
	protected $pid = 0;

	/**
	 * This is not a relation to BeUser model, since the user does
	 * not always exist, but we want the uid in then anyway.
	 * This case is ugly in extbase, the best way we
	 * have found now is to resolve the username (if it exists) in a
	 * view helper and just use the uid of the be user here.
	 *
	 * @var integer
	 */
	protected $backendUserUid = 0;

	/**
	 * Action ID of the action that happened, for example 3 was a file action
	 *
	 * @var integer
	 */
	protected $action = 0;

	/**
	 * UID of the record the event happened to
	 *
	 * @var integer
	 */
	protected $recordUid = 0;

	/**
	 * Table name
	 *
	 * @var string
	 */
	protected $tableName = 0;

	/**
	 * PID of the record the event happened to
	 *
	 * @var integer
	 */
	protected $recordPid = 0;

	/**
	 * Error code
	 *
	 * @var integer
	 */
	protected $error = 0;

	/**
	 * This is the log message itself, but possibly with %s substitutions.
	 *
	 * @var string
	 */
	protected $details = '';

	/**
	 * Timestamp when the log entry was written
	 *
	 * @var integer
	 */
	protected $tstamp = 0;

	/**
	 * Type code
	 *
	 * @var integer
	 */
	protected $type = 0;

	/**
	 * Details number
	 *
	 * @var integer
	 */
	protected $detailsNumber = 0;

	/**
	 * IP address of client
	 *
	 * @var string
	 */
	protected $ip = '';

	/**
	 * Serialized log data. This is a serialized array with substitutions for $this->details.
	 *
	 * @var string
	 */
	protected $logData = '';

	/**
	 * Event PID
	 *
	 * @var integer
	 */
	protected $eventPid = 0;

	/**
	 * This is only the UID and not the full workspace object for the same reason as in $beUserUid.
	 *
	 * @var integer
	 */
	protected $workspaceUid = 0;

	/**
	 * New ID
	 *
	 * @var string
	 */
	protected $newId = 0;

	/**
	 * Set pid
	 *
	 * @param integer $pid
	 * @return void
	 */
	public function setPid($pid) {
		$this->pid = (int)$pid;
	}

	/**
	 * Get pid
	 *
	 * @return integer
	 */
	public function getPid() {
		return $this->pid;
	}

	/**
	 * Set backend user uid
	 *
	 * @param integer $beUserUid
	 * @return void
	 */
	public function setBackendUserUid($beUserUid) {
		$this->backendUserUid = $beUserUid;
	}

	/**
	 * Get backend user id
	 *
	 * @return integer
	 */
	public function getBackendUserUid() {
		return $this->backendUserUid;
	}

	/**
	 * Set action
	 *
	 * @param integer $action
	 * @return void
	 */
	public function setAction($action) {
		$this->action = $action;
	}

	/**
	 * Get action
	 *
	 * @return integer
	 */
	public function getAction() {
		return (int)$this->action;
	}

	/**
	 * Set record uid
	 *
	 * @param integer $recordUid
	 * @return void
	 */
	public function setRecordUid($recordUid) {
		$this->recordUid = $recordUid;
	}

	/**
	 * Get record uid
	 *
	 * @return integer
	 */
	public function getRecordUid() {
		return (int)$this->recordUid;
	}

	/**
	 * Set table name
	 *
	 * @param string $tableName
	 * @return void
	 */
	public function setTableName($tableName) {
		$this->tableName = $tableName;
	}

	/**
	 * Get table name
	 *
	 * @return string
	 */
	public function getTableName() {
		return $this->tableName;
	}

	/**
	 * Set record pid
	 *
	 * @param integer $recordPid
	 * @return void
	 */
	public function setRecordPid($recordPid) {
		$this->recordPid = $recordPid;
	}

	/**
	 * Get record pid
	 *
	 * @return integer
	 */
	public function getRecordPid() {
		return (int)$this->recordPid;
	}

	/**
	 * Set error
	 *
	 * @param integer $error
	 * @return void
	 */
	public function setError($error) {
		$this->error = $error;
	}

	/**
	 * Get error
	 *
	 * @return integer
	 */
	public function getError() {
		return (int)$this->error;
	}

	/**
	 * Set details
	 *
	 * @param string $details
	 * @return void
	 */
	public function setDetails($details) {
		$this->details = $details;
	}

	/**
	 * Get details
	 *
	 * @return string
	 */
	public function getDetails() {
		return $this->details;
	}

	/**
	 * Set tstamp
	 *
	 * @param integer $tstamp
	 * @return void
	 */
	public function setTstamp($tstamp) {
		$this->tstamp = $tstamp;
	}

	/**
	 * Get tstamp
	 *
	 * @return integer
	 */
	public function getTstamp() {
		return (int)$this->tstamp;
	}

	/**
	 * Set type
	 *
	 * @param integer $type
	 * @return void
	 */
	public function setType($type) {
		$this->type = $type;
	}

	/**
	 * Get type
	 *
	 * @return integer
	 */
	public function getType() {
		return (int)$this->type;
	}

	/**
	 * Set details number
	 *
	 * @param integer $detailsNumber
	 * @return void
	 */
	public function setDetailsNumber($detailsNumber) {
		$this->detailsNumber = $detailsNumber;
	}

	/**
	 * Get details number
	 *
	 * @return integer
	 */
	public function getDetailsNumber() {
		return (int)$this->detailsNumber;
	}

	/**
	 * Set ip
	 *
	 * @param string $ip
	 * @return void
	 */
	public function setIp($ip) {
		$this->ip = $ip;
	}

	/**
	 * Get ip
	 *
	 * @return string
	 */
	public function getIp() {
		return $this->ip;
	}

	/**
	 * Set log data
	 *
	 * @param string $logData
	 * @return void
	 */
	public function setLogData($logData) {
		$this->logData = $logData;
	}

	/**
	 * Get log data
	 *
	 * @return array
	 */
	public function getLogData() {
		if ($this->logData === '') {
			return array();
		}
		$logData = @unserialize($this->logData);
		if (!is_array($logData)) {
			$logData = array();
		}
		return $logData;
	}

	/**
	 * Set event pid
	 *
	 * @param integer $eventPid
	 * @return void
	 */
	public function setEventPid($eventPid) {
		$this->eventPid = $eventPid;
	}

	/**
	 * Get event pid
	 *
	 * @return integer
	 */
	public function getEventPid() {
		return (int)$this->eventPid;
	}

	/**
	 * Set workspace uid
	 *
	 * @param integer $workspaceUid
	 * @return void
	 */
	public function setWorkspaceUid($workspaceUid) {
		$this->workspaceUid = $workspaceUid;
	}

	/**
	 * Get workspace
	 *
	 * @return integer
	 */
	public function getWorkspaceUid() {
		return (int)$this->workspaceUid;
	}

	/**
	 * Set new id
	 *
	 * @param string $newId
	 * @return void
	 */
	public function setNewId($newId) {
		$this->newId = $newId;
	}

	/**
	 * Get new id
	 *
	 * @return string
	 */
	public function getNewId() {
		return $this->newId;
	}

}
