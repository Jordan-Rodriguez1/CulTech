$(document).ready(function () {

  google.charts.load("current", { packages: ["gauge"] });
  google.charts.setOnLoadCallback(drawChart);

  //Mensaje de alerta al inactivar placa
  $(".inact").submit(function (e) {
    e.preventDefault();
    Swal.fire({
      title: "¿Está seguro de inactivar la placa?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#28a745",
      cancelButtonColor: "#dc3545",
      confirmButtonText: "Si",
      cancelButtonText: "No",
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
      }
    });
  });

  //Mensaje de alerta al activar placa
  $(".activar").submit(function (e) {
    e.preventDefault();
    Swal.fire({
      title: "¿Está seguro de activar la placa?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#28a745",
      cancelButtonColor: "#dc3545",
      confirmButtonText: "Si",
      cancelButtonText: "No",
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
      }
    });
  });

  //Mensaje de alerta al eliminar placa
  $(".elim").submit(function (e) {
    e.preventDefault();
    Swal.fire({
      title: "¿Está seguro de eliminar permanentemente la placa?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#28a745",
      cancelButtonColor: "#dc3545",
      confirmButtonText: "Si",
      cancelButtonText: "No",
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
      }
    });
  });

  //Mensaje de alerta al inactivar placa
  $(".inactpla").submit(function (e) {
    e.preventDefault();
    Swal.fire({
      title: "¿Está seguro de inactivar la plantilla?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#28a745",
      cancelButtonColor: "#dc3545",
      confirmButtonText: "Si",
      cancelButtonText: "No",
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
      }
    });
  });

  //Mensaje de alerta al activar placa
  $(".activarpla").submit(function (e) {
    e.preventDefault();
    Swal.fire({
      title: "¿Está seguro de activar la plantilla?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#28a745",
      cancelButtonColor: "#dc3545",
      confirmButtonText: "Si",
      cancelButtonText: "No",
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
      }
    });
  });

  //Mensaje de alerta al eliminar placa
  $(".elimpla").submit(function (e) {
    e.preventDefault();
    Swal.fire({
      title: "¿Está seguro de eliminar permanentemente la plantilla?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#28a745",
      cancelButtonColor: "#dc3545",
      confirmButtonText: "Si",
      cancelButtonText: "No",
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
      }
    });
  });

  //Mensaje de alerta al inactivar placa
  $(".inactcult").submit(function (e) {
    e.preventDefault();
    Swal.fire({
      title: "¿Está seguro de inactivar el cultivo?, no se podrá activar de nuevo.",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#28a745",
      cancelButtonColor: "#dc3545",
      confirmButtonText: "Si",
      cancelButtonText: "No",
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
      }
    });
  });
});


//EDITAR PLACA DESDE MODAL
document.querySelectorAll('[data-toggle="modal"]').forEach(function (element) {
  element.addEventListener("click", function () {
    var nombre = element.getAttribute("data-nombre");
    var identificador = element.getAttribute("data-identificador");
    var id = element.getAttribute("data-id");

    document.getElementById("nombree").value = nombre;
    document.getElementById("keye").value = identificador;
    document.getElementById("ide").value = id;
  });
});

//FUNCION PARA OBTENER ID
function obtenerParametroDeURL(nombreParametro) {
  const urlParams = new URLSearchParams(window.location.search);
  return urlParams.get(nombreParametro);
}

const base = document.getElementById("url").value;

