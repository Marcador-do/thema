/* Raylin Codes Here */ ;
;(function($) {

    $(document).on('ready', function() {


        var _active = 'active',
            formUser = $("#user-edit-form");

        /** Tooltips  */

        if ($('[data-toggle="tooltip"]').length > 0) {

            $('[data-toggle="tooltip"]').tooltip();
        }
        $('.marcador-tabs .cat-items').on('click', function() {

            var inputCheck = $(this).find('.input-checkbox');

            if (inputCheck.is(":checked")) {
                inputCheck.removeAttr("checked");
                return false;
            }
            inputCheck.attr("checked", "checked");
            return false;
        });




        $('.showHidePass').on('click', function() {
            var passField = $(this).attr('data-passID'),
                _el = $('#' + passField);


            if (_el.attr('type') == 'password') {
                $(this).addClass(_active);
                _el.attr('type', 'text');
                return false;

            }
            $(this).removeClass(_active);
            _el.attr('type', 'password');
            return false;

        });


        /*** Generate Password ***/
        $(".generate-password").on("click", function() {
            var randomstring = Math.random().toString(36).slice(-8),
                fields = $($(this).attr("data-fields"));

            if (fields.length > 0) {
                fields.each(function() {
                    $(this).closest('.user-field').find(".showHidePass").click();
                    $(this).val(randomstring);
                });
            }
        })




    });




})(jQuery);