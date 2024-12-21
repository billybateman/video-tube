<?php
/**
 * The Database Library handles database interaction for the application
 */
abstract class databaselibrary
{
	abstract protected function connect();
	abstract protected function disconnect();
	abstract protected function prepare($query);
	abstract protected function query();
	abstract protected function last_inserted_id();
	abstract protected function fetch($type = 'object');
        abstract protected function fetch_all($type = 'object');
	abstract protected function escape($data);
        abstract protected function insert($table, $data);
}

?>