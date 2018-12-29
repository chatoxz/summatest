$(document).ready(function () {
    setBtnModal();
    function set_modal_generic_exception(xhr, ajaxOptions, thrownError){
        return  "<div class='row'><div class='col-md-12'>" +
            "<div class='alert alert-danger' style='text-align: center;margin: auto;width: 50%;'>" +
            "<span class='glyphicon glyphicon-flash' style=''></span> Error: "+thrownError +" " +
            "</div></div></div>";
    }
    //esta lina sirve para que ande el select2 en los modales. sino no te permite escribir.
    $.fn.modal.Constructor.prototype.enforceFocus = function() {};
});
//agrega el funcionanmiento a los botones del gridview para que se abran en modales
function setBtnModal(){
    $("a[title='Save As New'], a[title=Ver], a[title=View], a[title=Actualizar], a[title=Update], .add-modal-data").each(function (index) {
        $(this).attr('value',$(this).attr('href')).attr('size', 'modal-lg').addClass('modalButton');
    });

}
//agrega el funcionanmiento a los botones del gridview para que se abran en modales, cuando se recarga el gridview con pjax
$(document).on('pjax:success', function() {
    setBtnModal();
});

//FUNCIONAMIENTO DEL MODAL
$("body").on("click ontouchend",".modalButton", function (event) {
    event.stopPropagation();
    event.preventDefault();
    if($(this).attr("disabled") != "disabled"){
        $(".resultado").html("").addClass("hidden");
        $("#modalContent").html("<div class='loader_azul_muy_grande' style='margin: auto;display: block'></div>");
        //setea el tamaño del modal
        $(".modal-dialog").removeClass("modal-sm modal-lg").addClass($(this).attr("size"));
        if (typeof $(this).attr("size") !== typeof undefined && $(this).attr("size") !== false) {
            if ($(this).attr("size") == "modal-sm") $(".modal-body").css("padding", "20px 0px");
        }
        //pide confirmacion si esta seteado
        // se setea con  'confirm' => true
        var confirmar = true;
        if (typeof $(this).attr("confirm") !== typeof undefined && $(this).attr("confirm") !== false) {
            confirmar = confirm("Esta seguro que desea ejecutar la accion?");
        }
        //setea el titulo del modal
        $(".modal-header > h1, .modal-header > h2, .modal-header > h3").html($(this).attr("title"));

        $("#modal").modal("show");
        //carga en el modalContent la pagina.
        // LOS DATOS SE PASAN A TRAVES DE LA URL
        if (confirmar) {
            $.ajax({
                url: $(this).attr("value"),
                type: "get",
                //data: data,
                processData: false,
                contentType: false,
            }).done(function (response) {
                $("#modalContent").html(response);
                setBtnModal();
            }).fail(function (xhr, ajaxOptions, thrownError) {
                if (thrownError == 'Forbidden')
                    $("#modalContent").html("<div class='alert alert-danger' style='text-align: center;margin: auto;width: 50%'>" +
                        "No Posee permisos para acceder </div>");
                else {
                    var mensaje = "Error: " + thrownError + ". Estado: " + jqXHR.status + ", " + xhr.responseText + ", ajaxOptions: " + ajaxOptions;
                    window.location.replace("/site/error");
                    //$("#modalContent").html("Error: "+ xhr.responseText + ",ajaxOptions: "+ ajaxOptions + ",ajaxOptions: " +  thrownError);
                }
                //setTimeout(function(){ $("#modal").modal("hide"); }, 3000);
                //console.log("LOG -> status: "+xhr.status+" thrownError: "+thrownError);
            });
        }
    }else {
        $("#modal").modal("show");
        $("#modalContent").html("<div style='color: red;font-size: 18px;margin:auto;' class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'>" +
            "</div> Boton desactivado por motivos de seguridad.");
        setTimeout(function(){
            //escondo el modal y recargo con pjax el gridview si esta definido con id_gridview
            $("#modal").modal("hide");
            $(".resultado").html("").addClass("hidden");
            //Si esta seteado el id del gridview lo recarga con el pjax
            if ( typeof $("#id_gridview").html() !== "undefined"  )
                $.pjax.reload({container:'#id_gridview'});
        }, 2000);
    }
});

//FUNCIONAMIENTO DEL formulario con AJAX
$("body").on("beforeSubmit", "form#id_form", function () {
    var form = $(this);
    $(".resultado").removeClass("hidden").html("<div class='loader_tricolor_chico' style='margin: auto;display: block'></div>");
    var formData = new FormData(this);
    //esto sirve para que tome el valor que esta en el button submit, si actualiza no tiene valor, pero si es el boton
    //"guardar como nuevo" agrego ese dato al form, sino no funca con ajax.(ese valor sirve en el controller para que ver si guarda como nuevo o no)
    var btn = $(this).find("[type=submit]:focus");
    if(btn.val() == '1') formData.append(btn.attr('name'), btn.val());
    $.ajax({
        url: form.attr("action"),
        type: "post",
        data: formData,
        processData: false,
        contentType: false,
    }).done (function (response){
        //seteo la respuesta enviada desde el controlador
        if(!response || response.length === 0) {
            $(".resultado").html("<span style='font-size: 16px;margin:auto' class='glyphicon glyphicon-ok' aria-hidden='true'></span> Accion realizada.");
            setTimeout(function(){
                //escondo el modal y recargo con pjax el gridview si esta definido con id_gridview
                $("#modal").modal("hide");
                $(".resultado").html("").addClass("hidden");
                //Si esta seteado el id del gridview lo recarga con el pjax
                if ( typeof $("#id_gridview").html() !== "undefined"  )
                    $.pjax.reload({container:'#id_gridview'});
            }, 2000);
        }else {
            $(".resultado").addClass("hidden");
            if (window.location.href == "http://affrontend/persona/carga_nuevo_socio"){
                $("#modalContent").html(response);
            }
            else{
                $(".resultado").html(response);
                $(".div-sin-modal").html(response);
            }
        }
    }).fail(function (xhr, ajaxOptions, thrownError){
        // window.location.replace("/site/error");
        $(".resultado").html("Algo salio mal, intentalo de nuevo. De lo contrario ponte en contacto con Appe.");
        console.log("LOG -> status: "+xhr.status+" thrownError: "+thrownError);
        // $("#modalContent").html("LOG -> status: "+xhr.status+" thrownError: "+thrownError);
    });
    return false;
});

//setInterval(setHora, 60000);




