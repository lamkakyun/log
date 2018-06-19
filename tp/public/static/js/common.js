var common_module = (function ()
{

    var options = {};
    var init = function init(data)
    {
        options = data;
    };

    var submit_link = function submit_link(thisobj, more_data)
    {
        var url = thisobj.attr('data-url');

        eModal.confirm('sure?', 'TIPS').then(function() {
            $.ajax({
                url: url,
                type: 'POST',
                data: more_data ? more_data : {},
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
    };


    var submit_form = function (thisobj)
    {
        var form = thisobj.parent('form');
        _default_form_handler(form);
    };

    var _default_form_handler = function (form)
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
                        window.location.reload();
                    });
                }
            }
        });
    };

    var reset_iframe_height = function(iframe)
    {
        var iframe_height =  iframe.contentWindow.document.body.scrollHeight;
        $(iframe).css('height', iframe_height);
    };

    return {
        init: init,
        submit_link: submit_link,
        reset_iframe_height: reset_iframe_height,
        submit_form: submit_form,
    }
})();


var other_module = (function() {

    var options = {};

    var init = function (data) {
        options = data;
    };

    var edit_mission = function(thisobj) {
        var url = thisobj.attr('data-url');
        $('#iframe_modal').find('.modal-body > iframe').attr('src', url);
        $('#iframe_modal').modal('show');
        var iframe = $('#iframe_modal').find('iframe')[0];
        $(iframe).on('load', function(){
            common_module.reset_iframe_height(iframe);
        });
    };

    var modify_priority = function (thisobj) {
        var action = thisobj.attr('data-action');
        var priority = thisobj.parent().find('.task-priority').attr('data-priority');
        // console.log(action,priority);
        if (action == 'plus')
        {
            priority ++;
        }
        else
        {
            priority --;
        }
        common_module.submit_link(thisobj, {priority: priority});
    };

    return {
        init: init,
        edit_mission: edit_mission,
        modify_priority: modify_priority,
    };
})();