<!--
author: jockchou
date: 2015-07-29
title: GitBlog目录结构
tags: GitBlog
category: GitBlog
status: publish
summary: GitBlog采用流行的PHP框架CodeIgniter开发，只是我对一些目录进行了重命名。如果你熟悉CodeIgniter框架，那你一定不会陌生。
-->
GitBlog采用流行的PHP框架`CodeIgniter`开发，只是我对一些目录进行了重命名。如果你熟悉CodeIgniter框架，那你一定不会陌生。

## 目录结构如下 ##

GitBlog的目录结构如下所示：


```
├── app
│   ├── AppService.php
│   ├── BaseController.php
│   ├── command # 命令目录
│   ├── common.php
│   ├── controller # 控制器目录
│   ├── event.php
│   ├── ExceptionHandle.php
│   ├── middleware.php
│   ├── provider.php
│   ├── Request.php
│   └── service.php
├── blog # 博客目录
│   ├── apache.md
│   ├── cache.md
│   ├── config.md
│   ├── edit.md
│   ├── export.md
│   ├── faqs.md
│   ├── github-pages.md
│   ├── HelloWorld.md
│   ├── install.md
│   ├── nginx.md
│   ├── other-func.md
│   ├── sae.md
│   ├── screenshot.png
│   ├── struct.md
│   ├── theme.md
│   ├── update.md
│   └── wordpress.md
├── composer.json
├── composer.lock
├── config
│   ├── app.php
│   ├── cache.php
│   ├── console.php
│   ├── cookie.php
│   ├── database.php
│   ├── filesystem.php
│   ├── lang.php
│   ├── log.php
│   ├── middleware.php
│   ├── route.php
│   ├── session.php
│   ├── trace.php
│   └── view.php
├── conf.yaml
├── extend #扩展目录
│   ├── Markdown.php
│   ├── Pager.php
│   ├── parsedown
│   ├── phpQuery
│   ├── spyc
│   ├── Twig.php
│   ├── WordPress.php
│   └── Yaml.php
├── LICENSE.txt
├── public
│   ├── favicon.ico
│   ├── index.php
│   ├── robots.txt
│   ├── router.php
│   ├── static
│   └── theme
├── README.md
├── route
│   └── app.php #路由配置文件
├── runtime #运行时,需要写的权限
│   ├── cache
│   ├── log
│   ├── route_list.php
│   └── route.php
├── think
├── vendor
│   ├── autoload.php
│   ├── bin
│   ├── composer
│   ├── erusev
│   ├── league
│   ├── psr
│   ├── services.php
│   ├── symfony
│   ├── topthink
│   └── twig
└── view
    ├── home
    └── README.md

```

## 目录说明 ##

- app: CodeIgniter主程序目录，cache和logs分别是缓存和日志目录，请确保写的权限    
- sys： CodeIgniter系统源码目录，一般不需要改这里面的任何东西  
- theme： GitBlog主题目录，所有主题模板都放在这里    
- blog: GitBlog存放markdown博客文件的目录，你写的博客都放这里  
- img： 图片目录，你的markdown中引用的图片都放到这里，使用相对路径引用  
- conf.yaml: GitBlog配置文件  
- index.php: 入口php文件  

注意：2.2版本开始统一将markdown文件和图片文件放到blog目录中。
 