//Gráfica de Temperatura
function BarrasTemperatura(elementId) {
  var requestData = {
    id: elementId,
  };
  $.ajax({
    url: base + "Cultivos/GraficaTemperatura",
    type: "POST",
    data: requestData, // Envía los datos como parte de la solicitud
    success: function (response) {
      var data = JSON.parse(response);
      var fecha = [];
      var aire = [];
      var suelo = [];
      for (var i = 0; i < data.length; i++) {
        fecha.push(data[i]["fecha"]);
        aire.push(data[i]["tem"]);
        suelo.push(data[i]["stem"]);
      }
      const chartData = {
        labels: fecha,
        datasets: [
          {
            label: "Ambiente",
            data: aire,
            backgroundColor: "rgba(20, 255, 20, 0.2)", // Color de fondo
            borderColor: "rgba(0, 0, 0, 0.2)", // Color del borde
            yAxisID: "y",
          },
          {
            label: "Suelo",
            data: suelo,
            backgroundColor: "rgba(20, 255, 20, 0.2)", // Color de fondo
            borderColor: "rgba(0, 0, 0, 0.2)", // Color del borde
            yAxisID: "y1",
          },
        ],
      };
      console.log("HOLA2");
      // Bar Chart Example
      var ctx = document.getElementById("BarrasTemperaturaChart");
      console.log(ctx);
      console.log("HOLA1");
  
          const Colima = {
            label: "Colima",
            data: aire,
            backgroundColor: "rgba(0, 168, 198, 0.0)", // Color de fondo
            borderColor: "rgba(255, 0, 0, 1)", // Color del borde
            borderWidth: 1, // Ancho del borde
          };
        console.log("HOLA2");
          const Nacional = {
            label: "Nacional",
            data: suelo,
            borderDash: [3, 5],
            backgroundColor: "rgba(0, 168, 198, 0.0)", // Color de fondo
            borderColor: "rgba(255, 0, 0, 1)", // Color del borde
            borderWidth: 1, // Ancho del borde
          };
        console.log("HOLA1");
          var myLineChart = new Chart(ctx, {
            type: "line",
            data: {
              labels: fecha,
              datasets: [Nacional, Colima],
            },
          
      });
    },
  });
}

//Gráfica de Barra

function BarrasAlumnos(elementId) {
  var requestData = {
    id: elementId,
  };
  $.ajax({
    url: base + "Cultivos/GraficaTemperatura",
    type: "POST",
    data: requestData, // Envía los datos como parte de la solicitud
    success: function (response) {
      var data = JSON.parse(response);
      var asistencias = [];
      var faltas = [];
      var grado = [];
      for (var i = 0; i < data.length; i++) {
        asistencias.push(data[i]["stem"]);
        faltas.push(data[i]["tem"]);
        grado.push(data[i]["fecha"] + "° Semestre");
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      const Asistencias = {
        label: "Asistencias",
        data: asistencias,
        backgroundColor: "rgba(20, 255, 20, 0.2)", // Color de fondo
        borderColor: "rgba(0, 0, 0, 0.2)", // Color del borde
        borderWidth: 1, // Ancho del borde
      };

      const Faltas = {
        label: "Faltas",
        data: faltas,
        backgroundColor: "rgba(255, 20, 20, 0.2)", // Color de fondo
        borderColor: "rgba(0, 0, 0, 0.2)", // Color del borde
        borderWidth: 1, // Ancho del borde
      };

      // Bar Chart Example
      var ctx = document.getElementById("BarrasTemperaturaChart");
      var myLineChart = new Chart(ctx, {
        type: "bar",
        data: {
          labels: grado,
          datasets: [Asistencias, Faltas],
        },
        options: {
          scales: {
            xAxes: [],
            yAxes: [
              {
                ticks: {
                  beginAtZero: true,
                },
              },
            ],
          },
        },
      });
    },
  });
}

function BarrasPracticas() {
  $.ajax({
    url: base + "Reportes/PracticasCaras",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var descripcion = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        descripcion.push(data[i]["descripcion"]);
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      const Practicas = {
        label: "Precio $",
        data: total,
        backgroundColor: "rgba(255, 20, 20, 0.2)", // Color de fondo
        borderColor: "rgba(0, 0, 0, 0.2)", // Color del borde
        borderWidth: 1, // Ancho del borde
      };

      // Bar Chart Example
      var ctx = document.getElementById("PracticasCaras");
      var myLineChart = new Chart(ctx, {
        type: "bar",
        data: {
          labels: descripcion,
          datasets: [Practicas],
        },
        options: {
          scales: {
            xAxes: [],
            yAxes: [
              {
                ticks: {
                  beginAtZero: true,
                },
              },
            ],
          },
        },
      });
    },
  });
}

