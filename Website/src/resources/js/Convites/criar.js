var stepperNode = document.querySelector('#stepper1');
var myStepper = new Stepper(document.querySelector('#stepper1'));


$("#txtDataEvento").datepicker({
    format: "dd/mm/yyyy",
    language: "pt-BR",
    placeholder: 'dd/mm/yyyy'
});

$('#txtHoraInicio').datepicker({
    format: 'LT'
});

$('#txtHoraFim').datepicker({
    format: 'LT'
});
