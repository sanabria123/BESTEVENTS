<div class="content-wrapper">
   
   <section class="content-header">

     <h1>

       Administrar productos

     </h1>

     <ol class="breadcrumb">

       <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

       <li class="active">Administrar productos</li>

     </ol>

   </section>

    <section class="content">

     <div class="box">

       <div class="box-header with-border">
         
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
          
            Agregar producto

          </button>

       </div>

       <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablaProductos" width="100%">

          <thead>

          <tr>

              <th style="width:10px">#</th>
              <th>Imagen</th>
              <th>Código</th>
              <th>Descripción</th>
              <th>Categoria</th>
              <th>Stock</th>
              <th>Precio de compra</th>
              <th>Agregado</th>
              <th>Acciones</th>

            </tr>

          </thead>

        </table>
        
       </div>

     </div>
  
   </section>
 
 </div>

 <!-- MODAL AGREGAR PRODUCTO-->


 <div id="modalAgregarProducto" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!-- CABEZA DEL MODAL-->

        <div class="modal-header" style="background:#3c8dbc; color:white;">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Producto</h4>

        </div>

        <!-- CUERPO DEL MODAL-->

        <div class="modal-body">

          <div class="box-body">

          <!-- ENTRADA PARA SELECCIONAR CATEGORÍA-->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-th"></i></span>

              <select class="form-control input-lg" id="nuevaCategoria" name="nuevaCategoria"  required>

                <option value="">seleccionar Categoría</option>

                <?php

                $item = null;
                $valor = null;

                $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                foreach ($categorias as $key => $value) {
                  
                  echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
                }

                ?>

              </select>

            </div>

          </div>

          <!-- ENTRADA PARA EL CÓDIGO-->
          
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-code"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoCodigo" name="nuevoCodigo" placeholder="Ingresar código" readonly required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DESCRIPCIÓN-->

              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                  <input type="text" class="form-control input-lg" name="nuevoDescripcion" placeholder="Ingresar descripción" required>

                </div>

              </div>

                <!-- ENTRADA PARA STOCK-->

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-check"></i></span>

                    <input type="number" class="form-control input-lg" name="nuevoStock" min="0" placeholder="Stock" required>

                  </div>

                </div>

                    <!-- ENTRADA PARA PRECIO COMPRA-->

                    <div class="form-group row">

                        <div class="col-xs-6">

                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>

                            <input type="number" class="form-control input-lg" name="nuevoPrecioCompra" placeholder="Precio de compra" required>

                          </div>

                        </div>

              <!-- ENTRADA PARA SUBIR F0TO-->

              <div class="form-group">

                <div class="panel">SUBIR IMAGEN</div>

                <input type="file" id="nuevaImagen" name="nuevaImagen">

                <p class="help-block">Peso máximo de la imagen 2MB</p>

                <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="100px">

              </div>

            </div>

          </div>

          <!-- PIE DEL MODAL-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button typed="submit" class="btn btn-primary">Guardar producto</button>

        </div>

      </form>

        <?php

          $crearProducto = new ControladorProductos();
          $crearProducto -> ctrCrearProducto();

        ?>

    </div>

  </div>

</div>
