<?php

class DbRevision
{
	static private function executeDowns($previous_revisions, $current_revisions)
	{
		foreach ($previous_revisions as $past_update)
		{
			foreach ($current_revisions as $update)
			{
				if ($past_update['ref'] == $update['ref'])
					break;
			}
			// if not found in revision array then execute the down
			if ($past_update['ref'] != $update['ref']) {
				$downs = json_decode($past_update['down']);
				if ($downs && is_array($downs)) {
					foreach ($downs as $down)
					{
						Db::getInstance()->execute($down);
						$query = new DbQuery();
						$query->deleteFrom('revision',);
					}
				}
			}
		}
	}

	static private function executeUps($current_revisions)
	{
		foreach ($current_revisions as $update)
		{
			$query = new DbQuery();
			$query->select('r.id_revision');
			$query->from('revision', 'r');
			$query->where('r.ref = "'.$update['ref'].'"');
			$query->limit(1);
			$check = Db::getInstance()->getAnswer($query);
			if (!$check) {
				foreach ($update['up'] as $sql) {
					Db::getInstance()->execute($sql);
				}
				$query = new DbQuery();
				$query->insertInto('revision', '(`ref`, `down`)');
				$query->values($update['ref']);
				$query->values(json_encode($update['down']));
				Db::getInstance()->execute($query);
			}
		}
	}

	static public function processRevision()
	{
		$query = new DbQuery();
		$query->select('ref');
		$query->select('down');
		$query->from('revision');
		$previous_revisions = Db::getInstance()->getAnswer($query);
		if (!$previous_revisions)
			$previous_revisions = array();
		$current_revisions = json_decode(file_get_contents(_CONFIG_DIR_.'/revision_db.json'), true);
		if (!$current_revisions || !is_array($current_revisions))
			return;
		if (count($previous_revisions) == count($current_revisions))
			return;
		self::executeDowns($previous_revisions, $current_revisions);
		self::executeUps($current_revisions);
	}
}
