<?php
if(!isset($bdd)){ include 'db_connect.php'; } ?>

<div class="col-lg-4">
	<div class="card card-outline card-primary">
		<div class="card-body">
        <div class="row">        	
           <div class="col-md-12">
            <div class="table-responsive">
              <table class="table m-0 table-hover">
                <colgroup>
                  <col width="5%">
                  <col width="10%">
                  <col width="2%">
                </colgroup>
                <thead>
                  <th class="text-center">#</th>
                  <th class="text-center">Tipo de vivero</th>
                  <th></th>
                </thead>
                <tbody>
                <?php
                $i = 1;
                $qry = $bdd->query('SELECT * FROM tipo_vivero order by Tipo asc');
                while($row= $qry->fetch(PDO::FETCH_ASSOC)):
                ?>
                  <tr>
                      <td class="text-center">
                         <?php echo $i++ ?>
                      </td>
                      <td class="text-center">                    
                        <?php echo  ($row['Tipo'])	?>  
                      </td>
                      <td>
                      <a class="fas fa-trash-alt btn btn-warning btn-sm borrar_tipo_vivero" data-toggle="tooltip" title="Borrar" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"></a> 
                      </td>
                  </tr>
                <?php endwhile; ?>
                </tbody>  
              </table>
            </div>
          </div>
        </div>
        </div>
		</div>
		</div>

<div class="col-lg-4">
	<div class="card card-outline card-primary">
		<div class="card-body">
        <div class="row">        	
           <div class="col-md-12">
            	<div class="form-group">
					<form id="combo" name="combo" action="guardar_tipo_vivero.php" method="POST">
			
					<div class="form-group">
							<label for="" class="control-label required ">Escriba el tipo de vivero que desea agregar</label>
							<input type="text" name="Tipo" id= 'Tipo' class="form-control form-control-sm" required value="<?php echo isset($Tipo) ? $Tipo : '' ?>"required>
						</div>
					
				</div>	
            </div>
          	</div>

		<div class="row">		
    		<div class="d-flex w-100 justify-content-center align-items-center">
			<button class="btn btn-flat  bg-gradient-primary mx-2" type="submit" id="enviar" name="enviar" value="Guardar">Guardar</button>
    		</div>
    	</div>
	</div>
</div>

<script>

$(document).ready(function(){
		$('#list').dataTable()
	
	$('.borrar_tipo_vivero').click(function(){
	_conf("Seguro que desea borrar el tipo de vivero?","borrar_tipo_vivero",[$(this).attr('data-id')])
	})
	})
	
	function borrar_tipo_vivero($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=borrar_tipo_vivero',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Borrado exitosamente",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>
