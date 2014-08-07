<?php

class AdminDB
{
	static private $_localhost = 'localhost';
	static private $_login = 'root';
	static private $_password = 'root';
	static private $_DB = 'mydb';
	protected $_link;
	private function connect()
	{
		$this->_link = mysqli_connect($_localhost, $_login, $_password, $_DB);
		if (!$_link)
			return false;
		return true;
	}

	private function disconnect()
	{
		mysqli_close($this->_link);
	}

	public function Query($query, $type = false)
	{
		if ($type)
		{
			if ($this->connectDB())
			{
				mysqli_query($_link, $query);
				$this->disconnectDB();
			}
		}
		else
		{
			$result = null;
			if ($this->connectDB())
			{
				if ($result = mysqli_query($_link, $query))
				{
					$this->msg = mysqli_num_rows($result);
				}
				$this->disconnectDB();
			}
			return $result;			
		}
	}
}
