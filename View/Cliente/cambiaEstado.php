<?php foreach($consultaClientes as $Cliente){ ?>

	<tr>
		<td><?php echo $Cliente->cli_nit;?></td>
		<td><?php echo $Cliente->cli_nombre;?></td>
		<td><?php echo $Cliente->cli_apelld;?></td>
		<td><?php echo $Cliente->cli_direcc;?></td>
		<td><?php echo $Cliente->cli_telefn;?></td>

		<?php if($Cliente->cli_estado == 1){$estado = "Habilitado";}else{ $estado = "Inhabilitado";}

		?>

		<td><?php echo $estado?></td>
		<td>
			<a href="<?php echo getUrl('Cliente','Cliente','editar',array('cli_id' => $Cliente->cli_id))?>" class="btn btn-info" >Editar</a>

			<?php if($Cliente->cli_estado == 1) {?>

				<button type="button" data-id="<?php echo $Cliente->cli_id;?>" data-url="<?php echo getUrl('Cliente','Cliente','cambiarEstado',false,'ajax');?>" data-estado="1" class="btn btn-danger cambiaEstado">Inhabilitar</button>

			<?php }else{?>
				<button type="button" data-id="<?php echo $Cliente->cli_id;?>" data-url="<?php echo getUrl('Cliente','Cliente','cambiarEstado',false,'ajax');?>" data-estado="2" class="btn btn-success cambiaEstado">Habilitar</button>
			<?php }?>
		</td>
	</tr>

<?php } ?>