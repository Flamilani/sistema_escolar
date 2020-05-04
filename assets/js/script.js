function confirmDelete(title, id) {
    return confirm('Tem certeza de que vai deletar ' + title + ' ' + id + '?');
}

$(document).ready(function() {
    $("#flip").click(function() {
        $("#panel").slideToggle("slow");
    });
});