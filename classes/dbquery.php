<?php

class DbQuery
{
	private $_select;
	private $_insertInto;
	private $_values;
	private $_deleteFrom;
	private $_from;
	private $_join;
	private $_where;
	private $_groupBy;
	private $_orderBy;
	private $_limit;
	private $_onDuplicateKeyUpdate;

	public function __construct()
	{
		$this->_join = '';
	}

	public function select($value)
	{
		if ($this->_select) {
			$this->_select .= ', '.$value;
		} else {
			$this->_select = 'SELECT '.$value;
		}
	}

	public function insertInto($table, $columns, $prefixed = true)
	{
		$this->_insertInto = 'INSERT INTO '.($prefixed ? _DB_PREFIX_ : '').$table.' (';
		if (is_array($columns)) {
			foreach ($columns as $key => $col) {
				$this->_insertInto .= ($key ? ', `' : '`').($col ? $col : '0').'`';
			}
			$this->_insertInto .= ')';
		} else {
			$this->_insertInto .= '`'.$col.'`)';
		}
	}

	public function values($value) {
		if (!$this->_values) {
			$this->_values = "\nVALUES(".$value.')';
		} else {
			$this->_values = substr($this->_values, 0, -1);
			$this->_values .= ', '.$value.')';
		}
	}

	public function onDuplicateKeyUpdate($rule) {
		if ($rule) {
			$this->_onDuplicateKeyUpdate = "\nON DUPLICATE KEY UPDATE ".$rule;
		} else {
			$this->_onDuplicateKeyUpdate = null;
		}
	}

	public function deleteFrom($table, $alias=false, $prefixed = true) {
		if ($this->_deleteFrom) {
			$this->_deleteFrom .= ', '.($prefixed ? _DB_PREFIX_ : '').$table.($alias ? ' AS '.$alias);
		} else {
			$this->_deleteFrom = 'DELETE FROM '.($prefixed ? _DB_PREFIX_ : '').$table.($alias ? ' AS '.$alias);
		}
	}

	public function from($table, $alias = null, $prefixed = true)
	{
		$this->_from = "\nFROM `".(($prefixed)?_DB_PREFIX_:'').$table.'` '.$alias;
	}

	public function join($sql)
	{
		$this->_join .= "\n".$sql;
	}

	public function innerJoin($table, $alias = null, $on, $prefixed = true)
	{
		$this->_join .= "\nINNER JOIN `".(($prefixed)?_DB_PREFIX_:'').$table.'` '.$alias."\n    ON ".$on;
	}

	public function leftJoin($table, $alias = null, $on, $prefixed = true)
	{
		$this->_join .= "\nLEFT JOIN `".(($prefixed)?_DB_PREFIX_:'').$table.'` '.$alias."\n    ON ".$on;
	}

	public function outerJoin($table, $alias = null, $on, $prefixed = true)
	{
		$this->_join .= "\nOUTER JOIN `".(($prefixed)?_DB_PREFIX_:'').$table.'` '.$alias."\n    ON ".$on;
	}

	public function where($condition)
	{
		if (!$this->_where) {
			$this->_where = "\nWHERE (".$condition.')';
		} else {
			$this->_where .= "\n    AND (".$condition.')';
		}
	}

	public function groupBy($value)
	{
		if (!$this->_groupBy) {
			$this->_groupBy = "\nGROUP BY ".$value;
		} else {
			$this->_groupBy .= ', '.$value;
		}
	}

	public function orderBy($value)
	{
		if (!$this->_orderBy) {
			$this->_orderBy = "\nORDER BY ".$value;
		} else {
			$this->_orderBy .= ', '.$value;
		}
	}

	public function limit($value)
	{
		$this->_limit = "\nLIMIT ".$value;
	}

	public function __toString()
	{
		if (!$this->_insertInto && !$this->_deleteFrom) {
			return (
				$this->_select
				.$this->_from
				.$this->_join
				.$this->_where
				.$this->_groupBy
				.$this->_orderBy
				.$this->_limit
			);
		} elseif (!$this->_deleteFrom) {
			return (
				$this->insertInto
				.($this->_values ? $this->_values : $this->_select
				.$this->_from
				.$this->_join
				.$this->_where
				.$this->_groupBy
				.$this->_orderBy
				.$this->_limit)
				.$this->_onDuplicateKeyUpdate
			);
		} else {
			return (
				$this->_deleteFrom
				.$this->_join
				.$this->_where
				.$this->_orderBy
				.$this->_limit
			);
		}
	}
}
