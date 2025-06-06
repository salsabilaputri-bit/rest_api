<?php
function get_CURL($url)
{
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $result = curl_exec($curl);
  curl_close($curl);
  
  return json_decode($result, true);
}

$result = get_CURL('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UCcOTQHfcdKdbornwL8qlemA&key=AIzaSyCRxWs-COjDPN48bARcZawPmT1OTcVF9fA');



$youtubeProfilePic = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
$channelName = $result['items'][0]['snippet']['title'];
$subscriber = $result['items'][0]['statistics']['subscriberCount'];

//latest video
$urlLatestVideo = 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyCRxWs-COjDPN48bARcZawPmT1OTcVF9fA&channelId=UCcOTQHfcdKdbornwL8qlemA&maxResults=1&order=date&part=snippet';
$result = get_CURL($urlLatestVideo);
$latestVideoId = $result['items'][0]['id']['videoId'];

// ig API
$clientID = "9203722016396473";
$accessToken = "IGACCyvIVmFLlBZAE4tYXNxckEyeWxnaEZAlSHcyeXIwMktLeWl1YkRYdUltY0hvQUJwZAW9FNjRSeV9BYVV1ZAzMycFBmSEw1UWR4cENYZAzlOR3dFNTN6QnhKazYxSXYwLWJwdGpLSXg5NHc3YldPNnQ0YmFqYzFPWk4xeEx6RGN4cwZDZD";

$result2 = get_Curl("https://graph.instagram.com/v22.0/me?fields=username,profile_picture_url,followers_count&access_token=$accessToken");

$usernameIG = $result2['username'];
$profilePictureIG = $result2['profile_picture_url'];
$followersIG = $result2['followers_count'];

// media ig
$resultGambar1 = get_Curl("https://graph.instagram.com/v22.0/17994840023800397?fields=media_url&access_token=$accessToken");
$resultGambar2 = get_Curl("https://graph.instagram.com/v22.0/18124699732400843?fields=media_url&access_token=$accessToken");
$resultGambar3 = get_Curl("https://graph.instagram.com/v22.0/18062119580277860?fields=media_url&access_token=$accessToken");
$resultGambar4 = get_Curl("https://graph.instagram.com/v22.0/18065150363088618?fields=media_url&access_token=$accessToken");
$resultGambar5 = get_Curl("https://graph.instagram.com/v22.0/18508331911017916?fields=media_url&access_token=$accessToken");
$resultGambar6 = get_Curl("https://graph.instagram.com/v22.0/18102822721532713?fields=media_url&access_token=$accessToken");

$gambar1 = $resultGambar1['media_url'];
$gambar2 = $resultGambar2['media_url'];
$gambar3 = $resultGambar3 ['media_url'];
$gambar4 = $resultGambar4 ['media_url'];
$gambar5 = $resultGambar5 ['media_url'];
$gambar6 = $resultGambar6 ['media_url'];

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>My Portfolio</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#home">Salsabila Putri</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#social-media">Social Media</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#portfolio">Portfolio</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <section id="home" class="bg-pink-lighter py-5">
  <div class="container">
    <div class="text-center">
      <img src="img/salsa.jpg" class="rounded-circle img-thumbnail mb-3" alt="Salsabila Putri" width="200" height="200">
      <h1 class="display-4">Salsabila Putri</h1>
      <h3 class="lead">IT Student</h3>
    </div>
  </div>
