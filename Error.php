<?php

class Error {
    public $message;
    public $documentation_url;

    public function setDocumentationUrl($documentation_url)
    {
        $this->documentation_url = $documentation_url;
    }

    public function getDocumentationUrl()
    {
        return $this->documentation_url;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function getMessage()
    {
        return $this->message;
    }


}