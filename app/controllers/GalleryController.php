<?php

require(dirname(__FILE__).'/../../vendor/autoload.php');

use Phalcon\Http\Request;
use Aws\S3\S3Client;

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
        $logger->info(var_export($request->getUploadedFiles(), true));

        foreach ($request->getUploadedFiles() as $file) {
            $file->moveTo('public/img/'.$file->getName());
            $image->s3_key = 'img/'.$file->getName();
            $image->save();
            $logger->info($file->getName());
        }

        $client = S3Client::factory(dirname(__FILE__).'/../../vendor/aws/conf.php');


//        $file = $request->getPost('image');
//        $name = $request->getPost('name');

//        $file = base64_decode($file_string);


        // echo $this->request->getPost('name');

        // とりあえずbase64のstringままで保存
        // s3に切り替えるときにまた考える
//        $image->s3_key = "img/".$name;
//        $image->save();
    }
}
