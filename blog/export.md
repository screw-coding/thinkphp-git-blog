<!--
author: jockchou
date: 2015-07-24
title: GitBlog全站静态导出
tags: GitBlog
category: GitBlog
status: publish
summary: GitBlog支持把整个博客网站导出为静态HTML文件，这样导出整个网站后，可以把它上传到网站空间，以静态形式访问，导出的后的网站结构和运行在PHP环境中一样。
-->

GitBlog支持把整个博客网站导出为静态HTML文件，这样导出整个网站后，可以把它上传到网站空间，以静态形式访问，导出的后的网站结构和运行在PHP环境中一样。

你可以使用以下命令静态导出网站：

```
# 切换到项目根目录
cd /path/to/your/project
php think action home/Home/exportSite
```

以上命令请换成你的网站路径。成功导出后，会在public目录下生成一个`_site`的文件夹，所有导出的静态资源都在这里，你可以随意复制它部署到你的环境中。

