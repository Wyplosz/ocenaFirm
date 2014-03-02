<?php


class Mail extends CModel
{
	public $to;	
	public $subject;	
	public $body;
	public $headers;
	
	public function attributeNames()
	{
		return array( 'to' => 'to', 'body' => 'body');
	}
	
	public function send()
	{
		mail($this->to, $this->subject, $this->body, $this->headers);
	}

}
