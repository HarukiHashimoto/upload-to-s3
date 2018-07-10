<?php

class InfoController extends \Phalcon\Mvc\Controller
{

    public function infoAction()
    {
        phpinfo();
        $this->view->setVar("postId", '111111');
    }

}
