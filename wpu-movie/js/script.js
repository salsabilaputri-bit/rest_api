$('#search-button').on('click', function () {
   
    $.ajax({
        url: 'http://omdbapi.com',
        type: 'get',
        dataType: 'json',
        data: {
            'apikey' : '46b6a1df',
            's': $('#search-input').val()
        },
        success: function (result) {
           console.log(result);
        }
    });
});