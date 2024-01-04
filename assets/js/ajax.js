$(document).ready(function () {
  //--------------contact-form-----------
  $("#contactFrom").validate({
    rules: {
      full_name: {
        required: true,
        maxlength: 255,
      },
      mobile: {
        required: true,
        digits: true,
        minlength: 10,
        maxlength: 10,
      },
      email: {
        required: true,
        email: true,
      },
      message: {
        required: true,
      },
    },
    messages: {
      full_name: {
        required: "Please enter your name",
        maxlength: "Name must be less than 255 characters",
      },
      mobile: {
        required: "Please enter your phone number",
        digits: "Please enter a valid phone number",
        minlength: "Phone number must be 10 digits",
        maxlength: "Phone number must be 10 digits",
      },
      email: {
        required: "Please enter your email address",
        email: "Please enter a valid email address",
      },
      message: {
        required: "Please enter a message",
      },
    },
    errorPlacement: function (error, element) {
      error.insertAfter(element);
      error.addClass("error-message");
    },
  });

  $("#contactFrom").on("submit", function (e) {
    e.preventDefault();
    var form = $(this);
    if ($(this).valid()) {
      var formData = $(form).serialize();
      console.log(formData);
      $.ajax({
        type: "POST",
        url: "././admin/connect.php",
        data: formData,
        success: function (response) {
          console.log(response);
          var msg = JSON.parse(response);
          if (msg.con_msg == 1) {
            Swal.fire({
              position: "center",
              icon: "success",
              text: "Thankyou We are connect soon",
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
          alert("Something went wrong: " + response.responseText);
          console.log(response);
        },
      });
      this.reset();
    }
  });

  //--------------Student-Registration-------------
  $.validator.addMethod(
    "alphaWithSpaces",
    function (value, element) {
      return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
    },
    "Please enter only alphabets and spaces."
  );
  $("#std_register_form").validate({
    rules: {
      name: {
        required: true,
        alphaWithSpaces: true,
      },
      email: {
        required: true,
        email: true,
      },
      phone: {
        required: true,
        digits: true,
        minlength: 10,
        maxlength: 10,
      },
      password: {
        required: true,
        minlength: 6,
      },
      confirm_password: {
        required: true,
        equalTo: "#val_password",
      },
    },
    messages: {
      name: "Please enter your name",
      email: {
        required: "Please enter your email",
        email: "Please enter a valid email address",
      },
      phone: {
        required: "Please enter your phone number",
        digits: "Please enter a valid phone number",
        minlength: "Phone number must be 10 digits",
        maxlength: "Phone number must be 10 digits",
      },
      password: "Please enter password",
      confirm_password: {
        equalTo: "Passwords do not match",
      },
    },
    errorPlacement: function (error, element) {
      error.appendTo(element.parent());
      error.addClass("error-message");
    },
  });

  $("#std_register_form").on("submit", function (e) {
    e.preventDefault();
    var reg_form = this;
    var submitBtn = $("#RegSubmitBtn");

    // Check if the form is valid
    if ($(this).valid()) {
      submitBtn.prop("disabled", true); // Disable the submit button

      // Prepare and send the AJAX request
      $.ajax({
        type: "POST",
        url: "././admin/register_code.php",
        data: $(this).serialize(),
        success: function (response) {
          console.log(response);
          var message = JSON.parse(response);

          if (message.alert === 2) {
            // Handle success case
            clearRegisterForm();
            closeRegistrationModal();
            Swal.fire({
              position: "center",
              icon: "success",
              text: "email has been sent to your email id",
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
          } else if (message.alert === 13) {
            // Handle password mismatch case
            clearRegisterForm();
            submitBtn.prop("disabled", false);
            Swal.fire({
              position: "center",
              icon: "error",
              text: "Password and confirm password do not match",
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
          } else if (message.alert === 12) {
            // Handle other error case
            clearRegisterForm();
            closeRegistrationModal();
            Swal.fire({
              position: "center",
              icon: "error",
              text: "Something went wrong, please try after some time",
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
          } else if (message.alert == 1) {
            // Handle other success case
            submitBtn.prop("disabled", false);
            clearRegisterForm();
            var sms = message.message;
            $("#top").append(sms);
            window.setTimeout(function () {
              $("#success-alert").alert("close");
            }, 4000);
          }
        },
        error: function (response) {
          // Handle AJAX error
          alert("something wrong");
        },
        complete: function () {
          // Re-enable the submit button after AJAX request is complete
          submitBtn.prop("disabled", false);
        },
      });
    }
  });
  function closeRegistrationModal() {
    $("#registerModal").hide();
  }
  function clearRegisterForm() {
    reg_form.reset();
  }

  //--------------Student-login-------------

  $("#std_login_form").validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
      },
    },
    messages: {
      email: {
        required: "Please enter your email",
        email: "Please enter a valid email address",
      },
      password: "Please enter password",
    },
    errorPlacement: function (error, element) {
      error.appendTo(element.parent());
      error.addClass("error-message");
    },
    submitHandler: function (validatedForm) {
      var loginForm = $(validatedForm);
      var loginSubmitBtn = $("#loginSubmitBtn");

      loginSubmitBtn.prop("disabled", true); // Disable the submit button

      var formData = new FormData(validatedForm);
      $.ajax({
        type: "POST",
        url: "././admin/std_login_code.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          // console.log(response);
          var result = JSON.parse(response);
          if (result.res == "1") {
            closeLoginModal();
            Swal.fire({
              position: "center",
              icon: "success",
              text: "Welcome Back",
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
              backdrop: `rgba(40, 39, 19,0.4) left top no-repeat`,
              timer: 2500,
            }).then(function () {
              location.reload();
            });
          } else if (result.res === 3) {
            closeLoginModal();
            Swal.fire({
              position: "center",
              icon: "error",
              text: "Password Not match",
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
              backdrop: `rgba(40, 39, 19,0.4) left top no-repeat`,
              timer: 2500,
            });
            clearForm();
          } else if (result.res === 4) {
            closeLoginModal();
            Swal.fire({
              position: "center",
              icon: "error",
              text: "Email not Found",
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
              backdrop: `rgba(40, 39, 19,0.4) left top no-repeat`,
              timer: 2500,
            });
            clearForm();
          } else if (result.res === 2) {
            closeLoginModal();
            Swal.fire({
              position: "center",
              icon: "error",
              text: "You are not verified",
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
              backdrop: `rgba(40, 39, 19,0.4) left top no-repeat`,
              timer: 2500,
            });
            clearForm();
          }
        },
        error: function (response) {
          // Handle AJAX error
          closeLoginModal();
          Swal.fire({
            position: "center",
            icon: "error",
            text: "Something went wrong",
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
            backdrop: `rgba(40, 39, 19,0.4) left top no-repeat`,
            timer: 2500,
          });
          console.log(response);
        },
        complete: function () {
          // Re-enable the submit button after AJAX request is complete
          loginSubmitBtn.prop("disabled", false);
        },
      });
    },
  });

  function closeLoginModal() {
    $("#loginModal").hide();
  }
  var log_form = $("#std_login_form")[0];
  function clearForm() {
    log_form.reset();
  }

  //--------------Student-forget-password-------------

  var reg_form = $("#std_forget_pass")[0];
  var errorAlert = $("#forgetPassError");

  $("#std_forget_pass").validate({
    rules: {
      forget_email: {
        required: true,
        email: true,
      },
    },
    messages: {
      forget_email: {
        required: "Please enter your email",
        email: "Please enter a valid email address",
      },
    },
    errorPlacement: function (error, element) {
      error.appendTo(element.parent());
      error.addClass("error-message");
    },
  });
  $("#std_forget_pass").on("submit", function (e) {
    e.preventDefault();
    var form = $(this);

    var formData = form.serialize();
    if ($(this).valid()) {
      var submitBtn = $("#forgetBtn");
      submitBtn.prop("disabled", true);
      $.ajax({
        type: "POST",
        url: "././admin/forget_password_code.php",
        data: formData,
        success: function (response) {
          var message = JSON.parse(response);
          if (message.forget_msg === 2) {
            clearForgetPass();
            closeForgetPassModal();
            showSuccessNotificationForgetPass();
          } else if (message.forget_msg === 3 || message.forget_msg === 4) {
            clearForgetPass();
            displayError(
              message.forget_msg === 3
                ? "Something went wrong"
                : "Email not found"
            );
            setTimeout(function () {
              errorAlert.hide();
            }, 2500);
          }
        },
        error: function (response) {
          alert("Something went wrong");
        },
      });
    }
  });
  function closeForgetPassModal() {
    $("#forgetPassModal").hide();
  }
  function clearForgetPass() {
    reg_form.reset();
  }
  function showSuccessNotificationForgetPass() {
    Swal.fire({
      position: "center",
      icon: "success",
      text: "Check your email for reset password",
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
      backdrop: "rgba(40, 39, 19,0.4) left top no-repeat",
      timer: 2500,
    });
  }
  function displayError(errorMessage) {
    errorAlert.text(errorMessage);
    errorAlert.show();
  }

  //--------------Student-reset-password-------------
  $("#std_reset_password").validate({
    rules: {
      password: {
        required: true,
        minlength: 6,
      },
      confirm_password: {
        required: true,
        equalTo: "#c_pass",
      },
    },
    messages: {
      password: "Please enter a password",
      confirm_password: {
        equalTo: "Passwords do not match",
      },
    },
    errorPlacement: function (error, element) {
      error.appendTo(element.parent());
      error.addClass("error-message");
    },
  });

  $("#std_reset_password").on("submit", function (e) {
    var reg_form = $("#std_reset_password")[0];
    e.preventDefault();
    var form = $(this);
    var formData = form.serialize();
    var submitBtn = $("#resetBtn");

    if ($(this).valid()) {
      submitBtn.prop("disabled", true);
      $.ajax({
        type: "POST",
        url: "././admin/std_reset_password.php",
        data: formData,
        success: function (response) {
          var message = JSON.parse(response);
          var token = message.token;
          var email = message.email;

          if (message.reset_msg === 2) {
            clearResetPassForm();
            showSuccessNotification();
            submitBtn.prop("disabled", false);
          } else if (
            message.reset_msg === 3 ||
            message.reset_msg === 4 ||
            message.reset_msg === 5
          ) {
            clearResetPassForm();
            showErrorNotification(message.reset_msg, token, email);
          }
        },
        error: function (response) {
          alert("Something went wrong");
        },
      });
    }
  });
  function clearResetPassForm() {
    reg_form.reset();
  }
  function showSuccessNotification() {
    Swal.fire({
      position: "center",
      icon: "success",
      text: "New Password Updated",
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
      backdrop: "rgba(40, 39, 19,0.4) left top no-repeat",
      timer: 2500,
    }).then(function () {
      window.location.href = "././index.php?";
    });
  }
  function showErrorNotification(resetMsg, token, email) {
    var textMessage = "";
    switch (resetMsg) {
      case 3:
        textMessage = "Something went wrong";
        break;
      case 4:
        textMessage = "Password does not match! Check it";
        break;
      case 5:
        textMessage = "Invalid token";
        break;
      default:
        textMessage = "Unknown error";
        break;
    }

    Swal.fire({
      position: "center",
      icon: "error",
      text: textMessage,
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
      backdrop: "rgba(40, 39, 19,0.4) left top no-repeat",
      timer: 2500,
    }).then(function () {
      window.location.href =
        "././reset_password.php?token=" + token + "&email=" + email;
    });
  }

  //--------------Student-Logout-------------

  $(".std_log_out").on("submit", function (e) {
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

  // ---------------------------Application-form-------------------------
  let app_form = $("#app_form")[0];
  $.validator.addMethod(
    "fileExtension",
    function (value, element) {
      // Get the file extension
      var extension = value.split(".").pop().toLowerCase();
      // Check if the extension is either 'jpg', 'jpeg', 'png', or 'pdf'
      return ["jpg", "jpeg", "png", "pdf"].indexOf(extension) !== -1;
    },
    "Please select a valid file type (jpg, jpeg, png, pdf)."
  );
  $("#app_form").validate({
    rules: {
      first_name: {
        required: true,
        maxlength: 255,
      },
      last_name: {
        required: true,
        maxlength: 200,
      },
      gender: {
        required: true,
      },
      dob: {
        required: true,
      },
      photo: {
        required: true,
        fileExtension: true,
      },
    },
    messages: {
      full_name: {
        required: "Please enter your name",
        maxlength: "Name must be less than 255 characters",
      },
      last_name: {
        required: "Please enter your last name name",
        maxlength: "Name must be less than 200 characters",
      },
      gender: {
        required: "Please select gender",
      },
      dob: {
        required: "Please select Date of birth",
      },
      photo: {
        required: "Please choose a file.",
        fileExtension: "Please select a valid file type (jpg, jpeg, png, pdf).",
      },
    },
    errorPlacement: function (error, element) {
      error.insertAfter(element);
      error.addClass("error-message");
    },
  });
  $("#app_form").on("submit", function (e) {
    e.preventDefault();
    var form = $(this);
    if ($(this).valid()) {
      var formData = new FormData(form.get(0));
      $.ajax({
        type: "POST",
        url: "././admin/application_code.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          var parsed_data = JSON.parse(response);
          if (parsed_data.success === 1) {
            var ids = parsed_data.data;
            console.log(ids);
          }
          if (parsed_data.success === 1) {
            Swal.fire({
              position: "center",
              icon: "success",
              text: "Fill the next Field",
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
              window.location.href = "././application_2.php?id=" + ids;
            });
          } else if (response == 10) {
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
    }
    function clearInput() {
      $("#fileNameDisplay1").text("Candidate Passport Size Photo");
      app_form.reset();
    }
  });

  // ---------------------------Application-2-form-------------------------
  $("#app_form2").validate({
    rules: {
      phone: {
        required: true,
        digits: true,
        minlength: 10,
        maxlength: 10,
      },
      email: {
        required: true,
        email: true,
      },
      address1: {
        required: true,
      },
      address2: {
        required: true,
      },
      country: {
        required: true,
      },
      state: {
        required: true,
      },
      city: {
        required: true,
      },
      pin_code: {
        required: true,
        digits: true,
        minlength: 6,
        maxlength: 6,
      },
      college: {
        required: true,
      },
      degree: {
        required: true,
      },
    },
    messages: {
      phone: {
        required: "Please enter your phone number",
        digits: "Please enter a valid phone number",
        minlength: "Phone number must be 10 digits",
        maxlength: "Phone number must be 10 digits",
      },
      address1: {
        required: "Please fill the address",
      },
      address2: {
        required: "Please fill the address",
      },
      country: {
        required: "Please select the country",
      },
      state: {
        required: "Please select the state",
      },
      city: {
        required: "Please select the city",
      },
      pin_code: {
        required: "Please enter the area code",
        digits: "Please enter a valid phone number",
        minlength: "Phone number must be 6 digits",
        maxlength: "Phone number must be 6 digits",
      },
      collage: {
        required: "Please enter the collage name",
      },
      degree: {
        required: "Please select the degree",
      },
    },
    errorPlacement: function (error, element) {
      error.insertAfter(element);
      error.addClass("error-message");
    },
  });
  $("#app_form2").on("submit", function (e) {
    let app_form = $("#app_form2")[0];

    e.preventDefault();
    var form = $(this);

    if ($(this).valid()) {
      var formData = new FormData(form.get(0));
      console.log(formData);
      $.ajax({
        type: "POST",
        url: "././admin/application_2_code.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          console.log(response);
          var parsed_data = JSON.parse(response);
          if (parsed_data.success === 2) {
            var ids = parsed_data.data;
          }
          if (parsed_data.success == 2) {
            Swal.fire({
              position: "center",
              icon: "success",
              text: "Fill the next field",
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
              window.location.href = "././application_3.php?id=" + ids;
            });
          } else if (response == 20) {
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
          } else if (parsed_data.success === 22) {
            var sms = parsed_data.msg;
            $("#app_top").append(sms);
            window.setTimeout(function () {
              $("#success-alert2").alert("close");
            }, 4000);
          }
          clearInput();
        },
        error: function (response) {
          alert("Something went wrong");
          console.log(response);
        },
      });
    }
    function clearInput() {
      app_form.reset();
    }
  });

  // ---------------------------Application-3-form-------------------------
  $("#app_form3").validate({
    rules: {
      find: {
        required: true,
      },
      referral_code: {
        digits: true,
        minlength: 6,
        maxlength: 6,
      },
      duration: {
        required: true,
      },
      course: {
        required: true,
      },
    },
    messages: {
      referral_code: {
        required: "Please enter your phone number",
        digits: "Please enter a valid phone number",
        minlength: "Phone number must be 6 digits",
        maxlength: "Phone number must be 6 digits",
      },
      course: {
        required: "Please select the course",
      },
      find: {
        required: "Please select the find",
      },
      duration: {
        required: "Please select the duration",
      },
    },
    errorPlacement: function (error, element) {
      error.insertAfter(element);
      error.addClass("error-message");
    },
  });
  $("#app_form3").on("submit", function (e) {
    e.preventDefault();
    var form = $(this);

    if ($(this).valid()) {
      var formData = new FormData(form.get(0));
      $.ajax({
        type: "POST",
        url: "././admin/application_3_code.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          var parsed_data = JSON.parse(response);
          if (parsed_data.success === 3) {
            var ids = parsed_data.data;
            // console.log(ids);
          }
          if (parsed_data.success == 3) {
            Swal.fire({
              position: "center",
              icon: "success",
              text: "Fill the next field",
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
              window.location.href = "././application_4.php?id=" + ids;
            });
          } else if (response == 30) {
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
          // console.log(response);
        },
      });
    }
    let app_form = $("#app_form3")[0];
    function clearInput() {
      app_form.reset();
    }
  });

  // ---------------------------Application-4-form-------------------------
  var submitBtn = $("#app_submit_btn");
  $("#app_form4").validate({
    rules: {
      transaction_code: {
        required: true,
      },
      payment_ss: {
        required: true,
        fileExtension: true,
      },
    },
    messages: {
      transaction_code: {
        required: "Please select Date of birth",
      },
      payment_ss: {
        required: "Please choose a file.",
        fileExtension: "Please select a valid file type (jpg, jpeg, png, pdf).",
      },
    },
    errorPlacement: function (error, element) {
      error.insertAfter(element);
      error.addClass("error-message");
    },
  });
  $("#app_form4").on("submit", function (e) {
    e.preventDefault();
    var form = $(this);

    if ($(this).valid()) {
      var formData = new FormData(form.get(0));
      $.ajax({
        type: "POST",
        url: "././admin/application_4_code.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          var parsed_data = JSON.parse(response);
          if (parsed_data.success === 4) {
            var ids = parsed_data.data;
            // console.log(ids);
          }
          if (parsed_data.success == 4) {
            Swal.fire({
              position: "center",
              icon: "success",
              text: "Thank you ! confirmation sent to your email id",
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
              window.location.href = "././application_success.php?id=" + ids;
            });
            submitBtn.prop("disabled", true);
          } else if (response == 40) {
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
    }
    let app_form = $("#app_form4")[0];
    function clearInput() {
      $("#fileNameDisplay2").text("Upload Payment Screenshot");
      app_form.reset();
    }
  });

  // ---------------------------interview_form-form-------------------------
  $("#interview_form").validate({
    rules: {
      unique_id:{
        required:true,
        digits:true,
        minlength:6,
        maxlength:6,
      },
      date: "required",
      time: "required",
      name: "required",
      email: {
        required: true,
        email: true,
      },
      phone: {
        required: true,
        digits: true,
        minlength: 10,
        maxlength: 10,
      },
      position: "required",
      message: "required",
    },
    messages: {
      unique_id: {
        required: "Please enter your id number",
        digits: "Please enter a valid id number",
        minlength: "Phone number must be 6 digits",
        maxlength: "Phone number must be 6 digits",
      },
      date: "Please select a date",
      time: "Please select a time",
      name: "Please enter your full name",
      email: {
        required: "Please enter your email address",
        email: "Please enter a valid email address",
      },
      phone:{
        required: "Please enter your phone number",
        digits: "Please enter a valid phone number",
        minlength: "Phone number must be 10 digits",
        maxlength: "Phone number must be 10 digits",
      },
      position: "Please select the position you applied for",
      message: "Please enter message",
    },
    errorPlacement: function (error, element) {
      error.appendTo(element.parent());
      error.addClass("error-message");
    },
  });
  $("#interview_form").on("submit", function (e) {
    e.preventDefault();
    let interview_form = $("#interview_form")[0];
    var form = $(this);
    var subBtn = $("#submitBtn");
    if ($(this).valid()) {
      subBtn.prop("disabled", true);
      var formData = $(form).serialize();
      $.ajax({
        type: "POST",
        url: "././admin/schedule_code.php",
        data: formData,
        success: function (response) {
          console.log(response);
          let message = JSON.parse(response);
          if (message.alert == 1) {
            Swal.fire({
              position: "center",
              icon: "success",
              text: "we are connect soon",
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
            subBtn.prop("disabled", false);
          } else if (message.alert == 2) {
            Swal.fire({
              position: "center",
              icon: "error",
              text: "Something went wrong",
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
            subBtn.prop("disabled", false);
          }else if(message.alert == 3){
            Swal.fire({
              position: "center",
              icon: "error",
              text: "Unique Code not Valid",
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
            subBtn.prop("disabled", false);
          }
          clearInput();
        },
        error: function (response) {
          alert("Something went wrong");
          console.log(response);
        },
      });
    }
    function clearInput() {
      interview_form.reset();
    }
  });

  // ---------------------For-state-------------
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

  // ---------------------for-city--------------------
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

  //-------------------------Event-register----------------
  $("#event_register").validate({
    rules: {
      name: "required",
      email: {
        required: true,
        email: true,
      },
      phone: {
        required: true,
        digits: true,
        minlength: 10,
        maxlength: 10,
      },
      event: "required",
    },
    messages: {
      name: "Please enter your full name",
      email: {
        required: "Please enter your email address",
        email: "Please enter a valid email address",
      },
      phone: "Please enter your phone number",
      event: "Please select the event",
    },
    errorPlacement: function (error, element) {
      error.insertAfter(element);
      error.addClass("error-message");
    },
  });
  $("#event_register").on("submit", function (e) {
    let formReset = $("#event_register")[0];
    e.preventDefault();
    var form = $(this);
    var submitBtn = $("#submitBtn");
    submitBtn.prop("disabled", true);
    if ($(this).valid()) {
      var formData = $(form).serialize();
      $.ajax({
        type: "POST",
        url: "././admin/event_register.php",
        data: formData,
        success: function (response) {
          console.log(response);
          var result = JSON.parse(response);
          if (result.res == "1") {
            Swal.fire({
              position: "center",
              icon: "success",
              text: "Thank You ! We are connect soon",
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
            submitBtn.prop("disabled", false);
          }
          clearInput();
        },
        error: function (response) {
          alert("Something went wrong");
          console.log(response);
        },
      });
    }
    function clearInput() {
      formReset.reset();
    }
  });

  //-------------------------upcoming_batch_request----------------
  $(".upcoming_batch_request").validate({
    rules: {
      name: {
        required: true,
      },
      phone: {
        required: true,
        digits: true,
        minlength: 10,
        maxlength: 10,
      },
      email: {
        required: true,
        email: true,
      },
      designation: {
        required: true,
      },
      location: {
        required: true,
      },
    },
    messages: {
      name: {
        required: "Please enter your name",
      },
      phone: {
        required: "Please enter your phone number",
      },
      email: {
        required: "Please enter your email address",
        email: "Please enter a valid email address",
      },
      designation: {
        required: "Please select your designation",
      },
      location: {
        required: "Please select your location",
      },
    },
    errorPlacement: function (error, element) {
      error.appendTo(element.parent());
      error.addClass("error-message");
    },
  });
  $("#upcoming_batch_request").on("submit", function (e) {
    e.preventDefault();
    var form = $(this);

    if ($(this).valid()) {
      var formData = $(form).serialize();
      console.log(formData);
      var subBtn = $("#submitBtn");
      subBtn.prop("disabled", true);
      $.ajax({
        type: "POST",
        url: "././admin/upcoming_batch_request.php",
        data: formData,
        success: function (response) {
          $("#upcoming_modal").modal("hide");
          console.log(response);
          var result = JSON.parse(response);
          if (result.res == 1) {
            Swal.fire({
              position: "center",
              icon: "success",
              text: "Thank You! We will connect with you soon",
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
          $("#upcoming_modal").hide();
          alert("Something went wrong");
          console.log(response);
        },
      });
      clearInput();
    }
    function clearInput() {
      $(".upcoming_batch_request")[0].reset();
    }
  });

  //-------------------------news_letter----------------
  $("#news_letter").validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
    },
    messages: {
      email: {
        required: "*Please enter your email address",
        email: "*Please enter a valid email address",
      },
    },
    errorPlacement: function (error, element) {
      error.insertAfter(element);
      error.addClass("error-message");
    },
  });
  let formReset = $("#news_letter")[0];
  $("#news_letter").on("submit", function (e) {
    e.preventDefault();
    var form = $(this);
    var subBtn = $("#submitBtn");
    subBtn.prop("disabled", true);
    if ($(this).valid()) {
      var formData = $(form).serialize();
      $.ajax({
        type: "POST",
        url: "././admin/news_letter_ajax.php",
        data: formData,
        success: function (response) {
          // console.log(response);
          var result = JSON.parse(response);
          if (result.res == "1") {
            Swal.fire({
              position: "center",
              icon: "success",
              text: "Thank You ! We are connect soon",
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
            subBtn.prop("disabled", false);
          }
        },
        error: function (response) {
          $("#upcoming_modal").hide();
          alert("Something went wrong");
          console.log(response);
        },
      });
      clearInput();
    }

    function clearInput() {
      formReset.reset();
    }
  });

  //-------------------------Request-internship-track--------------
  $("#internship_request_from").validate({
    rules: {
      message: {
        required: true,
      },
    },
    messages: {
      message: "*Please enter your message",
    },
    errorPlacement: function (error, element) {
      error.appendTo(element.parent());
      error.addClass("error-message");
      console.log(error);
    },
  });
  $("#internship_request_from").on("submit", function (e) {
    console.log("clicked");
    let formReset = $("#internship_request_from")[0];
    e.preventDefault();
    var form = $(this);

    if ($(this).valid()) {
      var formData = $(form).serialize();
      $.ajax({
        type: "POST",
        url: "././admin/internship_track_msg_code.php",
        data: formData,
        success: function (response) {
          var result = JSON.parse(response);
          if (result.res == "1") {
            $("#request_modal").modal("hide");
            Swal.fire({
              position: "center",
              icon: "success",
              text: "Thank You ! We are connect soon",
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
          $("#request_modal").hide();
          alert("Something went wrong");
          console.log(response);
        },
      });
      clearInput();
    }
    function clearInput() {
      formReset.reset();
    }
  });

  //-------------------------opportunities_request----------------
  $.validator.addMethod(
    "fileExtension",
    function (value, element) {
      var extension = value.split(".").pop().toLowerCase();
      return ["jpg", "jpeg", "png", "pdf"].indexOf(extension) !== -1;
    },
    "Please select a valid file type (jpg, jpeg, png, pdf)."
  );
  $("#opportunities_request").validate({
    rules: {
      name: {
        required: true,
        maxlength: 255,
      },
      phone: {
        required: true,
        digits: true,
        minlength: 10,
        maxlength: 10,
      },
      email: {
        required: true,
        email: true,
      },
      image: {
        required: true,
        fileExtension: true,
      },
    },
    messages: {
      name: {
        required: "Please enter your name",
        maxlength: "Name must be less than 255 characters",
      },
      phone: {
        required: "Please enter your phone number",
        digits: "Please enter a valid phone number",
        minlength: "Phone number must be 10 digits",
        maxlength: "Phone number must be 10 digits",
      },
      email: {
        required: "Please enter your email address",
        email: "Please enter a valid email address",
      },
      image: {
        required: "Please choose a file.",
        fileExtension: "Please select a valid file type (jpg, jpeg, png, pdf).",
      },
    },
    errorPlacement: function (error, element) {
      error.appendTo(element.parent());
      error.addClass("error-message");
    },
    submitHandler: function (form) {
      var opportunitiesSubmitBtn = $("#opportunitiesSubmitBtn");

      opportunitiesSubmitBtn.prop("disabled", true); // Disable the submit button

      var formData = new FormData(form);
      $.ajax({
        type: "POST",
        url: "././admin/opportunities_request.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          // Handle the response
          console.log(response);
          var result = JSON.parse(response);

          if (result.res === 1) {
            // Handle success case
            Swal.fire({
              position: "center",
              icon: "success",
              text: "Thank You! We will connect soon",
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
              backdrop: `rgba(40, 39, 19,0.4) left top no-repeat`,
              timer: 2500,
            }).then(function () {
              window.location.href =
                "././opportunities_view.php?id=" + result.data;
            });
            opportunitiesSubmitBtn.prop("disabled", false); // Disable the submit button

          }
        },
        error: function (response) {
          // Handle AJAX error
          alert("Something went wrong");
          console.log(response);
        },
        complete: function () {
          // Re-enable the submit button after AJAX request is complete
          opportunitiesSubmitBtn.prop("disabled", false);
        },
      });
      clearInput();
    },
  });
  function clearInput() {
    $("#fileNameDisplay1").text("Attach CV or Resume");
    $("#opportunities_request")[0].reset();
  }

  //---------------------employee-contact-form----------------
  $("#employee_contact").validate({
    rules: {
      employee_organization_name: {
        required: true,
      },
      employee_industry: {
        required: true,
      },
      employee_website: {
        required: true,
      },
      employee_fullname: {
        required: true,
        maxlength: 255,
      },
      employee_position: {
        required: true,
      },
      employee_phone: {
        required: true,
        digits: true,
        minlength: 10,
        maxlength: 10,
      },
      employee_email: {
        required: true,
        email: true,
      },
      employee_partnership_interest: {
        required: true,
      },
      hear_about_us: {
        required: true,
      },
      check_box: {
        required: true,
      },
    },
    messages: {
      employee_organization_name: {
        required: "Please enter organization name",
      },
      employee_industry: {
        required: "Please enter industry name",
      },
      employee_website: {
        required: "Please enter website name",
      },
      employee_fullname: {
        required: "Please enter your name",
        maxlength: "Name must be less than 255 characters",
      },
      employee_phone: {
        required: "Please enter your phone number",
        digits: "Please enter a valid phone number",
        minlength: "Phone number must be 10 digits",
        maxlength: "Phone number must be 10 digits",
      },
      employee_email: {
        required: "Please enter your email address",
        email: "Please enter a valid email address",
      },
      employee_partnership_interest: {
        required: "Please enter partnership_interest name",
      },
      hear_about_us: {
        required: "Please enter hear_about_us ",
      },
      check_box: {
        required: "Please check the box",
      },
    },
    errorPlacement: function (error, element) {
      error.insertAfter(element);
      error.addClass("error-message");
    },
  });

  $("#employee_contact").on("submit", function (e) {
    e.preventDefault();
    var form = $(this);
    if ($(this).valid()) {
      var formData = $(form).serialize();
      console.log(formData);
      $.ajax({
        type: "POST",
        url: "././admin/employee_contact_code.php",
        data: formData,
        success: function (response) {
          console.log(response);
          var msg = JSON.parse(response);
          if (msg.msg == 1) {
            Swal.fire({
              position: "center",
              icon: "success",
              text: "Thankyou We are connect soon",
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
          alert("Something went wrong: " + response.responseText);
          console.log(response);
        },
      });
      this.reset();
    }
  });
});

//-------------------------Seasonal_placement_request----------------
$.validator.addMethod(
  "fileExtension",
  function (value, element) {
    var extension = value.split(".").pop().toLowerCase();
    return ["jpg", "jpeg", "png", "pdf"].indexOf(extension) !== -1;
  },
  "Please select a valid file type (jpg, jpeg, png, pdf)."
);
$("#placement_request").validate({
  rules: {
    name: {
      required: true,
      maxlength: 255,
    },
    phone: {
      required: true,
      digits: true,
      minlength: 10,
      maxlength: 10,
    },
    email: {
      required: true,
      email: true,
    },
    image: {
      required: true,
      fileExtension: true,
    },
  },
  messages: {
    name: {
      required: "Please enter your name",
      maxlength: "Name must be less than 255 characters",
    },
    phone: {
      required: "Please enter your phone number",
      digits: "Please enter a valid phone number",
      minlength: "Phone number must be 10 digits",
      maxlength: "Phone number must be 10 digits",
    },
    email: {
      required: "Please enter your email address",
      email: "Please enter a valid email address",
    },
    image: {
      required: "Please choose a file.",
      fileExtension: "Please select a valid file type (jpg, jpeg, png, pdf).",
    },
  },
  errorPlacement: function (error, element) {
    error.appendTo(element.parent());
    error.addClass("error-message");
  },
});
$("#placement_request").on("submit", function (e) {
  e.preventDefault();
  var form = $(this);
  if ($(this).valid()) {
    var opportunitiesSubmitBtn = $("#submitBtm");
    opportunitiesSubmitBtn.prop("disabled", true); // Disable the submit button

    var formData = new FormData(form.get(0));
    console.log(formData);
    $.ajax({
      type: "POST",
      url: "././admin/seasonal_placement_request_code.php",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        console.log(response);
        var result = JSON.parse(response);
        if (result.res === 1) {
          $("#placement_modal").modal("hide");
          Swal.fire({
            position: "center",
            icon: "success",
            text: "Thank You! We will connect soon",
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
            backdrop: `rgba(40, 39, 19,0.4) left top no-repeat`,
            timer: 2500,
          }).then(function () {
            window.location.href = "././placement_view.php?id=" + result.data;
          });
        }
      },
      error: function (response) {
        alert("Something went wrong");
        console.log(response);
      },
      complete: function () {
        opportunitiesSubmitBtn.prop("disabled", false);
      },
    });
    clearInput();
  }
});
function clearInput() {
  $("#fileNameDisplay1").text("Attach CV or Resume");
  $("#placement_request")[0].reset();
}
