window.addEventListener("DOMContentLoaded", (event) => {
  var navbarShrink = function () {
    const navbarCollapsible = document.body.querySelector("#mainNav");
    if (!navbarCollapsible) {
      return;
    }
    if (window.scrollY === 0) {
      navbarCollapsible.classList.remove("navbar-shrink");
    } else {
      navbarCollapsible.classList.add("navbar-shrink");
    }
  };
  navbarShrink();
  document.addEventListener("scroll", navbarShrink);
  const mainNav = document.body.querySelector("#mainNav");
  if (mainNav) {
    new bootstrap.ScrollSpy(document.body, {
      target: "#mainNav",
      rootMargin: "0px 0px -40%",
    });
  }
  const navbarToggler = document.body.querySelector(".navbar-toggler");
  const responsiveNavItems = [].slice.call(
    document.querySelectorAll("#navbarResponsive .nav-link")
  );
  responsiveNavItems.map(function (responsiveNavItem) {
    responsiveNavItem.addEventListener("click", () => {
      if (window.getComputedStyle(navbarToggler).display !== "none") {
        navbarToggler.click();
      }
    });
  });
  const tabs = [];
  const btntabs = [];
  for (let i = 1; i <= 5; i++) {
    const tab = document.getElementById(`tabs-${i}`);
    const btnTab = document.getElementById(`btntab-${i}`);
    tabs.push(tab);
    btntabs.push(btnTab);

    btnTab.addEventListener("click", () => {
      btntabs.forEach((btn) => btn.classList.remove("active"));
      tabs.forEach((tab) => tab.classList.remove("show", "active"));
      tabs.forEach((tab) => tab.classList.add("d-md-none"));

      btnTab.classList.add("active");
      tab.classList.add("show", "active");
      tab.classList.remove("d-md-none");
    });
  }
});
