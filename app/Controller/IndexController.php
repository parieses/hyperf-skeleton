<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Controller;

use Hyperf\HttpServer\Contract\RequestInterface;

class IndexController extends AbstractController
{
    public function index()
    {
        $user = $this->request->input('user', 'adad ');
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
