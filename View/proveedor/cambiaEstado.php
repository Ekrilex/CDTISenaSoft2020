<?php
foreach ($consultaProveedor as $value):?>
	<tr>
		<td><?php echo $value->prv_id; ?></td>
		<td><?php echo $value->prv_razsoc; ?></td>
		<td><?php echo $value->prv_nit; ?></td>
		<td><?php echo $value->prv_nomcom; ?></td>
		<td><?php echo $value->prv_correo; ?></td>
		<td><?php echo $value->prv_telefo; ?></td>
		
		<?php if($value->prv_estado == 1){$estado = "Habilitado";}else{ $estado = "Inhabilitado";}

		?>

		<td><?php echo $estado?></td>
		<td>
			<a href="<?php echo getUrl('proveedor','proveedor','edit',array('prv_id' => $value->prv_id)) ?>" class="btn btn-info" >Editar</a>

			<?php if($value->prv_estado == 1) {?>

				<button type="button" data-id="<?php echo $value->prv_id;?>" data-url="<?php echo getUrl('proveedor','proveedor','cambiarEstado',false,'ajax');?>" data-estado="1" class="btn btn-danger cambiaEstado" >Inhabilitar</button>

			<?php }else{?>
				<button type="button" data-id="<?php echo $value->prv_id;?>" data-url="<?php echo getUrl('proveedor','proveedor','cambiarEstado',false,'ajax');?>" data-estado="2" class="btn btn-success cambiaEstado" >Habilitar</button>
			<?php }?>
		</td>

	</tr>
	<?php endforeach; ?>