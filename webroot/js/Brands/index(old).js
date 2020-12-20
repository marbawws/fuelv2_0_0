// Update the brands data list
function getBrands() {
    $.ajax({
        type: 'GET',
        url: urlToRestApi,
        dataType: "json",
        success:
            function (data) {
                var brandTable = $('#brandData');
                brandTable.empty();
                $.each(data.brands, function (key, value)
                {
                    var editDeleteButtons = '</td><td>' +
                        '<a href="javascript:void(0);" class="btn btn-warning" rowID="' +
                        value.id +
                        '" data-type="edit" data-toggle="modal" data-target="#modalBrandAddEdit">' +
                        'edit</a>' +
                        '<a href="javascript:void(0);" class="btn btn-danger"' +
                        'onclick="return confirm(\'Are you sure to delete data?\') ?' +
                        'brandAction(\'delete\', \'' +
                        value.id +
                        '\') : false;">delete</a>' +
                        '</td></tr>';
                    brandTable.append('<tr><td>' + value.id + '</td><td>' + value.name + editDeleteButtons);

                });

            }

    });
}

/* Function takes a jquery form
and converts it to a JSON dictionary */
function convertFormToJSON(form) {
    var array = $(form).serializeArray();
    var json = {};

    $.each(array, function () {
        json[this.name] = this.value || '';
    });

    return json;
}


function brandAction(type, id) {
    id = (typeof id == "undefined") ? '' : id;
    var statusArr = {add: "added", edit: "updated", delete: "deleted"};
    var requestType = '';
    var brandData = '';
    var ajaxUrl = urlToRestApi;
    frmElement = $("#modalBrandAddEdit");
    if (type == 'add') {
        requestType = 'POST';
        brandData = convertFormToJSON(frmElement.find('form'));
    } else if (type == 'edit') {
        requestType = 'PUT';
        ajaxUrl = ajaxUrl + "/" + id;
        brandData = convertFormToJSON(frmElement.find('form'));
    } else {
        requestType = 'DELETE';
        ajaxUrl = ajaxUrl + "/" + id;
    }
    frmElement.find('.statusMsg').html('');
    $.ajax({
        type: requestType,
        url: ajaxUrl,
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        data: JSON.stringify(brandData),
        success: function (msg) {
            if (msg) {
                frmElement.find('.statusMsg').html('<p class="alert alert-success">Brand data has been ' + statusArr[type] + ' successfully.</p>');
                getBrands();
                if (type == 'add') {
                    frmElement.find('form')[0].reset();
                }
            } else {
                frmElement.find('.statusMsg').html('<p class="alert alert-danger">Some problem occurred, please try again.</p>');
            }
        }
    });
}

// Fill the brand's data in the edit form
function editBrand(id) {
    $.ajax({
        type: 'GET',
        url: urlToRestApi + "/" + id,
        dataType: 'JSON',
    //    data: 'action_type=data&id=' + id,
        success: function (data) {
            $('#id').val(data.brand.id);
            $('#name').val(data.brand.name);
        }
    });
}

// Actions on modal show and hidden events
$(function () {
    $('#modalBrandAddEdit').on('show.bs.modal', function (e) {
        var type = $(e.relatedTarget).attr('data-type');
        var brandFunc = "brandAction('add');";
        $('.modal-title').html('Add new brand');
        if (type == 'edit') {
            var rowId = $(e.relatedTarget).attr('rowID');
            brandFunc = "brandAction('edit'," + rowId + ");";
            $('.modal-title').html('Edit brand');
            editBrand(rowId);
        }
        $('#brandSubmit').attr("onclick", brandFunc);
    });

    $('#modalBrandAddEdit').on('hidden.bs.modal', function () {
        $('#brandSubmit').attr("onclick", "");
        $(this).find('form')[0].reset();
        $(this).find('.statusMsg').html('');
    });
});
