

var sf = "https://docs.google.com/spreadsheets/d/1XpPv4LMmjkJNxlrjaBxSN3PVzA9PFRxBgGveDtlIejo/gviz/tq?tqx=out:json";
$.ajax({url: sf, type: 'GET', dataType: 'text'})
.done(function(data) {
  const r = data.match(/google\.visualization\.Query\.setResponse\(([\s\S\w]+)\)/);
  if (r && r.length == 2) {
    const obj = JSON.parse(r[1]);
    const table = obj.table;
    const header = table.cols.map(({label}) => label);
    const rows = table.rows.map(({c}) => c.map(({v}) => v));

    let new_table = [];
    for(let i=1; i<rows.length; i++){
        new_table.push({
            category: rows[i][0],
            title: rows[i][1],
            description: rows[i][2],
            photo: rows[i][3],
            url: rows[i][4],
        });
    }

    showInfo(new_table);

  }
})
.fail((e) => console.log(e.status));





function showInfo(data) {
    var tableOptions = {
        "data": data,
        "pagination": false,
        "tableDiv": "#fullTable",
        "filterDiv": "#fullTableFilter"
    }
    Sheetsee.makeTable(tableOptions);
    Sheetsee.initiateTableFilter(tableOptions);


    var categories = [];
    $('.item').each(function () {
        var category = $(this).data('category');
        if ($.inArray(category, categories) == -1) {
            categories.push(category);
        }
    });


    categories.sort();

    $(categories).each(function (key, elem) {
        $('.pagination').append('<li class="page-item btn_filter"><a class="page-link" href="#' + elem + '">' + elem + '</a></li>');
    })


    $('.pagination').hide().css('visibility', 'visible').fadeIn('slow');


    $('.btn_filter').click(function () {

        $('#search').val('');

        $('.btn_filter').removeClass('active');
        $(this).addClass('active');

        var category = $(this).find('a').attr('href').replace('#', '');

        if (category) {
            $('.item').hide();
            $('.category_' + category).show();

        } else {
            $('.item').show();
        }
    });


    if (document.location.hash) {
        $('.btn_filter a[href$=' + document.location.hash.replace('#', '') + ']').click();
    }
}

function showModal(obj) {
    var title = $(obj).data('title').split(' - ')[1];
    var url = $(obj).data('url');
    var api = $(obj).data('api');
    var format = $(obj).data('format');

    $('#ModalLabel').html(title);
    $('#full_url').val(url);
    $('#spreadsheet_url').val('=IMPORTDATA("' + url + '&spreadsheet=1")');


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

            $('#params tbody').append('<tr><td width="25%">spreadsheet</td><td width="75%">required value if you are using google spreadsheets</td></tr>');

        }
    } else {
        $('#params').hide();
    }


    $('#myModal').modal('show');

}

$(function () {

    $('#search').keyup(function () {

        $('.btn_filter').removeClass('active');
        $('.btn_filter:first').addClass('active');


        $('.item').hide();

        $('.item').each(function () {
            if ($(this).data('title').toLowerCase().indexOf($('#search').val().toLowerCase()) > -1) {
                $(this).show();
            }
        });
    });

    $('#full_url').click(function () {
        $(this).select();
    });

    $('#spreadsheet_url').click(function () {
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
