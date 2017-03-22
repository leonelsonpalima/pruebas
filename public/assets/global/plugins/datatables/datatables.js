/* $(document).ready(function(){
    verlistado()
    //CARGAMOS EL ARCHIVO QUE NOS LISTA LOS REGISTROS, CUANDO EL DOCUMENTO ESTA LISTO


})
function verlistado(){ //FUNCION PARA MOSTRAR EL LISTADO EN EL INDEX POR JQUERY
              var randomnumber=Math.random()*11;
            $.post("datatable.php", {
                randomnumber:randomnumber
            }, function(data){
              $("#con_table").html(data);
            });



} */


jQuery(document).ready(function() {

	$("#btn_datos").click(function(){
	datos_table($("#frm_datos"));
	});	
});
function datos_table(){	
var form=($('#frm_datos'));
var ArrayForm = form.serialize();
$('#con_table').html('<div><center><img src="../assets/pages/img/login/carga.gif" alt="craga" class="logo-default" width="30%" height="10%" /></center></div>');
var page = $(this).attr('data');        
var dataString = 'page='+page;
     
$.ajax({
        type: "POST",
        url: "datatable.php",
        data: ArrayForm,
        success: function(data){
		$('#con_table').fadeIn(1000).html(data);
}});
}

