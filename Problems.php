<?
    require_once("Functions.php");
    $dirs = getDirectory("problems");
?>
<html>
    <head>
        <title>請選擇題庫</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script src="http://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript"></script>
        <style>
            .btn{
                margin-bottom: 5px;
                width: 300px;
                height: 30px;
                text-align: center;
            }
            a{
                text-decoration: none;
                color: black;
            }
        </style>
        <script>
            function gotoAnswer(problem){
                location.href = ;
            }
        </script>
    </head>
    <body>
        <?
            foreach($dirs as $dir){
            ?>
                <button class="btn"><a href="Answer.php?problem=<?=$dir["name"]?>"><?=$dir["info"]?></a></button><br />
            <?
            }
        ?>
    </body>
</html>