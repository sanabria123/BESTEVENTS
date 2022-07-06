<?php

    class ControladorCategorias{

        /*********************************
        * CREAR CATEGORIAS
        ********************************/

        static public function ctrCrearCategoria(){

            if(isset($_POST["nuevaCategoria"])){

                if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍOÚ ]+$/', $_POST["nuevaCategoria"])){

                    $tabla = "categorias";

                    $datos = $_POST["nuevaCategoria"];

                    $respuesta = ModeloCategorias::mdlIngresarCategoria($tabla, $datos);

                    if($respuesta == "ok"){

                        echo '<script>
                        
                            swal.fire({
                                icon: "success",
                                title: "La categoria ha sido guardada correctamente",
                                showConfirmButton: true,
                                confirmButtonText: "cerrar",
                                closeOnConfirm: false

                            }).then ((result)=>{

                                if(result.value){

                                    window.location = "categorias";
            
                                }

                            })
                        
                        </script>';

                        
                    }

                }else{

                    echo '<script>
                        
                            swal.fire({
                                icon: "error",
                                title: "¡La categoria no puede ir vacía o llevar caracteres especiales!",
                                showConfirmButton: true,
                                confirmButtonText: "cerrar",
                                closeOnConfirm: false

                            }).then ((result)=>{

                                if(result.value){

                                    window.location = "categorias";
            
                                }

                            })
                        
                        </script>';

                }

            }
            
        }

    }