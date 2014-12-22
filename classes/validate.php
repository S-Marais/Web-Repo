<?php

class Validate
{
	static public function isLoadedObject($object)
	{
		return $object->isLoadedObject();
	}

	static public function isInvalidObject($object)
	{
		$is_invalid = false;
		foreach ($object->_definition as $column => $type) {
			if (!$object->isValidValue($object->$column, $type))
				$is_invalid[] = $column;
		}
		return $is_invalid;
	}
}
