@extends('Admin.main')


@section('content')
<div class="row mt-3">
    <div class="col-xl-3 d-flex grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
              <h4 class="card-title">Tổng Sách</h4>
              <div class="row">
                <div class="col-lg-3">
                  <p style="
                  font-size: 2rem;
                  margin-top: 30px;
                  margin-right: -100px;
                  color: red;"
                  >{{ $book_total }}</p>
                </div>
              </div>
            </div>
          </div>
    </div>
    <div class="col-xl-3 d-flex grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
            <h4 class="card-title">Số Phiếu Chờ Xác Nhận</h4>
            <div class="row">
              <div class="col-lg-3">
                <p style="
                font-size: 2rem;
                margin-top: 30px;
                margin-right: -100px;
                color: red;"
                >{{ $borrowing_load }}</p>
              </div>
            </div>
          </div>
        </div>
  </div>
    <div class="col-xl-3 d-flex grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
              <h4 class="card-title">Số Phiếu Đang Mượn</h4>
              <div class="row">
                <div class="col-lg-3">
                  <p style="
                  font-size: 2rem;
                  margin-top: 30px;
                  margin-right: -100px;
                  color: red;"
                  >{{ $borrowing }}</p>
                </div>
              </div>
            </div>
          </div>
    </div>
    <div class="col-xl-3 d-flex grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
              <h4 class="card-title">Sách Trễ hạn</h4>
              <div class="row">
                <div class="col-lg-3">
                  <p style="
                  font-size: 2rem;
                  margin-top: 30px;
                  margin-right: -100px;
                  color: red;"
                  >{{ $overdue }}</p>
                </div>
              </div>
            </div>
          </div>
    </div>
    <div class="col-xl-3 d-flex grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
              <h4 class="card-title">Số lượng Độc giả</h4>
              <div class="row">
                <div class="col-lg-3">
                  <p style="
                  font-size: 2rem;
                  margin-top: 30px;
                  margin-right: -100px;
                  color: red;"
                  >{{ $user_reader }}</p>
                </div>
              </div>
            </div>
          </div>
    </div>
  </div>
@endsection