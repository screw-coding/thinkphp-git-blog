<!--
author: jockchou
date: 2015-07-26
title: GitBlog评论，订阅，统计等功能
tags: GitBlog
category: GitBlog
status: publish
summary: GitBlog支持评论，订阅，百度统计相关功能，这些功能可由conf.yaml配置开启或关闭，评论采用多说评论框，统计采用百度统计。
-->

GitBlog支持评论，订阅，百度统计相关功能，这些功能可由`conf.yaml`配置开启或关闭，评论采用多说评论框，统计采用百度统计。


## disqus评论框 ##

GitBlog目前只支持disqus评论框，如果你希望你的博客有评论功能，你需要申请disqus账号来管理你的评论。disqus的官方地址是：[https://disqus.com/](https://disqus.com/)。

在后台创建一个site,比如说叫jimersylee然后把site的名字填入conf.yaml

GitBlog中已经引入了代码，你要做的事情只是在`conf.yaml`配置文中填上你的disqus=`jimersylee`即可。例如我的博客：

```
disqus: jimersylee  //填写你的账号
```

多说后台提供了评论的管理功能，你可以在后台配置你的评论样式，功能，以及审核，删除评论等操作。如果你不需要评论功能，删除`conf.yaml`中的配置项即可。

## 百度统计 ##

同时，对于博客的PV统计，你需要申请百度统计账号。你也不需要手动获取统计代码。只需要填写你的统计代码中的Key值就行了。例如我的百度统计代码如下：
```
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?732acc76ff6bd41343951a67cbfafe34";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

```
只需要将`732acc76ff6bd41343951a67cbfafe34`配置到`conf.yaml`中即可。

```
baiduAnalytics  : 732acc76ff6bd41343951a67cbfafe34  #百度统计
```

## 代码高亮 ##

GitBlog的代码高亮功能采用[highlight.js](https://highlightjs.org/)。它能自动识别代码中的语言类型。默认是开启代码高亮功能的。关闭此功能配置如下：

```
highlight: off
```

## 数学公式 ##

GitBlog支持[LaTeX](https://en.wikipedia.org/wiki/LaTeX)数据公式，采用的是[MathJax.js](http://www.mathjax.org/)。此功能默认是关闭的，开启的配置如下：

```
mathjax: on
```

## RSS订阅 ##

GitBlog支持RSS订阅，订阅的xml文件地址是：

```
http://jockchou.gitblog.cn/feed.xml
```

请替换为你自己的域名，即网站根目录下的feed.xml文件。