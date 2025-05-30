function searchMovies() {
  $('#movie-list').html('');

  $.ajax({
    url: 'https://www.omdbapi.com/',
    type: 'get',
    dataType: 'json',
    data: {
      apikey: '46b6a1df',
      s: $('#search-input').val()
    },
    success: function (result) {
      if (result.Response === 'True') {
        let movies = result.Search;

        $.each(movies, function (i, data) {
          $('#movie-list').append(`
            <div class="col-md-4 mb-3">
              <div class="card">
                <img src="${data.Poster}" class="card-img-top" alt="Poster ${data.Title}" />
                <div class="card-body">
                  <h5 class="card-title">${data.Title}</h5>
                  <h6 class="card-subtitle mb-2 text-muted">${data.Year}</h6>
                  <a href="#" class="see-detail" data-toggle="modal" data-target="#exampleModal" data-id="${data.imdbID}" style="color: #007bff; text-decoration: none; cursor: pointer;">See Detail</a>
                </div>
              </div>
            </div>
          `);
        });

        $('#search-input').val('');
      } else {
        $('#movie-list').html(`
          <div class="col">
            <h1 class="text-center">${result.Error}</h1>
          </div>
        `);
      }
    }
  });
}

$('#search-button').on('click', function () {
  searchMovies();
});

$('#search-input').on('keyup', function (e) {
  if (e.key === 'Enter') {
    searchMovies();
  }
});

$('#movie-list').on('click', '.see-detail', function (e) {
  e.preventDefault();

  $.ajax({
    url: 'https://www.omdbapi.com/',
    dataType: 'json',
    type: 'get',
    data: {
      apikey: '46b6a1df',
      i: $(this).data('id')
    },
    success: function (movie) {
      if (movie.Response === 'True') {
        $('.modal-body').html(`
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-4">
                <img src="${movie.Poster}" class="img-fluid" alt="Poster ${movie.Title}" />
              </div>
              <div class="col-md-8">
                <ul class="list-group">
                  <li class="list-group-item h5 font-weight-bold">${movie.Title}</li>
                  <li class="list-group-item"><strong>Released:</strong> ${movie.Released}</li>
                  <li class="list-group-item"><strong>Genre:</strong> ${movie.Genre}</li>
                  <li class="list-group-item"><strong>Director:</strong> ${movie.Director}</li>
                  <li class="list-group-item"><strong>Actors:</strong> ${movie.Actors}</li>
                </ul>
              </div>
            </div>
          </div>
        `);
      } else {
        $('.modal-body').html('<p>Data film tidak ditemukan.</p>');
      }
    }
  });
});