</section>


    <!-- About -->
    <section class="about bg-light" id="about">
      <div class="container">
        <div class="row mb-4">
          <div class="col text-center">
            <h2>About</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-5">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus, molestiae sunt doloribus error ullam expedita cumque blanditiis quas vero, qui, consectetur modi possimus. Consequuntur optio ad quae possimus, debitis earum.</p>
          </div>
          <div class="col-md-5">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus, molestiae sunt doloribus error ullam expedita cumque blanditiis quas vero, qui, consectetur modi possimus. Consequuntur optio ad quae possimus, debitis earum.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Youtube & IG -->
     <section class="social bg-pink-lighter" id="social-media">
        <div class="container">
          <div class="row pt-4 mb-4">
            <div class="col text-center">
              <h2>Social Media</h2>
            </div>
          </div>

          <div class="row justify-content-center">
            <div class="col-md-5">
              <div class="row">
                <div class="col-md-4">
                 <img src="<?= $youtubeProfilePic; ?>" width="200" class="rounded-circle 
                 img-thumbnail"> 
                </div>
                <div class="col-md-8">
                  <h5><?= $channelName; ?></h5>
                  <p><?= $subscriber; ?> Subscribers</p>
                  <div class="g-ytsubscribe" data-channelid="UCcOTQHfcdKdbornwL8qlemA" data-layout="default"data-count="default"></div>
                </div>
              </div>
              <div class="row mt-3 pb-3">
                <div class="col">
                <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" 
                src="https://www.youtube.com/embed/<?= $latestVideoId; ?>" 
                allowfullscreen></iframe>
                </div>
                </div>
              </div>
            </div>

            <div class="col-md-5">
              <div class="row">
                <div class="col-md-4">
                  <img src="<?= $profilePictureIG; ?>" width="200" class="rounded-circle 
                  img-thumbnail">
                </div>
                <div class="col-md-8">
                  <h5><?= $usernameIG ?></h5>
                  <p><?= $followersIG ?> Followers</p>
                </div>
              </div>

              <div class="row mt-3 pb-3">
                <div class="col">
                  <div class="ig-thumbnail">
                    <img src="<?= $gambar1; ?>">
                  </div>
                  <div class="ig-thumbnail">
                    <img src="<?= $gambar2; ?>">
                  </div>
                  <div class="ig-thumbnail">
                    <img src="<?= $gambar3; ?>">
                  </div>
                  <div class="ig-thumbnail">
                    <img src="<?= $gambar4; ?>">
                  </div>
                  <div class="ig-thumbnail">
                    <img src="<?= $gambar5; ?>">
                  </div>
                  <div class="ig-thumbnail">
                    <img src="<?= $gambar6; ?>">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


    <!-- Portfolio -->
<section class="portfolio bg-light" id="portfolio">
  <div class="container">
    <div class="row pt-4 mb-4">
      <div class="col text-center">
        <h2>Portfolio</h2>
      </div>
    </div>
    <div class="row">
      <!-- Project WPU Movie -->
      <div class="col-12 col-md-6 mb-4 d-flex">
        <div class="card project-card h-100">
          <img class="card-img-top" src="img/thumbs/2.png" alt="Card image cap">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">WPU Movie</h5>
            <p class="card-text">Website pencarian film menggunakan OMDb API. Dibuat dengan PHP native dan Bootstrap.</p>
            <a href="http://localhost/rest_api/wpu-movie/" target="_blank" class="btn btn-secondary mt-auto">View Project</a>
          </div>
        </div>
      </div>
      
      <!-- Project WPU Hut -->
      <div class="col-12 col-md-6 mb-4 d-flex">
        <div class="card project-card h-100">
          <img class="card-img-top" src="img/thumbs/3.png" alt="Card image cap">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">WPU Hut</h5>
            <p class="card-text">Website pizza untuk melihat menu dengan PHP.</p>
            <a href="http://localhost/rest_api/wpu-hut/latihan1.php" target="_blank" class="btn btn-secondary mt-auto">View Project</a>
          </div>
        </div>
      </div>   
    </div>
  </div>
</section>



    <!-- Contact -->
    <section class="contact bg-light" id="contact">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Contact</h2>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-4">
            <div class="card bg-primary text-white mb-4 text-center">
              <div class="card-body">
                <h5 class="card-title">Contact Me</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
            
            <ul class="list-group mb-4">
              <li class="list-group-item"><h3>Location</h3></li>
              <li class="list-group-item">My Home</li>
              <li class="list-group-item">Komplek Wahana Kuranji</li>
              <li class="list-group-item">Padang, Indonesia</li>
            </ul>
          </div>

          <div class="col-lg-6">
            
            <form>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email">
              </div>
              <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" class="form-control" id="phone">
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" rows="3"></textarea>
              </div>
              <div class="form-group">
                <button type="button" class="btn btn-primary">Send Message</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </section>


    <!-- footer -->
    <footer class="bg-dark text-white mt-5">
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <p>Copyright &copy; 2018.</p>
          </div>
        </div>
      </div>
    </footer>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://apis.google.com/js/platform.js"></script>
  </body>
</html>