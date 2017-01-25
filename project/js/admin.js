$(document).on('ready', function(){
	// LOGIN
	$("#LoginForm_username").on('focus', function(){
		$("#login-form input").removeClass('has-error');
	});
	$("#LoginForm_username").on('keypress', function(e){
		$("#login-form input").removeClass('has-error');
		if(e.which == 13)
            if($.trim($(this).val()) != "")
                $("#LoginForm_password").focus();
	});
	$("#LoginForm_password").on('focus', function(){
		$("#login-form input").removeClass('has-error');
		if($.trim($("#LoginForm_username").val()) == "")
                $("#LoginForm_username").focus();
	});
	$("#LoginForm_password").on('keypress', function(e){
		$("#login-form input").removeClass('has-error');
		if(e.which == 13)
            if($.trim($(this).val()) != "")
                $("#login-form").submit();
	});

	$("#login-form").on('submit', function(event){
		event.preventDefault();

		var error = false;

		if($.trim($("#LoginForm_username").val()) == ""){
			error = true;
			$("#LoginForm_username").addClass('has-error');
		}
		if($.trim($("#LoginForm_password").val()) == ""){
			error = true;
			$("#LoginForm_password").addClass('has-error');
		}
		if(!error && !requestAjax){
			requestAjax = true;
			$.loading();

			$.ajax( $('#login-form').attr('action'), {
	            data: $('#login-form').serialize(),
	            dataType: 'json',
	            type: 'post',
	            success: function(data){
	            	var errors = "";

	            	$.loadingClose();

	            	if (data != null){
                        $.each(data, function(key, value){
                            errors += '<p>'+value+'</p>';
                        });
                        $.loadMessage('Error', errors);
                        requestAjax = false;
                    }else{
                        window.location.reload();
                    }
	            },
	            error: function(xhr, textStatus, error){
	            	$.loadingClose();
	                $.loadMessage('Error', 'Error contactando con el servidor, intenta nuevamente.');
	                requestAjax = false;
	            }
	        });
		}
	});
	
	// CARGAR DATATABLE EN TABLAS
	$(".js-data-table").each(function(){
		$(this).dataTable();
	});

	//CARGAR CATEGORIAS A SELECT DEPENDIENTE
    $("#Stores_type").on('change', function(){
        var value = $(this).val();
        var container = $("#Stores_category");

        container.attr('required', value != '');
        container.find('option').remove();
        container.append($('<option>', {
            text: 'Seleccione',
            value: ''
        }));
        
        if(value == ""){
            container.attr('disabled',true);
        }
        else{
            container.attr('disabled',false);
            $.each(categoryStore, function(key, category){
                if(category.type == value){
                    container.append($('<option>', {
                        text: category.name,
                        value: category.id_category
                    }));
                }
            });
        }
    });

    //CARGAR POR AJAX GALERIA
    $(".js-load-gallery").on('change', function(){
        $(loadAjax.container).html('');
        
        if($(this).val() != ""){
            loadAjax.load = true;
            loadAjax.filter = $(this).val();

            $.loadAjax();
        }
        
        loadAjax.load = false;
    });

    // MOSTRAR IMAGEN ANTES DE SER CARGADA
    $('.js-show-before').on('change', function(){
    	$.readBeforeFile(this);
    });

    // ACTIVAR CKEDITOR EN TEXTAREA
    $(".js-ckeditor").each(function(){
    	$(this).ckeditor({
    		skin : 'bootstrapck'
    	});
    });

    /**** LISTAS ARRASTRABLES ****/
    $.updateOutput = function(){
        $('#nestable-output').val(window.JSON.stringify($('.nestable.nestable_out').nestable('serialize')));
    }
    if($('.nestable').length){
        $('.nestable').nestable({
            group: $(this).attr('data-group'),
            maxDepth: 2
        })
        .on('change', $.updateOutput);
        $.updateOutput();

        $('.js-add-item-list').on('click', function(event) {
            event.preventDefault();
            if($.trim($('#add_item_menu').val()) != ""){
                $('.nestable_in .dd-list').append($('<li>',{
                    class: 'dd-item'
                }).attr('data-id', $('#add_item_menu').val()).append($('<div>',{
                    class: 'dd-handle',
                    text: $('#add_item_menu').val(),
                })));
            }
        });
    }
    /**** END LISTAS ARRASTRABLES ****/

    // ACTIVAR SELECTOR DE FECHAS
    $(".js-my-datepicker").each(function(){
        if(typeof $(this).find('input').attr('data-timePicker') != 'undefined')
            timePicker = ($(this).find('input').attr('data-timePicker') == 'false')?false:true;
        $(this).datetimepicker({
            language: 'es',
            pickTime: timePicker
        });
    });

    // MOSTRAR MODAL PARA CUALQUIER LINK QUE NECESITE CONFIRMACIÓN
    $(".js-confirm").on('click', function(event){
        event.preventDefault();
        $.loadMessage('Confirmar', $(this).attr('data-msj'), true, $(this).attr('href'));
    });

    // VALIDAR CAMPOS SOLO NUMERICOS
    $(document).on('keypress', '.js-input-number', function(event){
        if(!((event.which <= 57 && event.which >= 48) || event.which == 8))
            event.preventDefault();
    });

    //MARCAR TODOS LOS MENSAJES CONTACTO
    $(".js-select-check .iCheck-helper").on('click', function(){
        if($(".js-select-check .icheckbox_square-aero").hasClass('checked')){
            $(".js-mark-check .icheckbox_square-aero").addClass('checked');
            $(".js-mark-check input").prop('checked', true);
        }
        else{
            $(".js-mark-check .icheckbox_square-aero").removeClass('checked');
            $(".js-mark-check input").prop('checked', false);
        }
    });
    $(".js-marks-taken").on('click', function(event){
        event.preventDefault();

        $("#form-messages").attr('action', ($("#form-messages").attr('action') + '/mark_taken'));
        $("#form-messages").submit();
    });
    $(".js-delete-messages").on('click', function(event){
        event.preventDefault();

        $("#form-messages").attr('action', ($("#form-messages").attr('action') + '/delete_messages'));
        $("#form-messages").submit();
    });

    //CARGAR SLIDE PRINCIPAL HOME
    $("#PrincipalSlide_Gallery").on('change', function(){
        if($(this).val() != ""){
            $(loadAjax.container).html('');

            loadAjax.load = true;
            loadAjax.filter = $(this).val();

            $.loadAjax();
        }
        
        loadAjax.load = false;
    });

    // VIDEO PROMOCIONAL HOME
    $("#VideoPromo_Code").on('blur', function(){
        $(".js-video-promo iframe").attr('src', ($(".js-video-promo iframe").attr('data-frame-url') + $(this).val() + $(".js-video-promo iframe").attr('data-video-options')));
    });

    // ESTABLECER GENERAL VALUE
    $(".general-value-set").on('click', function(event){
        event.preventDefault();

        var data = {
            id_value: $(this).attr('data-value-bd'),
            value: $($(this).attr('data-element-val')).val()
        };

        $.loadAjaxValue($(this).attr('href'), data);
    });
});

