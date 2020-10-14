
<br><br>
<div class="container card bg-info">
<br><br>
<div class="container">
   
   <form action="<?php echo getUrl("Usuario","Usuario","postCreate") ?>" method="post">
   
   <div class="row">	
	   <div class="col-md-2">
		 <label>Nombre</label>
	   </div>
    <div class="col-md-4">
    	<input type="text" name="usu_nombre" class="form-control">
    </div>
    <div class="col-md-2">
        <label>Apellidos</label>
      </div>
      <div class="col-md-4">
      <input type="text" name="usu_apellido" class="form-control">
        </div> 
   </div><br><br>

   <div class="row">
   	    <div class="col-md-2">
   	    	<label>Telefono</label>
   	    </div>
   	    <div class="col-md-4">
    	 <input type="number" name="usu_telefn" class="form-control">
        </div>
        <div class="col-md-2">
          <label>Direccion</label>
        </div>
        <div class="col-md-4">
          <input type="text" name="usu_direcc" class="form-control">
        </div>
   </div><br><br>

   <div class="row">
   	    <div class="col-md-2">
   	    	<label>Correo electronico</label>
   	    </div>
   	    <div class="col-md-4">
    	 <input type="text" name="usu_correo" class="form-control">
        </div>
          <div class="col-md-2">
           <label>Rol del usuario</label>
        </div>
        <div class="col-md-4">
          <select name="usu_rolid" class="form-control">
            <option>Seleccionar..</option>
            <?php

            foreach ($rol as $value){
              
              echo "<option value='".$value->rol_id."'>".$value->rol_nombre."</option>";
            }
            
            ?>
          </select>
        </div>
   </div><br><br>


   <div class="row">
        <div class="col-md-2">
          <label>Nickname</label>
        </div>
        <div class="col-md-4">
          <input type="text" name="usu_login" class="form-control">
        </div>
        <div class="col-md-2">
          <label>Pass</label>
        </div>
        <div class="col-md-4">
          <input type="text" name="usu_passwod" class="form-control">
        </div>
   </div>
<br><br>
<input type="submit" name="enviar" class="btn btn-success">
<br><br>   
   </form>
</div>
</div>

