<div class="content-wrapper">
   
    <section class="content-header">

      <h1>

        Solicitar reserva
        
      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

        <li class="active">Solicitar reserva</li>

      </ol>

    </section>

     <!-- Main content -->
     <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
        <div class="box-body">

            <div id="content1" style="display: flex; flex-direction: row; padding: 40px;">

                <form class="calendariopte1" style="margin-left: 60px;">
                    <label for="Tipodeevento" style="font-size: 18px;">Tipo de evento</label>
                    <select name="Tipodeevento" id="Tipodeevento" <option value="Boda">Boda</option>
                            <option value="Fiestadegrado">Fiesta de grado</option>
                            <option value="Fiestadequince">Fiesta de quince</option>
                            <option value="Aniversario">Aniversario</option>
                            <option value="Confirmación">Confirmación</option>
                            <option value="Bautizo">Bautizo</option>
                            <option value="Cumpleaños">Cumpleaños</option>
                            <option value="Despedidadesoltero">Despedida de solteros</option>
                        </select>
                </form>

                <form class="calendariopte2" style="margin-left: 80px;">
                    <label for="Fecha" style= "font-size: 18px;">fecha</label>
                    <input class="entrada1" type="date" id="Fecha" name="Fecha">
                </form>

                <form class="calendariopte3" style="margin-left: 90px;">
                    <label for="Hora" style= "font-size: 18px;">hora</label>
                    <input class="entrada1" type="time" id="hora" name="hora"><br><br><br><br><br><br>
                </form>

            </div>

            <div id=content2>

              <form action="calendariopte4" style="margin-left:50px;">
                  <label for="Nombre" style= "font-size: 18px;">Nombre</label>
                  <input class="entrada2" type="text" id="nomNombre" name="nomNombre" style="width:370px;"><br><br><br>

                  <label for="Teléfono" style= "font-size: 18px;">Teléfono</label>
                  <input class="entrada3" type="text" id="Teléfono" name="Teléfono" style="width:200px;"><br><br><br>

                  <input type="submit" value="Solicitar" class="boton" style="background-color: #3c8dbc; border: #367fa9; padding: 5px 35px; text-align: center text-decoration: none; font-size: 16px;
                    margin: 0px; cursor: pointer; position: relative;  left: 620px;">

                  <input type="submit" value="Cancelar" class="boton" style="background-color: #3c8dbc; border: #367fa9; padding: 5px 35px; text-align: center text-decoration: none; font-size: 16px;
                    margin: 0px; cursor: pointer; position: relative;  left: 700px;">

              </form>

            </div>

          </div>
        </div>

        </div>
        <!-- /.box-body -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->