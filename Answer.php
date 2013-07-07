<?
    $problem = $_REQUEST["problem"];
    require_once("Functions.php");
    $dirs = getDirectory("problems");
    foreach($dirs as $tdir){
        if($problem == $tdir["name"]){
            $dir = $tdir;
            break;
        }
    }
    if(!isset($dir)){
        header('Location: Problems.php');
        exit;
    }
    $file = fopen("problems/".$dir["name"], "r");
?>
<html>
    <head>
        <title><?=$dir["info"]?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script src="http://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script>
            function clickAnswer(obj, num){
                var radio = $(obj);
                var answer = radio.parent().parent();
                var problem = answer.parent().parent();
                radio.prop("checked", "true");
                answer.parent().children("tr").children(".option").css("background-color", "");
                
                if(problem.attr("ans") == radio.val()){
                    answer.children(".option").css("background-color", "#19FF1C");
                }
                else{
                    answer.children(".option").css("background-color", "#FF1C19");
                }
            }
        </script>
        <style>
            .problem{
                font-size: 18px;
            }
        </style>
    </head>
    <body>
        <?
            $i = 0;
            while(!feof($file)){
                $ans = str_replace("\r\n", "", fgets($file));
                if($ans == "")
                    break;
                $problem = fgets($file);
                $option1 = fgets($file);
                $option2 = fgets($file);
                $option3 = fgets($file);
                $option4 = fgets($file);
                ?>
                <table class="problem" ans="<?=$ans?>">
                    <tr>
                        <td colspan="2"><?=$problem?></td>
                    </tr>
                    <tr>
                        <td width="20px"><input class="answer" type="radio" name="group<?=$i?>" value="A" onclick="clickAnswer(this, <?=$i?>)" /></td>
                        <td class="option"><?=$option1?></td>
                    </tr>
                    <tr>
                        <td width="20px"><input class="answer" type="radio" name="group<?=$i?>" value="B" onclick="clickAnswer(this, <?=$i?>)" /></td>
                        <td class="option"><?=$option2?></td>
                    </tr>
                    <tr>
                        <td width="20px"><input class="answer" type="radio" name="group<?=$i?>" value="C" onclick="clickAnswer(this, <?=$i?>)" /></td>
                        <td class="option"><?=$option3?></td>
                    </tr>
                    <tr>
                        <td width="20px"><input class="answer" type="radio" name="group<?=$i?>" value="D" onclick="clickAnswer(this, <?=$i?>)" /></td>
                        <td class="option"><?=$option4?></td>
                    </tr>
                </table>
                <br />
                <?
                $i++;
            }
        ?>
    </body>
</html>