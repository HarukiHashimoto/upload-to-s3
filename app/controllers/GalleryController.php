<?php

class GalleryController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $logger = $this->di->get('logger');
        $image = new Image();
        $data = $image->findfirst();
        print_r($data);
        $logger->info(var_export($data->id, true));
    }

}
