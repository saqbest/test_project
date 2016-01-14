<?php
namespace core;


class View
{

    function generate( $template_view, $data = 5)
    {
        include 'views/'.$template_view.'php';
    }
}