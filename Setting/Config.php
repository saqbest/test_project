<?php
namespace Setting;

class Config
{
    const HOST='localhost';
    const USER='root';
    const PASSWORD='';
    const DATABASE='positions';

    public static function getBaseURL(){
        return 'http://'. $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    }

}
