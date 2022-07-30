<?php

class ControladorProductos{

    /*********************************
    * MOSTRAR PRODUCTOS
    ********************************/

    static public function ctrMostrarProductos($item, $valor){

        $tabla = "productos";

        $respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor);

        return $respuesta;

    }

    /*********************************
    * CREAR PRODUCTO
    ********************************/
    
    static public function ctrCrearProducto(){

        if(isset($_POST["nuevaDescripcion"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍOÚ ]+$/', $_POST["nuevaDescripcion"]) && 
                preg_match('/^[0-9]+$/', $_POST["nuevoStock"]) &&
                preg_match('/^[0-9]+$/', $_POST["nuevoPrecioCompra"])){

                    $ruta = "vistas/img/productos/default/anonymous.png";

                    $tabla = "productos";

                    $datos = array("id_categoria" => $_POST["nuevaCategoria"],
                                    "codigo" => $_POST["nuevoCodigo"],
                                    "descripcion" => $_POST["nuevaDescripcion"],
                                    "stock" => $_POST["nuevoStock"],
                                    "precio_compra" => $_POST["nuevoPrecioCompra"],
                                    "imagen" => $ruta);

                    $respuesta = ModeloProductos::mdlIngresarProducto($tabla, $datos);

                    if($respuesta == "ok"){

                        echo '<script>
                    
                        swal.fire({
                            icon: "success",
                            title: "El producto ha sido guardado correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "cerrar",

                        }).then ((result)=>{

                            if(result.value){

                                window.location = "productos";

                            }
                        })
                    
                        </script>';
                    }
                        
                }else{

                    echo '<script>
                        
                    swal.fire({
                        icon: "error",
                        title: "¡El producto no puede ir con los campos vacíos o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",

                    }).then ((result)=>{

                        if(result.value){

                            window.location = "productos";

                        }
                    })
                
                    </script>';

                }

    }

        }

}