<?php 

namespace Znddzxx112\Mysqlfun;
/**
* mysqli
*/
class MysqliClient
{
	private $_mysqli = null;

	private $error_info = array();

	private $_mysqli_result=array();

	public function __construct($host, $username, $passwd, $dbname, $port = 3306)
	{
		$this->_mysqli = new \mysqli($host, $username, $passwd, $dbname, $port);
		if($this->_mysqli->connect_errno){
			$this->set_error_info($this->_mysqli->connet_error, $this->_mysqli->connect_errno);
			throw new Exception($this->_mysqli->connet_error, $this->_mysqli->connect_errno);
		}
		$this->_mysqli->set_charset('utf8');
	}

	public function __destruct()
	{
		if($this->_mysqli != null){
			$this->_mysqli->close();
		}
	}

	/**
	 * 执行语句
	 * @param  string $code 999122 前三位表示模块名称 第四位代表语句类型1：查找，2：插入，3：更新，4删除 第五，六位代表次序
	 * @param  string $sql [<description>]
	 * @param  array  $data 数据
	 * @param  array  $type 数据对应的类型
	 * @return [type]       [description]
	 */
	public function exec($code = '', $sql = '' , $data = array())
	{
		$stmt = $this->_mysqli->prepare($sql);

		//绑定变量
		if(count($data)>0){
			call_user_func_array(array($stmt, 'bind_param'), $this->makeValuesReferenced($data));
		}

		$stmt->execute();

		$this->_mysqli_result = $stmt->get_result();

		$this->_num_rows = $stmt->num_rows;

		$this->_affected_rows = $stmt->affected_rows;

		$this->_insert_id = $stmt->insert_id;

		$stmt->close();

		$ob = substr($code, 3, 1);
		switch ($ob) {
			case '1':
				return $this->get_arrayresult();
				break;
			case '2':
				return $this->_insert_id;
				break;
			case '3':
			case '4':
				return $this->_affected_rows;
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

	/* ***************** *
	 * private functions * 
	 * ***************** */

	private function makeValuesReferenced($arr){
	    $refs = array();
	    foreach($arr as $key => $value)
	        $refs[$key] = &$arr[$key];
	    return $refs;
	}

	private function get_arrayresult()
	{
		$array_result = array();
		if ($this->_num_rows == 1){
			$array_result = $this->_mysqli_result->fetch_assoc();
		} elseif($this->_num_rows > 1){
			while ($row = $this->_mysqli_result->fetch_assoc()) {
				$array_result[] = $row;
			}
		}
		return $array_result;
	}

	private function set_error_info($error, $errno)
	{
		$this->error_info = array(
							'error' => $error,
							'errno' => $errno
			);
	}
}