function toggleSidebar() {
    var sidebar = document.getElementById("sidebar");
    var content_wrapper = document.querySelector(".content-wrapper");
    var footer = document.querySelector(".footer");
    var toggle_btn = document.querySelector(".toggle_btn");
    var side_op = document.querySelector(".side_op");
    var perfil = document.querySelector(".perfil"); 
    var logout = document.querySelector(".logout");
    var opcoes_user = document.querySelector(".opcoes_user");
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
    side_op.classList.toggle("jc-between", !isSidebarActive);
    logout.classList.toggle("jc-center", isSidebarActive);
    logout.classList.toggle("flex_start", !isSidebarActive);
    perfil.classList.toggle("jc-center", isSidebarActive);
    perfil.classList.toggle("flex_start", !isSidebarActive);
    opcoes_user.classList.toggle("jc-center", isSidebarActive);
    opcoes_user.classList.toggle("flex_start", !isSidebarActive);
    te_logo.classList.toggle("d-block", !isSidebarActive);
    te_logo.classList.toggle("d-none", isSidebarActive);

    for (var i = 1; i <= 3; i++) {
        var te = document.querySelector(".te_" + i);
        te.classList.toggle("d-block", !isSidebarActive);
        te.classList.toggle("d-none", isSidebarActive);
    }
}



