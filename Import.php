<html>
    <head>
        <title>建立題庫</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script src="http://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="string.js" type="text/javascript"></script>
        <script src="import.js" type="text/javascript"></script>
        <style>
            a{
                text-decoration: none;
                color: black;
            }
        </style>
    </head>
    <body>
        <div>
            <textarea id="input" style="width: 500px;height: 200px;"></textarea>
        </div>
        <button onclick="cut()">分段</button>
        <button onclick="preview()">建立</button>
        <button onclick="save()">存檔</button>
        <br />
        <button onclick="look(-1)">上一個</button>
        <input type="text" disabled="true" id="iSegment" value="" style="width: 100px;text-align: center;" />
        <button onclick="look(1)">下一個</button>
        <br />
        <input id="filename" value="" style="width: 200px;text-align: center;"/>
        <button onclick="make()">建立題庫</button>
        <button><a href="problems.txt" target="_blank">查看暫存</a></button>
        <button onclick="clearTemp()">清除暫存</button>
        <br />
        <div id="result"></div>
    </body>
</html>