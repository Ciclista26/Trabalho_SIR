function toggleSidebar() {
    var sidebar = document.getElementById("sidebar");
    var content_wrapper = document.querySelector(".content-wrapper");
    var footer = document.querySelector(".footer");
    var toggle_btn = document.querySelector(".toggle_btn");
    var side_op = document.querySelector(".side_op");
    var te_logo = document.querySelector(".te_logo");
    sidebar.classList.toggle('active');
    var isSidebarActive = sidebar.classList.contains('active');
    var contentClassList = content_wrapper.classList;
    var footerClassList = footer.classList;
    contentClassList.toggle("w_none", !isSidebarActive);
    contentClassList.toggle("w_active", isSidebarActive);
    footerClassList.toggle("w_none", !isSidebarActive);
    footerClassList.toggle("w_active", isSidebarActive);
    toggle_btn.classList.toggle("d-block", !isSidebarActive);
    toggle_btn.classList.toggle("d-none", isSidebarActive);
    side_op.classList.toggle("jc-center", isSidebarActive);
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

