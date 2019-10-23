<?php
class Color {

    public $red = 0;
    public $green = 0;
    public $blue = 0;
    private $_tmp = 0;
    public static $verbose = False;
    
    public function __construct(array $args) {
    if (array_key_exists('rgb', $args)) {
        $this->convertHex($args['rgb']);
    }
    else
        $this->setColors($args['red'], $args['green'], $args['blue']);
    if (self::$verbose === True)
        print('Color( red: '.sprintf("%3s",$this->red).', green: '.sprintf("%3s",$this->green).', blue: '.sprintf("%3s", $this->blue).' ) constructed.'.PHP_EOL);
}

    public function convertHex( $input ) {
        $tmp = intval($input);
        $tmp = dechex($tmp);	
        $len = 6 - strlen($tmp);
        $i = 0;
        $hex = NULL;
        while ($i < $len)
        {
            $hex = $hex."0";
            $i++;
        }
        $hex = $hex.$tmp;
        $input = $hex;
        if (strlen($input) == 6) {
            $colorVal = hexdec($input);
            $this->setColors((0xFF & ($colorVal >> 0x10)), (0xFF & ($colorVal >> 0x8)), (0xFF & $colorVal));
        }
        elseif (strlen($input) == 3)
            $this->setColors(hexdec(str_repeat(substr($input, 0, 1), 2)), hexdec(str_repeat(substr($input, 0, 1), 2)), hexdec(str_repeat(substr($input, 2, 1), 2)));
        else 
            return false;
        return ;
    }

    public function add( $color ) {
        return (new Color( array( 'red' => $color->red + $this->red, 'green' => $color->green + $this->green, 'blue' => $color->blue + $this->blue )));
    }

    public function sub( $color)
    {
        return (new Color( array( 'red' => $this->red - $color->red, 'green' => $this->green - $color->green, 'blue' => $$this->blue - $color->blue)));
    }

	public function mult ( $color)
	{
		$red = $color * $this->red;
		$green = $color * $this->green;
		$blue = $color * $this->blue;
		return (new Color( array( 'red' => $color * $this->red, 'green' => $color * $this->green, 'blue' => $color * $this->blue)));
	}
    public function setColors($r, $g, $b) {
        if ($r)
            $this->red = $r;
        if ($g)
            $this->green = $g;
        if ($b)
            $this->blue = $b;
    }



    public function __toString() {
        return ('Color( red: ' . sprintf("%3s", $this->red) .', green: ' . sprintf("%3s", $this->green) . ', blue: '. sprintf("%3s", $this->blue) .' )');
      }

      static function doc() {
          return (file_get_contents('Color.doc.txt'));
      }


    public function __destruct() {
 	if (self::$verbose === True)
			print('Color( red: '.sprintf("%3s", $this->red).', green: '.sprintf("%3s", $this->green).', blue: '.sprintf("%3s", $this->blue).' ) destructed.'.PHP_EOL);
	   }
}
?>