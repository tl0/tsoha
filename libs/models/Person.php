<?php

class Person {
	private $id;
	private $name;
	private $title;
	private $description;
	private $published;
	private $timecreated;
	private $timemodified;

	public static function getUserByID($userID) {
		$stmt = getDB()->prepare("SELECT * FROM people WHERE userid = ? LIMIT 1");
		$stmt->execute(array($userID));
		$result = $stmt->fetchObject();
		if($result != null) {
			$temp = new Person();
			$temp->setID($result->userid);
			$temp->setName($result->name);
			$temp->setTitle($result->title);
			$temp->setDescription($result->descr);
			$temp->setPublished($result->published);
			$temp->setTimeCreated($result->timecreated);
			$temp->setTimeModified($result->timemodified);

			return $temp;
		} else {
			return new Person();
		}
	}






	// GETTERS & SETTERS

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