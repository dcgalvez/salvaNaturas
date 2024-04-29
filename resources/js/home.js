function getHomePageContent() {

    const positionImage = "Imagen 1"; // Valor de parámetro de ejemplo
    const positionText = "Texto 1"; // Valor de parámetro de ejemplo

    // Realizar una solicitud AJAX al punto final de la API
    fetch("../routes/api.php", {
        method: "POST", // Ajustar el método si se envían parámetros (POST)
        headers: {
            "Content-Type": "application/json",
        },
        params: {
            // Agregar parámetros para solicitudes GET
            positionImage: positionImage,
            positionText: positionText,
        },
    })
        .then((response) => response.json())
        .then((data) => {
            // Procesar los datos recibidos y actualizar el HTML
            if (data.length > 0) {
                displayHomePageContent(data);
            } else {
                // Manejar el caso de no hay datos (mostrar error, etc.)
            }
        })
        .catch((error) => {
            console.error("Error al obtener el contenido de la página de");
        })

        .then((data) => {
            if (data.length === 0) {
                console.error("No se recibieron datos para mostrar.");
                return;
            }

            // Suponiendo que data es un array de objetos de proyectos
            const datosProyecto = data[0]; // Accede al primer proyecto por ahora (modifica según sea necesario)

            displayHomePageContent(datosProyecto);
        })
        .catch((error) => {
            console.error(
                "Error al obtener el contenido de la página de inicio:",
                error
            );
        });
}

function displayHomePageContent(datosProyecto) {
    // Actualiza los elementos HTML en función de las propiedades de los datos del proyecto
    document.getElementById("mainText").textContent =
        datosProyecto.proyecto_nombre; // Suponiendo que "proyecto_nombre" es el nombre de la propiedad
    document.getElementById("middleText").textContent =
        datosProyecto.proyecto_descripcion; // Suponiendo que "proyecto_descripcion" es el nombre de la propiedad

    // Actualiza otros elementos (imagen, enlace, etc.) en función de la estructura de datos del proyecto
    // Ejemplo: Actualiza la imagen utilizando datosProyecto.proyecto_imagen
    const elementoImagen = document.querySelector(".imagePSN");
    if (elementoImagen) {
        elementoImagen.style.backgroundImage = `url(${datosProyecto.proyecto_imagen})`; // Reemplaza con la propiedad de URL de imagen real
    }

    // Ejemplo: Actualiza el enlace utilizando datosProyecto.proyecto_enlace
    const elementoEnlace = document.querySelector(".lastText a");
    if (elementoEnlace) {
        elementoEnlace.href = datosProyecto.proyecto_enlace; // Reemplaza con la propiedad de URL de enlace real
    }
}
