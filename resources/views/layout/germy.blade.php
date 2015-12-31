<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Hello MUI</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="/css/frozen.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<header class="ui-header ui-header-positive ui-border-b">
    <i class="ui-icon-return" onclick="history.back()"></i>

    <h1>列表 list</h1>
    <button class="ui-btn">回首页</button>
</header>
<div class="content">
    @yield('content')
</div>
<footer class="ui-footer ui-footer-stable ui-border-t">
    <ul class="ui-tiled">
        <li class="active">
            <div><i class="fa fa-book"></i></div>
            <i>菜单</i>
        </li>
        <li>
            <div><i class="fa fa-file-text-o"></i></div>
            <i>订单</i>
        </li>
        <li>
            <div><i class="fa fa-user"></i></div>
            <i>我的</i>
        </li>
    </ul>
</footer>
</body>
<script src="/js/jquery.js"></script>
<script src="/js/validation.js"></script>
<script src="/js/zepto.min.js"></script>
<script src="/js/frozen.js"></script>
<script src="/js/germy.js"></script>
</html>