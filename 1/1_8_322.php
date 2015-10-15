function array(){
$query = "SELECT size, color FROM combination";
$result = mysql_query($query);
$arr = array();
$color = '';
$i = 0;
$j = 0;
while ( $row = mysql_fetch_array($result, MYSQL_ASSOC) ){
if($color != $row['color']){
$arr[++$i][$j=1] = $row['size'];
$color = $row['color'];
}
else{
$arr[$i][++$j] = $row['size'];
}
}
return $arr;
}