function BarrasMateriales1() {
  $.ajax({
    url: base + "Reportes/EntradasSalidasDinero" + Part,
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var nombre = [];
      var ventas = [];
      var compras = [];
      for (var i = 0; i < data.length; i++) {
        nombre.push(data[i]["nombre"]);
        ventas.push(data[i]["ventas"]);
        compras.push(data[i]["compras"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      const Ventas = {
        label: "Salidas $",
        data: ventas,
        backgroundColor: "rgba(255, 20, 20, 0.2)", // Color de fondo
        borderColor: "rgba(0, 0, 0, 0.2)", // Color del borde
        borderWidth: 1, // Ancho del borde
      };

      const Compras = {
        label: "Entradas $",
        data: compras,
        backgroundColor: "rgba(20, 255, 20, 0.2)", // Color de fondo
        borderColor: "rgba(0, 0, 0, 0.2)", // Color del borde
        borderWidth: 1, // Ancho del borde
      };

      // Bar Chart Example
      var ctx = document.getElementById("BarrasMateriales1");
      var myLineChart = new Chart(ctx, {
        type: "bar",
        data: {
          labels: nombre,
          datasets: [Ventas, Compras],
        },
        options: {
          scales: {
            xAxes: [],
            yAxes: [
              {
                ticks: {
                  beginAtZero: true,
                },
              },
            ],
          },
        },
      });
    },
  });
}

function BarrasMateriales2() {
  $.ajax({
    url: base + "Reportes/EntradasSalidasPiezas" + Part,
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var nombre = [];
      var ventas = [];
      var compras = [];
      for (var i = 0; i < data.length; i++) {
        nombre.push(data[i]["nombre"]);
        ventas.push(data[i]["ventas"]);
        compras.push(data[i]["compras"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      const Ventas = {
        label: "Salidas",
        data: ventas,
        backgroundColor: "rgba(255, 20, 20, 0.2)", // Color de fondo
        borderColor: "rgba(0, 0, 0, 0.2)", // Color del borde
        borderWidth: 1, // Ancho del borde
      };

      const Compras = {
        label: "Entradas",
        data: compras,
        backgroundColor: "rgba(20, 255, 20, 0.2)", // Color de fondo
        borderColor: "rgba(0, 0, 0, 0.2)", // Color del borde
        borderWidth: 1, // Ancho del borde
      };

      // Bar Chart Example
      var ctx = document.getElementById("BarrasMateriales2");
      var myLineChart = new Chart(ctx, {
        type: "bar",
        data: {
          labels: nombre,
          datasets: [Ventas, Compras],
        },
        options: {
          scales: {
            xAxes: [],
            yAxes: [
              {
                ticks: {
                  beginAtZero: true,
                },
              },
            ],
          },
        },
      });
    },
  });
}

//Graficas Pastel
function PastelSemestre1() {
  $.ajax({
    url: base + "Reportes/PastelSemestre1",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var asistencias = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        asistencias.push(data[i]["asistencias"] + " Asistencias");
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("Semestre1");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: asistencias,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "#C2258E",
                "Blue",
                "Salmon",
                "Wheat",
                "Peru",
                "CadetBlue",
                "Navy",
                "SandyBrown",
                "LimeGreen",
                "SpringGreen",
              ],
            },
          ],
        },
      });
    },
  });
}

function PastelSemestre2() {
  $.ajax({
    url: base + "Reportes/PastelSemestre2",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var asistencias = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        asistencias.push(data[i]["asistencias"] + " Asistencias");
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("Semestre2");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: asistencias,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "#C2258E",
                "Blue",
                "Salmon",
                "Wheat",
                "Peru",
                "CadetBlue",
                "Navy",
                "SandyBrown",
                "LimeGreen",
                "SpringGreen",
              ],
            },
          ],
        },
      });
    },
  });
}

