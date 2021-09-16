<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Prueba Front End</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap4.min.css">
</head>
<body>
	<div class="container">
		<div class="row justify-content-center  align-items-center hv-100">
			<div >
				<div class="row">

					<div class="col-md-12 mb-4">
						<div class="row">
							<div class="col-md-6">
								<p><strong>Número de orden</strong></p>
								<select class="form-control" id="selectNumber">
									<option value="">Seleccione el número del orden</option>
								</select>
							</div>
							<div class="col-md-6 text-md-right text-center">
								<p>&nbsp;</p>
								
								<button type="button" class="btn btn-outline-primary addProducto" data-toggle="modal" data-target="#addProductModal">Agregar producto</button>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<table id="TableProduct" class="table table-striped table-bordered w-100">
						        <thead>
						            <tr>
						                <th>Sku</th>
						                <th>Nombre</th>
						                <th>Cantidad</th>
						                <th>Precio</th>
						            </tr>
						        </thead>
						        <tbody class="table_ordenes">
						            
						           
						        </tbody>
						        <tfoot>
						            <tr>
						                <th>Sku</th>
						                <th>Nombre</th>
						                <th>Cantidad</th>
						                <th>Precio</th>
						            </tr>
						        </tfoot>
						    </table>	
					</div>
				</div>
			</div>
		</div>
	</div>


<!-- Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Formulario producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="container">
      		<div class="row">
      			<div class="col-md-12" id="div-formulario">


    				<form  id="FormProduct" class="needs-validation" novalidate>
					  	<div class="form-row">
						    <div class="col-md-12 mb-3">
						      <label for="sku">Sku</label>
						      <input type="text" class="form-control" name="sku" id="sku" placeholder="Sku" required>
						      <div class="invalid-feedback">
						        Por favor elige una sku.
						      </div>
						    </div>
						    <div class="col-md-12 mb-3">
						      <label for="nombre">Nombre</label>
						      <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" required>
						      <div class="invalid-feedback">
						        Por favor elija un nombre.
						      </div>
						    </div>
						    <div class="col-md-6 mb-3">
						      <label for="cantidad">Cantidad</label>
						        <input type="text" class="form-control SinLe" name="cantidad" id="cantidad" placeholder="Cantidad" aria-describedby="inputGroupPrepend" required>
						        <div class="invalid-feedback">
						          Elija una cantidad.
						        </div>
						   
						    </div>
						    <div class="col-md-6 mb-3">
						      <label for="precio">Precio</label>
						      <input type="text" class="form-control MoneyEs" name="precio" id="precio" placeholder="Precio" required>
						      <div class="invalid-feedback">
						       Elija un precio.
						      </div>
						    </div>
					  	</div>

					  	<div class="form-row">
					  		<div class="col-md-12 text-center">
					  			<button class="btn btn-outline-success w-50" type="submit">Añadir</button>
					  		</div>
					  	</div>

					  
					</form>
      		</div>
      		<div class="col-md-12 div-none text-center" id="thankyou">
					<div class="alert alert-success mt-4" role="alert">
					  <h4 class="alert-heading">¡El producto se agregó exitosamente!</h4>
					</div>
					<button type="button" class="btn btn-outline-primary newproduct">Agregar nuevo producto</button>
      		</div>
      	</div>
      </div>
    </div>
  </div>
</div>




	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


	<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap4.min.js"></script>
	<script src="assets/js/script.js"></script>
	<script src="assets/js/jquery-datatable.js"></script>
</body>
</html>