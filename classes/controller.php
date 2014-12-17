<?php

class Controller
{
	public $token;
	public $tpl;
	public $template_name = false;
	private $_js_files = array();
	private $_css_files = array();

	public function __construct()
	{
		$this->token = Tools::getValue('token');
		$this->template_name = _TEMPLATE_DIR_.'/'.strtolower(preg_replace('/Controller$/', '', get_class($this))).'/view.tpl.html';
		$this->tpl = new tpl();
	}

	protected function render()
	{
		$this->tpl->assign('JS_FILES', $this->_js_files);
		$this->tpl->assign('CSS_FILES', $this->_css_files);
		$this->tpl->display($this->template_name);
	}

	public function _addJS($js_file) {
		if (!empty($js_file)) {
			if (!is_array($js_file)) {
				$this->_js_files[] = $js_file;
			} else {
				$this->_js_files = array_merge($this->_js_files, $js_files);
			}
		}
	}

	public function _addCSS($css_file) {
		if (!empty($css_file)) {
			if (!is_array($css_file)) {
				$this->_css_files[] = $css_file;
			} else {
				$this->_css_files = array_merge($this->_css_files, $css_file);
			}
		}
	}
}
