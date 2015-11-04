<?php

namespace Controllers;

class HomeController
{

    private $message;

    public function message()
    {
        $this->message = 'Here is the first Action';
        return $this;
    }

    public function out()
    {
        echo $this->message;
    }

}