function PastelSemestre3() {
  $.ajax({
    url: base + "Reportes/PastelSemestre3",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var asistencias = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        asistencias.push(data[i]["asistencias"] + " Asistencias");
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("Semestre3");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: asistencias,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "#C2258E",
                "Blue",
                "Salmon",
                "Wheat",
                "Peru",
                "CadetBlue",
                "Navy",
                "SandyBrown",
                "LimeGreen",
                "SpringGreen",
              ],
            },
          ],
        },
      });
    },
  });
}

function PastelSemestre4() {
  $.ajax({
    url: base + "Reportes/PastelSemestre4",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var asistencias = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        asistencias.push(data[i]["asistencias"] + " Asistencias");
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("Semestre4");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: asistencias,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "#C2258E",
                "Blue",
                "Salmon",
                "Wheat",
                "Peru",
                "CadetBlue",
                "Navy",
                "SandyBrown",
                "LimeGreen",
                "SpringGreen",
              ],
            },
          ],
        },
      });
    },
  });
}

function PastelSemestre5() {
  $.ajax({
    url: base + "Reportes/PastelSemestre5",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var asistencias = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        asistencias.push(data[i]["asistencias"] + " Asistencias");
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("Semestre5");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: asistencias,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "#C2258E",
                "Blue",
                "Salmon",
                "Wheat",
                "Peru",
                "CadetBlue",
                "Navy",
                "SandyBrown",
                "LimeGreen",
                "SpringGreen",
              ],
            },
          ],
        },
      });
    },
  });
}

function PastelSemestre6() {
  $.ajax({
    url: base + "Reportes/PastelSemestre6",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var asistencias = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        asistencias.push(data[i]["asistencias"] + " Asistencias");
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("Semestre6");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: asistencias,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "#C2258E",
                "Blue",
                "Salmon",
                "Wheat",
                "Peru",
                "CadetBlue",
                "Navy",
                "SandyBrown",
                "LimeGreen",
                "SpringGreen",
              ],
            },
          ],
        },
      });
    },
  });
}

function PastelSemestre7() {
  $.ajax({
    url: base + "Reportes/PastelSemestre7",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var asistencias = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        asistencias.push(data[i]["asistencias"] + " Asistencias");
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("Semestre7");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: asistencias,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "#C2258E",
                "Blue",
                "Salmon",
                "Wheat",
                "Peru",
                "CadetBlue",
                "Navy",
                "SandyBrown",
                "LimeGreen",
                "SpringGreen",
              ],
            },
          ],
        },
      });
    },
  });
}

