
document.addEventListener('DOMContentLoaded', function () {
    var URL = "1XpPv4LMmjkJNxlrjaBxSN3PVzA9PFRxBgGveDtlIejo"
    Tabletop.init({ key: URL, callback: showInfo, simpleSheet: true })
})

function showInfo(data) {
    var tableOptions = {
        "data": data,
        "pagination": false,
        "tableDiv": "#fullTable",
        "filterDiv": "#fullTableFilter"
    }
    Sheetsee.makeTable(tableOptions)
    Sheetsee.initiateTableFilter(tableOptions)
}

function showModal(obj) {
    var title = $(obj).data('title').split(' - ')[1];
    var url = $(obj).data('url');
    var api = $(obj).data('format');
    var format = $(obj).data('format');

    $('#ModalLabel').html(title);
    $('#full_url').val(url);


    var t_url = url.split('?');

    if (t_url.length == 2) {
        t_url = t_url[1].split('&');


        if (t_url) {
            $('#params').show();
            $('#params tbody').html('');
            for (var i = 0; i < t_url.length; i++) {
                var attr = t_url[i].split('=');

                if (attr[0] == 'key' && api) {
                    attr[1] = '<a href="' + api + '" target="_blank">Get API key</a>';
                } else if (attr[0] == 'secret' && api) {
                    attr[1] = '<a href="' + api + '" target="_blank">Get API key</a>';
                }
                $('#params tbody').append('<tr><td width="50%">' + attr[0] + '</td><td width="50%">' + attr[1] + '</td></tr>');
            }

            $('#params tbody').append('<tr><td width="50%">default</td><td width="50%">optional value if result is false</td></tr>');

            if (format == 'json') {
                $('#params tbody').append('<tr><td width="50%">format</td><td width="50%">[ text | json ]</td></tr>');
                $('#params tbody').append('<tr><td width="50%">callback</td><td width="50%">optional</td></tr>');
            }

        }
    } else {
        $('#params').hide();
    }


    $('#myModal').modal('show');

}

$(function () {
    $('.btn_filter').click(function () {

        $('#search').val('');

        $('.btn_filter').removeClass('btn-primary').addClass('btn-secondary');
        $(this).addClass('btn-primary').removeClass('btn-secondary');

        var category = $(this).data('type');

        if (category) {
            $('.category').hide();
            $('.category_' + category).show();

        } else {
            $('.category').show();
        }

        return false;

    });

    $('#search').keyup(function () {

        $('.btn_filter').removeClass('btn-primary').addClass('btn-secondary');
        $('.btn_filter:First').addClass('btn-primary').removeClass('btn-secondary');


        $('.category').hide();

        $('.category').each(function () {
            if ($(this).data('title').toLowerCase().indexOf($('#search').val().toLowerCase()) > -1) {
                $(this).show();
            }
        });
    });

    $('#full_url').click(function () {
        $(this).select();
    });

    $('#btn_code').click(function () {

        t_url = $('#full_url').val().split('/');
        window.open('https://github.com/vivirenremoto/free-public-api/blob/main/api/' + t_url[3] + '.php');
    });

    $('#btn_test').click(function () {
        window.open($('#full_url').val());
    });

});