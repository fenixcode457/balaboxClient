/*--------------------------------------

 variables para poder invocar las graficas

-----------------------------------------*/
var ctx = document.getElementById('myChart');
var ctx2 = document.getElementById('myChart2');
var prueba = document.getElementById('myChart3');

var ctx4 = document.getElementById('myChart4');
var ctx5 = document.getElementById('myChart5');


var contador_bueno = 0,
    contador_regular = 0,
    contador_malo = 0;
var maximo;
var bueno_pregunta2 = 0,
    regular_pregunta2 = 0,
    malo_pregunta2 = 0;

var si = 0,
    no = 0,
    talvez = 0;


var contTotalCoti = 0,
    contTotalOfer = 0;
var contadorMeses = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

var contadorOfertasmes = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
var fechaArreglo = [];
var fechaArregloOfer = [];
var meses = [];
var mesesOfer = [];
//Ejecucion de javscript
$(document).ready(function() {

    JSON.parse = JSON.parse || function(str) {
        if (str === "")
            str = '""';
        eval("var p=" + str + ";");
        return p;
    };

    $.ajax({

        url: "http://localhost/estadia/Backend/Encuesta.php/encuesta",
        type: "get",
        async: false,
        success: function(response) {
            $.each(JSON.parse(response), function(i, index) {

                if (index.idSatisfaccion.length) {

                    maximo = i;

                    if (index.Pregunta1 == "1") {
                        contador_malo = contador_malo + 1;

                    } else if (index.Pregunta1 == "2") {

                        contador_regular = contador_regular + 1;

                    } else if (index.Pregunta1 == "3") {

                        contador_bueno = contador_bueno + 1;

                    }

                    if (index.Pregunta2 == "1") { // comienza contadro para pregunta 2

                        malo_pregunta2 = malo_pregunta2 + 1; // malo

                    } else if (index.Pregunta2 == "2") {

                        regular_pregunta2 = regular_pregunta2 + 1; // regular

                    } else if (index.Pregunta2 == "3") {

                        bueno_pregunta2 = bueno_pregunta2 + 1; // bueno
                    }


                    if (index.Pregunta3 == "1") { // comienza contadro para pregunta 3

                        no = no + 1; // malo

                    } else if (index.Pregunta3 == "2") {

                        talvez = talvez + 1; // regular

                    } else if (index.Pregunta3 == "3") {

                        si = si + 1; // bueno
                    }

                }

            });

        }


    });



    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Malo', 'Regular', 'Bueno'],
            // datos de Y en la grafica
            datasets: [{
                label: 'of Votes',
                // datos de la grafica los acumulan los contadores
                data: [contador_malo, contador_regular, contador_bueno],

                backgroundColor: [
                    //color de las graficas 
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(60, 186, 99, 0.2)'
                ],
                borderColor: [
                    //color del borde
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(60, 186, 99, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        min: 0,
                        stepSize: 1,
                        // valor maximo que tendra el eje y
                        max: maximo,
                        beginAtZero: true
                    }
                }]
            }
        }
    });



    var myChart3 = new Chart(prueba, {
        type: 'bar',
        data: {
            labels: ['Malo', 'Regular', 'Bueno'],
            datasets: [{
                label: '# of Votes',
                data: [malo_pregunta2, regular_pregunta2, bueno_pregunta2],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        min: 0,
                        stepSize: 1,
                        max: maximo,
                        beginAtZero: true
                    }
                }]
            }
        }
    });




    var myChart2 = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: ['No', 'Tal vez', 'Si'],
            datasets: [{
                label: '# of Votes',
                data: [no, talvez, si],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        min: 0,
                        stepSize: 1,
                        max: maximo,
                        beginAtZero: true
                    }
                }]
            }
        }
    });



    $.ajax({

        url: "http://localhost/estadia/Backend/Cotizacion.php/cotizacion",
        type: "get",
        async: false,
        success: function(response) {
            $.each(JSON.parse(response), function(i, index) {

                if (index.idCotizacion.length) {

                    contTotalCoti = contTotalCoti + 1;

                    fechaArreglo.push(index.fecha);

                    meses = index.fecha.split("-"); //



                    switch (meses[1]) {
                        case "01":
                            contadorMeses[0] = contadorMeses[0] + 1;
                            break;
                        case "02":
                            contadorMeses[1] = contadorMeses[1] + 1;

                            break;
                        case "03":
                            contadorMeses[2] = contadorMeses[2] + 1;

                            break;
                        case "04":
                            contadorMeses[3] = contadorMeses[3] + 1;

                            break;
                        case "05":
                            contadorMeses[4] = contadorMeses[4] + 1;
                            break;
                        case "06":
                            contadorMeses[5] = contadorMeses[5] + 1;
                            break;
                        case "07":
                            contadorMeses[6] = contadorMeses[6] + 1;
                            break;
                        case "08":
                            contadorMeses[7] = contadorMeses[7] + 1;
                            break;

                        case "09":
                            contadorMeses[8] = contadorMeses[8] + 1;

                            break;
                        case "10":
                            contadorMeses[9] = contadorMeses[9] + 1;
                            break;

                        case "11":
                            contadorMeses[10] = contadorMeses[10] + 1;
                            break;


                        case "12":
                            contadorMeses[11] = contadorMeses[11] + 1;
                            break;


                    }


                }

            });

        }


    });



    var myChart4 = new Chart(ctx4, {
        type: 'bar',
        data: {
            labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            datasets: [{
                label: '# cotizaciones',
                data: [contadorMeses[0], contadorMeses[1], contadorMeses[2], contadorMeses[3], contadorMeses[4], contadorMeses[5], contadorMeses[6], contadorMeses[7], contadorMeses[8], contadorMeses[9], contadorMeses[10], contadorMeses[11]],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        min: 0,
                        stepSize: 1,
                        max: contTotalCoti,
                        beginAtZero: true
                    }
                }]
            }
        }
    });


    $.ajax({

        url: "http://localhost/estadia/Backend/Ofertas.php/ofertas",
        type: "get",
        async: false,
        success: function(response) {
            $.each(JSON.parse(response), function(i, index) {

                if (index.idOfertas.length) {

                    contTotalOfer = contTotalOfer + 1;

                    fechaArregloOfer.push(index.FechaInicio);

                    mesesOfer = index.FechaInicio.split("-");


                    switch (mesesOfer[1]) {
                        case "01":
                            contadorOfertasmes[0] = contadorOfertasmes[0] + 1;
                            break;
                        case "02":
                            contadorOfertasmes[1] = contadorOfertasmes[1] + 1;

                            break;
                        case "03":
                            contadorOfertasmes[2] = contadorOfertasmes[2] + 1;

                            break;
                        case "04":
                            contadorOfertasmes[3] = contadorOfertasmes[3] + 1;

                            break;
                        case "05":
                            contadorOfertasmes[4] = contadorOfertasmes[4] + 1;
                            break;
                        case "06":
                            contadorOfertasmes[5] = contadorOfertasmes[5] + 1;
                            break;
                        case "07":
                            contadorOfertasmes[6] = contadorOfertasmes[6] + 1;
                            break;
                        case "08":
                            contadorOfertasmes[7] = contadorOfertasmes[7] + 1;
                            break;

                        case "09":
                            contadorOfertasmes[8] = contadorOfertasmes[8] + 1;

                            break;
                        case "10":
                            contadorOfertasmes[9] = contadorOfertasmes[9] + 1;
                            break;

                        case "11":
                            contadorOfertasmes[10] = contadorOfertasmes[10] + 1;
                            break;


                        case "12":
                            contadorOfertasmes[11] = contadorOfertasmes[11] + 1;
                            break;


                    }


                }

            });

        }


    });




    var myChart5 = new Chart(ctx5, {
        type: 'line',
        data: {
            labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            datasets: [{
                label: '# cotizaciones',
                data: [contadorOfertasmes[0], contadorOfertasmes[1], contadorOfertasmes[2], contadorOfertasmes[3], contadorOfertasmes[4], contadorOfertasmes[5], contadorOfertasmes[6], contadorOfertasmes[7], contadorOfertasmes[8], contadorOfertasmes[9], contadorOfertasmes[10], contadorOfertasmes[11]],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1,
                fill: false
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        min: 0,
                        stepSize: 1,
                        max: contTotalOfer,
                        beginAtZero: true
                    }
                }]
            }
        }
    });



});