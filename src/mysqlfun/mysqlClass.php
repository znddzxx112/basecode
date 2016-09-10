<?php 
namespace Znddzxx112\mysqlfun;

/**
* Mysql
* @method boolen select_db(String $db) 选择db
* @method mixed exec(String $sql) 执行语句
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
			#设定字符集
			mysql_set_charset("utf8",$this->mysql_conn);
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

	/* ********************
	 * public functions  *
	 * ********************/

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
	 * 事务处理
	 * @return [type] [description]
	 */
	public function transtion($status)
	{
		if(in_array($status, array("BEGIN","COMMIT","ROLLBACK"))) return false;
		return mysql_query($status, $this->mysql_conn);
	}

	/**
	 * 执行语句
	 * @param  string $code 999122 前三位表示模块名称 第四位代表语句类型1：查找，2：插入，3：更新，4删除 第五，六位代表次序
	 * @param  string $sql [<description>]
	 * @param  array  $data 数据
	 * @param  array  $type 数据对应的类型
	 * @return [type]       [description]
	 */
	public function exec($code = '', $sql = '' , $data = array(), $type = array())
	{
		$cleardata = $this->_clearData($data, $type);
		if($cleardata === false) return false;

		//变量替换
		$key = 1;
		foreach ($cleardata as $value) {
			$sql = str_replace('{:'.$key.'}', $value, $sql);
			$key += 1;
		}

		//执行sql
		$exec_result = $this->executeSQL($sql);
		if($exec_result == false) return false;

		$ob = $this->_getob($code);
		switch ($ob) {
			case '1':
				return $this->get_arrayresult();
				break;
			case '2':
				return $this->get_insert_id();
				break;
			case '3':
			case '4':
				return $this->get_affected();
				break;
			default:
				return false;
				break;
		}
	}

	/**
	 * 获取最近一次报错信息和错误码
	 * @return [type] [description]
	 */
	public function get_error_info()
	{
		return $this->error_info;
	}

	/* ********************
	 * private functions  *
	 * ********************/

	/**
	 * 执行语句
	 * @param  string $sql [description]
	 * @return [type]      [description]
	 */
	private function executeSQL($sql = '')
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

		$this->affected = @mysql_affected_rows($this->mysql_conn);

		if($this->records > 0)
		{
			$this->arrayResults();
		}

		return true;
	}

	/**
	 * 获取一条关联数组
	 * @return [type] [description]
	 */
	private function arrayResult()
	{
		 $this->arrayedResult = mysql_fetch_assoc($this->result);
		 return $this->arrayedResult;
	}

	/**
	 * 获取多条关联数组
	 * @return [type] [description]
	 */
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

	/**
	 * 返回数组结果
	 * @return [type] [description]
	 */
	private function get_arrayresult()
	{
		return $this->arrayedResult;
	}

	/**
	 * 返回insert结果
	 * @return [type] [description]
	 */
	private function get_insert_id(){
        return mysql_insert_id($this->mysql_conn);
    }

    /**
     * 返回影响行数
     * @return [type] [description]
     */
    private function get_affected(){
    	return $this->affected;
    }

    /**
	 * 获取错误信息
	 * @return [type] [description]
	 */
	private function _fetch_error()
	{
		$this->error_info = array(
				'error' => mysql_error($this->mysql_conn),
				'errno' => mysql_errno($this->mysql_conn)
			);
	}

    /**
	 * 获取操作符
	 * @param  [type] $code [description]
	 * @return [type]       [description]
	 */
	private function _getob($code)
	{
		if(strlen($code) < 4) return false;
		return substr($code, 3, 1);#第四位
	}

	private function _clearData($data = array(), $type = array())
	{
		if(count($data) != count($type)){
			return false;
		}
		//数据确定类型
		$cleardata = array();
		foreach ($type as $key => $value) {
			$preg_result = preg_match("/[ \']/", $data[$key]);
			if($preg_result>0) return false;
			$escap_data = mysql_real_escape_string($data[$key], $this->mysql_conn);
			switch ($value) {
				case 'none':
					$cleardata[] = $data[$key];
					break;
				case 'string':
					$cleardata[] = '\''.$escap_data.'\'';
					break;
				case 'int':
				case 'integer':
					$cleardata[] = (int)$escap_data;
					break;
				case 'float':
					$cleardata[] = (float)$escap_data;
					break;
				case 'double':
					$cleardata[] = (double)$escap_data;
					break;
				default:
					return false;
					break;
			}
		}
		return $cleardata;
	}

}