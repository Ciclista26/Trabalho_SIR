window.addEventListener("DOMContentLoaded", (event) => {
  // Navbar shrink function
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

  // Shrink the navbar
  navbarShrink();

  // Shrink the navbar when page is scrolled
  document.addEventListener("scroll", navbarShrink);

  // Activate Bootstrap scrollspy on the main nav element
  const mainNav = document.body.querySelector("#mainNav");
  if (mainNav) {
    new bootstrap.ScrollSpy(document.body, {
      target: "#mainNav",
      rootMargin: "0px 0px -40%",
    });
  }


  const tabs = [];
  const btntabs = [];

  for (let i = 1; i <= 3; i++) {
    const tab = document.getElementById(`tabs-${i}`);
    const btnTab = document.getElementById(`btntab-${i}`);
    tabs.push(tab);
    btntabs.push(btnTab);

    btnTab.addEventListener("click", () => {
      btntabs.forEach((btn) => btn.classList.remove("active"));
      tabs.forEach((tab) => tab.classList.remove("show", "active"));

      btnTab.classList.add("active");
      tab.classList.add("show", "active");
    });
  }
});
