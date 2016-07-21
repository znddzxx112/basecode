<?php 
namespace Znddzxx112\Ftpfun;

/**
* ftp
* @method boolean connect() connect(string $host,string $port, int $timeout) 连接ftp
* @method boolean login() login(string $username, string $password) 登陆ftp
*/
class FtpClass
{
	private $_ftp_conn = null;

	function __construct($host = '', $port = '', $timeout = 90)
	{
		if($host != '' && $port != '' && is_null($this->_ftp_conn)){
			$this->_ftp_conn = ftp_connect($host, $port, $timeout);
		}
	}

	public function __destruct()
	{
		if(!is_null($this->_ftp_conn)){
			ftp_close($this->_ftp_conn);
		}
	}

	/**
	 * 连接ftp
	 * @param  string  $host    [description]
	 * @param  string  $port    [description]
	 * @param  integer $timeout [description]
	 * @return [type]           [description]
	 */
	public function connect($host = '', $port = '', $timeout = 90)
	{
		if($host != '' && $port != '' && is_null($this->_ftp_conn)){
			$this->_ftp_conn = ftp_connect($host, $port, $timeout);
			return true;
		}else{
			return false;
		}
	}

	/**
	 * 登陆ftp
	 * @param  [type] $username [description]
	 * @param  [type] $password [description]
	 * @return [type]           [description]
	 */
	public function login($username = '', $password = '')
	{
		if(!is_null($this->_ftp_conn)){
			return ftp_login($this->_ftp_conn, $username, $password);
		}else{
			return false;
		}
	}

	
}