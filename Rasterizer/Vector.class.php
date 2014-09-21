<?php

class Vector
{
    public static $verbose = false;
    private $_x;
    private $_y;
    private $_z;
    private $_w = 0.0;

    public static function doc() {
        return file_get_contents('doc/Vector.doc.txt');
    }

    public function __construct($params) {
		if (!array_key_exists('dest', $params) && is_a($params['dest'], 'Vertex'))
			return false;
		$dest = $params['dest'];
		$orig = (array_key_exists('orig', $params) && is_a($params['orig'], 'Vertex')) ? $params['orig'] : new Vertex(array('x' => 0, 'y' => 0, 'z' => 0));
		$this->_x = $dest->getX() - $orig->getX();
		$this->_y = $dest->getY() - $orig->getY();
		$this->_z = $dest->getZ() - $orig->getZ();
        if (Vector::$verbose) {
            echo $this->__tostring().' constructed.'.PHP_EOL;
        }
    }

    public function __destruct() {
        if (Vector::$verbose) {
            echo  $this->__tostring().' destructed.'.PHP_EOL;
        }
    }

    public function __tostring() {
		return 'Vector( x: '.round($this->_x, 2).', y: '.round($this->_y, 2).', z: '.round($this->_z, 2).', w: '.$this->_w.' )';
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

    public function magnitude() {
		return sqrt(pow($this->_x, 2) + pow($this->_y, 2) + pow($this->_z, 2));
	}

	public function normalize() {
		$lenght = $this->magnitude();
		$dest =  new Vertex(array(
			'x'=> $this->_x / $lenght,
			'y'=> $this->_y / $lenght,
			'z'=> $this->_z / $lenght,
		));
		return new vector(array('dest' => $dest));
	}

	public function add(Vector $rhs) {
		$dest = new Vertex(array(
			'x'=> $this->_x + $rhs->getX(),
			'y'=> $this->_y + $rhs->getY(),
			'z'=> $this->_z + $rhs->getZ(),
		));
		return new vector(array('dest' => $dest));
	}

	public function sub(Vector $rhs) {
		$dest = new Vertex(array(
			'x'=> $this->_x - $rhs->getX(),
			'y'=> $this->_y - $rhs->getY(),
			'z'=> $this->_z - $rhs->getZ(),
		));
		return new vector(array('dest' => $dest));
	}

	public function opposite() {
		$dest = new Vertex(array(
			'x'=> -$this->_x,
			'y'=> -$this->_y,
			'z'=> -$this->_z,
		));
		return new vector(array('dest' => $dest));
	}

	public function scalarProduct() {
		
	}
}
