<?php 
namespace Znddzxx112\Mysqlfun;

/**
* Mysql
* @method boolen select_db(String $db) 选择db
* @method mixed executeSQL(String $sql) 执行语句
* @method array get_error_info() 获取最近一次报错信息和错误码
*/
class MysqlClass
{
	/**
	 * mysql链接
	 */
	private $mysql_conn = null;

	/**
	 * resource
	 */
	private $result = null;

	/**
	 * select结果行数
	 */
	private $records = null;

	/**
	 * update delete受影响行数
	 * @var null
	 */
	private $affected = null;

	/**
	 * select结果数组
	 */
	private $arrayedResult = array();

	/**
	 * 错误信息
	 * @var array
	 */
	private $error_info = array();

	public function __construct($host, $port, $username, $password, $persistant = false)
	{
		if($persistant == false){
			$mysql_conn = mysql_connect($host.":".$port,$username,$password);
		}else{
			$mysql_conn = mysql_pconnect($host.":".$port,$username,$password);
		}
		if($mysql_conn != false){
			$this->mysql_conn = $mysql_conn;
		}else{
			//返回错误信息 错误码
			$this->get_error_info();
		}
	}

	public function __destruct()
	{
		if($this->mysql_conn != null){
			mysql_close($this->mysql_conn);
		}
	}

	/**
	 * 选择db
	 * @param  string $db [description]
	 * @return boolean
	 */
	public function select_db($db = '')
	{
		return mysql_select_db($db, $this->mysql_conn);
	}

	/**
	 * 执行语句
	 * @param  string $sql [description]
	 * @return [type]      [description]
	 */
	public function executeSQL($sql = '')
	{
		$this->result = mysql_query($sql, $this->mysql_conn);
		if($this->result == false){
			//获取错误信息
			$this->_fetch_error();
			return false;
		}

		if(gettype($this->result) == 'resource'){
			$this->records = @mysql_num_rows($this->result);
		} else {
			$this->records = 0;
		}

		//update delete result
		$this->affected = @mysql_affected_rows($this->result);

		//select result
		if($this->records > 0)
		{
			$this->arrayResults();
		}

		return true;
	}

	/**
	 * 返回select结果
	 * @return [type] [description]
	 */
	public function get_arrayresult()
	{
		return $this->arrayedResult;
	}

	/**
	 * 返回insert结果
	 * @return [type] [description]
	 */
	public function lastInsertID(){
        return mysql_insert_id($this->mysql_conn);
    }

    /**
     * 返回update insert结果
     * @return [type] [description]
     */
    public function get_affected(){
    	return $this->affected;
    }

	/**
	 * 获取最近一次报错信息和错误码
	 * @return [type] [description]
	 */
	public function get_error_info()
	{
		return $this->error_info;
	}

	private function arrayResult()
	{
		 $this->arrayedResult = mysql_fetch_assoc($this->result);
		 return $this->arrayedResult;
	}

	private function arrayResults()
	{
		if($this->records == 1){
            return $this->arrayResult();
        }
        $this->arrayedResult = array();
        while ($data = mysql_fetch_assoc($this->result)){
            $this->arrayedResult[] = $data;
        }
        return $this->arrayedResult;
	}

	private function _fetch_error()
	{
		$this->error_info = array(
				'error' => mysql_error($this->mysql_conn),
				'errno' => mysql_errno($this->mysql_conn)
			);
	}



}