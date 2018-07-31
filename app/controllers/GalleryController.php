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
        //$logger = $this->di->get('logger');
	/*
        $client = new S3Client([
            'profile' => 'default',
            'version' => 'latest',
            'region' => 'us-east-1',
        ]);
        $bucket_name = 'haruki-training-bucket';
        foreach ($data as $item) {
            $s3_key = $item->s3_key;

            try {
                $res = $client->getObject([
                    'Bucket' => $bucket_name,
                    'Key' => $s3_key
                ]);
                $logger->log('ダウンロード成功');
                $logger->log($res['ContentType']);
                $file_path = 'public/img/'.$s3_key;
                file_put_contents($file_path, $res['Body']);

            } catch (S3Exeption $exc) {
                $logger->error('ダウンロード失敗');
                $logger->error($exc->getMessage());
            }
        }
	*/
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
        //$logger = $this->di->get('logger');
//        $aws_conf = require(dirname(__FILE__).'/../../vendor/aws/conf.php');
//        $logger->info(var_export($aws_conf), true);
        $client = new S3Client([
            'profile' => 'default',
            'version' => 'latest',
            'region' => 'us-east-1',
        ]);
        $bucket_name = 'haruki-training-bucket';

        foreach ($request->getUploadedFiles() as $file) {
            $name = $file->getName();
            $file->moveTo('public/img/'.$file->getName());
            $file_path = 'public/img/'.$file->getName();
            $key = $name;
            $image->s3_key = $key;
            $image->save();


            try {
                $res = $client->putObject([
                    'Bucket' => $bucket_name,
                    'Key' => $key,
                    'SourceFile' => $file_path
                ]);
                //$logger->log('アップロード成功');
                //$logger->log(var_export($res), true);
            } catch (S3Exception $exc) {
                //$logger->error('アップロード失敗');
                //$logger->error($exc->getMessage());
            }
        }

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
