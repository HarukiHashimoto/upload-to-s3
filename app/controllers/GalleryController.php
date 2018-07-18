<?php

// オブジェクトをJSON形式へ変換する（日本語をunicodeのままで整形して．）
function json_safe_encode($data)
{
    return json_encode($data, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
}

class GalleryController extends \Phalcon\Mvc\Controller
{
    public function indexAction()
    {
        $image = new Image();
        $data = $image->find();
        $this->view->images = json_safe_encode($data);
    }

    public function viewAllAction()
    {
        $image = new Image();
        $data = $image->find();
        return json_safe_encode($data);
    }

    public function uploadAction()
    {
        $image = new Image();
        $logger = $this->di->get('logger');
        $logger->info('できないいいいいいいいい');
        $logger->info($_POST('name'));
        // $file = $request->get('image');
        $name = $this->request->getPost('name');
        // file_put_contents("public/img/", $file);
        // // echo $this->request->getPost('name');
        $image->s3_key = $name;
        $image->save();
    }
}
