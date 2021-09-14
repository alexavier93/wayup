
// Upload Galerias
$(document).on('click', '#uploadGalerias', function () {

    var formData = new FormData();

    var url = $("#urlUpload").val();
    var servico_id = $("#servico_id").val();
    var galeria = $('#galeria').prop('files')[0];
    var titulo = $("#titulo_galeria").val();
    var descricao = $("#descricao_galeria").val();

    formData.append('galeria', galeria);
    formData.append('titulo', titulo);
    formData.append('descricao', descricao);
    formData.append('servico_id', servico_id);

    $.ajax({
        type: 'POST',
        url: url,
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function (response) {

            setTimeout(function () {
                $('.alert').html(response.success);
                $('.alert').addClass('alert-success').fadeIn("slow");
            }, 200);

            setTimeout(function () {
                location.reload();
            }, 1000);

        },
        error: function (response) {
            setTimeout(function () {
                $('.alert').html(response.erro);
                $('.alert').addClass('alert-danger').fadeOut("slow");
            }, 200);

            setTimeout(function () {
                $('.alert').hide(400);
            }, 2000);
        }
    });

});


// Requerendo dados do Galeria
$('#modalEditGaleria').on('show.bs.modal', function (e) {

    var id = e.relatedTarget.id;
    var url = e.relatedTarget.dataset['url']

    $.ajax({
        cache: false,
        type: 'POST',
        url: url,
        data: 'id=' + id,
        dataType: 'json',
        success: function ($data) {
            $('#titulo_galeria_edit').val($data.titulo);
            $("#descricao_galeria_edit").summernote("code", $data.descricao);
            $('#id_galeria_edit').val($data.id);
        }

    });

});

//Função para Editar Galeria
$('#formEditGaleria').submit(function (e) {

    e.preventDefault()

    var dados = $(this).serialize();
    var url = $('input[name="urlUpdate"]').val();

    $.ajax({
        type: "POST",
        url: url,
        data: dados,
        dataType: 'json',
        success: function (response) {

            $('#modalEditGaleria').modal('hide');

            setTimeout(function () {
                $('.alert').html(response.success);
                $('.alert').addClass('alert-success').fadeIn("slow");
            }, 200);

            setTimeout(function () {
                location.reload();
            }, 1000);

        },
        error: function (response) {
            setTimeout(function () {
                $('.alert').html(response.erro);
                $('.alert').addClass('alert-danger').fadeOut("slow");
            }, 200);
            setTimeout(function () {
                $('.alert').hide(400);
            }, 2000);
        }
    });

    return false;

});


// Excluindo Galerias
$(document).on('click', '.delete_galeria', function () {
    var id = $(this).data('id');
    var url = $(this).data('url');

    $('.delete').attr('data-id', id);
    $('.delete').attr('data-url', url);

    $('.delete').addClass('deleteGaleria');
    $('.deleteGaleria').removeClass('delete');
});

$(document).on('click', '.deleteGaleria', function () {

    var id = $(this).data('id');
    var url = $(this).data('url');

    $.ajax({
        url: url,
        method: "POST",
        data: {id: id},
        dataType: "json",
        cache: false,
        success: function (response) {
            $('#modalDelete').modal('toggle');

            setTimeout(function () {
                $('.alert').html(response.success);
                $('.alert').addClass('alert-success').fadeIn("slow");
            }, 200);

            setTimeout(function () {
                location.reload();
            }, 1000);

        },
        error: function (response) {

            setTimeout(function () {
                $('.alert').html(response.erro);
                $('.alert').addClass('alert-danger').fadeOut("slow");
            }, 200);

            setTimeout(function () {
                $('.alert').hide(400);
            }, 2000);

        }
    });

});