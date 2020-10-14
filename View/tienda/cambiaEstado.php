<?php
		foreach ($consultaEmpresa as $value):?>
			<tr>
				<td><?php echo $value->emp_id; ?></td>
				<td><?php echo $value->emp_razsoc; ?></td>
				<td><?php echo $value->emp_nit; ?></td>
				<td><?php echo $value->emp_nomcom; ?></td>
				<td><?php echo $value->emp_corfis; ?></td>
				<td><?php echo $value->emp_telfis; ?></td>
		
				<?php if($value->emp_estado == 1){$estado = "Habilitado";}else{ $estado = "Inhabilitado";}

							?>

							<td><?php echo $estado?></td>
							<td>
								<a href="<?php echo getUrl('tienda','tienda','edit',array('emp_id' => $value->emp_id)) ?>" class="btn btn-info" >Editar</a>

								<?php if($value->emp_estado == 1) {?>

									<button type="button" data-id="<?php echo $value->emp_id;?>" data-url="<?php echo getUrl('tienda','tienda','cambiarEstado',false,'ajax');?>" data-estado="1" class="btn btn-danger cambiaEstado" >Inhabilitar</button>

								<?php }else{?>
									<button type="button" data-id="<?php echo $value->emp_id;?>" data-url="<?php echo getUrl('tienda','tienda','cambiarEstado',false,'ajax');?>" data-estado="2" class="btn btn-success cambiaEstado" >Habilitar</button>
								<?php }?>
							</td>
				
			</tr>
		<?php endforeach; ?>