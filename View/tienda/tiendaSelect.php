<table id="example" class="display table" style="width:100%">
	<thead class="thead-dark">
		<tr>
			<th>ID</th>
			<th>Razon Social Empresa</th>
			<th>Nit Empresa</th>
			<th>Nombre Comercial</th>
			<th>Correo electrónico</th>
			<th>Telefono</th>

		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($tienda as $value):?>
			<tr>
				<td><?php echo $value->emp_id; ?></td>
				<td><?php echo $value->emp_razsoc; ?></td>
				<td><?php echo $value->emp_nit; ?></td>
				<td><?php echo $value->emp_nomcom; ?></td>
				<td><?php echo $value->emp_corfis; ?></td>
				<td><?php echo $value->emp_telfis; ?></td>
				
			</tr>
		<?php endforeach; ?>
		
	</tbody>
	<tfoot class="thead-dark">
		<tr>
			<th>ID</th>
			<th>Razon Social Empresa</th>
			<th>Nit Empresa</th>
			<th>Nombre Comercial</th>
			<th>Correo electrónico</th>
			<th>Telefono</th>
		</tr>
	</tfoot>
</table>
<script>
	$(document).ready(function() {
		$('#example').DataTable( {
			dom: 'Bfrtip',
			lengthMenu: [
			[ 10, 25, 50, 100, -1 ],
			[ '10 Filas', '25 Filas', '50 Filas','100 Filas', 'Mostrar Todos' ]
			],
			buttons: [
			{
				extend: 'pageLength',
				text: 'Filtrar # Filas'
			},
			{
				extend: 'copy',
				text: 'Copiar al Portapapeles'
			},
			{
				extend: 'csv',
				text: 'Exportar CSV'
			},
			{
				extend: 'excel',
				text: 'Exportar Excel'
			},
			{
				extend: 'pdf',
				text: 'Exportar Pdf'
			},
			{
				extend: 'print',
				text: 'Imprimir Tabla'
			}
			],
			"language": {
				"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
			}
		} );
	} );
</script>