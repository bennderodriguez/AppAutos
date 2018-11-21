$("#updateDataUser").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        formError();
        submitMSG(false, "Todos los campos son requeridos");
    } else {
        // everything looks good!
        event.preventDefault();
        submitForm();
    }
});


function submitForm() {
    // Initiate Variables With Form Content
    var idCliente = $("#idCliente").val();
    var nombre = $("#name").val();
    var email = $("#email").val();
    var phone = $("#phone").val();
    var idContrato = $("#idContrato").val();
    var FechaApertura = $("#FechaApertura").val();
    var Vehiculo = $("#Vehiculo").val();
    var Navigate = $("#Navigate").val();

    console.log(idCliente);
    console.log(nombre);
    console.log(email);
    console.log(phone);
    console.log(idContrato);
    console.log(FechaApertura);
    console.log(Vehiculo);
    console.log(Navigate);

    $.ajax({
        type: "POST",
        url: "http://"+host+"/Autos2BE/php/updateDataUser.php",
        data: "idCliente=" + idCliente + "&nombre=" + nombre + "&email=" + email + "&phone=" + phone
                + "&idContrato=" + idContrato + "&FechaApertura=" + FechaApertura
                + "&Vehiculo=" + Vehiculo + "&Navigate=" + Navigate,
        success: function (text) {
            //Modificacion exitosa
            var n = text.includes("Modificacion exitosa");
            if (n) {
                location.href = "profile.html";
                formSuccess();
            } else {
                formError();
                submitMSG(false, text);
            }
        }
    });
}

function formSuccess() {
    $("#updateDataUser")[0].reset();
    submitMSG(true, "Éxito")
}

function formError() {
    $("#updateDataUser").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
        $(this).removeClass();
    });
}

function submitMSG(valid, msg) {
    if (valid) {
        var msgClasses = "h3 text-center tada animated text-success";
    } else {
        var msgClasses = "h3 text-center text-danger";
    }
    $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
}