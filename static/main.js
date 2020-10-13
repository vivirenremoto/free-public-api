
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
    Sheetsee.makeTable(tableOptions);
    Sheetsee.initiateTableFilter(tableOptions);


    if (document.location.hash) {
        $('.btn_filter[href$=' + document.location.hash.replace('#', '') + ']').click();
    }
}

function showModal(obj) {
    var title = $(obj).data('title').split(' - ')[1];
    var url = $(obj).data('url');
    var api = $(obj).data('format');
    var format = $(obj).data('format');

    $('#ModalLabel').html(title);
    $('#full_url').val(url);


    var t_url = url.split('?');

    if (t_url.length > 1) {
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

                if (attr[0] != 'format') {
                    $('#params tbody').append('<tr><td width="25%">' + attr[0] + '</td><td width="75%">' + decodeURIComponent(attr[1]) + '</td></tr>');
                }
            }

            if (format == 'json') {
                $('#params tbody').append('<tr><td width="25%">default</td><td width="75%">optional value if result is false</td></tr>');
                $('#params tbody').append('<tr><td width="25%">format</td><td width="75%">[ text | json ]</td></tr>');
                $('#params tbody').append('<tr><td width="25%">callback</td><td width="75%">optional</td></tr>');
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

        var category = $(this).attr('href').replace('#', '');

        if (category) {
            $('.category').hide();
            $('.category_' + category).show();

        } else {
            $('.category').show();
        }
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