$(document).ready(function () {
    $('.film').on('click', function (e) {
        e.preventDefault();
        const filmId = $(this).data('id');

        $.ajax({
            url: 'index.php',
            type: 'GET',
            data: {
                action: 'getFilmDetails',
                id: filmId
            },
            dataType: 'json',
            success: function (response) {
                $('#id').val(response.id);
                $('#title').val(response.title);
                $('#year').val(response.year);
                $('#rating').val(response.rating);
                $('#image').attr("src", response.image_url);
            },
            error: function (xhr, status, error) {
                alert('Error al obtener los datos de la película.');
                console.error('Error:', error);
            }
        })
    });
});