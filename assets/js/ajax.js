$(document).ready(function () {
  $(".form-click").on("submit", "form.formID", function (e) {
    e.preventDefault();
    var form = $(this);
    var formData = form.serialize();
    $.ajax({
      type: "POST",
      url: "././admin/connect.php",
      data: formData,
      success: function (response) {
        console.log(response);
        if (response == "Thankyou We are connect soon") {
          Swal.fire({
            position: "center",
            icon: "success",
            text: response,
            showConfirmButton: false,
            showClass: {
              popup: "animate__animated animate__fadeInDown",
            },
            hideClass: {
              popup: "animate__animated animate__fadeOutUp",
            },
            customClass: {
              icon: "custom-icon-color",
              modal: "custom-border",
            },
            width: 600,
            color: "#EBAB56",
            background: "#fff",
            backdrop: `  
                          rgba(40, 39, 19,0.4)
                          left top
                          no-repeat`,
            timer: 2500,
          });
        }
      },
      error: function (response) {
        alert("Something went wrong");
        console.log(response);
      },
    });
    clearInput();
});
});

let formReset = document.getElementById("formReset");
function clearInput() {
  formReset.reset();
}
