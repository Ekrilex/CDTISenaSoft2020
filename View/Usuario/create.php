
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
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="card-title">Registrar Usuario</div>
      </div>
      <div class="card-body">
   <form action="<?php echo getUrl("Usuario","Usuario","postCreate") ?>" method="post">
        <div class="form-row">
          <div class="form-group col-md-4">
            <label>Nombres</label>
            <input type="text" class="form-control" name="usu_nombre" required placeholder="Nombres">
          </div>
          <div class="form-group col-md-4">
            <label>Apellidos</label>
            <input type="text" class="form-control" name="usu_apellido"  required placeholder="Apellidos">
          </div> 
          <div class="form-group col-md-4">
            <label>Telefono</label>
            <input type="number" class="form-control" name="usu_telefn"  required placeholder="numero de telefono celular">
          </div> 
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label>Direccion</label>
            <input type="text" class="form-control" name="usu_direcc"  required placeholder="Direccion de residencia">
          </div>
          <div class="form-group col-md-4">
            <label>Correo electronico</label>
            <input type="email" class="form-control" name="usu_correo"  required placeholder="Exampple@example.com">
          </div> 
          <div class="form-group col-md-4">
            <label>Sucursal</label>
          <select name="usu_sucursal"  required class="form-control">
            <option value="">Seleccionar..</option>
            <?php

            foreach ($sucu as $val){
              
              echo "<option value='".$val->suc_id."'>".$val->suc_nombre."</option>";
            }
            
            ?>
          </select>
          </div> 
          <div class="form-group col-md-4">
            <label>Nickname</label>
            <input type="text" class="form-control" name="usu_login" placeholder="Nombre de usuario">
          </div> 
          <div class="form-group col-md-4">
            <label>pass</label>
            <input type="password" class="form-control" name="usu_passwod" placeholder="*********">
          </div>  
          <div class="form-group col-md-4">
            <label>Rol de usuario</label>
          <select name="usu_rolid"  required class="form-control">
            <option value="">Seleccionar..</option>
            <?php

            foreach ($rol as $value){
              
              echo "<option value='".$value->rol_id."'>".$value->rol_nombre."</option>";
            }
            
            ?>
          </select>
          </div>                             
        </div>
        <div class="card-action">
          <a class="btn btn-secondary" href='<?php echo getUrl('Usuario','Usuario','index')?>'>Salir</a>
          <button type="submit" class="btn btn-success">Registrar Cliente</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>