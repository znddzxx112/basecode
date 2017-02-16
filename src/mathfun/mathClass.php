<?php 
namespace Znddzxx112\mathfun;

/**
* math
* @method make_abs make_abs(int $num) 绝对值
*/
class MathClass
{
	private static $dict = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ+/';

	/**
	 * 绝对值
	 * @param  [type] $num [description]
	 * @return [type]      [description]
	 */
	public function make_abs($num)
	{
		return abs($num);
	}

	// question: $num 允许 0,1 之外的数字
	// question: $pos 应该改成 $num[$i]
	// 从其他进制转化成10进制
	public function todec($num,$from)
	{
		$result = 0;
        $length = strlen($num);

        $dict = substr(self::$dict, 0, $from);
        // $dict = self::$dict;

        for($i = 0; $i < $length; $i++) {
            $pos = strpos($dict,$num[$i]);
            if ($pos === false) {
                return 'valid charset';
            }

            $result = bcadd($result, bcmul($pos, bcpow($from, $length-1-$i)));
        }
        return $result;
	}

	// 从10进制转化到其他进制
	public function decto($num, $to)
	{
		$result = '';

        do {
            $result = self::$dict[bcmod($num, $to)] . $result;
            $num = bcdiv($num, $to);
        } while ($num > 0);

        return $result;
	}
}