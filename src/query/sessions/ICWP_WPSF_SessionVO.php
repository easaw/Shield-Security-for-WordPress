<?php

class ICWP_WPSF_SessionVO {

	/**
	 * @var stdClass
	 */
	protected $oRowData;

	/**
	 * @param stdClass $oRowData
	 */
	public function __construct( $oRowData ) {
		$this->oRowData = $oRowData;
	}

	/**
	 * @return int
	 */
	public function getCreatedAt() {
		return $this->getRowData()->created_at;
	}

	/**
	 * @return string
	 */
	public function getBrowser() {
		return $this->getRowData()->browser;
	}
	/**
	 * @return int
	 */
	public function getId() {
		return $this->getRowData()->id;
	}

	/**
	 * @return string
	 */
	public function getIp() {
		return $this->getRowData()->ip;
	}

	/**
	 * @return int
	 */
	public function getLastActivityAt() {
		return (int)$this->getRowData()->last_activity_at;
	}

	/**
	 * @return int
	 */
	public function getLoggedInAt() {
		return (int)$this->getRowData()->logged_in_at;
	}

	/**
	 * @return int
	 */
	public function getLoginIntentExpiresAt() {
		return (int)$this->getRowData()->login_intent_expires_at;
	}

	/**
	 * @return int
	 */
	public function getSessionId() {
		return $this->getRowData()->session_id;
	}

	/**
	 * @return int
	 */
	public function getSecAdminAt() {
		return (int)$this->getRowData()->secadmin_at;
	}

	/**
	 * @return int
	 */
	public function getUsername() {
		return $this->getRowData()->wp_username;
	}

	/**
	 * @return int
	 */
	public function isDeleted() {
		return $this->getRowData()->deleted_at > 0;
	}

	/**
	 * @return stdClass
	 */
	public function getRowData() {
		return $this->oRowData;
	}

	/**
	 * @param stdClass $oRowData
	 * @return $this
	 */
	public function setRowData( $oRowData ) {
		$this->oRowData = $oRowData;
		return $this;
	}
}