const $ = window.jQuery
const bootstrap = window.bootstrap

$(document).ready(() => {
  // Navbar link hover effects
  $(".nav-link").hover(
    function () {
      $(this).addClass("nav-link-active")
    },
    function () {
      $(this).removeClass("nav-link-active")
    },
  )

  // Feature cards hover animation
  $(".feature-card").hover(
    function () {
      $(this).css({
        transform: "translateY(-8px)",
        "box-shadow": "0 15px 30px rgba(0, 0, 0, 0.2)",
      })
    },
    function () {
      $(this).css({
        transform: "translateY(0)",
        "box-shadow": "0 4px 12px rgba(0, 0, 0, 0.1)",
      })
    },
  )

  // Buttons hover effects
  $(".btn-accent").hover(
    function () {
      $(this).css({
        transform: "translateY(-3px)",
        "box-shadow": "0 8px 20px rgba(26, 188, 156, 0.3)",
      })
    },
    function () {
      $(this).css({
        transform: "translateY(0)",
        "box-shadow": "none",
      })
    },
  )

  // Testimonial cards hover
  $(".testimonial-card").hover(
    function () {
      $(this).css({
        transform: "translateY(-8px)",
        "box-shadow": "0 12px 25px rgba(0, 0, 0, 0.15)",
      })
    },
    function () {
      $(this).css({
        transform: "translateY(0)",
        "box-shadow": "0 2px 8px rgba(0, 0, 0, 0.1)",
      })
    },
  )

  // Doctor cards hover animation
  $(".doctor-card").hover(
    function () {
      $(this).css({
        "box-shadow": "0 20px 50px rgba(0, 0, 0, 0.2)",
      })
    },
    function () {
      $(this).css({
        "box-shadow": "",
      })
    },
  )

  // Philosophy cards hover
  $(".philosophy-card").hover(
    function () {
      $(this).css({
        transform: "translateY(-8px)",
        "background-color": "#e8f5f1",
      })
    },
    function () {
      $(this).css({
        transform: "translateY(0)",
        "background-color": "var(--bg-light)",
      })
    },
  )

  // Info cards hover animation
  $(".info-card").hover(
    function () {
      $(this).css({
        transform: "translateY(-10px)",
        "box-shadow": "0 15px 35px rgba(0, 0, 0, 0.15)",
      })
    },
    function () {
      $(this).css({
        transform: "translateY(0)",
        "box-shadow": "0 2px 8px rgba(0, 0, 0, 0.1)",
      })
    },
  )

  // Smooth scroll for anchor links (jQuery version)
  $('a[href^="#"]').on("click", function (e) {
    const href = $(this).attr("href")
    if (href !== "#" && $(href).length) {
      e.preventDefault()
      $("html, body").animate(
        {
          scrollTop: $(href).offset().top - 100,
        },
        500,
      )
    }
  })

  // Navbar background change on scroll (jQuery version)
  $(window).on("scroll", function () {
    if ($(this).scrollTop() > 50) {
      $(".navbar").addClass("scrolled")
    } else {
      $(".navbar").removeClass("scrolled")
    }
  })

  // Add scroll animation to elements
  function animateOnScroll() {
    $(
      ".feature-card, .doctor-card, .service-item, .info-card, .department-quick-card, .emergency-service-card, .first-aid-card, .contact-card",
    ).each(function () {
      const elementTop = $(this).offset().top
      const elementBottom = elementTop + $(this).height()
      const viewportTop = $(window).scrollTop()
      const viewportBottom = viewportTop + $(window).height()

      if (elementBottom > viewportTop && elementTop < viewportBottom) {
        $(this).addClass("fade-in")
      }
    })
  }

  $(window).on("scroll", animateOnScroll)
  animateOnScroll() // Call on initial load

  // Form field focus effects
  $(".form-control, .form-select")
    .on("focus", function () {
      $(this).parent().find(".form-label").addClass("label-focused")
    })
    .on("blur", function () {
      if (!$(this).val()) {
        $(this).parent().find(".form-label").removeClass("label-focused")
      }
    })

  // Accordion animation enhancement
  $(".accordion-button").on("click", function () {
    $(this).css("transition", "all 0.3s ease")
  })

  // Prevent submit if form is invalid (HTML5 validation) for forms explicitly using Bootstrap validation
  $("form.needs-validation").on("submit", function (e) {
    if (this.checkValidity() === false) {
      e.preventDefault()
      e.stopPropagation()
    }
    $(this).addClass("was-validated")
  })

  // Add visual feedback to active page in navigation
  const currentPage = window.location.pathname.split("/").pop() || "index.html"
  $(".nav-link").each(function () {
    const href = $(this).attr("href")
    if (href === currentPage || (currentPage === "" && href === "index.html")) {
      $(this).addClass("active").css("color", "var(--primary)")
    }
  })

  // Carousel animation
  $(".carousel").on("slide.bs.carousel", () => {
    // Add any custom carousel animations here
  })

  // Service items animation on hover
  $(".accordion-item").hover(
    function () {
      $(this).find(".accordion-button").css({
        "padding-left": "25px",
      })
    },
    function () {
      $(this).find(".accordion-button").css({
        "padding-left": "20px",
      })
    },
  )

  // Smooth scroll to section if hash is present in URL
  if (window.location.hash) {
    const target = $(window.location.hash)
    if (target.length) {
      setTimeout(() => {
        $("html, body").animate(
          {
            scrollTop: target.offset().top - 100,
          },
          800,
        )
      }, 100)
    }
  }
})

