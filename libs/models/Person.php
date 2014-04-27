<?php

class Person
{
	private $id;
	private $name;
	private $title;
	private $description;
	private $published;
	private $timecreated;
	private $timemodified;
	private $defaultimg;

	public static function getUserByID($userID)
	{
		$stmt = getDB()->prepare("SELECT * FROM people WHERE userid = ? LIMIT 1");
		$stmt->execute(array($userID));
		$result = $stmt->fetchObject();
		if ($result != null) {
			$temp = new Person();
			$temp->setID($result->userid);
			$temp->setName($result->name);
			$temp->setTitle($result->title);
			$temp->setDescription($result->descr);
			$temp->setPublished($result->published);
			$temp->setTimeCreated($result->timecreated);
			$temp->setTimeModified($result->timemodified);
			$temp->setDefaultimg($result->defaultimg);

			return $temp;
		} else {
			return new Person();
		}
	}


	public function save()
	{
		$stmt = getDB()->prepare("UPDATE people SET name= :name, descr = :descr, timemodified = :modified, title= :title, published = :published, defaultimg = :defaultimg WHERE userid = :id");
		$stmt->bindValue("name", $this->getName());
		$stmt->bindValue("descr", $this->getDescription());
		$stmt->bindValue("modified", $this->getTimemodified());
		$stmt->bindValue("title", $this->getTitle());
		$stmt->bindValue("published", $this->getPublished());
		if ($this->getDefaultimg() == null) {
			$stmt->bindValue("defaultimg", null, PDO::PARAM_NULL);
		} else {
			$stmt->bindValue("defaultimg", $this->getDefaultimg());
		}
		$stmt->bindValue("id", $this->getId());
		$stmt->execute();
	}


	// GETTERS & SETTERS

	public function getTags()
	{
		$stmt = getDB()->prepare("SELECT * FROM tagset INNER JOIN tags ON tagset.tagid = tags.tagid WHERE tagset.userid = ?");
		$stmt->execute(array($this->getId()));
		$result = $stmt->fetchAll(PDO::FETCH_CLASS);
		if ($result != null) {
			return $result;
		} else {
			return array();
		}
	}

	public function getImages()
	{
		$stmt = getDB()->prepare("SELECT * FROM images WHERE userid = ?");
		$stmt->execute(array($this::getId()));
		$result = $stmt->fetchAll(PDO::FETCH_CLASS);
		if ($result != null) {
			return $result;
		} else {
			return array();
		}
	}

	public function getAnswers()
	{
		$stmt = getDB()->prepare("SELECT * FROM answer INNER JOIN questions ON answer.qid = questions.qid WHERE userid = ?");
		$stmt->execute(array($this::getId()));
		$result = $stmt->fetchAll(PDO::FETCH_CLASS);
		if ($result != null) {
			return $result;
		} else {
			return array();
		}
	}

	/**
	 * @param mixed $defaultimg
	 */
	public function setDefaultimg($defaultimg)
	{
		$this->defaultimg = $defaultimg;
	}

	public function getDefaultImgPath()
	{
		$stmt = getDB()->prepare("SELECT * FROM people INNER JOIN images ON images.imgid = people.defaultimg WHERE people.userid = ?");
		$stmt->execute(array($this::getId()));
		$result = $stmt->fetchObject();
		if ($result != null) {
			return $result->imgpath;
		} else {
			return null;
		}
	}

	/**
	 * @return mixed
	 */
	public function getDefaultimg()
	{
		return $this->defaultimg;
	}


	/**
	 * @param mixed $timemodified
	 */
	public function setTimemodified($timemodified)
	{
		$this->timemodified = $timemodified;
	}

	/**
	 * @return mixed
	 */
	public function getTimemodified()
	{
		return $this->timemodified;
	}

	/**
	 * @param mixed $description
	 */
	public function setDescription($description)
	{
		$this->description = $description;
	}

	/**
	 * @return mixed
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @param mixed $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param mixed $name
	 */
	public function setName($name)
	{
		$this->name = $name;
	}

	/**
	 * @return mixed
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param mixed $timecreated
	 */
	public function setTimecreated($timecreated)
	{
		$this->timecreated = $timecreated;
	}

	/**
	 * @return mixed
	 */
	public function getTimecreated()
	{
		return $this->timecreated;
	}

	/**
	 * @param mixed $title
	 */
	public function setTitle($title)
	{
		$this->title = $title;
	}

	/**
	 * @return mixed
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @param mixed $published
	 */
	public function setPublished($published)
	{
		$this->published = $published;
	}

	/**
	 * @return mixed
	 */
	public function getPublished()
	{
		return $this->published;
	}


}