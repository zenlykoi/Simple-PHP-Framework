<?php

/**
 * @see https://medoo.in/doc
 */

namespace App\Libs\Model;

interface ModelInterface 
{
	public function insert (array $data);

	public function select ($columns,array $conditions = []);

	public function update (array $data,array $conditions = []);

	public function delete (array $conditions);

	public function replace (array $columns, array $conditions = []);

	public function getJoin (array $join, $columns,array $conditions = []);

	public function has (array $conditions);

	public function hasJoin (array $join, array $conditions);

	public function count (array $conditions = []);

	public function countJoin (array $join, string $column, array $conditions = []);

	public function max (string $column, array $conditions = []);

	public function maxJoin (array $join, string $column, array $conditions = []);

	public function min (string $column, array $conditions = []);

	public function minJoin (array $join, string $column, array $conditions = []);

	public function avg (string $column, array $conditions = []);

	public function avgJoin (array $join, string $column, array $conditions = []);

	public function sum (string $column, array $conditions = []);

	public function sumJoin (array $join, string $column, array $conditions = []);

	public function rand ($columns, array $conditions = []);

	public function randJoin (array $join, $columns, array $conditions = []);

	public function id ();

	public function query(string $query, array $map = []);

	public function queryData(string $query, array $map = []);

	public function info ();

}