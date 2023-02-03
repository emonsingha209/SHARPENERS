<?php
    session_start();
    function ShowMessage()
    {
        if(isset($_SESSION['message']))
        {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
    }
    function ShowHeadMessage()
    {
        if(isset($_SESSION['Hmessage']))
        {
            echo $_SESSION['Hmessage'];
            unset($_SESSION['Hmessage']);
        }
    }
    function Condition()
    {
        if(isset($_SESSION['condition']))
        {
            echo "open-popup";
            unset($_SESSION['condition']);
        }
        else
        {
            echo "close-popup";
        }
    }
    function OkIcon()
    {
        if(isset($_SESSION['OkIcon']))
        {
            echo "ok-icon-open";
            unset($_SESSION['OkIcon']);
        }
        else
        {
            echo "ok-icon-close";
        }
    }
    function WarningIcon()
    {
        if(isset($_SESSION['WarningIcon']))
        {
            echo "warning-icon-open";
            unset($_SESSION['WarningIcon']);
        }
        else
        {
            echo "warning-icon-close";
        }
    }
?>