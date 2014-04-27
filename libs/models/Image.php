<?php

class Image {
	private $ID;
	private $userId;
	private $imgpath;
	private $created;

	public static function getImageByID($imgID) {
		$stmt = getDB()->prepare("SELECT * FROM images WHERE imgid = ? LIMIT 1");
		$stmt->execute(array($imgID));
		$result = $stmt->fetchObject();
		if($result != null) {
			$temp = new Image();
			$temp->setID($result->imgid);
			$temp->setUserId($result->userid);
			$temp->setImgpath($result->imgpath);
			$temp->getCreated($result->created);

			return $temp;
		} else {
			return new Image();
		}
	}



	// GETTERS & SETTERS

	public function save() {
		$stmt = getDB()->prepare("UPDATE image SET userid = :userid, imgpath = :imgpath, created = :created WHERE imgid = :id");
		$stmt->bindValue("userid", $this->getUserId());
		$stmt->bindValue("imgpath", $this->getImgpath());
		$stmt->bindValue("created", $this->getCreated());
		$stmt->bindValue("id", $this->getID());
		$stmt->execute();
	}

	public function getPerson() {
		return Person::getUserByID($this->getUserId());
	}

	public function remove() {
		unlink("upload/".$this->getImgpath());

		if($this->getPerson()->getDefaultimg() == $this->getID()) {
			$temp = $this->getPerson();
			$temp->setDefaultimg(null);
			$temp->save();
		}

		$stmt = getDB()->prepare("DELETE FROM images WHERE imgid = ?");
		$stmt->execute(array($this->getID()));
	}


	/**
	 * @param mixed $ID
	 */
	public function setID($ID)
	{
		$this->ID = $ID;
	}

	/**
	 * @return mixed
	 */
	public function getID()
	{
		return $this->ID;
	}

	/**
	 * @param mixed $created
	 */
	public function setCreated($created)
	{
		$this->created = $created;
	}

	/**
	 * @return mixed
	 */
	public function getCreated()
	{
		return $this->created;
	}

	/**
	 * @param mixed $imgpath
	 */
	public function setImgpath($imgpath)
	{
		$this->imgpath = $imgpath;
	}

	/**
	 * @return mixed
	 */
	public function getImgpath()
	{
		return $this->imgpath;
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


}