$.loading = function(){
	$("#md-active-loading").click();
}
$.loadingClose = function(){
	$("#modal-ajax-loading .md-close").click();
}
$.loadMessage = function(title, content, close, redirect){
	var close = close || true;
	var redirect = redirect || "";
	var modal = $("#modal-message");

	modal.find("h3").text(title);
	modal.find(".message-content").html('');
	modal.find(".message-content").prepend(content);

	if(!close)
		modal.find(".md-close").addClass('v-none');
	if(redirect != "")
		modal.find(".md-redirect").attr('href', redirect);
	else
		modal.find(".md-redirect").addClass('v-none');

	$("#md-active-message").click();
}

$.loadAjax = function(){
    requestAjax = true;

    $.loading();

    $.ajax({
        data: {
            'page': loadAjax.page,
            'items': loadAjax.items,
            'filter': loadAjax.filter,
        },
        dataType: "json",
        url: loadAjax.url,
        success: function(data){
            $.loadingClose();
            if(data.html == ""){
                loadAjax.load = false;
                if(loadAjax.page == 1){
                    $(loadAjax.container).append($('<p>',{
                        "text": "No hay elementos para cargar.",
                        "class": "css-no-elements"
                    }));
                }
            }
            else{
                $(loadAjax.container).append(data.html);
                loadAjax.page = data.page;
            }

            if(loadAjax.page == 0)
                loadAjax.load = false;

            requestAjax = false;
        },
        error: function(xhr, textStatus, error){
            $.loadingClose();
            loadAjax.load = false;
            requestAjax = false;
        }
    });
}

$.readBeforeFile = function(input){
	var content = input.getAttribute('data-before');

	if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
        	$(content).html('');
            $(content).append($('<div>', {
            	class:"img"
            }).css('background-image', 'url('+e.target.result+')'));
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$.loadAjaxValue = function(url, info){
    requestAjax = true;
    $.loading();

    $.ajax( url, {
        data: info,
        dataType: 'json',
        type: 'post',
        success: function(data){
            $.loadingClose();
            requestAjax = false;

            autohidenotify('success', 'Hecho', 'Hecho, se ha realizado el cambio correctamente', 4000);
        },
        error: function(xhr, textStatus, error){
            $.loadingClose();
            requestAjax = false;

            autohidenotify('success', 'Error', 'Ha ocurrido un error en el proceso. Intente nuevamente.', 4000);
        }
    });
}