! function() {
    "use strict";
    window.addEventListener("load", function() {
        var t = document.getElementsByClassName("needs-validation");
        Array.prototype.filter.call(t, function(t) {
            t.addEventListener("keypress", function(e) {
                !1 === t.checkValidity() && (e.preventDefault(), e
                    .stopPropagation()), t.classList.add("was-validated")
            }, !1)
        })
    }, !1)
}();
$(document).ready(function() {
    $('#select2').select2({
        "language": "it"
    });
  
  
  
    /**  this  is the first  2 rows     */

    // the first calculation on page load
    //this is the first cart 
    benchmark1Fun(90);
    benchmark2Fun(30);
    graph1Fun();
    //this is the second cart 
    graph2Fun();

    //this is the thirt cart 
    graph3un();

    //this is the forth cart 
    graph4Fun();

    //this is the fith cart 
    graph5un();

    //this is the sixth cart 
    graph6un();

    //final grap
    generalGraph();
    //this is the calculation in focusout 
    //this is the first cart 
    $("#nrRiunioni").focusout(function(e) {
        benchmark1Fun(90);
        graph1Fun();
        generalGraph();
    });
    $('#nrRiunioni').keypress(function(e) {
        if (!((e.keyCode > 95 && e.keyCode < 106) ||
                (e.keyCode > 47 && e.keyCode < 58) ||
                e.keyCode == 8)) {
            $('.invalid1').show();
            return false;
        }
        $('.invalid1').hide();
    });

    $("#totaleRiunioni").focusout(function() {
        benchmark1Fun(90);
        graph1Fun();
        generalGraph();
    });
    $('#totaleRiunioni').keypress(function(e) {
        if (!((e.keyCode > 95 && e.keyCode < 106) ||
                (e.keyCode > 47 && e.keyCode < 58) ||
                e.keyCode == 8)) {
            $('.invalid2').show();
            return false;
        }
        $('.invalid2').hide();
    });

    $("#nrRicavi").focusout(function() {
        benchmark2Fun(30);
        graph1Fun();
        generalGraph();
    });
    $('#nrRicavi').keypress(function(e) {
        if (!((e.keyCode > 95 && e.keyCode < 106) ||
                (e.keyCode > 47 && e.keyCode < 58) ||
                e.keyCode == 8)) {
            $('.invalid3').show();
            return false;
        }
        $('.invalid3').hide();
    });


    $("#totaleRicavi").focusout(function() {
        benchmark2Fun(30);
        graph1Fun();
        generalGraph();

    });
    $('#totaleRicavi').keypress(function(e) {
        if (!((e.keyCode > 95 && e.keyCode < 106) ||
                (e.keyCode > 47 && e.keyCode < 58) ||
                e.keyCode == 8)) {
            $('.invalid4').show();
            return false;
        }
        $('.invalid4').hide();
    });


    //this is the first second cart 
    $("#nrContatti").focusout(function() {
        graph2Fun();
        generalGraph();

    });
    $('#nrContatti').keypress(function(e) {
        if (!((e.keyCode > 95 && e.keyCode < 106) ||
                (e.keyCode > 47 && e.keyCode < 58) ||
                e.keyCode == 8)) {
            $('.invalid5').show();
            return false;
        }
        $('.invalid5').hide();
    });


    $("#nrClienti").focusout(function() {
        graph2Fun();
        generalGraph();

    });
    $('#nrClienti').keypress(function(e) {
        if (!((e.keyCode > 95 && e.keyCode < 106) ||
                (e.keyCode > 47 && e.keyCode < 58) ||
                e.keyCode == 8)) {
            $('.invalid6').show();
            return false;
        }
        $('.invalid6').hide();
    });


    //this is the thirt  thirt cart 
    $("#orePasate").focusout(function() {
        graph3un();
        generalGraph();

    });
    $('#orePasate').keypress(function(e) {
        if (!((e.keyCode > 95 && e.keyCode < 106) ||
                (e.keyCode > 47 && e.keyCode < 58) ||
                e.keyCode == 8)) {
            $('.invalid7').show();
            return false;
        }
        $('.invalid7').hide();
    });


    $("#oreLavorate").focusout(function() {
        graph3un();
        generalGraph();

    });
    $('#oreLavorate').keypress(function(e) {
        if (!((e.keyCode > 95 && e.keyCode < 106) ||
                (e.keyCode > 47 && e.keyCode < 58) ||
                e.keyCode == 8)) {
            $('.invalid8').show();
            return false;
        }
        $('.invalid8').hide();
    });


    //this is the forth  forth cart 
    $("#hourFormation").focusout(function() {
        graph4Fun();
        generalGraph();

    });
    $('#hourFormation').keypress(function(e) {
        if (!((e.keyCode > 95 && e.keyCode < 106) ||
                (e.keyCode > 47 && e.keyCode < 58) ||
                e.keyCode == 8)) {
            $('.invalid9').show();
            return false;
        }
        $('.invalid9').hide();
    });


    $("#nrDipendenti").focusout(function() {
        graph4Fun();
        generalGraph();

    });
    $('#nrDipendenti').keypress(function(e) {
        if (!((e.keyCode > 95 && e.keyCode < 106) ||
                (e.keyCode > 47 && e.keyCode < 58) ||
                e.keyCode == 8)) {
            $('.invalid10').show();
            return false;
        }
        $('.invalid10').hide();
    });


    //this is the forth  fifth cart 
    $("#nuoviStrumenti").focusout(function() {
        graph5un();
        generalGraph();

    });
    $('#nuoviStrumenti').keypress(function(e) {
        if (!((e.keyCode > 95 && e.keyCode < 106) ||
                (e.keyCode > 47 && e.keyCode < 58) ||
                e.keyCode == 8)) {
            $('.invalid11').show();
            return false;
        }
        $('.invalid11').hide();
    });


    $("#nrContatti").focusout(function() {
        graph5un();
        generalGraph();

    });
    $('#nrContatti').keypress(function(e) {
        if (!((e.keyCode > 95 && e.keyCode < 106) ||
                (e.keyCode > 47 && e.keyCode < 58) ||
                e.keyCode == 8)) {
            $('.invalid12').show();
            return false;
        }
        $('.invalid12').hide();
    });


    //this is the forth  sixth cart 
    $("#riunioniStretegiche").focusout(function() {
        graph6un();
        generalGraph();

    });
    $('#riunioniStretegiche').keypress(function(e) {
        if (!((e.keyCode > 95 && e.keyCode < 106) ||
                (e.keyCode > 47 && e.keyCode < 58) ||
                e.keyCode == 8)) {
            $('.invalid13').show();
            return false;
        }
        $('.invalid13').hide();
    });


    //those are the functions of the first card  benchmark 1
    function benchmark1Fun(peso) {

        var nrRiunioni = $('#nrRiunioni').val();
        var totaleRiunioni = $('#totaleRiunioni').val();

        benchmark1 = (parseFloat(nrRiunioni) / parseFloat(totaleRiunioni)) * 100;
        benchmark1 = (benchmark1 / peso) * 100;
        //round the number
        benchmark1 = Math.round(benchmark1);
        if (benchmark1 > 100) {
            /*
            Swal.fire({
                type: "error",
                title: "Errore",
                text: "'Nuovi Servizi' sembra non essere proporzionato, ricontrolla i valori inseriti!",
                confirmButtonClass: "btn btn-confirm mt-2",
            })*/
            benchmark1 = 100;
            $('#benchmark1').val(benchmark1 + ' %');
        } else {
        if(isNaN(benchmark1)){
            benchmark1=0;
        }
            $('#benchmark1').val(benchmark1 + ' %');
        }

        if (parseFloat(benchmark1) <= 33) {
            $('#benchmark1').removeClass('border-success');
            $('#benchmark1').removeClass('border-warning');
            $('#benchmark1').addClass('border-danger');
        } else if (parseFloat(benchmark1) <= 66) {
            $('#benchmark1').removeClass('border-danger');
            $('#benchmark1').removeClass('border-success');
            $('#benchmark1').addClass('border-warning');
        } else {
            $('#benchmark1').removeClass('border-danger');
            $('#benchmark1').removeClass('border-warning');
            $('#benchmark1').addClass('border-success');
        }

    }

    //those are the functions of the first card  benchmark 2
    function benchmark2Fun(peso) {
        //benchmark 2
        var nrRicavi = $('#nrRicavi').val();
        nrRicavi = nrRicavi.substring(1);
        var totaleRicavi = $('#totaleRicavi').val();
        totaleRicavi = totaleRicavi.substring(1);
        benchmark2 = (parseFloat(nrRicavi) / parseFloat(totaleRicavi)) * 100;
        benchmark2 = (benchmark2 / peso) * 100;
        //round the number
        benchmark2 = Math.round(benchmark2);
        if (benchmark2 > 100) {
         /*   Swal.fire({
                type: "error",
                title: "Errore",
                text: "'Ricavi Nuovi Servizi o Ricavi Totali' sembra non essere proporzionato, ricontrolla i valori inseriti!",
                confirmButtonClass: "btn btn-confirm mt-2",
            })*/
            benchmark2 = 100;
            $('#benchmark2').val(benchmark2 + ' %');
        } else {
            if(isNaN(benchmark2)){
                benchmark2=0;
        }
            $('#benchmark2').val(benchmark2 + ' %');
        }


        if (parseFloat(benchmark2) <= 33) {
            $('#benchmark2').removeClass('border-success');
            $('#benchmark2').removeClass('border-warning');
            $('#benchmark2').addClass('border-danger');
        } else if (parseFloat(benchmark2) <= 66) {
            $('#benchmark2').removeClass('border-danger');
            $('#benchmark2').removeClass('border-success');
            $('#benchmark2').addClass('border-warning');
        } else {
            $('#benchmark2').removeClass('border-danger');
            $('#benchmark2').removeClass('border-warning');
            $('#benchmark2').addClass('border-success');
        }
    }

    //first graph function
    function graph1Fun() {
        var graph1 = (parseFloat(benchmark1) * 0.7) + (parseFloat(benchmark2) * 0.3);
        //round the number
        graph1 = Math.round(graph1);

        if(isNaN(graph1)){
            graph1=0;
        }
        if (graph1 <= 33) {
            $("#graph1").trigger('configure', {
                'fgColor': '#FF0000'
            });
            $("#graph1").css('color', '#FF0000');
        } else if (graph1 <= 66) {
            $("#graph1").trigger('configure', {
                'fgColor': '#ffc107'
            });
            $("#graph1").css('color', '#ffc107');
        } else {
            $("#graph1").trigger('configure', {
                'fgColor': '#31cb72'
            });
            $("#graph1").css('color', '#31cb72');
        }
        $('#graph1').val(graph1);
        $("#graph1").trigger('change');
    }


    //second graph
    function graph2Fun() {
        var nrContatti = $('#nrContatti').val();
        var nrClienti = $('#nrClienti').val();
        benchmark3 = (parseFloat(nrContatti) / parseFloat(nrClienti)) * 100;
        benchmark3 = (benchmark3 / 120) * 100;
        //round the number
        benchmark3 = Math.round(benchmark3);
        if (benchmark3 > 100) {
          /*  Swal.fire({
                type: "error",
                title: "Errore",
                text: "'Rivoluzionare gli studi' sembra non essere proporzionato, ricontrolla i valori inseriti!",
                confirmButtonClass: "btn btn-confirm mt-2",
            });*/
            benchmark3 = 100;
        }
        if(isNaN(benchmark3)){
            benchmark3=0;
        }
        if (benchmark3 <= 33) {
            $("#graph2").trigger('configure', {
                'fgColor': '#FF0000'
            });
            $("#graph2").css('color', '#FF0000');
        } else if (benchmark3 <= 66) {
            $("#graph2").trigger('configure', {
                'fgColor': '#ffc107'
            });
            $("#graph2").css('color', '#ffc107');
        } else {
            $("#graph2").trigger('configure', {
                'fgColor': '#31cb72'
            });
            $("#graph2").css('color', '#31cb72');
        }
        $('#graph2').val(benchmark3);
        $("#graph2").trigger('change');
    }

    //third graph
    function graph3un() {
        var orePasate = $('#orePasate').val();
        var oreLavorate = $('#oreLavorate').val();
        benchmark4 = (parseFloat(oreLavorate) / parseFloat(orePasate)) * 100;
        benchmark4 = (benchmark4 / 30) * 100;

        //round the number
        benchmark4 = Math.round(benchmark4);
        if (benchmark4 > 100) {
          /*  Swal.fire({
                type: "error",
                title: "Errore",
                text: "'Rivoluzionare gli studi' sembra non essere proporzionato, ricontrolla i valori inseriti!",
                confirmButtonClass: "btn btn-confirm mt-2",
            })*/
            benchmark4 = 100;
        }
        if(isNaN(benchmark4)){
            benchmark4=0;
        }
        if (benchmark4 <= 33) {
            $("#graph3").trigger('configure', {
                'fgColor': '#FF0000'
            });
            $("#graph3").css('color', '#FF0000');
        } else if (benchmark4 <= 66) {
            $("#graph3").trigger('configure', {
                'fgColor': '#ffc107'
            });
            $("#graph3").css('color', '#ffc107');
        } else {
            $("#graph3").trigger('configure', {
                'fgColor': '#31cb72'
            });
            $("#graph3").css('color', '#31cb72');
        }
        $('#graph3').val(benchmark4);
        $("#graph3").trigger('change');
    }

    //fourth graph
    function graph4Fun() {
        var hourFormation = $('#hourFormation').val();
        var nrDipendenti = $('#nrDipendenti').val();

        var benchmark5 = (parseInt(hourFormation) / (parseInt(nrDipendenti) * 4)) * 100;
        //round the number
        benchmark5 = Math.round(benchmark5);
        if (benchmark5 > 100) {
           /* Swal.fire({
                type: "error",
                title: "Errore",
                text: "'Formazione' sembra non essere proporzionato, ricontrolla i valori inseriti!",
                confirmButtonClass: "btn btn-confirm mt-2",
            });*/
            benchmark5 = 100;
        }
        if(isNaN(benchmark5)){
            benchmark5=0;
        }
        if (benchmark5 <= 33) {
            $("#graph4").trigger('configure', {
                'fgColor': '#FF0000'
            });
            $("#graph4").css('color', '#FF0000');
        } else if (benchmark5 <= 66) {
            $("#graph4").trigger('configure', {
                'fgColor': '#ffc107'
            });
            $("#graph4").css('color', '#ffc107');
        } else {
            $("#graph4").trigger('configure', {
                'fgColor': '#31cb72'
            });
            $("#graph4").css('color', '#31cb72');
        }
        $('#graph4').val(benchmark5);
        $("#graph4").trigger('change');
    }


    //fifth graph
    function graph5un() {
        var nuoviStrumenti = $('#nuoviStrumenti').val();
        var nrContattiInnovazione = $('#nrContatti').val();
        benchmark6 = (parseFloat(nuoviStrumenti) / parseFloat(nrContattiInnovazione)) * 100;
        benchmark6 = (benchmark6 / 60) * 100;
        //round the number
        benchmark6 = Math.round(benchmark6);

        if (benchmark6 > 100) {
           /* Swal.fire({
                type: "error",
                title: "Errore",
                text: "'Innovazione' sembra non essere proporzionato, ricontrolla i valori inseriti!",
                confirmButtonClass: "btn btn-confirm mt-2",
            });*/
            benchmark6 = 100;
        }
        if(isNaN(benchmark6)){
            benchmark6=0;
        }
        if (benchmark6 <= 33) {
            $("#graph5").trigger('configure', {
                'fgColor': '#FF0000'
            });
            $("#graph5").css('color', '#FF0000');
        } else if (benchmark6 <= 66) {
            $("#graph5").trigger('configure', {
                'fgColor': '#ffc107'
            });
            $("#graph5").css('color', '#ffc107');
        } else {
            $("#graph5").trigger('configure', {
                'fgColor': '#31cb72'
            });
            $("#graph5").css('color', '#31cb72');
        }
        $('#graph5').val(benchmark6);
        $("#graph5").trigger('change');
    }

    //sixth graph
    function graph6un() {
        var riunioniStretegiche = $('#riunioniStretegiche').val();
        //benchmark 7
        var benchmark7 = parseFloat(riunioniStretegiche) * 100;
        //round the number
        benchmark7 = Math.round(benchmark7);
        if (benchmark7 > 100) {
          /*  Swal.fire({
                type: "error",
                title: "Errore",
                text: "'Clima Aziendale' sembra non essere proporzionato, ricontrolla i valori inseriti!",
                confirmButtonClass: "btn btn-confirm mt-2",
            });*/
            benchmark7 = 100;
        }
      
      
        if (benchmark7 <= 33) {
            $("#graph6").trigger('configure', {
                'fgColor': '#FF0000'
            });
            $("#graph6").css('color', '#FF0000');
        } else if ( benchmark7 > 33 && benchmark7 <= 66) {
            $("#graph6").trigger('configure', {
                'fgColor': '#ffc107'
            });
            $("#graph6").css('color', '#ffc107');
        } else {
           
            $("#graph6").trigger('configure', {
                'graph6': '#31cb72'
            });
            $("#graph6").css('color', '#31cb72');
        }
        $('#graph6').val(benchmark7);
        $("#graph6").trigger('change');
    }

    function generalGraph(){

      var grafi1=  $('#graph1').val();
      var grafi2=  $('#graph2').val();
      var grafi3=  $('#graph3').val();
      var grafi4=  $('#graph4').val();
      var grafi5=  $('#graph5').val();
      var grafi6=  $('#graph6').val();

        var grafico = parseFloat(grafi1) *0.27+ parseFloat(grafi2)*0.2+parseFloat(grafi3) *0.2+ parseFloat(grafi4)*0.11+parseFloat(grafi5) *0.2+ parseFloat(grafi6)*0.11;
       
        
        if(isNaN(grafico)){
            grafico=0;
        }
        if (grafico <= 33) {
            $("#grafico").trigger('configure', {
                'fgColor': '#FF0000'
            });
            $("#grafico").css('color', '#FF0000');
        } else if (grafico <= 66) {
            $("#grafico").trigger('configure', {
                'fgColor': '#ffc107'
            });
            $("#grafico").css('color', '#ffc107');
        } else {
            $("#grafico").trigger('configure', {
                'fgColor': '#31cb72'
            });
            $("#grafico").css('color', '#31cb72');
        }
        $('#grafico').val(grafico);
        $("#grafico").trigger('change');
    }

});