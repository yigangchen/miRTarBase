<!DOCTYPE html>
<html>
<head>
<script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>

</head>
<body>
<?php 
$value = 'saab';
?>
<script>
$(function(){
  $("input[type='radio'][value='1']").attr("checked", "checked")
  });
</script>
<input type="radio" name="sex" id="man_radio" value="1"  />man
<input type="radio" name="sex" id="woman_radio" value="0"  />woman
  
</body>
</html>
