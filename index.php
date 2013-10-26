<?php
$mov="/var/www/test.mov";
$lfile="tested.log";
$nfile="n.log";
$tdir="files";
if (!file_exists($nfile)){
$n=fopen($nfile,"w");
fclose($n);
$i=0;
}else{
$i=file_get_contents($nfile);
}
if (!is_dir($tdir)) {
    mkdir($tdir);         
}
$i++;
echo system('zzuf -c -r 0.0001:0.001 -s '.$i.' < '.$mov.' > '."/var/www/".$tdir."/".$i.'.mov');
file_put_contents($nfile,$i);
$f=fopen($lfile, "a+");
echo "~".$i." ";
$date = system('echo `date \'+%y.%m.%d-%H.%M.%S\'`');
fwrite($f, "~".$i." ".$date."\n");
fclose($f);
?>
<html>
<head>
<META HTTP-EQUIV="refresh" CONTENT="2; URL=<?php echo './'.$tdir."/".$i.'.mov'; ?>">
<script type="text/javascript">
<!--
function delayer(){
    window.location = "index.php"
}
//-->
</script>
</head>
<body onLoad="setTimeout('delayer()', 3000)">
</body>
</html>
