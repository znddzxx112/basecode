<?php 

namespace \Znddzxx112\Otherfun;


class BirdFlyClass implements Flypatten
{
	
	public function fly(string $who)
	{
		return $who . 'is flying';
	}
}