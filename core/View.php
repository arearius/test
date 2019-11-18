<?php

namespace core;

class View
{

    public function show($page)
    {
        require_once( __DIR__ . "\\..\\views\\" . $page . ".php");
    }

}