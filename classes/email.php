<?php

class Email
{
	/* headers variables */
	public $content_type = 'text/html; charset=iso-8859-1';
	public $subject;
	public $from = 'gabriel.marais@gmail.com';
	public $reply_to;
	public $to;
	public $Cc;
	public $Bcc;

	/* content template */
	public $template_name;
	public $tpl_vars = array();

	public function __construct($subject, $to, $template_name)
	{
		if (!is_array($to))
			$to = array($to);
		$this->to = $to;
		$this->subject = $subject;
		$this->template_name = $template_name;
	}

	public function addVar($key, $value)
	{
		$this->tpl_vars[$key] = $value;
	}

	public function send()
	{
		$headers = 'MIME-Version: 1.0'."\r\n"
		.($this->content_type ? 'Content-type: '.$this->content_type."\r\n" : '')
		.($this->from ? 'From: '.$this->from."\r\n" : '')
		.($this->reply_to ? 'Reply-to: '.implode(',', $this->reply_to)."\r\n" : '')
		.($this->to ? 'To: '.implode(',', $this->to)."\r\n" : '')
		.($this->Cc ? 'Cc: '.implode(',', $this->Cc)."\r\n" : '')
		.($this->Bcc ? 'Bcc: '.implode(',', $this->Bcc)."\r\n" : '');

		/* Fetching the template */
		$tpl = new tpl();
		foreach ($this->tpl_vars as $key => $value) {
			$tpl->assign($key, $value);
		}
		$content = $tpl->fetch(_TEMPLATE_DIR_.'/emails/'.$this->template_name);
		$content = wordwrap($content, 70, "\r\n");
		echo 'to :['.implode(',', $this->to).']<br />'
			.'subject :['.$this->subject.']<br />'
			.'content :['.$content.']<br />'
			.'headers :['.$headers.']<br />'
			.'<br/><br/><br/>['
			.implode(',', $this->to).']['.$this->subject.']['.$content.']['.$headers.']'
		;
		mail(implode(',', $this->to), $this->subject, $content, $headers);
	}
}
