/**
 * Created by dave on 15/5/16.
 */
(function($){
    $("[data-mask]").inputmask();
})(jQuery);

$(document).ready(function() {
    $('.table').DataTable({
        "oLanguage": {
            "sUrl": "/bower_components/datatables-plugins/i18n/Spanish.lang.json"
        }
    });
} );
