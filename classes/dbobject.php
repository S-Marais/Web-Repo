<?php

abstract class DbObject
{
	public $id;
	private $_loaded = false;
	/* @loaded
	 * Loaded is true if object is loaded from Db. 
	 */
	protected $instance_Db;
	/* @instanceDb
	 * Minimise the number of instanciation of the Db class within
	 * the object
	 */
	protected $_table_name;
	protected $_prefixed = true;
	protected $_definition;
	/* @definition
	 * The definition variable is an array that will contain all columns of the
	 * table with their associated types defined as follow :
	 * array('column'=> array(_TYPE_));
	 * Each column must have a public variable likely named in the class.
	 */
	const _TYPE_INT_ = 0;
	const _TYPE_FLOAT_ = 2;
	const _TYPE_STRING_ = 3;
	const _TYPE_BOOLEAN_ = 4;
	const _TYPE_DATE_ = 5;
	const _TYPE_DATETIME_ = 6;

	public function isLoadedObject()
	{
		return $this->_loaded;
	}

	public function __construct($id = false)
	{
		if (!$this->_table_name)
			$this->_table_name = strtolower(get_class($this));
		$this->instance_Db = Db::getInstance();
		if ($id) {
			$this->id = $id;
			$query = new DbQuery();
			foreach ($this->_definition as $column => $type) {
				$query->select($column);
			}
			$query->from($this->_table_name, null, $this->_prefixed);
			$query->where('id_'.$this->_table_name.' = '.$id);
			$query->limit(1);
			$values = $this->instance_Db->getAnswer($query);
			if (!$values)
				return;
			foreach ($this->_definition as $column => $type) {
				$this->$column = $this->castValueType($values[0][$column], $type);
			}
			$this->_loaded = true;
		}
	}

	protected function castValueType($value, $type)
	{
		switch ($type)
		{
			case self::_TYPE_INT_:
			return (int)$value;
			case self::_TYPE_FLOAT_:
			return (float)$value;
			case self::_TYPE_STRING_:
			return (string)$value;
			case self::_TYPE_BOOLEAN_:
			return (bool)$value;
			default:
			return $value;
		}
	}

	public function save()
	{
		if (!$this->id) {
			return $this->create();
		}
		return $this->update();
	}

	public function create()
	{
		$query = new DbQuery();
		$query->insertInto($this->_table_name, array_keys($this->_definition), $this->_prefixed);
		foreach ($this->_definition as $column => $type) {
			$query->values($this->castValueType($this->$column, $type));
		}
		$this->instance_Db->execute($query);
	}

	public function update()
	{
		$query = new DbQuery();
		$query->update($this->_table_name, null, $this->_prefixed);
		foreach ($this->_definition as $column => $type) {
			$query->set($column.'="'.$this->castValueType($this->$column, $type).'"');
		}
		$query->where('id_'.$this->_table_name.'='.(int)$this->id);
		$this->instance_Db->execute($query);
	}

	public function delete()
	{
		$query = new DbQuery();
		$query->deleteFrom($this->_table_name, null, $this->_prefixed);
		$query->where('id_'.$this->_table_name.'='.(int)$this->id);
		$this->instance_Db->execute($query);
	}
}
