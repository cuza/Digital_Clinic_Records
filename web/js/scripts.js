/**
 * Created by dave on 15/5/16.
 */
(function($){
    var id = "#nav_"+document.location.pathname.split("/")[1],
        $nav=$(id);
    console.log(id,$nav);
    if($nav.length==0)
        $nav=$("#nav_home");
    $nav.parent().addClass('active');

    $("[data-mask]").inputmask();
})(jQuery);

$(document).ready(function() {
    $('#complementarios-table').DataTable({
        "oLanguage": {
            "sUrl": "/bower_components/datatables-plugins/i18n/Spanish.lang.json"
        }
    });
} );
