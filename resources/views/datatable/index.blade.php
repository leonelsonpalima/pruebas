@extends('plantilla.plantilla')

@section('archivosCSS')
         <link href="{{ URL::asset('assets/global/plugins/datatables/demo_table.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('formulario')
                        <h1 class="page-title"> Datatable
                            <small>de miguel</small>
                        </h1>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
<div class="row">
<div class="col-md-12">
<!-- BEGIN CHART PORTLET-->
<div class="portlet light bordered">
<div class="portlet-title">
<!-- BEGIN busqueda input-->
<h3 class="page-title"> Bienvenido al Sisper</h3>
<form name="frm_datos" id="frm_datos">
{!! csrf_field() !!}
<div class="form-group">
<div class="input-group input-group-lg">
<input type="text" class="form-control" placeholder="Buscar..." name="datos" id="datos" value="">
<span class="input-group-btn">
<button class="btn green" type="button" name="btn_datos" id="btn_datos"  >Buscar</button>
</span>
</div>
</div>
</form>
<div class="caption">
<i class="icon-bar-chart font-green-haze"></i>
<span class="caption-subject bold uppercase "> sisper.</span>
<span class="caption-helper">Sistema Personal de Gestion Humana.</span>
</div>
<!-- END cierre input -->
<div class="tools">
<a href="javascript:;" class="collapse"> </a>
<!--   <a href="#portlet-config" data-toggle="modal" class="config"> </a>-->
<a href="javascript:;" class="reload"> </a>
<a href="javascript:;" class="fullscreen"> </a>
<!--   <a href="javascript:;" class="remove"> </a>-->
</div>
</div>
<div class="portlet-body">
<!-- BEGIN pluyin-->
<div class="portlet-body">
<!-- BEGIN mostramos el datatable-->
<div id="con_table"></div>
<!-- END de todo lo que vamo a mostrar datatable--->
</div>
<!-- END pluyin-->    
</div>
</div>
<!-- END CHART PORTLET-->
</div>
</div>	

                        <div class="clearfix"></div>
                        <div class="note note-info">
                            <p> A black page template with a minimal dependency assets to use as a base for any custom page you create </p>
                        </div>
@stop

@section('javascript')
<script src="{{ URL::asset('assets/global/plugins/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/datatables/datatables.js') }}" type="text/javascript"></script>

<script>

jQuery(document).ready(function() {

   $('#sample_editable_1').dataTable( { //CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
        "sPaginationType": "full_numbers" //DAMOS FORMATO A LA PAGINACION(NUMEROS)
    } );

    $("#btn_datos").click(function(){
        datos_table($("#frm_datos"));
    });
});

function datos_table(){
        var form=$('#frm_datos');
        var ArrayForm = form.serialize();
        $('#con_table').html('<div><center><img src="{{ URL::asset('assets/pages/img/login/carga.gif') }}" alt="craga" class="logo-default" width="30%" height="10%" /></center></div>');
        var page = $(this).attr('data');
        var dataString = 'page='+page;
        var urlRuta = "{{ url('/datatable/buscar')}}";

        
        $.ajax({
                type: "POST",
                url: urlRuta,
                data: ArrayForm,
                dataType: 'JSON',
                success: function(data){
                    //$('#con_table').fadeIn(1000).html(data);

                    $('#con_table').html('<table class="display" id="sample_editable_1"><thead><tr><th>Cedula</th><th>Nombres</th><th>Apellidos</th><th>Credencial</th><th>Cargo/Jerarquia</th></tr></thead><tbody id="recibirDatos"></tbody></table>');
                    $.each(data, function(i, j){
                        $('#recibirDatos').append('<tr><td>'+ j.PER_CED +'</td><td>'+ j.PER_NOM +'</td><td>'+ j.PER_APE +'</td><td>'+ j.PER_CRE +'</td><td>'+ j.PER_EMAIL +'</td></tr>');
                    });

                    $('#sample_editable_1').dataTable( { //CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
                        "sPaginationType": "full_numbers" //DAMOS FORMATO A LA PAGINACION(NUMEROS)
                    });
                    console.log(data);
                }
        });
}


</script>
@stop