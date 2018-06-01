function addEvent(thisobj)
{
    var form = thisobj.parent('form');
    _default_form_handler(form);
}


function addEventLog(thisobj)
{
    var form = thisobj.parent('form');
    _default_form_handler(form);
}


function _default_form_handler(form)
{
    $.ajax({
        url: form.attr('action'),
        type: 'POST',
        data: form.serialize(),
        dataType: 'JSON',
        success: function(ret)
        {
            $('#tip_modal').find('.modal-body > p').text(ret.msg);
            $('#tip_modal').modal('show');
            if (ret.success)
            {
                $('#tip_modal').on('hidden.bs.modal', function(){
                    location.reload();
                });
            }
        }
    });
}