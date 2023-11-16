@extends('layouts.app', ['page' => __('About Us'), 'pageSlug' => 'aboutus'])

@section('content')
<div class="row">
  <div class="col-md-8 ml-auto mr-auto">
    <div class="card card-upgrade">
      <div class="card-header text-center">
        <h4 class="card-title">About US</h3>
          <p class="card-category">Need help? Contact Our Social Media </p>
      </div>
      <div class="card-body">
        <div class="table-responsive table-upgrade">
          <table class="table">
            <tbody>
                <tr>
                  <td><h3 class="text-primary mb-0 mt-3">Instagram</h3></td>
                </tr>
                <tr>
                    <td>
                        <a href="https://www.instagram.com/akun-instagram-anda" target="_blank">
                            <i class="fab fa-instagram text-info"></i>
                            blabla.doctor
                        </a></td>
                    <td class="text-center">
                        <a href="https://www.instagram.com/akun-instagram-anda" target="_blank">
                            <i class="fab fa-instagram text-info"></i>
                        </a>
                  </td>
                  <td class="text-center"></td>
                </tr>
                <tr>
                    <td>
                        <h3 class="text-primary mb-0 mt-3">Contact</h3>
                    </td>
                </tr>
              <tr>
                    <td>No Telepon</td>
                    <td class="text-center">
                        <i class="fas fa-phone-alt"></i> <a href="tel:+628123456789" class="text-primary">+62 812-3456-789</a>
                    </td>
                    <td class="text-center"></td>
              </tr>
              <tr>
                    <td>
                        <h3 class="text-primary mb-0 mt-3">Email</h3>
                    </td>
                </tr>
                <tr>
                    <td>RS@gmail.com</td>
                    <td class="text-center">
                        <a href="mailto:RS@gmail.com" class="text-info">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </td>
                    <td class="text-center"></td>
                </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
