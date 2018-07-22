<?php

use Phalcon\Http\Request;

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
        $request = new Request();
        $logger = $this->di->get('logger');
        $logger->info('できないいいいいいいいい');

        $file_string = $this->request->getPost('image');
        $name = $this->request->getPost('name');

        $file = base64_decode($file_string);
        // $logger->info($file_string);

        file_put_contents("public/img/".$name, $file);
        // echo $this->request->getPost('name');

        // とりあえずbase64のstringままで保存
        // s3に切り替えるときにまた考える
        $image->s3_key = $file_string;
        $image->save();
    }
}
