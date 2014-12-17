<?php

class Db
{
	private $_localhost = 'localhost';
	private $_login = 'root';
	private $_password = 'root';
	private $_DB = 'cee';
	public $repport;
	protected $_link;

	public function __construct()
	{
	}

	static public function getInstance()
	{
		return new Db();
	}

	private function connect()
	{
		$this->_link = mysqli_connect($this->_localhost, $this->_login, $this->_password, $this->_DB);
		if (!$this->_link)
			return false;
		return true;
	}

	private function disconnect()
	{
		mysqli_close($this->_link);
	}

	public function getRows($sql)
	{
		$result = null;
		if ($this->connect()) {
			$result = mysqli_query($this->_link, $sql);
			$this->disconnect();
			if ($result && mysqli_num_rows($result) > 0) {
				while ($row = $result->fetch_array(MYSQLI_ASSOC))
					$rows[] = $row;
				$result->free();
				return $rows;
			}
			return null;
		} else {
			$this->repport = 'Error whil attempting to connect to database.';
		}
		return $result;
	}

	// LIMIT the result to one using 'LIMIT 1' statement and return the row.
	public function getRow($sql)
	{
		$result = null;
		if ($this->connect()) {
			$result = mysqli_query($this->_link, $sql."\nLIMIT 1;");
			$this->disconnect();
			if ($result && mysqli_num_rows($result) > 0) {
				$row = $result->fetch_array(MYSQLI_ASSOC);
				$result->free();
				return $row;
			}
			return null;
		} else {
			$this->repport = 'Error whil attempting to connect to database.';
		}
		return $result;
	}

	public function execute($sql)
	{
		if ($this->connect())
		{
			$result = !!(mysqli_query($this->_link, $sql));
			$this->disconnect();
		} else {
			$this->repport = 'Error whil attempting to connect to database.';
		}
		return $result;
	}
}
