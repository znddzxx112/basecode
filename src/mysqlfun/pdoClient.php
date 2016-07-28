<?php 
namespace Znddzxx112\Mysqlfun;

/**
* pdo
*/
class PdoClient
{
	private static $instances = array();

	private static $config = array();

	private $wheres = array();

	private $params = array();

	private $selects = array();

	private $froms = array();

	public function get_instance()
	{
		
	}

	public function set_config()
	{

	}

	public function __construct()
	{
		
	}

	public function where($where, $params = '')
	{
		if(is_string($where)){
			$this->wheres[] = strpos($where, "=") ? " $where " : " $where = ? ";
		}
		if(is_array($where)){
			foreach (array_values($where) as $w) {
				$this->wheres[] = strpos($w, "=") ? " $w " : " $w = ? ";
			}
		}
		if($params != ''){
			$this->addparams($params);
		}
		return $this;
	}

	public function select($statement)
	{
		$this->selects[] = $statement;
		return $this;
	}

	public function from($statement)
	{
		$this->froms[] = $statement;
		return $this;
	}

	public function execQuery()
	{
		$sql = $this->buildSQL();
		echo $sql;
	}

	/* **************** *
	 * private function *
	 * **************** */

	private function buildSQL()
	{
		$sql  = '';
		$sql .= $this->prepareSelectString();
		$sql .= $this->prepareFromString();
		$sql .= $this->prepareWhereString();
		return $sql;
	}

	private function prepareSelectString()
	{
		if(!empty($this->selects)){
			return "Select " . implode(" , ", $this->selects);
		} else {
			return "Select * ";
		}
		return '';
	}

	private function prepareFromString()
	{
		if(!empty($this->froms)){
			if(count($this->froms) == 1){
				return "From " . implode(" ", $this->froms);
			} else {
				return "From " . implode(" , ", $this->froms);
			}
		} else {
			return '';
		}
	}

	private function prepareWhereString()
	{
		if(!empty($this->wheres)){
			return " WHERE 1=1 AND ".implode(" AND ", $this->wheres);
		}
		return '';
	}

	private function addparams($params)
	{
		if(is_string($params)){
			$this->params[] = $params;
		}
		if(is_array($params)){
			foreach ($params as $p) {
				$this->params[] = $p;
			}
		}
	}

}