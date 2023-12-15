function toggleSidebar() {
    var sidebar = document.getElementById("sidebar");
    var content_wrapper = document.querySelector(".content-wrapper");
    var toggle_btn = document.querySelector(".toggle_btn");
    var te_logo = document.querySelector(".te_logo");
    sidebar.classList.toggle('active');
    var isSidebarActive = sidebar.classList.contains('active');
    var contentClassList = content_wrapper.classList;
    contentClassList.toggle("w_none", !isSidebarActive);
    contentClassList.toggle("w_active", isSidebarActive);
    toggle_btn.classList.toggle("d-block", !isSidebarActive);
    toggle_btn.classList.toggle("d-none", isSidebarActive);
    te_logo.classList.toggle("d-block", !isSidebarActive);
    te_logo.classList.toggle("d-none", isSidebarActive);
    
    for (var i = 1; i <= 4; i++) {
        var te = document.querySelector(".te_" + i);
        if (te) {
            te.classList.toggle("d-block", !isSidebarActive);
            te.classList.toggle("d-none", isSidebarActive);
        } else {
            console.error("Elemento não encontrado para .te_" + i);
        }
    }
}

