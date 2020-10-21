<?php

/**
 * @see https://medoo.in/doc
 */

namespace App\Libs\Model;

use App\Libs\Model\ModelInterface;
use Medoo\Medoo;

class Model implements ModelInterface
{
	protected string $table;
	private Medoo $database;

	function __construct (string $table)
	{
		$this->table = $table;

		$this->database = new Medoo([
		    'database_type' => SQL_SERVER_TYPE,
		    'database_name' => SQL_DB_NAME,
		    'server' 		=> SQL_SERVER_HOST,
		    'port' 			=> SQL_SERVER_PORT,
		    'username' 		=> SQL_USERNAME,
		    'password' 		=> SQL_PASSWORD
		]);
	}

	public function insert (array $data)
	{
		return $this->database->insert($this->table, $data);
	}

	public function select ($columns,array $conditions = [])
	{
		return $this->database->select($this->table, $columns, $conditions);
	}

	public function update (array $data,array $conditions = [])
	{
		return $this->database->update($this->table, $data, $conditions);
	}

	public function delete (array $conditions)
	{
		return $this->database->delete($this->table, $conditions);
	}

	public function replace (array $columns, array $conditions = [])
	{
		return $this->database->replace($this->table, $columns, $conditions);
	}

	public function getJoin (array $join, $columns,array $conditions = [])
	{
		return $this->database->get($this->table, $join, $columns, $conditions);
	}

	public function has (array $conditions) 
	{
		return $this->database->has($this->table, $conditions);
	}

	public function hasJoin (array $join, array $conditions) 
	{
		return $this->database->has($this->table, $join, $conditions);
	}

	public function count (array $conditions = []) 
	{
		return $this->database->count($this->table, $conditions);
	}

	public function countJoin (array $join, string $column, array $conditions = [])
	{
		return $this->database->count($this->table, $join, $column, $conditions);
	}

	public function max (string $column, array $conditions = []) 
	{
		return $this->database->max($this->table, $column, $conditions);
	}

	public function maxJoin (array $join, string $column, array $conditions = [])
	{
		return $this->database->max($this->table, $join, $column, $conditions);
	}

	public function min (string $column, array $conditions = []) 
	{
		return $this->database->min($this->table, $column, $conditions);
	}

	public function minJoin (array $join, string $column, array $conditions = [])
	{
		return $this->database->min($this->table, $join, $column, $conditions);
	}

	public function avg (string $column, array $conditions = []) 
	{
		return $this->database->avg($this->table, $column, $conditions);
	}

	public function avgJoin (array $join, string $column, array $conditions = [])
	{
		return $this->database->avg($this->table, $join, $column, $conditions);
	}

	public function sum (string $column, array $conditions = []) 
	{
		return $this->database->sum($this->table, $column, $conditions);
	}

	public function sumJoin (array $join, string $column, array $conditions = [])
	{
		return $this->database->sum($this->table, $join, $column, $conditions);
	}

	public function rand ($columns, array $conditions = []) 
	{
		return $this->database->rand($this->table, $columns, $conditions);
	}

	public function randJoin (array $join, $columns, array $conditions = [])
	{
		return $this->database->rand($this->table, $join, $columns, $conditions);
	}

	public function id ()
	{
		return $this->database->id();
	}

	public function query(string $query, array $map = [])
	{
		return $this->database->query($query, $map);
	}

	public function queryData(string $query, array $map = [])
	{
		return $this->database->query($query, $map)->fetchAll();
	}

	public function info ()
	{
		return $this->database->info();
	}
	
}