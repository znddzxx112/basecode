<?php 
namespace Znddzxx112\Stringfun;

/**
* string
* 转化 数组<=>字符串 explode implode parse_str
* 	   ascii<=>字符 ord chr
* 结构
* 		chunk_spilt 
* 增加
* 		add_cslashes addslashes
* 删除
* 		chop trim ltrim rtrim
* 替换
* 		htmlentities htmlspecialchars htmlspecialchars_decode
* 查找
*
* 
* 
*/
class StringClass
{
	/**
	 * addcslashes
	 * @param [type] $string   [description]
	 * @param [type] $charlist [description]
	 */
	public function add_cslashes($string, $charlist ='', $is_add = true)
	{
		if($is_add == true){
			return addcslashes($string, $charlist);
		}
		return stripcslashes($string);
		
	}

	/**
	 * slashes
	 * @param [type] $string [description]
	 */
	public function add_slashes($string, $is_add = true)
	{
		if($is_add == true){
			return addslashes($string);
		}
		return stripslashes($string);
	}

	/**
	 * bin2hex ascii 转化成16进制
	 * @param  [type] $string [description]
	 * @return [type]         [description]
	 */
	public function to_hex($string)
	{
		return bin2hex($string);
	}

	/**
	 * chop 删除字符串尾端预定字符
	 * @param  [type] $string   [description]
	 * @param  string $charlist [description]
	 * @return [type]           [description]
	 */
	public function to_chop($string,$charlist='')
	{
		if($charlist!=''){
			return chop($string,$charlist);
		}else{
			return chop($string);
		}
		
	}

	/**
	 * chr ascii转化为字符
	 * @param  [type] $ascii [description]
	 * @return [type]        [description]
	 */
	public function to_chr($ascii)
	{
		return chr($acsii);
	}

	/**
	 * ord 字符转化为ascii
	 * @param  [type] $char [description]
	 * @return [type]       [description]
	 */
	public function to_ord($char)
	{
		return ord($char);
	}

	/**
	 * 字符串分割
	 * @param  [type] $str    [description]
	 * @param  [type] $length [description]
	 * @param  [type] $end    [description]
	 * @return [type]         [description]
	 */
	public function to_chunk_split($str, $length ,$end)
	{
		return chunk_split($str, $length, $end);
	}

	/**
	 * ascii 键值 对应的次数
	 * @param  [type] $str [description]
	 * @return [type]      [description]
	 */
	public function to_count_chars($str)
	{
		return count_chars($str);
	}

	/**
	 * 分割字符串
	 * @param  [type] $delimiter [description]
	 * @param  [type] $str       [description]
	 * @return [type]            [description]
	 */
	public function to_explode($delimiter, $str)
	{
		return explode($delimiter, $str);
	}

	/**
	 * 数组组合成字符串
	 * @param  [type] $gule [description]
	 * @param  [type] $arr  [description]
	 * @return [type]       [description]
	 */
	public function to_implode($gule,$arr)
	{
		return implode($gule, $arr);
	}

	/**
	 * html实体转化表
	 * @return [type] [description]
	 */
	public function to_get_html_translation_table()
	{
		return get_html_translation_table();
	}

	/**
	 * 字符转成html实体
	 * @param  [type] $str [description]
	 * @return [type]      [description]
	 */
	public function to_htmlentities($str)
	{
		return htmlentities($str);
	}

	/**
	 * html实体转化为字符
	 * @param  [type] $str [description]
	 * @return [type]      [description]
	 */
	public function to_html_entity_decode($str)
	{
		return html_entity_decode($str);
	}

	/**
	 * 字符转成html实体
	 * @param  [type] $str [description]
	 * @return [type]      [description]
	 */
	public function to_htmlspecialchars($str)
	{
		return htmlspecialchars($str);
	}

	/**
	 * html实体转化为字符
	 * @param  [type] $str [description]
	 * @return [type]      [description]
	 */
	public function to_htmlspecialchars_decode($str)
	{
		return htmlspecialchars_decode($str);
	}

	/**
	 * 计算二个字符串之间的编辑距离
	 * @param  [type] $str1    [description]
	 * @param  [type] $str2    [description]
	 * @param  [type] $insert  [description]
	 * @param  [type] $replace [description]
	 * @param  [type] $delete  [description]
	 * @return [type]          [description]
	 */
	public function to_levenshtein($str1, $str2, $insert, $replace, $delete)
	{
		return levenshtein($str1, $str2, $insert, $replace, $delete);
	}

