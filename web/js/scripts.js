/**
 * Created by dave on 15/5/16.
 */
(function($){
    var id = "#nav_"+document.location.pathname.split("/")[1],
        $nav=$(id);
    console.log(id,$nav);
    $nav.parent().addClass('active');

    $("[data-mask]").inputmask();
})(jQuery);

$(document).ready(function() {
    $('#datatables-table').DataTable({
        "oLanguage": {
            "sUrl": "/bower_components/datatables-plugins/i18n/Spanish.lang.json"
        }
    });
} );
