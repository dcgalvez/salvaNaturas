$(document).on("submit", "#contactanos-identificador", async function(e) {
    e.preventDefault();
    let data = toolsHome.takeValue_Middle('ConTKV');
    // console.log(data);
    toolsHome.peticionAjax('POST', urlEnviarContacto, data, "Contactanos");

    setTimeout(() => {
        toolsHome.setValue_Start("ConTKV");
        Swal.fire({
            title: "Mensaje Enviado",
            text: "Su opinion es muy importante para nosotros",
            icon: "success",
            timer: 4000,
            showConfirmButton: true,
        });
      }, "500");
   
    // let response = await peticionesAdmin.myOwnPeticionDataFTP(rutaServicios_updImagen, 'POST', formData, 'S-UpdateImg');
})