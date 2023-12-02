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

    $(".invalid-feedback").each(function () {
        $(this).remove();
    });
    $(".is-invalid").each(function () {
        $(this).removeClass("is-invalid");
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
    for (const [key, value] of Object.entries(errorsList)) {
        $(`[name="edit_${key}"]`).next().remove();
        let error = `<div class="invalid-feedback">${value}</div>`;
        $(`[name="edit_${key}"]`).after(error);
        $(`[name="edit_${key}"]`).addClass("is-invalid");
    }
}