function PastelPracticas1() {
  $.ajax({
    url: base + "Reportes/PastelPracticas1",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var nombre = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        nombre.push(data[i]["nombre"]);
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("Practicas1");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: nombre,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "#C2258E",
                "Blue",
                "Salmon",
                "Wheat",
                "Peru",
                "CadetBlue",
                "Navy",
                "SandyBrown",
                "LimeGreen",
                "SpringGreen",
              ],
            },
          ],
        },
      });
    },
  });
}
function PastelPracticas2() {
  $.ajax({
    url: base + "Reportes/PastelPracticas2",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var nombre = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        nombre.push(data[i]["nombre"]);
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("Practicas2");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: nombre,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "#C2258E",
                "Blue",
                "Salmon",
                "Wheat",
                "Peru",
                "CadetBlue",
                "Navy",
                "SandyBrown",
                "LimeGreen",
                "SpringGreen",
              ],
            },
          ],
        },
      });
    },
  });
}
function PastelPracticas3() {
  $.ajax({
    url: base + "Reportes/PastelPracticas3",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var nombre = [];
      var asistencia = [];
      for (var i = 0; i < data.length; i++) {
        nombre.push(data[i]["nombre"]);
        asistencia.push(data[i]["asistencia"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("Practicas3");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: nombre,
          datasets: [
            {
              data: asistencia,
              backgroundColor: [
                "#C2258E",
                "Blue",
                "Salmon",
                "Wheat",
                "Peru",
                "CadetBlue",
                "Navy",
                "SandyBrown",
                "LimeGreen",
                "SpringGreen",
              ],
            },
          ],
        },
      });
    },
  });
}
function PastelPracticas4() {
  $.ajax({
    url: base + "Reportes/PastelPracticas4",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var nombre = [];
      var faltas = [];
      for (var i = 0; i < data.length; i++) {
        nombre.push(data[i]["nombre"]);
        faltas.push(data[i]["faltas"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("Practicas4");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: nombre,
          datasets: [
            {
              data: faltas,
              backgroundColor: [
                "#C2258E",
                "Blue",
                "Salmon",
                "Wheat",
                "Peru",
                "CadetBlue",
                "Navy",
                "SandyBrown",
                "LimeGreen",
                "SpringGreen",
              ],
            },
          ],
        },
      });
    },
  });
}
function PastelPracticas5() {
  $.ajax({
    url: base + "Reportes/PastelPracticas5",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var nombre = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        nombre.push(data[i]["nombre"]);
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("Practicas5");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: nombre,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "#C2258E",
                "Blue",
                "Salmon",
                "Wheat",
                "Peru",
                "CadetBlue",
                "Navy",
                "SandyBrown",
                "LimeGreen",
                "SpringGreen",
              ],
            },
          ],
        },
      });
    },
  });
}
function PastelPracticas6() {
  $.ajax({
    url: base + "Reportes/PastelPracticas6",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var nombre = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        nombre.push(data[i]["nombre"]);
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("Practicas6");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: nombre,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "#C2258E",
                "Blue",
                "Salmon",
                "Wheat",
                "Peru",
                "CadetBlue",
                "Navy",
                "SandyBrown",
                "LimeGreen",
                "SpringGreen",
              ],
            },
          ],
        },
      });
    },
  });
}

function PastelMateriales1() {
  $.ajax({
    url: base + "Reportes/PastelMateriales1" + Part,
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var nombre = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        nombre.push(data[i]["nombre"]);
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("Materiales1");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: nombre,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "#C2258E",
                "Blue",
                "Salmon",
                "Wheat",
                "Peru",
                "CadetBlue",
                "Navy",
                "SandyBrown",
                "LimeGreen",
                "SpringGreen",
              ],
            },
          ],
        },
      });
    },
  });
}

function PastelMateriales2() {
  $.ajax({
    url: base + "Reportes/PastelMateriales2" + Part,
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var nombre = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        nombre.push(data[i]["nombre"]);
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("Materiales2");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: nombre,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "#C2258E",
                "Blue",
                "Salmon",
                "Wheat",
                "Peru",
                "CadetBlue",
                "Navy",
                "SandyBrown",
                "LimeGreen",
                "SpringGreen",
              ],
            },
          ],
        },
      });
    },
  });
}

function PastelMateriales3() {
  $.ajax({
    url: base + "Reportes/PastelMateriales3",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var nombre = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        nombre.push(data[i]["nombre"]);
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("Materiales3");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: nombre,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "#C2258E",
                "Blue",
                "Salmon",
                "Wheat",
                "Peru",
                "CadetBlue",
                "Navy",
                "SandyBrown",
                "LimeGreen",
                "SpringGreen",
              ],
            },
          ],
        },
      });
    },
  });
}

function PastelMateriales4() {
  $.ajax({
    url: base + "Reportes/PastelMateriales4",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var nombre = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        nombre.push(data[i]["nombre"]);
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("Materiales4");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: nombre,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "#C2258E",
                "Blue",
                "Salmon",
                "Wheat",
                "Peru",
                "CadetBlue",
                "Navy",
                "SandyBrown",
                "LimeGreen",
                "SpringGreen",
              ],
            },
          ],
        },
      });
    },
  });
}

function PastelMateriales5() {
  $.ajax({
    url: base + "Reportes/PastelMateriales5",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var nombre = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        nombre.push(data[i]["nombre"]);
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("Materiales5");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: nombre,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "#C2258E",
                "Blue",
                "Salmon",
                "Wheat",
                "Peru",
                "CadetBlue",
                "Navy",
                "SandyBrown",
                "LimeGreen",
                "SpringGreen",
              ],
            },
          ],
        },
      });
    },
  });
}

