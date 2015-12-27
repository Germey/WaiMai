<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Hello MUI</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
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
        <li>
            <div>菜单</div>
            <i>1</i>
        </li>
        <li>
            <div>菜单</div>
            <i>2</i>
        </li>
        <li>
            <div>菜单</div>
            <i>3</i>
        </li>
    </ul>
</footer>
</body>
<script src="/js/jquery.js"></script>
<script src="/js/zepto.min.js"></script>
<script src="/js/frozen.js"></script>
<script src="/js/germy.js"></script>
</html>