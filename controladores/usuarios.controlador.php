<?php

class ControladorUsuarios{

    /****************************
     * INGRESO DE USUARIO
     ***************************/

    static public function ctrIngresoUsuario(){

        if(isset($_POST["ingUsuario"])){

            if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
              preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

                $tabla = "usuarios";

                $item = "usuario";
                $valor = $_POST["ingUsuario"];

                $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

                if($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $_POST["ingPassword"]){

                    $_SESSION["iniciarSesion"] = "ok";

                    echo '<script>

                        window.location = "inicio";

                    </script>';


                }else{

                    echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a 
                        intentarlo</div>';

                }

            }

        }

    }

    /***************************
    * REGISTRO DE USUARIO
    ***************************/

    static public function ctrCrearUsuario(){
        if(isset($_POST["nuevoUsuario"])){
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍOÚ ]+$/', $_POST["nuevoNombre"]) && 
            preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
            preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])){

                    /***************************
                    * VALIDAR IMAGEN
                    ***************************/

                     $ruta= "";

                    if(isset($_FILES["nuevaFoto"]["tmp_name"])){

                        list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

                        $nuevoAncho = 500;
                        $nuevoAlto = 500;

                        /*********************************************************
                        * CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
                        *********************************************************/

                        $directorio = "vistas/img/usuarios/" .$_POST["nuevoUsuario"];

                        /* ya vuelvo */


                        mkdir($directorio, 0755);
                        
                        /*********************************************************
                        * DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                        *********************************************************/

                        if($_FILES["nuevoFoto"]["type"] == "image/jpg"){

                            /*********************************************************
                            * GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                            *********************************************************/
                            
                            $aleatorio = mt_rand(100,999);

                            $ruta = "vistas/img/usuarios/" .$_POST["nuevoUsuario"]."/".$aleatorio.".jpg";

                            $origen = imagecreatefromjpg($_FILES["nuevaFoto"]["tmp_name"]);

                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                            imagejpg($destino, $ruta);
                        
                        }

                        if($_FILES["nuevoFoto"]["icon"] == "image/png"){

                            /*********************************************************
                            * GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                            *********************************************************/
                            
                            $aleatorio = mt_rand(100,999);

                            $ruta = "vistas/img/usuarios/" .$_POST["nuevoUsuario"]."/".$aleatorio.".png";

                            $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                            imagepng($destino, $ruta);
                        
                        }


                    }


                $tabla = "usuarios";
                $datos = array("nombre" => $_POST["nuevoNombre"],
                               "usuario" => $_POST["nuevoUsuario"],
                               "password" => $_POST["nuevoPassword"],
                               "perfil" => $_POST["nuevoPerfil"]);

                $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

                if ($respuesta == "ok"){
                    echo '<script>
                    
                        swal.fire({
                            type: "success",
                            title: "¡Usuario creado!",
                            showConfirmButton: true,
                            confirmButtonText: "cerrar",
                            closeOnConfirm: false

                        }).then ((result)=>{

                            if(result.value){

                                window.location = "usuarios";
        
                             }

                           

                        })
                    
                    </script>';
                }

            } else {

                echo '<script>
            
                swal.fire({

                    icon: "error",
                    title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false

                }).then((result)=>{
                
                    if(result.value){

                        window.location = "usuarios";

                    }

                });
            
            
                </script>';
            }
        }

    }
}




