<!DOCTYPE html>
<html lang="en">
  <head>
    @include('livewire.admin.css')
    <style>
  .main-img-homepage {
    width: 100% !important;
    height: auto !important;
    max-width: 100% !important;
    display: block !important;
    margin: 0 auto !important;
  }

  .hero-img-wrap {
    width: 100% !important;
    text-align: center !important;
  }

  @media (min-width: 768px) {
    .main-img-homepage {
      width: 80% !important;
    }
  }

  @media (min-width: 992px) {
    .main-img-homepage {
      width: 70% !important;
    }
  }

  @media (min-width: 1200px) {
    .main-img-homepage {
      width: 60% !important;
    }
  }
</style>


  </head>
  <body>
    <div class="container-scroller">
      <!-- Start Admin NavBar-->
      @include('livewire.admin.navbar')
      <!-- End Admin NavBar -->
      
      <div class="container-fluid page-body-wrapper">
        <!-- Start Admin Upper NavBar -->
        @include('livewire.admin.header')
        <!-- End Admin Upper NavBar -->
        
        @include('livewire.admin.content')

        <!-- End page-body-wrapper -->
      </div>
      
      @include('livewire.admin.footer')
    </div>
  </body>
</html>
