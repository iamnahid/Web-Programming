<form>
<pre><h2>PHP Demo</h2>
Number 1 : <input type="text" name="num1">
Number 2 : <input type="text" name="num2">
<div id="message">no message yet</div>
<input type="submit" value="Add Them">
</pre>
</form>
<?php
if (isset($_GET['num1']) && isset($_GET['num2'])) {
 
    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];
    $sum = $num1 + $num2;
    echo $num1 . " + " . $num2 . " = " . $sum;
}
?>