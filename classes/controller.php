<?php

class Controller
{
	public $action;
	public $context;
	public $tpl;
	public $template_name = false;
	private $_js_files = array();
	private $_css_files = array();
	private $_js_vars = array();

	public function __construct()
	{
		$this->action = Tools::getValue('action');
		if (!$this->context)
			$this->context = Context::getContext();
		if (!$this->template_name)
			$this->template_name = _TEMPLATE_DIR_.'/'.strtolower(preg_replace('/Controller$/', '', get_class($this))).'/view.tpl.html';
		if (!$this->tpl)
			$this->tpl = new tpl();
		$this->setMedia();
	}

	/**
	 * Function used to set css and js files
	 */
	public function setMedia()
	{
	}

	protected function render()
	{
		$this->tpl->assign('JS_FILES', $this->_js_files);
		$this->tpl->assign('JS_VARS', $this->_js_vars);
		$this->tpl->assign('CSS_FILES', $this->_css_files);
		$this->tpl->display($this->template_name);
	}

	public function addJQuery() {
		$this->_js_files[] = "//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js";
	}

	public function addJsVars($js_var) {
		if (!empty($js_var)) {
			if (is_array($js_var)) {
				$this->_js_vars = array_merge($this->_js_vars, $js_var);
			}
		}
	}

	public function addJS($js_file) {
		if (!empty($js_file)) {
			if (!is_array($js_file)) {
				$this->_js_files[] = $js_file;
			} else {
				$this->_js_files = array_merge($this->_js_files, $js_files);
			}
		}
	}

	public function addCSS($css_file) {
		if (!empty($css_file)) {
			if (!is_array($css_file)) {
				$this->_css_files[] = $css_file;
			} else {
				$this->_css_files = array_merge($this->_css_files, $css_file);
			}
		}
	}
}
