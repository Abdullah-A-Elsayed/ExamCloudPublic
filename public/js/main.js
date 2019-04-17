var tablename=document.currentScript.getAttribute("tablename"); //1
function actions(form_id="#form_add") {
        $(form_id).attr('action', tablename);
        $("[name='_method']", $(form_id)).val('POST');
    }
// $("#modal_button").on( "click", function(){
//     actions()

// })
function fill_data(data, form_id) {
    $.each(data, function (i, item) {

        $(form_id + " [name='" + i + "'][type!='file']").val(item);
    });
}
function fill_portlet(id, form_id="#form_add", reset_id="#form_reset", modal_button="#modal_button") {
    mApp.block(form_id);
    $(reset_id).trigger("click");
    $(modal_button).trigger("click");
    $(form_id).attr('action', tablename+"/"+id);
    $("[name='_method']", $(form_id)).val('PUT');

    $.ajax(tablename+"/"+id, {
        complete: function (jqXHR, textStatus) {
            var data = $.parseJSON(jqXHR.responseText);
            try {custom_before(data);} catch (e) {}

            fill_data(data, form_id)
            try {custom_after(data);} catch (e) {}
            mApp.unblock(form_id);
        }
    });
}

function delete_item(id, form_id="#delete_form", table_id="#m_table_1", status = null) {

    $(form_id).ajaxSubmit({
        url: tablename + '/' + id, type: 'post',data:{'status' : status},
        beforeSubmit: function (arr, $form, options) {
            toastr.warning('Please wait!');
        },
        success: function () {

            toastr.success("Success");
                $(table_id).DataTable().ajax.reload();


        },
        error: function (e) {
            error = $.parseJSON(e.responseText);

            toastr.error(error, "failed!");
                $(table_id).DataTable().ajax.reload();


        }
    });
};

function validation(rulz, form=$("#form_add"), table_id="#m_table_1") {

 

    x = form.validate({
        rules: rulz,
        submitHandler: function (e) {
            form.ajaxSubmit({

                beforeSubmit: function (arr, $form, options) {
                    toastr.warning('Please wait!');
                },
                success: function (e) {
                    toastr.success("Success");
                $(table_id).DataTable().ajax.reload();

                },
                error: function (e) {
                    error = $.parseJSON(e.responseText);
                    var errors = "";
                    $.each(error, function (index, value) {

                        errors += value + "<br>";
                    });

                    toastr.error(errors, "Invalid data!");

                }
            });
        }
    });
    return x;
}

