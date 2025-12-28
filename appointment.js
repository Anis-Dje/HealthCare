// Import jQuery or declare the $ variable before using it
const $ = window.$

$(document).ready(() => {
    // Doctor mapping based on service selection
    const doctorsByService = {
        general: ["Any Available Doctor", "Dr. Moujib Ourzifi"],
        pediatric: ["Any Available Doctor", "Dr. Youcef Ait Nouri"],
        dental: ["Any Available Doctor", "Dr. Mohamed Bicha"],
        physiotherapy: ["Any Available Doctor","Bennacer Skendar"],
        vaccination: ["Any Available Doctor", "Dr. Ibtissem Adem"],
        lab: ["Any Available Doctor","Dahmen Djeghri"],
        followup: [
            "Any Available Doctor",
            "Dr. Moujib Ourzifi",
            "Dr. Youcef Ait Nouri",
            "Dr. Mohamed Bicha",
            "Dr. Bennacer Skendar",
            "Dr. Ibtissem Adem",
            "Dahmen Djeghri",
            "Dr. Maria Benazzouz",
            "Dr. Bouafia Yousra",
            "Dr. Mejdoub Mustapha",

        ],
        special: ["Any Available Doctor", "Dr. Maria Benazzouz", "Dr. Bouafia Yousra", "Dr. Mejdoub Mustapha"],
    }

    $("#preferredDate").prop("disabled", true).prop("required", false) // ensure field is not required when disabled
    $("#timeSlotGroup").hide()

    $("#requestedService").on("change", function () {
        const selectedService = $(this).val()
        console.log("[v0] Service changed to:", selectedService)

        if (selectedService === "special") {
            console.log("[v0] Special Consultation selected - enabling date field")
            $("#preferredDate").prop("disabled", false).prop("required", true).focus()
            $("#timeSlotGroup").slideDown()
        } else {
            console.log("[v0] Non-special service selected - disabling date field")
            $("#preferredDate").prop("disabled", true).prop("required", false).val("")
            $("#timeSlotGroup").slideUp()
        }

        // Update doctor list
        updateDoctorList(selectedService)
    })

    // Function to update doctor list
    function updateDoctorList(service) {
        const doctorSelect = $("#doctor")
        doctorSelect.empty()

        if (doctorsByService[service]) {
            doctorsByService[service].forEach((doctor) => {
                const value = doctor === "Any Available Doctor" ? "" : doctor
                doctorSelect.append(`<option value="${value}">${doctor}</option>`)
            })
        } else {
            doctorSelect.append('<option value="">Any Available Doctor</option>')
        }
    }

    // Calculate age from birthdate
    $("#birthdate").on("change", function () {
        const birthVal = $(this).val()
        if (!birthVal) {
            $("#ageDisplay").text("").removeClass("valid-age")
            return
        }
        const birthdate = new Date(birthVal)
        const today = new Date()
        let age = today.getFullYear() - birthdate.getFullYear()
        const monthDiff = today.getMonth() - birthdate.getMonth()

        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthdate.getDate())) {
            age--
        }

        if (age > 0) {
            $("#ageDisplay")
                .text("Age: " + age + " years")
                .addClass("valid-age")
        } else {
            $("#ageDisplay").text("").removeClass("valid-age")
        }
    })

    // Form validation and submission
    /*
    $("#appointmentForm").on("submit", function (e) {
        e.preventDefault()

        // Reset messages
        $("#successMessage").hide()
        $("#errorMessage").hide()

        // Validate email
        const email = $("#email").val()
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
        if (!emailRegex.test(email)) {
            $("#errorMessage").show()
            return false
        }

        // Validate phone number (10 digits)
        const phone = $("#phone").val().replace(/\D/g, "")
        if (phone.length !== 10) {
            $("#errorMessage").show()
            return false
        }

        // Validate required fields
        if (this.checkValidity() === false) {
            e.stopPropagation()
            $(this).addClass("was-validated")
            $("#errorMessage").show()
            return false
        }

        $(this).addClass("was-validated")

        // If form is valid, show success message
        $("#successMessage").show()
        setTimeout(() => {
            $("#appointmentForm")[0].reset()
            $("#appointmentForm").removeClass("was-validated")
            $("#ageDisplay").text("")
            $("#timeSlotGroup").hide()
            $("#preferredDate").prop("disabled", true)
            // Reset doctor list
            updateDoctorList("")
        }, 2000)
    })
    */
    // Format phone number as user types
    $("#phone").on("input", function () {
        let value = $(this).val().replace(/\D/g, "")
        if (value.length > 0) {
            // Format as (XXX) XXX-XXXX
            if (value.length <= 3) {
                value = `(${value}`
            } else if (value.length <= 6) {
                value = `(${value.slice(0, 3)}) ${value.slice(3)}`
            } else {
                value = `(${value.slice(0, 3)}) ${value.slice(3, 6)}-${value.slice(6, 10)}`
            }
        }
        $(this).val(value)
    })

    // File upload validation
    $("#medicalFile").on("change", function () {
        const file = this.files[0]
        if (file) {
            const maxSize = 5 * 1024 * 1024
            const allowedTypes = ["application/pdf", "image/jpeg", "image/png"]

            if (file.size > maxSize) {
                $("#errorMessage").text("File is too large (max 5MB).").show()
                $(this).val("")
                return
            }

            if (!allowedTypes.includes(file.type)) {
                $("#errorMessage").text("Invalid file type. Use PDF, JPG, or PNG.").show()
                $(this).val("")
                return
            }
        }
    })

    // Set minimum date to today
    const today = new Date().toISOString().split("T")[0]
    $("#preferredDate").attr("min", today)

    // Set maximum birthdate to today
    $("#birthdate").attr("max", today)
})
