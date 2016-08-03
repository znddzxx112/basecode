<?php 
namespace Znddzxx112\Mysqlfun;

/**
* pdo
*/
class PdoClient
{
	private static $instances = array();

	private static $config = array();

	private $_pdoclient = null;

	private $stmt = null;

	private $wheres = array();

	private $params = array();

	private $selects = array();

	private $froms = array();

	public static function get_instance($instance = 'default')
	{
		if(!array_key_exists($instance, self::$instances)){

			if(!array_key_exists($instance, self::$config)){
				return false;
			}

			self::$instances[$instance] = new \Znddzxx112\Mysqlfun\PdoClient(self::$config[$instance]['dsn'], 
																				self::$config[$instance]['username'], 
																				self::$config[$instance]['passwd']
																			);
		}
		return self::$instances[$instance];
	}

	public static function set_config($instance = 'default', $dsn = '', $username = '', $passwd = '')
	{
		self::$config[$instance]['dsn'] 	= $dsn;
		self::$config[$instance]['username']= $username;
		self::$config[$instance]['passwd'] 	= $passwd;
		return true;
	}

	public function __construct($dsn = '', $username = '', $passwd = '')
	{
		$this->_pdoclient = new \PDO($dsn, $username, $passwd);
	}

	/* **************** *
	 * public function  *
	 * **************** */

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

	public function execQuery($type = "select")
	{
		$sql = $this->buildSQL();
		$this->stmt = $this->_pdoclient->prepare($sql);

		// try {
		// 	call_user_func_array(array($this->stmt, 'bindParam'), $this->makereference($this->params));
		// } catch(\Execption $e) {
		// 	throw $e;
		// }

		$this->stmt->execute($this->params);
		if( $type == "select" ) {
			$rowcount = $this->stmt->rowCount();
			$result_arr = array();
			if( $rowcount > 1 ) {
				while ($row = $this->stmt->fetch(\PDO::FETCH_ASSOC)) {
					$result_arr[] = $row;
				}
			} else {
				$result_arr  = $this->stmt->fetch(\PDO::FETCH_ASSOC);
			}
			return $result_arr;
		} elseif( $type == "insert" ) {
			return $this->_pdoclient->lastInsertId;
		} elseif( $type == "update" || $type == "delete" ) {
			return $this->stmt->rowCount();
		}
		return false;
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

	private function makereference($params = array())
	{
		$reference = array();
		foreach ($params as $key => $param) {
			$reference[$key] =& $params[$key];
		}
		return $reference;
	}

}