// Page visibility check
$(document).on("visibilitychange", () => {
  if (document.hidden) {
    console.log("Page is hidden")
  } else {
    console.log("Page is visible")
  }
})

/* --- Vanilla JS Enhancements --- */

// Navbar scroll effect (vanilla, for fallback and consistency)
const navbar = document.querySelector(".navbar")
let lastScroll = 0

window.addEventListener("scroll", () => {
  const currentScroll = window.pageYOffset

  if (currentScroll > 100) {
    navbar.classList.add("scrolled")
  } else {
    navbar.classList.remove("scrolled")
  }

  lastScroll = currentScroll
})

// Back to top button
const backToTop = document.getElementById("backToTop")
if (backToTop) {
  window.addEventListener("scroll", () => {
    if (window.pageYOffset > 300) {
      backToTop.classList.add("visible")
    } else {
      backToTop.classList.remove("visible")
    }
  })

  backToTop.addEventListener("click", () => {
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    })
  })
}

// Animated counter for stats
const animateCounters = () => {
  const counters = document.querySelectorAll(".stat-number")

  counters.forEach((counter) => {
    const target = Number.parseInt(counter.getAttribute("data-target"))
    const duration = 2000
    const step = target / (duration / 16)
    let current = 0

    const updateCounter = () => {
      current += step
      if (current < target) {
        counter.textContent = Math.floor(current)
        requestAnimationFrame(updateCounter)
      } else {
        counter.textContent = target
      }
    }

    updateCounter()
  })
}

// Trigger counter animation when carousel slide changes
const heroCarousel = document.getElementById("heroCarousel")
if (heroCarousel) {
  heroCarousel.addEventListener("slid.bs.carousel", () => {
    const activeSlide = heroCarousel.querySelector(".carousel-item.active")
    const counters = activeSlide.querySelectorAll(".stat-number")

    counters.forEach((counter) => {
      const target = Number.parseInt(counter.getAttribute("data-target"))
      const duration = 1500
      const step = target / (duration / 16)
      let current = 0

      const updateCounter = () => {
        current += step
        if (current < target) {
          counter.textContent = Math.floor(current)
          requestAnimationFrame(updateCounter)
        } else {
          counter.textContent = target
        }
      }

      counter.textContent = "0"
      updateCounter()
    })
  })

  // Animate counters on initial load
  setTimeout(() => {
    animateCounters()
  }, 500)
}

// Intersection Observer for animations
const observerOptions = {
  threshold: 0.2,
  rootMargin: "0px 0px -50px 0px",
}

const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.classList.add("animate-fade-in-up")
      observer.unobserve(entry.target)
    }
  })
}, observerOptions)

// Observe elements for animation
document
  .querySelectorAll(
    ".service-card, .doctor-card, .testimonial-card, .about-feature, .wc-feature, .department-quick-card, .emergency-service-card, .first-aid-card, .contact-card, .symptom-item, .ambulance-feature",
  )
  .forEach((el) => {
    observer.observe(el)
  })

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener("click", function (e) {
    const href = this.getAttribute("href")
    if (href !== "#" && document.querySelector(href)) {
      e.preventDefault()
      const target = document.querySelector(href)
      if (target) {
        target.scrollIntoView({
          behavior: "smooth",
          block: "start",
        })
      }
    }
  })
})

// Mobile menu close on link click
const navLinks = document.querySelectorAll(".nav-link")
const navbarCollapse = document.querySelector(".navbar-collapse")

if (navbarCollapse) {
  navLinks.forEach((link) => {
    link.addEventListener("click", () => {
      if (navbarCollapse.classList.contains("show")) {
        const bsCollapse = new bootstrap.Collapse(navbarCollapse)
        bsCollapse.hide()
      }
    })
  })
}

// Smooth scroll polyfill for Safari
if (/^((?!chrome|android).)*safari/i.test(navigator.userAgent)) {
  const style = document.createElement("style")
  style.appendChild(
    document.createTextNode(`
    html {
      scroll-behavior: smooth;
    }
  `),
  )
  document.head.appendChild(style)
}