	/**
	 * 删除字符串左侧字符
	 * @param  [type] $str      [description]
	 * @param  [type] $charlist [description]
	 * @return [type]           [description]
	 */
	public function to_ltrim($str, $charlist)
	{
		return ltrim($str, $charlist);
	}

	/**
	 * 删除字符串右侧字符
	 * @param  [type] $str      [description]
	 * @param  [type] $charlist [description]
	 * @return [type]           [description]
	 */
	public function to_rtrim($str, $charlist)
	{
		return rtrim($str, $charlist);
	}

	/**
	 * 删除字符串两侧字符
	 * @param  [type] $str      [description]
	 * @param  [type] $charlist [description]
	 * @return [type]           [description]
	 */
	public function to_trim($str, $charlist)
	{
		return trim($str, $charlist);
	}

	/**
	 * 计算字符串的md5散列 结果32位字符串
	 * @param  [type] $str [description]
	 * @return [type]      [description]
	 */
	public function to_md5($str)
	{
		return md5($str);
	}

	/**
	 * 计算文件的md5散列值
	 * @param  [type] $file [description]
	 * @return [type]       [description]
	 */
	public function to_md5_file($file)
	{
		return md5_file($file);
	}

	/**
	 * 计算单词的metaphone值 发音值
	 * @param  [type] $word [description]
	 * @return [type]       [description]
	 */
	public function to_metaphone($word)
	{
		return metaphone($word);
	}

	/**
	 * 返回本地信息
	 * @param  [type] $element [description]
	 * @return [type]          [description]
	 */
	public function to_nl_langinfo($element)
	{
		return nl_langinfo($element);
	}

	/**
	 * \n 转化为 br
	 * @param  [type] $str [description]
	 * @return [type]      [description]
	 */
	public function to_nl2br($str)
	{
		return nl2br($str);
	}

	/**
	 * 数字格式化
	 * @param  [type] $number       数值
	 * @param  [type] $decimals     保留小数位
	 * @param  [type] $decimalpoint 小数点字符串
	 * @param  [type] $separator    千分位字符串
	 * @return [type]               [description]
	 */
	public function to_number_format($number, $decimals, $decimalpoint, $separator)
	{
		return number_format($number, $decimals, $decimalpoint, $separator);
	}

	/**
	 * 字符串转化为数组 形如 foo=bar&hello=world
	 * @param  [type] $str [description]
	 * @return [type]      [description]
	 */
	public function to_parse_str($str)
	{
		return parse_str($str);
	}

	public function to_print($str)
	{
		print $str;
	}

	public function to_printf()
	{
		printf(func_get_args());
	}

	public function set_local($constant, $location)
	{
		return setlocale($constant, $location);
	}

	/**
	 * 生成字符串sha1散列 固定长度40字符 160位
	 * @param  [type] $str [description]
	 * @return [type]      [description]
	 */
	public function to_sha1($str)
	{
		return sha1($str);
	}

	/**
	 * 生成文件的sha1散列 
	 * @param  [type] $file [description]
	 * @return [type]       [description]
	 */
	public function to_sha1_file($file)
	{
		return sha1_file($file);
	}

	/**
	 * 更加精确返回二个字符串的编辑次数
	 * @param  [type] $str1 [description]
	 * @param  [type] $str2 [description]
	 * @return [type]       [description]
	 */
	public function to_similar_text($str1, $str2)
	{
		return similar_text($str1, $str2);
	}

	/**
	 * 输出至字符串
	 * @return [type] [description]
	 */
	public function to_sprintf()
	{
		return sprintf(func_get_args());
	}

	/**
	 * 扫描
	 * @return [type] [description]
	 */
	public function to_sscanf()
	{
		return sscanf(func_get_args());
	}

	public function to_str_ireplace($find, $repalce, $str, $ignore = true)
	{
		if($ignore == true){
			return str_replace($find, $replace, $str, $ignore);
		}
		return str_ireplace($find, $replace, $str);
	}

	public function to_str_pad($str, $length, $pad_string, $pad_type)
	{
		return str_pad($str, $length, $pad_string, $pad_type);
	}

