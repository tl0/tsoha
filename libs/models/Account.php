<?php
require_once("Person.php");
class Account {

	private $accID;
	private $email;
	private $password;
	private $userId;
	private $admin;

	public static function getAccByID($accID) {
		$stmt = getDB()->prepare("SELECT * FROM account WHERE accid = ? LIMIT 1");
		$stmt->execute(array($accID));
		$result = $stmt->fetchObject();
		if($result != null) {
			$temp = new Account();
			$temp->setAccID($result->accid);
			$temp->setEmail($result->email);
			$temp->setPassword($result->password);
			$temp->setUserId($result->userid);
			$temp->setAdmin($result->admin);

			return $temp;
		}
	}

	public static function getAccBySession($session) {
		$stmt = getDB()->prepare("SELECT * FROM sessions WHERE sessid = ? LIMIT 1");
		$stmt->execute(array($session));
		$result = $stmt->fetchObject();
		if($result != null) {
			return Account::getAccByID($result->accid);
		} else {
			return null;
		}
	}

	public static function getLoggedInAccount() {
		if(isset($_SESSION['tsoha-session'])) {
			if(Account::getAccBySession($_SESSION['tsoha-session']) != null) {
				return Account::getAccBySession($_SESSION['tsoha-session']);
			} else {
				unset($_SESSION['tsoha-session']);
				return new Account();
			}
		} else {
			return new Account();
		}
	}




	// GETTERS & SETTERS

	/**
	 * @return Person
	 */
	public function getPerson() {
		return Person::getUserByID($this->getUserId());
	}



	/**
	 * @param mixed $accID
	 */
	public function setAccID($accID)
	{
		$this->accID = $accID;
	}

	/**
	 * @return mixed
	 */
	public function getAccID()
	{
		return $this->accID;
	}

	/**
	 * @param mixed $userId
	 */
	public function setUserId($userId)
	{
		$this->userId = $userId;
	}

	/**
	 * @return mixed
	 */
	public function getUserId()
	{
		return $this->userId;
	}


	/**
	 * @param boolean $admin
	 */
	public function setAdmin($admin)
	{
		$this->admin = $admin;
	}

	/**
	 * @return boolean
	 */
	public function getAdmin()
	{
		return $this->admin;
	}

	/**
	 * @param mixed $email
	 */
	public function setEmail($email)
	{
		$this->email = $email;
	}

	/**
	 * @return mixed
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * @param mixed $password
	 */
	public function setPassword($password)
	{
		$this->password = $password;
	}

	/**
	 * @return mixed
	 */
	public function getPassword()
	{
		return $this->password;
	}


} 