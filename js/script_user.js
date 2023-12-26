function toggleSidebar() {
  var sidebar = document.getElementById("sidebar");
  var content_wrapper = document.querySelector(".content-wrapper");
  var toggle_btn = document.querySelector(".toggle_btn");
  var te_logo = document.querySelector(".te_logo");
  sidebar.classList.toggle("active");
  var isSidebarActive = sidebar.classList.contains("active");
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

function togglePasswordVisibility() {
  const passwordInput = document.getElementById("password");
  const toggleIcon = document.getElementById("toggleIcon");

  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    toggleIcon.innerHTML =
      '<path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486z"/><path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829"/><path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708"/>';
  } else {
    passwordInput.type = "password";
    toggleIcon.innerHTML =
      '<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>';
  }
}

document
  .getElementById("toggleIcon")
  .addEventListener("click", togglePasswordVisibility);

function votar() {
  var divVotacao = document.querySelector(".resp_votacao");
  var divAparecer = document.querySelector(".resp_aparecer");

  divVotacao.classList.add("d-none");
  divAparecer.classList.remove("d-none");
}

function adicionarInput() {
  var container = document.getElementById("opcoes-lista");

  var novaDivInterna = container
    .querySelector(".opcao-div:last-of-type")
    .cloneNode(true);

  var inputDentroNovaDiv = novaDivInterna.querySelector('input[name^="opcao"]');
  inputDentroNovaDiv.name = "opcao" + (container.children.length + 1) + "_text";
  inputDentroNovaDiv.placeholder = "Opção " + (container.children.length + 1);

  inputDentroNovaDiv.required = true;

  inputDentroNovaDiv.value =
    "<?= isset($_REQUEST['ccNumber']) ? $_REQUEST['ccNumber'] : null ?>";

  container.appendChild(novaDivInterna);
}

function removerUltimaInput() {
  var container = document.getElementById("opcoes-lista");
  var divsInternas = container.getElementsByClassName("opcao-div");

  if (divsInternas.length >= 2) {
    container.removeChild(divsInternas[divsInternas.length - 1]);
  }
}

/* //grafico
/* var colors = ["#007bff", "#28a745", "#333333", "#c3e6cb", "#dc3545", "#6c757d"];

var donutOptions = {
  maintainAspectRatio: false,
  responsive: true,
  cutoutPercentage: 80,
  legend: {
    position: 'right',
  },
  tooltips: {
    backgroundColor: "rgba(0, 0, 0, 0.8)",
    bodyFontColor: "#fff",
    borderColor: "rgba(0, 0, 0, 0.8)",
    borderWidth: 1,
  },
};

var chDonutData2 = {
  labels: ["Casaco impermeável + Camisola", "Camisola", "Casaco impermeável"],
  datasets: [
    {
      backgroundColor: colors.slice(0, 3),
      borderWidth: 0,
      data: [40, 45, 30],
    },
  ],
};

var chDonut2 = document.getElementById("chDonut2");

if (chDonut2) {
  new Chart(chDonut2, {
    type: "pie",
    data: chDonutData2,
    options: donutOptions,
  });
} */

/* google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);
        
        var options = {
          width: "auto",
          height: "100%",
          title: 'My Daily Activities',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }

 */

