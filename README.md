#x

#网页请求
http://192.168.245.208:9588/index/index/ok/1/nginx/1


#命令行使用
php console.php index index ppx=1



#swoole使用

#composer全局参数
--verbose (-v): 增加反馈信息的详细度。
    -v 表示正常输出。
    -vv 表示更详细的输出。
    -vvv 则是为了 debug。
--help (-h): 显示帮助信息。
--quiet (-q): 禁止输出任何信息。
--no-interaction (-n): 不要询问任何交互问题。
--working-dir (-d): 如果指定的话，使用给定的目录作为工作目录。
--profile: 显示时间和内存使用信息。
--ansi: 强制 ANSI 输出。
--no-ansi: 关闭 ANSI 输出。
--version (-V): 显示当前应用程序的版本信息。

#初始化创建composer.json
composer init 

初始化-参数
--name: 包的名称。
--description: 包的描述。
--author: 包的作者。
--homepage: 包的主页。
--require: 需要依赖的其它包，必须要有一个版本约束。并且应该遵循 foo/bar:1.0.0 这样的格式。
--require-dev: 开发版的依赖包，内容格式与 --require 相同。
--stability (-s): minimum-stability 字段的值。

#更新composer.json 的版本到 composer.lock   请提交你应用程序的 composer.lock （包括 composer.json）到你的版本库中，对于库，并不一定建议提交锁文件
composer update

#只更新某一个依赖
composer update monolog/monolog hello/hello

#批量更新
composer update vendor/*

#安装
composer install
安装-参数

--prefer-source: 下载包的方式有两种： source 和 dist。对于稳定版本 composer 将默认使用 dist 方式。而 source 表示版本控制源 。如果 --prefer-source 是被启用的，composer 将从 source 安装（如果有的话）。如果想要使用一个 bugfix 到你的项目，这是非常有用的。并且可以直接从本地的版本库直接获取依赖关系。
--prefer-dist: 与 --prefer-source 相反，composer 将尽可能的从 dist 获取，这将大幅度的加快在 build servers 上的安装。这也是一个回避 git 问题的途径，如果你不清楚如何正确的设置。
--dry-run: 如果你只是想演示而并非实际安装一个包，你可以运行 --dry-run 命令，它将模拟安装并显示将会发生什么。
--dev: 安装 require-dev 字段中列出的包（这是一个默认值）。
--no-dev: 跳过 require-dev 字段中列出的包。
--no-scripts: 跳过 composer.json 文件中定义的脚本。
--no-plugins: 关闭 plugins。
--no-progress: 移除进度信息，这可以避免一些不处理换行的终端或脚本出现混乱的显示。
--optimize-autoloader (-o): 转换 PSR-0/4 autoloading 到 classmap 可以获得更快的加载支持。特别是在生产环境下建议这么做，但由于运行需要一些时间，因此并没有作为默认值。


{
  "repositories": [
    {
      "type": "vcs",
      "url": "git@github.com:wangcong099878/ctools.git"
    },
    {
      "packagist": true
    }
  ],
  "require": {
    "hello/hello": "dev-master"
  }
}

#测试bug修复
例如，假设你 fork 了 monolog，在 bugfix 分支修复了一个 bug：

{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/igorw/monolog"
        }
    ],
    "require": {
        "monolog/monolog": "dev-bugfix"
    }
}
当你运行 php composer.phar update 时，你应该得到你修改的版本，而不是 packagist.org 上的 monolog/monolog。

#全局使用中国源
composer config -g repo.packagist composer https://packagist.phpcomposer.com
#项目使用中国源
composer config repo.packagist composer https://packagist.phpcomposer.com

