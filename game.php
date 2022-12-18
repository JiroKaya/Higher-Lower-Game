<!DOCTYPE html>
<html data-wf-page="601dc67dcfaf86eacd51cccb" data-wf-site="601dc21703f3f853fe318d94">
<head>
  <meta charset="utf-8">
  <title>Game</title>
  <meta content="The spotify higher lower game" name="description">
  <meta content="Game" property="og:title">
  <meta content="The spotify higher lower game" property="og:description">
  <meta content="Game" property="twitter:title">
  <meta content="The spotify higher lower game" property="twitter:description">
  <meta property="og:type" content="website">
  <meta content="summary_large_image" name="twitter:card">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="css/styles.css" rel="stylesheet" type="text/css">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/webflow.css" rel="stylesheet" type="text/css">
  <link href="css/web-application-58fea2.webflow.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic"]  }});</script>
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link href="images/webclip.png" rel="apple-touch-icon">
</head>
<body class="body" onload="updateImages()">
  <div class="w-container">
    <div data-collapse="medium" data-animation="default" data-duration="400" role="banner" class="w-nav">
      <div class="container w-container">
        <a href="#" class="w-nav-brand"></a>
        <nav role="navigation" class="w-nav-menu">
          <a href="index.html" class="nav_link w-nav-link">Home</a>
          <a href="#" class="nav_link here w-nav-link">Play</a>
          </div>
        </nav>
      </div>
    </div>
  </div>
  <section>
    <div class="centered-container w-container">
      <h2 class="heading-4, text">Who is more popular?</h2>
	    <p class="description_pop">The popularity is calculated by algorithm and is based, in the most part, on the total number of plays the track has had and how recent those plays are.
      Generally speaking, songs that are being played a lot now will have a higher popularity than songs that were played a lot in the past.</p>
      <div class="cards-grid-container">
        <div>
          <div class='cards-image-mask'>
            <img src="" id="choice1" alt='' class='cards-image' height='255px' width='255px'/>
          </div>
          <h3 class='heading-3 text text-center' id="artistname1"></h3>
        </div>
        <div>
          <div class='cards-image-mask'>
            <img src="" id="choice2" alt='' class='cards-image' height='255px' width='255px'/>
          </div>
          <h3 class='heading-3 text text-center' id="artistname2"></h3>
        </div>
      </div>
      <h3 class='heading-3 text text-center'>Score</br><span id="current_score">0</span></h3>
    </div>
  </section>

  <script type="text/javascript">

	// First, we need to define a function that will make a request to the API to get the image data
  async function getImageData() {
    // Make a GET request to the API
    const response = await fetch('https://api.spotify.jirokaya.ch/game');

    // Parse the response as JSON
    const data = await response.json();

    // Return the image data
    return data;
  }

  // Next, we'll define a function that will update the images on the page with the new data
  async function updateImages() {
    // Get the image data from the API
    const imageData = await getImageData();

    // Get the image elements from the page
    const image1 = document.querySelector('#choice1');
    const image2 = document.querySelector('#choice2');

    // Update the src, alt, and number for each image
    image1.src = imageData[0].img_link;
    document.querySelector('#artistname1').textContent = imageData[0].name;
    localStorage.setItem("artist1score", imageData[0].pop_score);

    image2.src = imageData[1].img_link;
    document.querySelector('#artistname2').textContent = imageData[1].name;
    localStorage.setItem("artist2score", imageData[1].pop_score);
  }

  // Now we'll define a function that will be called when the user clicks on an image
  function onImageClick(event) {
    let score = document.querySelector('#current_score').textContent;

    // Get the data from localStorage
    const artist1Score = Number(localStorage.getItem('artist1score'));
    const artist2Score = Number(localStorage.getItem('artist2score'));

    // Get the index of the clicked image
    const clickedImageIndex = event.target.id === 'choice1' ? 0 : 1;

    // Get the popularity score of the clicked image
    const clickedImageScore = clickedImageIndex === 0 ? artist1Score : artist2Score;

    // Compare the popularity score of the clicked image to the other image
    const otherImageScore = clickedImageIndex === 0 ? artist2Score : artist1Score;
    if (clickedImageScore > otherImageScore) {
      // If the clicked image has a higher popularity score, increase the score by 1
      score++;
    } else {
      console.log("Wrong Choice")
      score = 0;
    }

    // Update the score on the page
    document.querySelector('#current_score').textContent = score;

    // Call the updateImages function and pass in the image data as an argument
    updateImages();
  }

  // Finally, we'll add event listeners to the image elements to call the onImageClick function when they are clicked
  const image1 = document.querySelector('#choice1');
  const image2 = document.querySelector('#choice2');

  image1.addEventListener('click', onImageClick);
  image2.addEventListener('click', onImageClick);

  </script>

  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=601dc21703f3f853fe318d94" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>