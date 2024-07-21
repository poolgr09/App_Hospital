$(function () {
   
    $('#select-medico').on('change', SelecMedicoCambio);
});

function SelecMedicoCambio()
{
    var medico_id = $(this).val();
    console.log(medico_id);
    if (!medico_id)
       $('#select-especialidad').html('<option value="">Selecccione una opcion</option>');
    
    //ajax
    $.get('http://localhost/Laravel/AppHospital/public/api/medicos/'+medico_id+'/especialidades', function(data){

       var html_select = '<option value="">Selecccione una opcion</option>';
        
       for (var i = 0; i < data.length; ++i) 
            html_select += '<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
            
       $('#select-especialidad').html(html_select);

    });
}