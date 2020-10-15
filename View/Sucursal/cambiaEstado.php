<?php foreach($consultaSucursales as $Sucursal){ ?>

    <tr>
        <td><?php echo $Sucursal->suc_nombre;?></td>
        <td><?php echo $Sucursal->suc_telefo;?></td>
        <td><?php echo $Sucursal->suc_direcc;?></td>
        <td><?php echo $Sucursal->suc_ciudad;?></td>
        <td><?php echo $Sucursal->emp_nomcom;?></td>


        <?php if($Sucursal->suc_estado == 1){$estado = "Habilitado";}else{ $estado = "Inhabilitado";}

        ?>

        <td><?php echo $estado?></td>
        <td>
            <a href="<?php echo getUrl('Sucursal','Sucursal','editar',array('suc_id' => $Sucursal->suc_id))?>" class="btn btn-info" >Editar</a>

            <?php if($Sucursal->suc_estado == 1) {?>

                <button type="button" data-id="<?php echo $Sucursal->suc_id;?>" data-url="<?php echo getUrl('Sucursal','Sucursal','cambiarEstado',false,'ajax');?>" data-estado="1" class="btn btn-danger cambiaEstado" >Inhabilitar</button>

            <?php }else{?>
                <button type="button" data-id="<?php echo $Sucursal->suc_id;?>" data-url="<?php echo getUrl('Sucursal','Sucursal','cambiarEstado',false,'ajax');?>" data-estado="2" class="btn btn-success cambiaEstado" >Habilitar</button>
            <?php }?>
        </td>
    </tr>

<?php } ?>