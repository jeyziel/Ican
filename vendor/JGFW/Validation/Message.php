<?php 

namespace JGFW\Validation;


class Message
{
    public function set($key,$message)
    {
        if(!isset($_SESSION['flash']) || empty($_SESSION['flash']))
        {
            $_SESSION['flash'][$key] = [];
        }

        $_SESSION['flash'][$key] = $message;
    }

    public function display($key)
    {
        if(isset($_SESSION['flash'][$key]))
        {
            $message = $_SESSION['flash'][$key];

            unset($_SESSION['flash'][$key]);

            return $message;
        }

        return '';
    }

    public function hasErrors()
    {
        if(isset($_SESSION['flash']) && (!empty($_SESSION['flash'])))
        {
            return true;
        }

        return false;
    }


}