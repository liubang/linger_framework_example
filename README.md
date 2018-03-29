## linger_framework示例项目

### 编译安装linger_framework

```shell
git clone https://github.com/iliubang/linger_framework.git
cd linger_framework
phpize
./configure --with-php-config=${php-config path}
make && sudo make install
echo "extension=linger_framework.so" >> ${php.ini}
```

### 安装依赖库

```shell
composer install
```

### 配置nginx

```
server {
    listen          80;
    server_name     test.iliubang.cn;
    root            /data/projects/test.iliubang.cn/public;
    index           index.php index.html;

    location ~ \.php$ {
        fastcgi_pass   php56;
        include        fastcgi.conf;
    }

    if (!-e $request_filename) {
        rewrite     ^/(.*)$     /index.php	last;
    }

    access_log	/data/logs/nginx/access/curr/test.iliubang.cn.log  main;
    error_log	/data/logs/nginx/nginx_error_test.iliubang.cn.log  error;
}
```

