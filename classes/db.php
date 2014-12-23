<?php

class Db
{
    /* singleton */
    private static $instance;
	private $_localhost = 'localhost';
	private $_login = 'root';
	private $_password = 'root';
	private $_DB = 'cee';
	public $link = null;

	public function __construct()
	{
		$this->connect();
	}

	public function __destruct()
	{
		$this->disconnect();
	}

	static public function getInstance()
	{
        if (!isset(self::$instance)) {
            self::$instance = new Db();
        }
        return self::$instance;
	}

	public function connect()
	{
		if ($this->link)
			$this->disconnect();
		$this->link = mysqli_connect($this->_localhost, $this->_login, $this->_password, $this->_DB);
		if (!$this->link) {
			return /*Throw SQL exception here*/;
		}
	}

	public function disconnect()
	{
		if ($this->link)
			mysqli_close($this->link);
		$this->link = null;
	}

	public function checkLink()
	{
		if (!$this->link || !mysqli_ping($this->link))
			$this->connect();
	}

	/* @TODO try catch here */
	public function getRows($sql)
	{
		$this->checkLink();
		$result = mysqli_query($this->link, $sql);
		if ($result && mysqli_num_rows($result) > 0) {
			while ($row = $result->fetch_array(MYSQLI_ASSOC))
				$rows[] = $row;
			$result->free();
			return $rows;
		}
		return $result;
	}

	/* @TODO try catch here */
	// LIMIT the result to one using 'LIMIT 1' statement and return the row.
	public function getValue($sql)
	{
		$this->checkLink();
		$result = mysqli_query($this->link, $sql."\nLIMIT 1;");
		if ($result && mysqli_num_rows($result) > 0) {
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$result->free();
			return reset($row);
		}
		return $result;
	}

	/* @TODO try catch here */
	// LIMIT the result to one using 'LIMIT 1' statement and return the row.
	public function getRow($sql)
	{
		$this->checkLink();
		$result = mysqli_query($this->link, $sql."\nLIMIT 1;");
		if ($result && mysqli_num_rows($result) > 0) {
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$result->free();
			return $row;
		}
		return $result;
	}

	/* @TODO try catch here */
	public function execute($sql)
	{
		$this->checkLink();
		$result = !!(mysqli_query($this->link, $sql));
		return $result;
	}
}
