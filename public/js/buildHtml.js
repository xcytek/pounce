function populateColorsTable(colors) {
    var table = $('#colors-list');
    var html = '<tr><td>#</td><td>Color</td><td>Valor Hexadecimal</td></tr>';

    // Display Colors in reverse (ASC)
    $.each(colors.reverse(), function(k, color) {
        html += '<tr><td>' + (k + 1) + '</td><td>' + color.color + '</td>';
        html += '<td>' + color.value + '<div class="block-color" style="background-color: ' + color.value + '"></div></td>';
    });

    table.append(html);
}

function showErrorMessage(error, message) {
    error.removeClass('hide');
    error.html(message);
}