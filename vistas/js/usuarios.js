/*********************************
 * SUBIENDO LA FOTO DEL USUARIO
 ********************************/

$(".nuevaFoto").change(function() {

    var imagen = this.files[0];

    /*******************************
     * VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
     ********************************/

    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png" && imagen["type"] != "image/jpg") {

        $(".nuevaFoto").val("");

        swal.fire({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            icon: "error",
            confirmButtonText: "¡Cerrar!"
        });

    } else if (imagen["size"] > 2000000) {

        $(".nuevaFoto").val("");

        swal.fire({
            title: "Error al subir la imagen",
            text: "¡La imagen no debe pesar mas de 2MB!",
            icon: "error",
            confirmButtonText: "¡Cerrar!"
        });

    } else {

        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load", function(event) {

            var rutaImagen = event.target.result;

            $(".previsualizar").attr("src", rutaImagen);


        })

    }


})