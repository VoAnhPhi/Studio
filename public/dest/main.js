document.addEventListener("DOMContentLoaded", () => {
  // Swiper Initialization
  const initSwipers = () => {
    const swiperConfigs = [
      {
        selector: ".mySwiper",
        config: { autoplay: { delay: 5000 }, pagination: { el: ".swiper-pagination" }, loop: true },
      },
      {
        selector: ".mySwiperProduct",
        config: { autoplay: { delay: 5000 }, pagination: { el: ".swiper-pagination" }, loop: true },
      },
      {
        selector: ".product-page-studio-img",
        config: {
          loop: false,
          slidesPerView: 3,
          autoplay: { delay: 5000 },
          spaceBetween: 1,
          pagination: { el: ".swiper-pagination1", clickable: true },
        },
      },
      {
        selector: ".swiper-comments-container",
        config: {
          loop: true,
          slidesPerView: 1,
          spaceBetween: 20,
          pagination: { el: ".swiper-pagination", clickable: true },
          autoplay: { delay: 5000 },
          breakpoints: {
            768: { slidesPerView: 2, spaceBetween: 30 },
            1024: { slidesPerView: 3, spaceBetween: 40 },
          },
        },
      },
    ];

    swiperConfigs.forEach(({ selector, config }) => new Swiper(selector, config));
  };

  // Accordion Initialization
  const initAccordions = (accordionSelector) => {
    document.querySelectorAll(accordionSelector).forEach((accordion) => {
      accordion.addEventListener("click", () => {
        document.querySelectorAll(accordionSelector).forEach((acc) => {
          if (acc !== accordion) {
            acc.classList.remove("active");
            acc.nextElementSibling.style.maxHeight = null;
          }
        });

        accordion.classList.toggle("active");
        const panel = accordion.nextElementSibling;
        panel.style.maxHeight = panel.style.maxHeight ? null : `${panel.scrollHeight}px`;
      });
    });
  };

  // Flatpickr Initialization
  const initDayPicker = (selector) => flatpickr(selector, { dateFormat: "d/m/Y" });

  // Sidebar Menu
  const setupSidebarMenu = () => {
    const sidenav = document.getElementById("mySidenav");
    window.openNav = () => (sidenav.style.width = "250px");
    window.closeNav = () => (sidenav.style.width = "0");
  };

  // Clickable Items
  const initClickableItems = (itemSelector) => {
    document.querySelectorAll(itemSelector).forEach((item) => {
      item.addEventListener("click", (e) => {
        e.stopPropagation();
        const link = item.getAttribute("data-link");
        if (link) window.location.href = link;
      });
    });
  };

  // Dropdown Menu
  const initDropdownMenu = () => {
    const dropdownToggle = document.querySelector(".dropdown-toggle");
    const dropdownMenu = document.querySelector(".dropdown-menu");
    const dropdownItems = dropdownMenu?.querySelectorAll(".dropdown-item");

    dropdownToggle?.addEventListener("click", () => dropdownMenu.classList.toggle("show"));

    document.addEventListener("click", (e) => {
      if (!dropdownToggle?.contains(e.target) && !dropdownMenu?.contains(e.target)) {
        dropdownMenu.classList.remove("show");
      }
    });

    dropdownItems?.forEach((item) => {
      item.addEventListener("click", (e) => {
        e.preventDefault();
        dropdownItems.forEach((i) => i.classList.remove("active"));
        item.classList.add("active");
        dropdownToggle.textContent = item.textContent;
        dropdownMenu.classList.remove("show");
      });
    });
  };

  // Product Filter
  const setupProductFilters = () => {
    const renderProducts = (filterLocation = "Tất cả") => {
      document.querySelectorAll("#product_wrapper .item").forEach((product) => {
        const productLocation = product.getAttribute("data-location");
        product.style.display = filterLocation === "Tất cả" || productLocation === filterLocation ? "block" : "none";
      });
    };

    const setupFilters = () => {
      const navItems = document.querySelectorAll("#head nav ul li");
      const dropdownItems = document.querySelectorAll(".dropdown-menu .dropdown-item");

      const highlightActive = (selectedItem) => {
        navItems.forEach((item) => item.classList.remove("active"));
        dropdownItems.forEach((item) => item.classList.remove("active"));
        selectedItem.classList.add("active");
      };

      [...navItems, ...dropdownItems].forEach((item) => {
        item.addEventListener("click", () => {
          renderProducts(item.textContent);
          highlightActive(item);
        });
      });
    };

    setupFilters();
    renderProducts();
    document.querySelector("#head nav ul li:first-child")?.classList.add("active");
    document.querySelector(".dropdown-menu .dropdown-item:last-child")?.classList.add("active");
  };

  // Account Menu Handling
  const setupAccountMenu = () => {
    const menuItems = document.querySelectorAll(".account-menu li a");
    const accountSections = document.querySelectorAll(".account-content");

    menuItems.forEach((menuItem, index) => {
      if (menuItem.getAttribute("href") === "index.php?page=logout") return;

      menuItem.addEventListener("click", (event) => {
        event.preventDefault();
        menuItems.forEach((item) => item.parentElement.classList.remove("active"));
        accountSections.forEach((section) => (section.style.display = "none"));

        menuItem.parentElement.classList.add("active");
        accountSections[index].style.display = "block";
      });
    });

    accountSections.forEach((section, index) => {
      section.style.display = index === 0 ? "block" : "none";
    });
  };

  // Initialize all components
  initSwipers();
  initAccordions(".accordion");
  initAccordions(".accordion-header");
  initDayPicker("#birthday");
  setupSidebarMenu();
  initClickableItems(".item");
  initDropdownMenu();
  setupProductFilters();
  setupAccountMenu();
});
