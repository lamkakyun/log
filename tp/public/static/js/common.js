var common_module = (function ()
{

    var options = [];
    var init = function init(data)
    {
        options = data;
    };

    var submit_link = function submit_link(thisobj)
    {
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
    };

    return {
        init: init,
        submit_link: submit_link
    }

})();