function PastelMateriales6() {
  $.ajax({
    url: base + "Reportes/PastelMateriales6",
    type: "POST",
    success: function (response) {
      var data = JSON.parse(response);
      var nombre = [];
      var total = [];
      for (var i = 0; i < data.length; i++) {
        nombre.push(data[i]["nombre"]);
        total.push(data[i]["total"]);
      }
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = "#292b2c";

      // Pie Chart Example
      var ctx = document.getElementById("Materiales6");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: nombre,
          datasets: [
            {
              data: total,
              backgroundColor: [
                "#C2258E",
                "Blue",
                "Salmon",
                "Wheat",
                "Peru",
                "CadetBlue",
                "Navy",
                "SandyBrown",
                "LimeGreen",
                "SpringGreen",
              ],
            },
          ],
        },
      });
    },
  });
}

function TemperaturaAire() {
  var data = google.visualization.arrayToDataTable([
    ["Label", "Value"],
    ["°C", 25], //AQUI VA EL VALOR ACTUAL
  ]);
  var options = {
    max: 40,
    redFrom: 30, //AQUI ES DESDE EL VALOR MAXIMO
    redTo: 40,
    yellowFrom: 0,
    yellowTo: 10, //AQUI ES DESDE EL VALOR MINIMO
    minorTicks: 10,
  };
  var chart = new google.visualization.Gauge(
    document.getElementById("TemperaturaAireChart")
  );
  chart.draw(data, options);
};

function HumedadAire() {
  var data = google.visualization.arrayToDataTable([
    ["Label", "Value"],
    ["%", 80], //AQUI VA EL VALOR ACTUAL
  ]);
  var options = {
    redFrom: 90, //AQUI ES DESDE EL VALOR MAXIMO
    redTo: 100,
    yellowFrom: 0,
    yellowTo: 60, //AQUI ES DESDE EL VALOR MINIM
    minorTicks: 5,
  };
  var chart = new google.visualization.Gauge(
    document.getElementById("HumedadAireChart")
  );
  chart.draw(data, options);
};

function TemperaturaSuelo() {
  var data = google.visualization.arrayToDataTable([
    ["Label", "Value"],
    ["°C", 80], //AQUI VA EL VALOR ACTUAL
  ]);
  var options = {
    max: 40,
    redFrom: 30, //AQUI ES DESDE EL VALOR MAXIMO
    redTo: 40,
    yellowFrom: 0,
    yellowTo: 10, //AQUI ES DESDE EL VALOR MINIMO
    minorTicks: 10,
  };
  var chart = new google.visualization.Gauge(
    document.getElementById("TemperaturaSueloChart")
  );
  chart.draw(data, options);
};

function HumedadSuelo() {
  
  var data = google.visualization.arrayToDataTable([
    ["Label", "Value"],
    ["%", 80], //AQUI VA EL VALOR ACTUAL
  ]);
  var options = {
    redFrom: 90, //AQUI ES DESDE EL VALOR MAXIMO
    redTo: 100,
    yellowFrom: 0,
    yellowTo: 60, //AQUI ES DESDE EL VALOR MINIM
    minorTicks: 5,
  };
  var chart = new google.visualization.Gauge(
    document.getElementById("HumedadSueloChart")
  );
  chart.draw(data, options);
};

function CO2() {
  
  var data = google.visualization.arrayToDataTable([
    ["Label", "Value"],
    ["%", 80], //AQUI VA EL VALOR ACTUAL
  ]);
  var options = {
    redFrom: 90, //AQUI ES DESDE EL VALOR MAXIMO
    redTo: 100,
    yellowFrom: 0,
    yellowTo: 60, //AQUI ES DESDE EL VALOR MINIM
    minorTicks: 5,
  };
  var chart = new google.visualization.Gauge(
    document.getElementById("CO2Chart")
  );
  chart.draw(data, options);
};