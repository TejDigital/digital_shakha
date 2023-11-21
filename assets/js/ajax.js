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
  let formReset = document.getElementById("formReset");
  function clearInput() {
    formReset.reset();
  }
});

//--------------Student-Registration-------------

$(document).ready(function () {
  $("#std_register_form").on("submit", function (e) {
    e.preventDefault();
    var form = $(this);
    var formData = form.serialize();
    var submitBtn = $("#submitBtn");
    // Disable the submit button
    submitBtn.prop("disabled", true);
    console.log(formData);
    $.ajax({
      type: "POST",
      url: "././admin/register_code.php",
      data: formData,
      success: function (response) {
        console.log(response);
        if (response == "email has been sent to your email id") {
          closeRegistrationModal();
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
          submitBtn.prop("disabled", true);
        } else if (response == "Password and confirm password not match") {
          closeRegistrationModal();
          Swal.fire({
            position: "center",
            icon: "error",
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
          submitBtn.prop("disabled", true);
        } else if (
          response == "Something went wrong , please try after some time"
        ) {
          closeRegistrationModal();
          Swal.fire({
            position: "center",
            icon: "error",
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
          submitBtn.prop("disabled", true);
        }
      },
      error: function (response) {
        closeRegistrationModal();
        alert("Something went wrong");
        console.log(response);
      },
    });
  });
  function closeRegistrationModal() {
    $("#registerModal").hide();
  }
});

//-------------------------for-redirecting from gmail------------
$(document).ready(function () {
  // Check if the 'redirect' parameter is in the URL
  const urlParams = new URLSearchParams(window.location.search);
  const redirectParam = urlParams.get("redirect");

  if (redirectParam === "success") {
    // Open the login modal when the user is successfully verified
    $("#loginModal").show(); // You may need to use the appropriate method to show the modal
  } else if (redirectParam === "error") {
    $("#registerModal").show(); // You may need to use the appropriate method to show the modal
  }
});

//--------------Student-login-------------

$(document).ready(function () {
  $("#std_login_form").on("submit", function (e) {
    e.preventDefault();
    var form = $(this);
    var formData = form.serialize();
    $.ajax({
      type: "POST",
      url: "././admin/std_login_code.php",
      data: formData,
      success: function (response) {
        console.log(response);
        if (response == "login successfully") {
          console.log("login");
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
          }).then(function () {
            location.reload();
          });
        } else if (response == "invalid id or password") {
          closeLoginModal();
          Swal.fire({
            position: "center",
            icon: "error",
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
          }).then(function () {
            location.reload();
          });
        } else if (response == "you are not verified") {
          closeLoginModal();
          Swal.fire({
            position: "center",
            icon: "error",
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
          }).then(function () {
            location.reload();
          });
        }
      },
      error: function (response) {
        closeLoginModal();
        alert("Something went wrong");
        console.log(response);
      },
    });
  });

  function closeLoginModal() {
    $("#loginModal").hide();
    console.log("login close");
  }
});

//--------------Student-Logout-------------

$(document).ready(function () {
  $("#std_log_out").on("submit", function (e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "././admin/std_logout_code.php",
      success: function (response) {
        if (response == "You are logout") {
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
          }).then(function () {
            location.reload();
          });
        }
      },
      error: function (response) {
        alert("Something went wrong");
        console.log(response);
      },
    });
  });
});

// ---------------------------Application-form-------------------------
$(document).ready(function () {
  $(".app-click").on("submit", "form.formID", function (e) {
    e.preventDefault();
    var form = $(this);
    var formData = new FormData(form[0]);

    console.log(formData);

    $.ajax({
      type: "POST",
      url: "././admin/application_code.php",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        console.log(response);
        if (response == "We are connect soon") {
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
        } else if (response == "Something went wrong") {
          Swal.fire({
            position: "center",
            icon: "error",
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
        clearInput();
      },
      error: function (response) {
        alert("Something went wrong");
        console.log(response);
      },
    });
  });
  let app_form = $("#app_form")[0];
  function clearInput() {
    $("#fileNameDisplay1").text("Candidate Passport Size Photo");
    $("#fileNameDisplay2").text("Upload Payment Screenshot");
    app_form.reset();
  }
});

// ---------------------------Application-form-------------------------
$(document).ready(function () {
  $("#interview_form").on("submit", function (e) {
    e.preventDefault();
    var interview_form = $(this);
    // var formData = new FormData(interview_form[0]);
    var formData = interview_form.serialize();
    console.log(formData);

    $.ajax({
      type: "POST",
      url: "././admin/schedule_code.php",
      data: formData,
      success: function (response) {
        console.log(response);
        if (response == "we are connect soon") {
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
        } else if (response == "Something went wrong") {
          Swal.fire({
            position: "center",
            icon: "error",
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
        clearInput();
      },
      error: function (response) {
        alert("Something went wrong");
        console.log(response);
      },
    });
  });
  let interview_form = $("#interview_form")[0];

  function clearInput() {
    interview_form.reset();
  }
});

// ---------------------For-state-------------
$(document).ready(function () {
  $("#country").on("change", function (e) {
    e.preventDefault();
    var values = $(this).val().split(",");
    var countryId = values[0];
    console.log(countryId);
    $("#state").html('<option value="">Select State</option>');
    $.ajax({
      type: "POST",
      url: "././admin/country_code_ajax.php",
      data: {
        country_id: countryId,
      },
      success: function (response) {
        $("#state").append(response);
      },
    });
  });
});
// ---------------------for-city--------------------

$(document).ready(function () {
  $("#state").on("change", function (e) {
    e.preventDefault();
    var values = $(this).val().split(",");
    var stateId = values[0];
    console.log(stateId);
    $("#city").html('<option value="">Select City</option>');
    $.ajax({
      type: "POST",
      url: "././admin/state_code_ajax.php",
      data: {
        state_id: stateId,
      },
      success: function (response) {
        $("#city").append(response);
      },
    });
  });
});
