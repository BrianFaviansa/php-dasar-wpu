$(document).ready(function() {
    // hide search button
    $('#searchButton').hide();
    // event when keyword changed
    $('#keyword').on('keyup', function() {
        $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());
    });
}); 