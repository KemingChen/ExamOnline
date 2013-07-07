<?
function getDirectory(){
	$file = fopen("problems/problem.txt", "r");
    $entrys = array();
    while(!feof($file)){
        $problem = fgets($file);
        if($problem=="")
            break;
        $problem = explode(" ", $problem);
        $entry["name"] = $problem[0];
        $entry["info"] = $problem[1];
        array_push($entrys, $entry);
    }
    return $entrys;
}
?>