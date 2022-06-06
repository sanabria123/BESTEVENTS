<div class="content-wrapper">
   
   <section class="content-header">

     <h1>

       Administrar usuarios

     </h1>

     <ol class="breadcrumb">

       <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

       <li class="active">Administrar usuarios</li>

     </ol>

   </section>

    <section class="content">

     <div class="box">

       <div class="box-header with-border">
         
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
          
            Agregar Usuario

          </button>

       </div>

       <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas">

          <thead>

            <tr>

              <th style="width:10px">#</th>
              <th>Nombre</th>
              <th>Usuario</th>
              <th>Foto</th>
              <th>Perfil</th>
              <th>Estado</th>
              <th>Último login</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>

          <?php

          $item =null;
          $valor = null;

          $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

          foreach ($usuarios as $key => $value){
            
            echo '<tr>
              <td>'.$value["id"].'</td>
              <td>'.$value["nombre"].'</td>
              <td>'.$value["usuario"].'</td>';
              
              if($value["foto"] != ""){

                echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';
              
              }else{

                echo '<td><img src="vistas/img/usuarios/default/anonymous.jpg" class="img-thumbnail" width="40px"></td>';

              }

              
              echo '<td>'.$value["perfil"].'</td>
              <td><button class="btn btn-success btn-xs">Activiado</button></td>
              <td>'.$value["ultimo_login"].'</td>
              <td>

                <div class="btn-group">

                  <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'"data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>
                  <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                
                </div>
              
              </td>

                    </tr>';

          }

          ?>

          </tbody>

        </table>
        
       </div>

     </div>
  
   </section>
 
 </div>

 <!-- MODAL AGREGAR USUARIO-->


 <div id="modalAgregarUsuario" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!-- CABEZA DEL MODAL-->

        <div class="modal-header" style="background:#3c8dbc; color:white;">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Usuarior</h4>

        </div>

        <!-- CUERPO DEL MODAL-->

        <div class="modal-body">

          <div class="box-body">

          <!-- ENTRADA PARA EL NOMBRE-->
          
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL USUARIO-->

              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-key"></i></span>

                  <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar usuario" required>

                </div>

              </div>

              <!-- ENTRADA PARA LA CONTRASEÑA-->

              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                  <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>

                </div>

              </div>

              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-users"></i></span>

                  <select name="nuevoPerfil" class="form-control input-lg">
                    <option value="">seleccionar Perfil</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Cliente">Cliente</option>
                    <option value="Vendedor">Contador</option>
          
                  </select>

                </div>
              </div>

              <!-- ENTRADA PARA SUBIR FOTO-->

              <div class="form-group">

                <div class="panel">SUBIR FOTO</div>

                <input type="file" class="nuevaFoto" name="nuevaFoto">

                <p class="help-block">Peso máximo de la foto 2 MB</p>

                <img src="vistas/img/usuarios/default/anonymous.jpg" class="img-thumbnail previsualizar" width="100px">

              </div>

            </div>

          </div>

          <!-- PIE DEL MODAL-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button typed="submit" class="btn btn-primary">Guardar usuario</button>

        </div>

        <?php

          $crearUsuario = new ControladorUsuarios();
          $crearUsuario -> ctrCrearUsuario();

        ?>

      </form>

    </div>

  </div>

</div>

 <!-- MODAL EDITAR USUARIO-->


 <div id="modalEditarUsuario" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!-- CABEZA DEL MODAL-->

        <div class="modal-header" style="background:#3c8dbc; color:white;">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Usuario</h4>

        </div>

        <!-- CUERPO DEL MODAL-->

        <div class="modal-body">

          <div class="box-body">

          <!-- ENTRADA PARA EL NOMBRE-->
          
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="editarNombre" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL USUARIO-->

              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-key"></i></span>

                  <input type="text" class="form-control input-lg" name="editarUsuario" value="" required>

                </div>

              </div>

              <!-- ENTRADA PARA LA CONTRASEÑA-->

              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                  <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva contraseña" required>

                </div>

              </div>

              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-users"></i></span>

                  <select name="editarPerfil" class="form-control input-lg">

                    <option value="" id="editarPerfil"></option>

                    <option value="Administrador">Administrador</option>

                    <option value="Cliente">Cliente</option>
                    
                    <option value="Vendedor">Contador</option>
          
                  </select>

                </div>

              </div>

              <!-- ENTRADA PARA SUBIR FOTO-->

              <div class="form-group">

                <div class="panel">SUBIR FOTO</div>

                <input type="file" class="nuevaFoto" name="editarFoto">

                <p class="help-block">Peso máximo de la foto 2 MB</p>

                <img src="vistas/img/usuarios/default/anonymous.jpg" class="img-thumbnail previsualizar" width="100px">

              </div>

            </div>

          </div>

          <!-- PIE DEL MODAL-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button typed="submit" class="btn btn-primary">Modificar usuario</button>

        </div>

        <?php

          //$crearUsuario = new ControladorUsuarios();
          // $crearUsuario -> ctrCrearUsuario();

        ?>

      </form>

    </div>

  </div>

</div>
