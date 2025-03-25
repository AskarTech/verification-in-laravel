<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{asset('merchant-assets')}}/"
  data-template="vertical-menu-template-free"
>
  @include('merchant.partials.head')


  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

        @include('merchant.partials.sidebar')
       

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
           @include('merchant.partials.navbar')

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
              @yield('content')
            <!-- / Content -->

            <!-- Footer -->
            @include('merchant.partials.footer')
          
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    @include('merchant.partials.scripts')
  </body>
</html>
