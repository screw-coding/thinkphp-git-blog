<!--
author: jockchou
date: 2015-07-21
title: 在新浪SAE上运行GitBlog
tags: GitBlog
category: GitBlog
status: draft
summary: GitBlog支持在新浪SAE云平台上运行。SAE是Sina App Engine的简称，是新浪研发中心推出的国内首个公有云计算平台，支持PHP，MySQL，Memcached，Mail，TaskQueue，RDC（关系型数据库集群）等服务。SAE通过实名认证及开发者认证，每个月送大量云豆，对于一般的博客站点云豆完全够用，也就是说用SAE搭建博客完全免费，不需要支付费用。
-->

GitBlog支持在新浪[SAE](http://sae.sina.com.cn)云平台上运行。SAE是Sina App Engine的简称，是新浪研发中心推出的国内首个公有云计算平台，支持PHP，MySQL，Memcached，Mail，TaskQueue，RDC（关系型数据库集群）等服务。SAE通过实名认证及开发者认证，每个月送大量云豆，对于一般的博客站点云豆完全够用，也就是说用SAE搭建博客完全免费，不需要支付费用。

## 布署GitBlog项目到SAE ##

首先要申请SAE账号，在SAE管理后台创建一个PHP(5.3版本以上)应用，创建应用完成后，参照代码管理说明文档，通过SVN提交GitBlog源码到应用在SAE的SVN仓库地址即可。例如：

```
https://svn.sinaapp.com/gitblogdoc/
```

## SAE的配置 ##
在上传代码到SAE前，需要配置一下。SAE的配置文件为`config.yaml`，把它放到网站根目录下，配置rewrite用以支持GitBlog伪静态。

```
name: gitblogdoc
version: 1
handle:
    - rewrite: if(!is_dir() && !is_file() && path ~ "/") goto "/index.php?%{QUERY_STRING}"
```

## 关于SAE的特别说明 ##

由于SAE禁止PHP访问本地IO，所以GitBlog的缓存机制在SAE上是不支持的，不过没关系，没有缓存GitBlog照样能运行良好，只是博客数量太多了页面会稍微慢一点，后面的版本会考虑使用的SAE的Storage来支持缓存。


