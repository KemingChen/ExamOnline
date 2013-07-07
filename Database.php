<?
    $br = "\r\n";
    $action = $_REQUEST["action"];
    $dir = "problems/";
    $tempFile = "problems.txt";
    $directorys = $dir."problem.txt";
    
    switch($action){
        case "save":
            $ans = $_REQUEST["ans"].$br;
            $problem = $_REQUEST["problem"].$br;
            $option1 = $_REQUEST["option1"].$br;
            $option2 = $_REQUEST["option2"].$br;
            $option3 = $_REQUEST["option3"].$br;
            $option4 = $_REQUEST["option4"].$br;
            
            $file = fopen($tempFile, "a");
            fputs($file, $ans);
            fputs($file, $problem);
            fputs($file, $option1);
            fputs($file, $option2);
            fputs($file, $option3);
            fputs($file, $option4);
            fclose($file);
            break;
        case "clear":
            unlink($filename);
            break;
        case "make":
            $info = $_REQUEST["name"];
            $name = md5($info);
            
            if(!file_exists($tempFile)){
                echo "無暫存";
                exit;
            }
            
            require_once("Functions.php");
            $records = getDirectory($dir);
            foreach($records as $record){
                if($records["info"] == $info || file_exists($dir.$name)){
                    echo "檔案重複";
                    exit;
                }
            }
            
            rename($tempFile, $dir.$name);
            $file = fopen($directorys, "a");
            fputs($file, $name." ".$info.$br);
            fclose($file);
            echo "'".$name."->".$info."': 完成";
            break;
    }
?>