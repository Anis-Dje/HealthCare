// Import jQuery
const $ = window.jQuery

$(document).ready(() => {
  // Contact form validation and submission
  $("#contactForm").on("submit", function (e) {
    e.preventDefault()

    // Reset messages
    $("#contactSuccessMessage").hide()
    $("#contactErrorMessage").hide()

    // Validate email
    const email = $("#contactEmail").val()
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
    if (!emailRegex.test(email)) {
      $("#contactErrorMessage").show()
      return false
    }

    // Validate required fields
    if (!this.checkValidity() === false) {
      e.stopPropagation()
    }

    $(this).addClass("was-validated")

    // If form is valid, show success message
    if (this.checkValidity()) {
      $("#contactSuccessMessage").show()
      setTimeout(() => {
        $("#contactForm")[0].reset()
        $("#contactForm").removeClass("was-validated")
      }, 2000)
    }
  })

  // Format phone number
  $("#contactPhone").on("input", function () {
    let value = $(this).val().replace(/\D/g, "")
    if (value.length > 0) {
      if (value.length <= 3) {
        value = value
      } else if (value.length <= 6) {
        value = value.substring(0, 3) + "-" + value.substring(3)
      } else {
        value = value.substring(0, 3) + "-" + value.substring(3, 6) + "-" + value.substring(6, 10)
      }
    }
    $(this).val(value)
  })

  // Contact form validation
  $('#contactForm').on('submit', function(e) {
    e.preventDefault();
    
    // Your form handling code here
    
    $('#successMessage').show();
    setTimeout(function() {
        $('#contactForm')[0].reset();
        $('#successMessage').hide();
    }, 3000);
  });
})
