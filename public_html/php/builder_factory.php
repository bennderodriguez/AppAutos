<?php

// builder_factory.php
class builder_factory 
{
    public $prog;

    public static function create($prog)
    {
		$prog = $prog.'.p';
		$DLC_PROG = "/".$prog;
		return new Programa($DLC_PROG);
    }

    public function getType()
    {
        return get_class($this);
    }
}

	class Programa extends builder_factory 
	{
		public function __construct($prog){
			$this->prog = $prog;
		}
	}

?>