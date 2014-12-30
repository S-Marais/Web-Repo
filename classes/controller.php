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

	/* Construct defines starting context rights and variables. */
	public function __construct()
	{
		$this->context = Context::getContext();
		$this->tpl = new tpl();
	}

	/* Start: run->action->method->renderer */
	public function run() {
		$this->getAction();
	}
	public function getAction() {
		if (!($this->action = Tools::getValue('action'))) {
			$this->setMedia();
			return $this->renderView();
		}
		$called_method = "process".$this->action;
		if (method_exists($this, $called_method)) {
			return $this->$called_method();
		}
		$this->setMedia();
		return $this->renderView();
	}

	/* Function used to set base template, and include css and js files */
	public function setMedia()
	{
		$this->addJQuery();
		$this->addJS('js/base_layout.js');
		if (!$this->template_name)
			$this->template_name = _TEMPLATE_DIR_.'/'
				.strtolower(preg_replace('/Controller$/', '', get_class($this)))
				.'/view.html';
	}

	/* The base method called before rendering the template */
	protected function renderView() {
		$this->render();
	}
	protected function render()
	{
		$this->tpl->assign('JS_FILES', $this->_js_files);
		$this->tpl->assign('JS_VARS', $this->_js_vars);
		$this->tpl->assign('CSS_FILES', $this->_css_files);
		$this->tpl->display($this->template_name);
	}

	/* Loads online google libraries for JQuery */
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

	/* This function is called to override or configure the helper tpl variables
	 * Helpers are simple templates parts to be loaded dynamicly
	 */
	public function configHelper()
	{
	}
	public function processRenderHelper()
	{
		$helper_name = Tools::getValue('helper_name');
		$this->template_name = _TEMPLATE_DIR_.'/'
			.strtolower(preg_replace('/Controller$/', '', get_class($this)))
			.'/helpers/'.$helper_name;
		$this->configHelper();
		$this->tpl->display($this->template_name);
	}
}
