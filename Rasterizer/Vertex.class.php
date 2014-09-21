<?php
require_once 'Color.class.php';

class Vertex
{
    public static $verbose = false;
    private $_x;
    private $_y;
    private $_z;
    private $_w = 1.0;
    private $_color;

    public static function doc() {
        return file_get_contents('doc/Vertex.doc.txt');
    }

    public function __construct($params) {
		if (!array_key_exists('x', $params) || !array_key_exists('y', $params) || !array_key_exists('y', $params))
			return false;
		$this->_x = $params['x'];
		$this->_y = $params['y'];
		$this->_z = $params['z'];
		$this->_color = (array_key_exists('color', $params) && is_a($params['color'], 'Color')) ? $params['color'] : new Color(array('rgb' => 0xffffff));
        if (vertex::$verbose) {
            echo $this->__tostring().' constructed.'.PHP_EOL;
        }
    }

    public function __destruct() {
        if (Vertex::$verbose) {
            echo  $this->__tostring().' destructed.'.PHP_EOL;
        }
    }

    public function __tostring() {
		if (Vertex::$verbose)
			return 'Vertex( x: '.$this->_x.', y: '.$this->_y.', z: '.$this->_z.', w: '.$this->_w.', '.$this->_color.' )';
		else
			return 'Vertex( x: '.$this->_x.', y: '.$this->_y.', z: '.$this->_z.', w: '.$this->_w.' )';
    }

    public function getX() {
        return $this->_x;
    }

    public function getY() {
        return $this->_y;
    }

    public function getZ() {
        return $this->_z;
    }

    public function getW() {
        return $this->_w;
    }

    public function getColor() {
        return $this->_color;
    }

    public function setX($value) {
        $this->_x = $value;
    }

    public function setY($value) {
        $this->_y = $value;
    }

    public function setZ($value) {
        $this->_z = $value;
    }

    public function setW($value) {
        $this->_w = $value;
    }

    public function setColor($value) {
		if (is_a($value, 'Color'))
			$this->_color = $value;
    }

}
