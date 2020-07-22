<?php

declare(strict_types=1);
namespace App\Admin\Controller;

use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\Redis\Redis as Redis;
class IndexController extends AbstractController
{
    public function index()
    {
        $redis = $this->container->get(Redis::class);
        $result = $redis->keys('*');
        return $result;
        $user = $this->request->input('user', '1212');
        $method = $this->request->getMethod();

        return [
            'method' => $method,
            'message' => "Hello {$user}",
        ];
    }

    public function test()
    {
        return ['12','112'];
    }
    public function update(RequestInterface $request)
    {
        
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->getPath();
            $extension = $request->file('photo')->getExtension();
            $file = $request->file('photo');
            return $file;
            $file->moveTo('/image/bar.'.$extension);
            // 通过 isMoved(): bool 方法判断方法是否已移动
            if ($file->isMoved()) {
                return ['code'=>1,'status'=>'success','message'=>'上传成功'];
            }
        }
        return ['code'=>0,'status'=>'error','message'=>'上传失败'];
    }
}
