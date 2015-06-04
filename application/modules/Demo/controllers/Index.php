<?php
use Yaf\Dispatcher;
use Yaf\Controller_Abstract;

class IndexController extends  Yaf\Controller_Abstract
{

    public function indexAction()
    {
        Yaf\Dispatcher::getInstance()->autoRender(FALSE);

        echo 'hello Modules';


    }
}