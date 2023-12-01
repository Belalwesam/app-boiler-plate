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

// function errorMessage(message) {}

// successMessage("you did it");
