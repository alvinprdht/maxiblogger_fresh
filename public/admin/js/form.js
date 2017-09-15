
// console.log($(".ajaxForm").find(":input"));

$('.ajaxForm').submit(function(e){
    
    e.preventDefault();
    
    var fields = {};

    $(".ajaxForm").find(":input").each(function(){
        fields[this.name] = $(this).val();
    });

    console.log(fields);

    $.ajax({
        url: $(this).attr('action'),
        type: 'POST',
        cache: false,
        data: fields,
        success: function(result)
        {
            $(".form-error-message").remove();
            console.log(result.success)
            if(result.success != 'undefined')
            {
                $('#ajaxModal .modal-title').text('Success !'); 
                $('#ajaxModal .modal-body p').html(result.success);
                $('#ajaxModal').modal('show');
            }
            else
            {
                
                var count = Object.keys(result).length, errorMessage = '';
                
                var arr = $.map(result, function(el) { return el });

                // console.log($.parseJSON(result));
                
                // if(arr.length > 0)
                // {
                    // errorMessage = '<ul>';
                    // for(var i = 0; i < arr.length; i++)
                    // {
                        // console.log(arr)
                        // errorMessage += '<li>' + arr[i] + '</li>';
                    // }
                    // errorMessage += '</ul>';
                // }

                var i = 0;
                for (var x in result) {
                    // console.log(x)
                    $('#' + x).after('<b class="form-error-message">' + arr[i] + '</b>');
                    i++;
                }

                // $('#ajaxModal .modal-title').text('Error'); 
                // $('#ajaxModal .modal-body p').html(errorMessage);

            }
        }
    });
    $('#ajaxModal').on('hidden.bs.modal', function () {
        window.location.href = $('.ajaxForm').attr('after-submit');
    })
})