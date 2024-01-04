<!DOCTYPE html>
<html lang="en">

<head>
    @include('Admin/header')
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <img src="/template/admin/images/logo.png" alt="logo">
              </div>
              <h4>QUẢN LÝ THƯ VIỆN</h4>
              @include('Admin.alert')
              <form class="pt-3" action="/register/create" method="post">
                <div class="form-group">
                    <label for="name">UserName</label>
                    <div class="input-group">
                      <div class="input-group-prepend bg-transparent">
                        <span class="input-group-text bg-transparent border-right-0">
                          <i class="mdi mdi-account-outline text-primary"></i>
                        </span>
                      </div>
                      <input type="text" name="name" class="form-control form-control-lg border-left-0" id="name" placeholder="UserName">
                    </div>
                  </div>
                <div class="form-group">
                  <label for="exampleInputEmail">Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="icon-mail text-primary"></i>
                      </span>
                    </div>
                    <input type="email" name="email" class="form-control form-control-lg border-left-0" id="email" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="password" name="password" class="form-control form-control-lg border-left-0" id="password" placeholder="Password">                        
                  </div>
                </div>
                <div class="form-group">
                  <label for="address">Địa chỉ</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="icon-map text-primary"></i>
                      </span>
                    </div>
                    <input type="text" name="address" class="form-control form-control-lg border-left-0" id="address" placeholder="Địa chỉ">
                  </div>
                </div>
                <div class="form-group">
                  <label for="CCCD">Căn cước công dân</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" name="CCCD" class="form-control form-control-lg border-left-0" id="CCCD" placeholder="CCCD">
                  </div>
                </div>
                <div class="my-3">
                  <button style="submit" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn" >Register</button>
                </div>
                <div class="mb-2 d-flex">
                  <button type="button" class="btn btn-facebook auth-form-btn flex-grow mr-1">
                    <i class="mdi mdi-facebook mr-2"></i>
                    Facebook
                  </button>
                  <button type="button" class="btn btn-google auth-form-btn flex-grow ml-1">
                    <i class="mdi mdi-google mr-2"></i>
                    Google
                  </button>
                </div>
                
                @csrf
              </form>
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2020  All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  @include('Admin.footer');
</body>

</html>