<div class="row">
	<div class="col-md-12 col-sm-6 col-ms-6 col-xs-12">
			<h3><i class="glyphicon glyphicon-stats"></i> Inventario de Productos</h3>		
	</div>
</div>
<div class="row">
	<div class="col-md-12 col-sm-6 col-ms-6 col-xs-12">
<!-- Single button -->
<div class="btn-group pull-right">
  <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="report/inventary-word.php">Word 2007 (.docx)</a></li>
  </ul>
</div>
</div>
</div>
<div class="clearfix"></div>
<br>
<?php
$products = ProductData::getAll();
if(count($products)>0){
?>
<div class="row">
<div class="col-md-12 col-sm-8 col-ms-6 col-xs-12">
<table class="table table-bordered table-hover table-sm datatable2"  width="100%"  >
	<thead>
		<th>Codigo</th>
		<th>Producto</th>
		<th>Disponible</th>
		<th></th>
	</thead>
	<?php foreach($products as $product):
	$q=OperationData::getQYesF($product->id);
	?>
	<tr class="<?php if($q<=$product->inventary_min/2){ echo "danger";}else if($q<=$product->inventary_min){ echo "warning";}?>">
		<td><?php echo $product->id; ?></td>
		<td><?php echo $product->name; ?></td>
		<td>
			
			<?php echo $q; ?>

		</td>
		<td style="width:93px;">
<!--		<a href="index.php?view=input&product_id=<?php echo $product->id; ?>" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-circle-arrow-up"></i> Alta</a>-->
		<a href="index.php?view=history&product_id=<?php echo $product->id; ?>" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-time"></i> Historial</a>
		</td>
	</tr>
	<?php endforeach;?>
</table>
</div>
</div>
<div class="clearfix"></div>

	<?php
}else{
	?>
	<div class="jumbotron">
		<h2>No hay productos</h2>
		<p>No se han agregado productos a la base de datos, puedes agregar uno dando click en el boton <b>"Agregar Producto"</b>.</p>
	</div>
	<?php
}

?>