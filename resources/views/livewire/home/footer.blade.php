<footer class="footer-section">
  <div class="container relative">
    <div class="prime-img">
      <img src="{{ asset('images/performimgfour.png') }}" alt="Image" class="img-fluid" style="height: 9.375rem;">
    </div>

    <div class="row">
      <div class="col-lg-8">
        <div class="subscription-form">
          <h3 class="d-flex align-items-center">
            <span class="me-1">
              <img src="images/envelope-outline.svg" alt="Image" class="img-fluid">
            </span>
            <span>Subscribe to Newsletter</span>
          </h3>

          <form action="#" class="row g-3">
            <div class="col-auto">
              <input type="text" class="form-control" placeholder="Enter your name">
            </div>
            <div class="col-auto">
              <input type="email" class="form-control" placeholder="Enter your email">
            </div>
            <div class="col-auto">
              <button class="btn btn-primary">
                <span class="fa fa-paper-plane"></span>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="row g-5 mb-5">
      <div class="col-lg-4">
        <div class="mb-4 footer-logo-wrap">
          <a href="#" class="footer-logo">Flexzone</a>
        </div>
        <p class="mb-4">
          Flexzone Supplements is Sri Lanka's premier destination for authentic, high-quality supplements. Committed to excellence, we offer a wide range of trusted products to support your fitness goals. Choose Flexzone for the best in health and performance.
        </p>

        <ul class="list-unstyled custom-social">
          <li><a href="https://www.instagram.com/ahazfernando04/"><span class="fa fa-brands fa-facebook-f"></span></a></li>
          <li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
          <li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
          <li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
        </ul>
      </div>

      <div class="col-lg-8">
        <div class="row links-wrap">
          <div class="col-6 col-sm-6 col-md-3">
            <ul class="list-unstyled">
              <li><a href="#">About us</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Contact us</a></li>
            </ul>
          </div>

          <div class="col-6 col-sm-6 col-md-3">
            <ul class="list-unstyled">
              <li><a href="#">Support</a></li>
              <li><a href="#">Knowledge base</a></li>
              <li><a href="#">Live chat</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="border-top copyright">
      <div class="row pt-4">
        <div class="col-lg-6">
          <p class="mb-2 text-center text-lg-start">
            Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with Muscle by 
            <a href="https://www.linkedin.com/in/ahaz-fernando-11002720a/">Ahaz Fernando</a> Distributed By <a href="#">IGNITE.</a>
          </p>
        </div>

        <div class="col-lg-6 text-center text-lg-end">
          <ul class="list-unstyled d-inline-flex ms-auto">
            <li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
            <li><a href="#">Privacy Policy</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/tiny-slider.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
@livewireScripts
