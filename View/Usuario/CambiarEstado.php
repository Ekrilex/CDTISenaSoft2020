		<?php
		foreach ($usuario as $value):?>
			<tr>
				<td><?php echo $value->usu_id; ?></td>
				<td><?php echo $value->usu_nombre; ?></td>
				<td><?php echo $value->usu_apelld; ?></td>
				<td><?php echo $value->usu_telefn; ?></td>
				<?php  
				
				if($value->usu_estado == 1){
				   $r="Habilitado";
				}else{
                    $r="Inhabilitado";
				}
                $rr=$value->usu_id;
				?>

				<td><?php echo $value->rol_nombre; ?></td>
				<td><?php echo $r; ?></td>
				<td> <a class="btn btn-info" href="<?php echo getUrl('Usuario','Usuario','getUpdate', array('usu_id' => $value->usu_id)) ?>" data-url='<?php echo getUrl("Usuario","Usuario","postDelete",false,"ajax") ?>'>Editar</a>

				<?php if($value->usu_estado == 1) {?>

					<button type="button" data-id="<?php echo $value->usu_id;?>" data-url="<?php echo getUrl('Usuario','Usuario','postDelete',false,'ajax');?>" data-estado="1" class="btn btn-danger estadoUsuario" >Inhabilitar</button>

					<?php }else{?>
						<button type="button" data-id="<?php echo $value->usu_id;?>" data-url="<?php echo getUrl('Usuario','Usuario','postDelete',false,'ajax');?>" data-estado="2" class="btn btn-success estadoUsuario" >Habilitar</button>
					<?php } ?>
			</tr>
		<?php endforeach; ?>
		