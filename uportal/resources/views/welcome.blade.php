
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>UPortal</title>
    <!--Fav Icon-->
    <link rel="icon" href="https://dl.dropboxusercontent.com/s/anz6ejg73qeb5lh/robot.svg" type="image/x-icon"/>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://dl.dropboxusercontent.com/s/he9wnbcvpo8f2ni/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <!----------------modal section---------------------------->
    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-bug"></i> Under Development</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            This is currently under development but it shows that this is working when it's click.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary"  data-dismiss="modal">Got it</button>
          </div>
        </div>
      </div>
    </div>
    <section id="nav-bar">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" style="color: white;" href="#hero">UPortal <img src="https://dl.dropboxusercontent.com/s/anz6ejg73qeb5lh/robot.svg"></a>
                <button class="navbar-toggler" style="color: rgba(0, 0, 0, 0); border-color: rgba(0, 0, 0, 0);" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-center"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#hero">Home</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pricing">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about-us">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#footer">Contact Us</a>
                    </li>
                    <li>
                        <a href='{{ route('login') }}'><button class="btn btn-dark rounded-pill" style="width: 100px">Login</button></a>
                    </li>
                    </ul>
                    
                </div>
            </div>
            
        </nav>
    </section>
    <!------------------hero section-------------------------->
    <section id="hero">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="hero-title">UPORTAL CHATBOT</p>
                    <p>Hussle free access to university portal. The chatbot that can help students who don't have enough money to buy a data promo. Students can access the announcements, activities, resources, etc. without going to school portal.</p>
                    <a href="#" class="btn btn-light rounded-pill btn-lg chatbot-btn" onclick="botmanChatWidget.open();return false;">Try our Chatbot </a>
                </div>
                <div class="col-md-6 text-center">
                    <img src="https://dl.dropboxusercontent.com/s/kkqb0jy8x8rbf9s/hero-image.png" class="img-fluid">
                </div>
            </div>
        </div>
        <img src="https://dl.dropboxusercontent.com/s/3260jz8k1c7gbom/wave.png" class="bottom-img">
    </section>
    <!------------------feature section-------------------------->
    <section id="features">
        <div class="container">
            <!-- Section: Features v.4 -->
            <section class="my-5">

          <!-- Section heading -->
          <h1 class="title-design text-center">
            Why is it Great?
          </h1>
          <!-- Section description -->
          <p class="lead grey-text text-center w-responsive mx-auto mb-5">UPortal chatbot can run in different platforms like Facebook Messenger, Telegram, Discord and many more. As of now, Facebook Messenger platform
              is our top priority and here are the exciting and useful features that we can offer.
          </p>

          <!-- Grid row -->
          <div class="row">

            <!-- Grid column -->
            <div class="col-md-4">

              <!-- Grid row -->
              <div class="row mb-3">

                <!-- Grid column -->
                <div class="col-2">
                  <i class="fas fa-2x fa-user-graduate"></i>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-10">
                  <h5 class="font-weight-bold mb-3" style="color:#ffafbd;">Student Information</h5>
                  <p class="grey-text">Students can now access their different informations like Student ID, Name, Age, Address, and many more. No data promo no worries, our chatbot will handle all that things.
                  </p>
                </div>
                <!-- Grid column -->

              </div>
              <!-- Grid row -->

              <!-- Grid row -->
              <div class="row mb-3">

                <!-- Grid column -->
                <div class="col-2">
                  <i class="fas fa-2x fa-list-ol"></i>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-10">
                  <h5 class="font-weight-bold mb-3" style="color: #ffafbd">Grades</h5>
                  <p class="grey-text">If you need to check your Grades from first year college up to recent years then you are in the right place. Easily tap the command or you can type it if you want.</p>
                </div>
                <!-- Grid column -->

              </div>
              <!-- Grid row -->

              <!-- Grid row -->
              <div class="row mb-md-0 mb-3">

                <!-- Grid column -->
                <div class="col-2">
                  <i class="fas fa-2x fa-file-alt"></i>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-10">
                  <h5 class="font-weight-bold mb-3" style="color: #ffafbd">Student Actual Load (COR)</h5>
                  <p class="grey-text mb-md-0">If you forgot your COR at home then this is the best option for you. You can check your subjects, schedule and instructors.</p>
                </div>
                <!-- Grid column -->

              </div>
              <!-- Grid row -->

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 text-center">
              <img src="https://dl.dropboxusercontent.com/s/mu130g1wod6elly/feature.png" class="bottom-img">
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4">

              <!-- Grid row -->
              <div class="row mb-3">

                <!-- Grid column -->
                <div class="col-2">
                  <i class="fas fa-2x fa-volume-up"></i>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-10">
                  <h5 class="font-weight-bold mb-3" style="color: #ffafbd">Announcement</h5>
                  <p class="grey-text">If your instructors wants to connect with you via video conferencing or any forms, then you can check their announcements using our chatbot. Easy right?
                  </p>
                </div>
                <!-- Grid column -->

              </div>
              <!-- Grid row -->

              <!-- Grid row -->
              <div class="row mb-3">

                <!-- Grid column -->
                <div class="col-2">
                  <i class="fas fa-2x fa-file-signature"></i>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-10">
                  <h5 class="font-weight-bold mb-3" style="color: #ffafbd">Activities</h5>
                  <p class="grey-text">Students can access the activities and resources given by the instructors through this chatbot. The resources maybe a document file or a video link.</p>
                </div>
                <!-- Grid column -->

              </div>
              <!-- Grid row -->

              <!-- Grid row -->
              <!-- Grid row -->

            </div>
            <!-- Grid column -->

          </div>
          <!-- Grid row -->

        </section>
        <!-- Section: Features v.4 -->
                    </div>
                </div>
    </section>
    <!------------------pricing section-------------------------->
    <section id="pricing">
      <div class="container">
        <h2 class="h1-responsive font-weight-bold text-center my-5">Try our Chatbot</h2>
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="pricingTable">
                    <div class="pricingTable-header">
                        <h3 class="title">Basic</h3>
                    </div>
                    <div class="price-value">
                        <span class="currency">$</span>
                        <span class="amount">100</span>
                        <span class="duration">/mo</span>
                    </div>
                    <ul class="pricing-content">
                        <li>Up to 1000 Students</li>
                        <li>Full-Featured Bot</li>
                        <li>Data Security</li>
                        <li><del>Priority Support</del></li>
                        <li><del>Basic Reporting</del></li>
                        <li><del>Pro Community</del></li>
                    </ul>
                    <div class="pricingTable-signup">
                        <a href="#" data-toggle="modal" data-target="#modal">Sign Up</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="pricingTable blue">
                    <div class="pricingTable-header">
                        <h3 class="title">Professional</h3>
                    </div>
                    <div class="price-value">
                        <span class="currency">$</span>
                        <span class="amount">200</span>
                        <span class="duration">/mo</span>
                    </div>
                    <ul class="pricing-content">
                        <li>Up to 2000 Students</li>
                        <li>Full-Featured Bot</li>
                        <li>Data Security</li>
                        <li>Priority Support</li>
                        <li>Basic Reporting</li>
                        <li><del>Pro Community</del></li>
                    </ul>
                    <div class="pricingTable-signup">
                        <a href="#" data-toggle="modal" data-target="#modal">Sign Up</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="pricingTable purple">
                    <div class="pricingTable-header">
                        <h3 class="title">Enterprise</h3>
                    </div>
                    <div class="price-value">
                        <span class="currency">$</span>
                        <span class="amount">400</span>
                        <span class="duration">/mo</span>
                    </div>
                    <ul class="pricing-content">
                        <li>Up to 4000 Students</li>
                        <li>Full-Featured Bot</li>
                        <li>Data Security</li>
                        <li>Priority Support</li>
                        <li>Basic Reporting</li>
                        <li>Pro Community</li>
                    </ul>
                    <div class="pricingTable-signup">
                        <a href="#" data-toggle="modal" data-target="#modal">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
      </div>

    </section>
    <!------------------about us section-------------------------->
    <section id="about-us">
      <div class="container">
        <h1 class="title-design text-center">
            Why Choose Us?
        </h1>
        <div class="row">
          <div class="col-md-6 aboout-us">
            <p class="about-title">Why we're Different?</p>
            <ul class="list-display list-checkmarks">
              <li>To us, it's not just work - we take pride in the solutions we deliver.</li>
              <li>We are a team of down-to-earth designers and developers who are not interested in making a quick money.</li>
              <li>Our chatbot is structured to be on-time, within budget, and without surprises.</li>
              <li>We bring collaboration: we know how to bring people, technology and creativity together.</li>
            </ul>

          </div>
          <div class="col-md-6">
            <img src="https://dl.dropboxusercontent.com/s/g4bdd54x1vlkxr5/about-us.png" class="img-fluid">
          </div>
        </div>
      </div>
    </section>
    <!------------------social media section-------------------------->
    <section id="social-media">
      <div class="container text-center">
        <h1 class="text-center">FIND US ON SOCIAL MEDIA</h1>
        <div class="social-media-icons">
          <a href="#" data-toggle="modal" data-target="#modal"><img src="https://dl.dropboxusercontent.com/s/r7va9yy473et497/facebook.svg"></a>
          <a href="#" data-toggle="modal" data-target="#modal"><img src="https://dl.dropboxusercontent.com/s/yhnfsr4eymn9k11/instagram.svg"></a>
          <a href="#" data-toggle="modal" data-target="#modal"><img src="https://dl.dropboxusercontent.com/s/miuh19sagkvvi0z/twitter.svg"></a>
          <a href="#" data-toggle="modal" data-target="#modal"><img src="https://dl.dropboxusercontent.com/s/eclrmkxumwyan9y/whatsapp.svg"></a>
          <a href="#" data-toggle="modal" data-target="#modal"><img src="https://dl.dropboxusercontent.com/s/rvimu215w966c4j/linkedin.svg"></a>
          <a href="#" data-toggle="modal" data-target="#modal"><img src="https://dl.dropboxusercontent.com/s/1tky38fyy6reaoz/pinterest.svg"></a>
        </div>
      </div>
    </section>
    <!------------------footer section-------------------------->
    <section id="footer">
      <img src="https://dl.dropboxusercontent.com/s/fqn1swb5axcu1yj/wave-down.png" class="footer-img">
      <div class="container">
        <!-- Footer -->
            <footer class="page-footer font-small unique-color-dark">


              <!-- Footer Links -->
              <div class="container text-center text-md-left mt-5">

                <!-- Grid row -->
                <div class="row mt-3">

                  <!-- Grid column -->
                  <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

                    <!-- Content -->
                    <h6 class="text-uppercase font-weight-bold">UPortal</h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>Hussle free access to university portal. The chatbot that can help students who don't have enough money to buy a data promo.</p>

                  </div>
                  <!-- Grid column -->

                  <!-- Grid column -->
                  <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

                    <!-- Links -->
                    <h6 class="text-uppercase font-weight-bold">Products</h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>UPortal Chabot</p>

                  </div>
                  <!-- Grid column -->

                  <!-- Grid column -->
                  <!-- Grid column -->

                  <!-- Grid column -->
                  <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

                    <!-- Links -->
                    <h6 class="text-uppercase font-weight-bold">Contact</h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                      <i class="fas fa-home mr-3"></i> Carmen, Cagayan de Oro City</p>
                    <p>
                      <i class="fas fa-envelope mr-3"></i> 199ocero@gmail.com</p>
                    <p>
                      <i class="fas fa-phone mr-3"></i> +63 9322721987
                    </p>

                  </div>
                  <!-- Grid column -->

                </div>
                <!-- Grid row -->

              </div>
              <!-- Footer Links -->

              <!-- Copyright -->
              <div class="footer-copyright text-center py-3">© 2020 Copyright: UPortal Dev
              </div>
              <!-- Copyright -->

            </footer>
            <!-- Footer -->
      </div>
    </section>
</body>
<script>
    var botmanWidget = {
        frameEndpoint: '/botman/chat',
        title: 'UPortal Chatbot',
        introMessage: 'Hi, I am UPortal chatbot! You might wondering what message you should send in order to use this chatbot right? First, please type "Commands" and wait for reply.',
        mainColor: '#ffafbd',
        aboutLink: 'https://www.facebook.com/UPortalv1',
        aboutText: '⚡ Powered by UPortal Dev ⚡',
        headerTextColor: '#fff',
        bubbleAvatarUrl: '{{ asset('/img/logo.png') }}',
        bubbleBackground: '#ffafbd'
    };
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/316a509984.js"></script>
<script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
<script>
	var scroll = new SmoothScroll('a[href*="#"]', {
	speed: 1000
});
</script>
</html>