	public function to_str_repeat($input, $length)
	{
		return str_repeat($input, $length);
	}

	public function to_rot13($str)
	{
		return str_rot13($str);
	}

	public function to_str_shuffle($str)
	{
		return str_shuffle($str);
	}

	public function to_str_split($str, $length)
	{
		return str_split($str, $length);
	}

	public function to_str_word_count($str)
	{
		return str_word_count($str);
	}

	public function to_str_cmp($str1, $str2, $case=true)
	{
		if($case == true){
			//大小写不敏感
			return strcasecmp($str1, $str2);
		}
		return strcmp($str, $str2);
	}

	/**
	 * 在str中查找search,返回 search第一字母在str位置以后的字符串
	 * @param  [type]  $str    [description]
	 * @param  [type]  $search [description]
	 * @param  boolean $ignore [description]
	 * @return [type]          [description]
	 */
	public function to_strchr($str, $search, $ignore = true, $from = false)
	{
		if($ignore == true){
			return stristr($str, $search);
		}
		
		return strchr($str, $search);
	}

	/**
	 * 在str找到search时，距离start几个字符
	 * @param  [type] $str    [description]
	 * @param  [type] $charlist [description]
	 * @param  [type] $start  [description]
	 * @param  [type] $length [description]
	 * @return [type]         [description]
	 */
	public function to_strcspn($str, $charlist, $start, $length)
	{
		return strcspn($str, $charlist, $start, $length);
	}

	/**
	 * 剥去string中 除allow之外的html标签
	 * @param  [type] $string [description]
	 * @param  [type] $allow  [description]
	 * @return [type]         [description]
	 */
	public function to_strip_tags($string, $allow)
	{
		return strip_tags($string, $allow);
	}

	public function to_strpos($string, $needle, $ignore = true, $from = false)
	{
		if($ignore == true){
			//忽略大小写
			if($from == true){
				return strripos($string, $needle);
			}
			return stripos($string, $needle);
		}
		if($from == true){
			return strrpos($string, $needle);
		}
		return strpos($string, $needle);
		
	}

	public function to_strlen($str)
	{
		return strlen($str);
	}

	public function to_strrev($str)
	{
		return strrev($str);
	}

	public function to_strspn($string, $charlist)
	{
		return strspn($string, $charlist);
	}

	public function to_strstr($string, $search)
	{
		return strstr($string, $search);
	}

	public function to_strtolowerorupper($string, $lower = true)
	{
		if($lower == true){
			return strtolower($string);
		}
		return strtoupper($string);
	}

	/**
	 * 字符串替换
	 * @param  [type] $string [description]
	 * @param  [type] $from   [description]
	 * @param  [type] $to     [description]
	 * @return [type]         [description]
	 */
	public function to_strtr($string, $from , $to)
	{
		return strtr($string, $from, $to);
	}

	/**
	 * 切割字符串
	 * @param  [type] $str    [description]
	 * @param  [type] $start  [description]
	 * @param  [type] $length [description]
	 * @return [type]         [description]
	 */
	public function to_substr($str, $start, $length)
	{
		return substr($str, $start, $length);
	}

	/**
	 * 计算search在str出现的次数
	 * @param  [type] $str    [description]
	 * @param  [type] $search [description]
	 * @param  [type] $start  [description]
	 * @param  [type] $length [description]
	 * @return [type]         [description]
	 */
	public function to_substr_count($str, $search, $start, $length)
	{
		return substr_count($str, $search, $start, $length);
	}

	/**
	 * replace替换str一部分
	 * @param  [type] $str     [description]
	 * @param  [type] $replace [description]
	 * @param  [type] $start   [description]
	 * @param  [type] $length  [description]
	 * @return [type]          [description]
	 */
	public function to_substr_replace($str, $replace, $start, $length)
	{
		return substr_replace($str, $replace, $start, $length);
	}

	/**
	 * 首字母大写
	 * @param  [type] $string [description]
	 * @return [type]         [description]
	 */
	public function to_ucfirst($string)
	{
		return ucfirst($string);
	}

	/**
	 * 字符串单词首字母大写
	 * @param  [type] $string [description]
	 * @return [type]         [description]
	 */
	public function to_ucwords($string)
	{
		return ucwords($string);
	}

}