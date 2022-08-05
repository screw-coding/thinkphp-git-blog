<!--
author: jockchou
date: 2015-07-28
title: GitBlog配置
tags: GitBlog
category: GitBlog
status: publish
summary: 这是Giblog的一个简单安装教程，如果你熟悉PHP或Web开发，这对你来说一定非常简单。本教程只针对Linux+Nginx环境，对于使用Apache的用户配置参考网上其他资料。
-->

GitBlog无需任何配置即可运行，但是为了突显你的博客特征。只需要对配置文件进行简单修改即可。GitBlog采用[yaml](http://www.yaml.org/ "yaml")格式的配置文件。

## 配置文件conf.yaml ##

```
#GitBlog配置文件，使用4个空格代替Tab
---

url: http://localhost:8080/
title: Jimersy Lee's Blog
subtitle: Just for fun
theme: quest
enableCache: false
highlight: true
mathjax: true
katex: false
disqus: jimersylee
baiduAnalytics: 3f9957e676a9733fcd02eb9f0e5f9416
keywords: Jimersy Lee,jimersylee,java,php,python,js,html,github
description: >
  这是Jimersy Lee的个人博客
version: 2.3.2
author:
  name: jimersylee
  email: jimersylee@gmail.com
  github: jimersylee
  weibo: Jimersy_Lee
  avatar:
blog:
  recentSize: 5
  pageSize: 10
  pageBarSize: 5
  allBlogsForPage: false
text:
  title: 介绍
  intro: >
    “What I cannot create, I do not understand.” – Richard Feynman

```

你可能需要修改的配置参数：
- url: 修改成你的域名，`http://yourdomain.com/`
- title： 修改成你的博客标题  
- subtitle： 修改成你的副标题  
- disqus： GitBlog采用[disqus](https://disqus.com/)论框，你需要申请账号，并在这里填写你的site  
- baiduAnalytics： GitBlog采用[百度统计](http://tongji.baidu.com/)，你需要申请百度统计账号，在这里填写你的统计Key  
- author：修改为你个人的信息即可  

如果你不需要评论和统计功能，删除`disqus`和`baiduAnalytics`这两荐即可。其他信息，可根据浏览博客页面的效果进行修改调整。

## 主题配置 ##
主题配置参数`theme`，可选值即为public/theme目录下主题文件夹的名称，如`simple`和`quest`，可根据自己喜好选择配置。
