function successMessage(message) {
    Swal.fire({
        title: "Good Job",
        text: message,
        icon: "success",
        customClass: {
            confirmButton: "btn btn-primary",
        },
        buttonsStyling: false,
    });
}

function errorMessage(message) {
    Swal.fire({
        title: "Error",
        text: message,
        icon: "error",
        customClass: {
            confirmButton: "btn btn-primary",
        },
        buttonsStyling: false,
    });
}

function displayErrors(response) {
    let errorsList = JSON.parse(response.responseText).errors;
    console.log(errorsList);
}
