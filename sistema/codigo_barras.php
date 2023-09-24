<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>

<?php 

$codigo_producto=$_GET['codigo_producto'];


 ?>

<?php  for($i=1;$i<=15;$i=$i+1)

{

 ?>

<table width="100%" border="0">
	<tr>
		<td>

<div style='text-align: center;'>
  <!-- insert your custom barcode setting your data in the GET parameter "data" -->
  <img alt='Barcode Generator TEC-IT'
       src='https://barcode.tec-it.com/barcode.ashx?data=<?php echo $codigo_producto ?>&code=&multiplebarcodes=false&translate-esc=true&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&codepage=Default&qunit=Mm&quiet=0&hidehrt=False' width="75" height="50">
</div>


</td>

	<td>

<div style='text-align: center;'>
  <!-- insert your custom barcode setting your data in the GET parameter "data" -->
  <img alt='Barcode Generator TEC-IT'
       src='https://barcode.tec-it.com/barcode.ashx?data=<?php echo $codigo_producto ?>&code=&multiplebarcodes=false&translate-esc=true&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&codepage=Default&qunit=Mm&quiet=0&hidehrt=False' width="75" height="50">
</div>


</td>
	<td>

<div style='text-align: center;'>
  <!-- insert your custom barcode setting your data in the GET parameter "data" -->
  <img alt='Barcode Generator TEC-IT'
       src='https://barcode.tec-it.com/barcode.ashx?data=<?php echo $codigo_producto ?>&code=&multiplebarcodes=false&translate-esc=true&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&codepage=Default&qunit=Mm&quiet=0&hidehrt=False' width="75" height="50">
</div>


</td>
	<td>

<div style='text-align: center;'>
  <!-- insert your custom barcode setting your data in the GET parameter "data" -->
  <img alt='Barcode Generator TEC-IT'
       src='https://barcode.tec-it.com/barcode.ashx?data=<?php echo $codigo_producto ?>&code=&multiplebarcodes=false&translate-esc=true&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&codepage=Default&qunit=Mm&quiet=0&hidehrt=False' width="75" height="50">
</div>


</td>
	<td>

<div style='text-align: center;'>
  <!-- insert your custom barcode setting your data in the GET parameter "data" -->
  <img alt='Barcode Generator TEC-IT'
       src='https://barcode.tec-it.com/barcode.ashx?data=<?php echo $codigo_producto ?>&code=&multiplebarcodes=false&translate-esc=true&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&codepage=Default&qunit=Mm&quiet=0&hidehrt=False' width="75" height="50">
</div>


</td>
	<td>

<div style='text-align: center;'>
  <!-- insert your custom barcode setting your data in the GET parameter "data" -->
  <img alt='Barcode Generator TEC-IT'
       src='https://barcode.tec-it.com/barcode.ashx?data=<?php echo $codigo_producto ?>&code=&multiplebarcodes=false&translate-esc=true&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&codepage=Default&qunit=Mm&quiet=0&hidehrt=False' width="75" height="50">
</div>


</td>
	<td>

<div style='text-align: center;'>
  <!-- insert your custom barcode setting your data in the GET parameter "data" -->
  <img alt='Barcode Generator TEC-IT'
       src='https://barcode.tec-it.com/barcode.ashx?data=<?php echo $codigo_producto ?>&code=&multiplebarcodes=false&translate-esc=true&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&codepage=Default&qunit=Mm&quiet=0&hidehrt=False' width="75" height="50">
</div>


</td>

		

</tr>

</table>
<?php } ?>


</body>
</html>