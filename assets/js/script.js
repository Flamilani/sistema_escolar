function confirmDelete(title, id) {
    alert('delete');
    return confirm('Tem certeza de que vai deletar ' + title + ' ' + id + '?');
}

$(document).ready(function() {
    $("#flip").click(function() {
        $("#panel").slideToggle("slow");
    });
});

$(function() {
    $('#datetimepicker1').datetimepicker({
        format: 'DD/MM/YYYY'
    });
});

$(function() {
    $('[data-toggle="tooltip"]').tooltip()
});