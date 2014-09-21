<?php

class Color
{
    public static $verbose = false;
    public $red;
    public $green;
    public $blue;

    public static function doc() {
        return file_get_contents('doc/Color.doc.txt');
    }

    public function __construct($color) {
        if (array_key_exists('rgb', $color)) {
            $this->red = (int)($color['rgb'] >> 16);
            $this->green = (int)($color['rgb'] >> 8) - ($this->red << 8);
            $this->blue = (int)$color['rgb'] - ($this->green << 8) - ($this->red << 16);
        } else {
            $this->red = (int)$color['red'];
            $this->green = (int)$color['green'];
            $this->blue = (int)$color['blue'];
        }
        if (Color::$verbose) {
            echo $this->__tostring().' constructed.'.PHP_EOL;
        }
    }

    public function __destruct() {
        if (Color::$verbose) {
            echo  $this->__tostring().' destructed.'.PHP_EOL;
        }
    }

    public function __tostring() {
        return 'Color( red: '.$this->red.', green:'.$this->green.', blue: '.$this->blue.' )';
    }

    public function add($color) {
        $res['red'] = (($tmp = $this->red + $color->red) > 255) ? 255 : $tmp;
        $res['green'] = (($tmp = $this->green + $color->green) > 255) ? 255 : $tmp;
        $res['blue'] = (($tmp = $this->blue + $color->blue) > 255) ? 255 : $tmp;
        return new Color($res);
    }

    public function sub($color) {
        $res['red'] = (($tmp = $this->red - $color->red) < 0) ? 0 : $tmp;
        $res['green'] = (($tmp = $this->green - $color->green) < 0) ? 0 : $tmp;
        $res['blue'] = (($tmp = $this->blue - $color->blue) < 0) ? 0 : $tmp;
        return new Color($res);
    }
    
    public function mult($factor) {
        $res['red'] = (($tmp = $this->red * $factor) > 255) ? 255 : $tmp;
        $res['green'] = (($tmp = $this->green * $factor) > 255) ? 255 : $tmp;
        $res['blue'] = (($tmp = $this->blue * $factor) > 255) ? 255 : $tmp;
        return new Color($res);
    }
}
