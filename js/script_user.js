function toggleSidebar() {
    var sidebar = document.getElementById("sidebar");
    var content_wrapper = document.querySelector(".content-wrapper");
    var footer = document.querySelector(".footer");
    var te_1 = document.querySelector(".te_1");
    var te_2 = document.querySelector(".te_2");
    var toggle_btn = document.querySelector(".toggle_btn");
    var side_op = document.querySelector(".side_op");
    var logout = document.querySelector(".logout");

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
    side_op.classList.toggle("jc-between", !isSidebarActive);
    te_1.classList.toggle("d-block", !isSidebarActive);
    te_1.classList.toggle("d-none", isSidebarActive);
    te_2.classList.toggle("d-block", !isSidebarActive);
    te_2.classList.toggle("d-none", isSidebarActive);
    logout.classList.toggle("jc-center", isSidebarActive);
}
