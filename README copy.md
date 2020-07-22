php -d swoole.use_shortname=Off bin/hyperf.php start
原启动方式:php bin/hyperf.php start
### 集成热更新
```composer
https://hyperf.wiki/2.0/#/zh-cn/watcher
composer require hyperf/watcher --dev
php bin/hyperf.php vendor:publish hyperf/watcher
php bin/hyperf.php server:watch
```
```shell
php bin/hyperf.php gen:migration create_admin_table 创建表迁移
composer test 单元测试
```