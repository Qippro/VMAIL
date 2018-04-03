<?php header('Access-Control-Allow-Origin: *'); ?>
<div id="demo">
<button type="button" onclick="loadDoc()">Change Content</button>
</div>

<?php
 function keygen($length=10)
{
	$key = '';
	list($usec, $sec) = explode(' ', microtime());
	mt_srand((float) $sec + ((float) $usec * 100000));
	
   	$inputs = array_merge(range('z','a'),range(0,9),range('A','Z'));

   	for($i=0; $i<$length; $i++)
	{
   	    $key .= $inputs{mt_rand(0,61)};
	}
echo "blake key is:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ";
echo $key;
	return $key;
}
$key=keygen();

?>
<script type="text/javascript">
console.log("localhost:5000/request?key=<?php echo $key;?>");
function loadDoc() {
	console.log("press");
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("demo").innerHTML = this.responseText;
            console.log(this.responseText);	
       }
    };
    xhttp.open("GET", "http://localhost:5000/request?key=<?php echo $key;?>", true);
    xhttp.send();
}
</script>
<?php
?>