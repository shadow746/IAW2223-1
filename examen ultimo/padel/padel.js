$.datepicker.regional['es'] = {
    closeText: 'Cerrar',
    prevText: '<Ant',
    nextText: 'Sig>',
    currentText: 'Hoy',
    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
    dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
    weekHeader: 'Sm',
    dateFormat: 'dd/mm/yy',
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''
};
$.datepicker.setDefaults($.datepicker.regional['es']);
$(document).ready(function () {
$("#fecha").datepicker({ minDate: 1, maxDate: "+7D"});

$("#reserva").click(function (e) { 
    e.preventDefault();
    let pista = $("#pista").val();
    let hora= $("#hora").val();
    let fecha =$("#fecha").val();
    let precio=0;
    let luz=0;
    console.log(hora);

    if(fecha=="")
    {
        $("#diaReserva").html("Fecha no seleccionada");
        $("#totalPrecio").html("Precio:"+ precio+"€");
    }else
    {
        if(hora<4)
    {
        precio=precio+10;
    }else if(hora<7)
        {
            precio=precio+12;
        }else if(hora<10)
            {
                precio=precio+16;
            }

    
    if (document.getElementById("luz").checked)
    {
        precio=precio+4;
        $("#diaReserva").html("Pista "+pista+" reservada el :"+fecha);
        $("#totalPrecio").html("Precio:"+ precio+"€ luz incluida");
    }else
    {
    
        $("#diaReserva").html("Pista "+pista+" reservada el :"+fecha);
        $("#totalPrecio").html("Precio:"+ precio+"€ sin luz");
    }
    }
    
    
});
});