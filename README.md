# edu_train
教育培训管理系统

## 系统环境
PHP+MYSQL+LINUX+Nginx+Laravel
- PHP: `7.0.32`
- MYSQL: `5.7.24`
- LINUX: `CentOS 7.0`
- Nginx: `1.14.1`
- Laravel: `5.5.28`
## 开发规范

### 命名规范

#### 目录和文件
- 目录不强制规范，小写+下划线模式；
- 类库、函数文件统一以.php为后缀；
- 类的文件名均以命名空间定义，并且命名空间的路径和类库文件所在路径一致；
- 类名和类文件名保持一致，统一采用驼峰法命名（首字母大写）；

#### 函数和类、属性命名
- 类的命名采用驼峰法，并且首字母大写，需要添加Controller后缀，例如UserController；
- 函数的命名使用小写字母和下划线（小写字母开头）的方式，例如 get_client_ip；
- 方法的命名使用驼峰法，并且首字母小写，例如 getUserName；
- 属性的命名使用驼峰法，并且首字母小写，例如 tableName、instance；
- 类的私有方法命名以下划线开头，后面跟上小驼峰，例如_getUser；
- 以双下划线“”打头的函数或方法作为魔法方法，例如 `call和__autoload`；

#### 常量和配置
- 常量以大写字母和下划线命名，例如 APP_PATH和 THINK_PATH；
- 配置参数以小写字母和下划线命名，例如 url_route_on 和url_convert；

#### 数据表和字段
- 数据表和字段采用小写加下划线方式命名，且不能以下划线开头，例如`edu_train`表和`user_name`字段，严禁使用驼峰和中文作为数据表字段命名。

### 项目开发规范
- 按照 [Laravel开发规范](https://learnku.com/docs/laravel-specification/5.5)执行

## 本地测试环境搭建指南

1. 利用`php artisan key:generate`生成APP_KEY
2. 在根目录下创建`.env`文件，将以下内容复制到文件中，按需修改文件内容
```env
APP_NAME=edu_train
APP_ENV=local
APP_KEY=第1步中生成的APP_KEY
APP_DEBUG=true
APP_LOG_LEVEL=debug
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=112.74.33.38
DB_PORT=3306
DB_DATABASE=edu_train
DB_USERNAME=edu_dev
DB_PASSWORD=w5CKCjT4rryCwrma

BROADCAST_DRIVER=log
CACHE_DRIVER=file
SESSION_DRIVER=file
SESSION_LIFETIME=120
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1
```

3. 为项目配置域名。

## 参考资料
- Laravel速查手册[速查手册](https://learnku.com/docs/laravel-cheatsheet/5.8) 
- Laravel核心[核心参考](https://learnku.com/docs/laravel-core-concept/5.5)

## 注意事项
- 仍有不懂之处，请联系团队其他成员协同解决；