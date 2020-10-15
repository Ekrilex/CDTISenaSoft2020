
<div class="page-inner">
  <div class="page-header">
    <h4 class="page-title">Usuarios</h4>
    <ul class="breadcrumbs">
      <li class="nav-home">
        <a href="#">
          <i class="flaticon-home"></i>
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Panel de control</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Usuarios</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Registrar Usuario</a>
      </li>
    </ul>
  </div>

<?php foreach ($usuario as $value){ ?>

  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="card-title">Registrar Usuario</div>
      </div>
      <div class="card-body">
   <form action="<?php echo getUrl("Usuario","Usuario","postUpdate") ?>" method="post">
        <div class="form-row">
          <div class="form-group col-md-4">
            <label>Nombres</label>
            <input type="text" class="form-control" name="usu_nombre" required placeholder="Nombres" value="<?php echo $value->usu_nombre; ?>">
            <input type="hidden" name="usu_id" value="<?php echo $value->usu_id; ?>">
          </div>
          <div class="form-group col-md-4">
            <label>Apellidos</label>
            <input type="text" class="form-control" name="usu_apellido"  required placeholder="Apellidos" value="<?php echo $value->usu_apelld; ?>">
          </div> 
          <div class="form-group col-md-4">
            <label>Telefono</label>
            <input type="number" class="form-control" name="usu_telefn"  required placeholder="numero de telefono celular" value="<?php echo $value->usu_telefn; ?>">
          </div> 
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label>Direccion</label>
            <input type="text" class="form-control" name="usu_direcc"  required placeholder="Direccion de residencia" value=" <?php echo $value->usu_direcc; ?>">
          </div>
          <div class="form-group col-md-4">
            <label>Correo electronico</label>
            <input type="email" class="form-control" name="usu_correo"  required placeholder="Exampple@example.com" value="<?php echo $value->usu_correo; ?>">
          </div> 

          <div class="form-group col-md-4">
            <label>Sucursal</label>
          <select name="usu_sucursal"  required class="form-control">
            <option value="">Seleccionar..</option>
            <?php

            foreach ($sucu as $val){
              if ($val->suc_id == $value->usu_sucursal) {
              echo "<option value='".$val->suc_id."' selected>".$val->suc_nombre."</option>";              
              }else{
              echo "<option value='".$val->suc_id."'>".$val->suc_nombre."</option>";                              
              }

            }
            
            ?>
          </select>
          </div> 

          <div class="form-group col-md-4">
            <label>Rol de usuario</label>
          <select name="usu_rolid"  required class="form-control">
            <?php
               
            if ($value->usu_rolid == $value->rol_id){
              
              echo "<option value='".$value->rol_id."' selected>".$value->rol_nombre."</option>";
            }else{
              echo "<option value='".$value->rol_id."'>".$value->rol_nombre."</option>";

            }

            
            ?>
          </select>
          </div>                     
        </div>
        <div class="card-action">
          <a class="btn btn-secondary" href='<?php echo getUrl('Usuario','Usuario','index')?>'>Salir</a>
          <button type="submit" class="btn btn-success">Modificar Usuario</button>
        </div>
      </form>
      </div>
    </div>
   <?php
    }
    ?>
  </div>
</div>