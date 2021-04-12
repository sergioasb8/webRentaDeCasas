const formularios_ajax = document.querySelectorAll(".FormAjax");

function enviar_formulario_ajax (e) {
    e.preventDefault();

    // esta variable va a contener todos los datos del formulario
    let data = new FormData(this);
    // obteniendo valos de la etiqueta form
    let method = this.getAttribute("method");
    let action = this.getAttribute("action");
    let tipo =  this.getAttribute("data-form");

    let encabezados = new Headers();

    let config = {
        method: method,
        headers: encabezados,
        mode: 'cors', 
        cache: 'no-cache',
        body: data,
    }

    let texto_alerta;

    if(tipo === "save") {
        texto_alerta = "Los datos quedarán guardados en el sistema";
    }   else if(tipo === "delete") {
        texto_alerta = "Los datos serán elminados del sistema";
    }   else if(tipo === "update") {
        texto_alerta = "Los datos serán actualizados en el sistema";
    }   else if(tipo === "search") {
        texto_alerta = "Se eliminará el termino de busqueda y tendrás que escribir uno nuevo";
    }   else if(tipo === "loans") {
        texto_alerta = "¿Desea remover los datos seleccionados para prestamos o reservaciones?";
    }   else {
        texto_alerta = "¿Quieres realizar la operación solicitada?"
    }

    Swal.fire({
        title: 'Estas seguro?',
        text: texto_alerta,
        type: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
            // enviando la URL y la configuración
            fetch(action, config)
            // recibiendo la respuesta en formato json
            .then(respuesta => respuesta.json())
            .then(respuesta => {
                return alertas_ajax(respuesta);
            });
        }
    })
}

formularios_ajax.forEach(formularios => {
    formularios.addEventListener("submit", enviar_formulario_ajax);
});

// en esta funcion vamos a recibir un json como parametro
function alertas_ajax(alerta) {
    if(alerta.Alerta ==="simple") {
        Swal.fire({
            title: alerta.Titulo,
            text: alerta.Texto,
            type: alerta.Tipo,
            confirmButtonText: 'Aceptar'
        });
    }   else if(alerta.Alerta ==="recargar") {
        Swal.fire({
            title: alerta.Titulo,
            text: alerta.Texto,
            type: alerta.Tipo,
            confirmButtonText: 'Aceptar'
        }).then((result) => {
            if (result.value) {
                // con esto después de darle aceptar vamos a recargar la página en la que estamos
                location.reload();
            }
        })
    }   else if(alerta.Alerta ==="limpiar") {
        Swal.fire({
            title: alerta.Titulo,
            text: alerta.Texto,
            type: alerta.Tipo,
            confirmButtonText: 'Aceptar'
        }).then((result) => {
            if (result.value) {
                // con esto después de darle aceptar vamos a limpiar el formulario
                document.querySelector(".FormAjax").reset();
            }
        })
    }   else if(alerta.Alerta ==="redireccionar") {
        window.location.href=alerta.URL;
    }
}

