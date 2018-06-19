function addEvent(thisobj)
{
    submit_form(thisobj);
}


function addEventLog(thisobj)
{
    submit_form(thisobj);
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

function submit_form(thisobj)
{
    var form = thisobj.parent('form');
    _default_form_handler(form);
}


function submit_link(thisobj)
{
    eModal.confirm('sure?', 'TIPS').then(function() {
        var url = thisobj.attr('data-url');
        $.ajax({
            url: url,
            type: 'POST',
            data: {},
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
    });
}