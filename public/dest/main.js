document.addEventListener("DOMContentLoaded", () => {
  // Swiper initialization
  const initSwiper = (selector) => {
    new Swiper(selector, {
      autoplay: { delay: 5000 },
      pagination: { el: ".swiper-pagination" },
      loop: true,
    });
  };
  initSwiper(".mySwiper");
  initSwiper(".mySwiperProduct");

  // Accordion functionality
  const initAccordion = (accordionSelector) => {
    const accordions = document.querySelectorAll(accordionSelector);
    accordions.forEach((accordion) => {
      accordion.addEventListener("click", () => {
        // Close other accordions
        accordions.forEach((acc) => {
          if (acc !== accordion) {
            acc.classList.remove("active");
            const otherPanel = acc.nextElementSibling;
            if (otherPanel) otherPanel.style.maxHeight = null;
          }
        });

        // Toggle current accordion
        accordion.classList.toggle("active");
        const panel = accordion.nextElementSibling;
        if (panel) {
          panel.style.maxHeight = panel.style.maxHeight
            ? null
            : `${panel.scrollHeight}px`;
        }
      });
    });
  };
  initAccordion(".accordion");
  initAccordion(".accordion-header");

  // Day Picker initialization
  const initDayPicker = (selector) => {
    flatpickr(selector, { dateFormat: "d/m/Y" });
  };
  initDayPicker("#birthday");

  // Sidebar Menu
  const openNav = () => {
    document.getElementById("mySidenav").style.width = "250px";
  };
  const closeNav = () => {
    document.getElementById("mySidenav").style.width = "0";
  };
  document.getElementById("openNavButton")?.addEventListener("click", openNav);
  document
    .getElementById("closeNavButton")
    ?.addEventListener("click", closeNav);

  // Clickable items
  const initClickableItems = (itemSelector) => {
    const items = document.querySelectorAll(itemSelector);
    items.forEach((item) => {
      item.addEventListener("click", (e) => {
        e.stopPropagation();
        const link = item.getAttribute("data-link");
        if (link) window.location.href = link;
      });
    });
  };
  initClickableItems(".item");
});

//Accordian
var acc = document.querySelectorAll(".accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function () {
    // Đóng tất cả các accordion khác
    for (var j = 0; j < acc.length; j++) {
      if (acc[j] !== this) {
        acc[j].classList.remove("active");
        var otherPanel = acc[j].nextElementSibling;
        otherPanel.style.maxHeight = null;
      }
    }

    // Toggle accordion hiện tại
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
}

//Day Picker
flatpickr("#birthday", {
  dateFormat: "d/m/Y",
});

var acc2 = document.getElementsByClassName("accordion-header");
for (var i = 0; i < acc2.length; i++) {
  acc2[i].addEventListener("click", function () {
    // Đóng tất cả các acc2ordion khác
    for (var j = 0; j < acc2.length; j++) {
      if (acc2[j] !== this) {
        acc2[j].classList.remove("active");
        var otherPanel = acc2[j].nextElementSibling;
        otherPanel.style.maxHeight = null;
      }
    }

    // Toggle accordion hiện tại
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
}


//end Detail Product

document.querySelector(".calendar-icon").addEventListener("click", () => {
  document.querySelector("#birthday")._flatpickr.open();
});

// Sidebar Menu
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

var acc2 = document.getElementsByClassName("accordion-header");
for (var i = 0; i < acc2.length; i++) {
  acc2[i].addEventListener("click", function () {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
}


// end Detail Product
