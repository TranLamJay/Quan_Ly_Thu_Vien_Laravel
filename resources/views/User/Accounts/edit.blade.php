<!doctype html>
<html class="no-js" lang="">

@include('User/header')

<script src="//cdn.ckeditor.com/4.23.0-lts/standard/ckeditor.js"></script>


<main id="tg-main" class="tg-main tg-haslayout">
    <div class="tg-sectionspace tg-haslayout">
        <h1 style="margin-left: 23%; margin-bottom: 2%;">Chỉnh sửa tài khoản</h1>
                <div class="container">
                    <div class="row">
                        <div id="tg-details-books" class="tg-details-books">
                            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
                                <div id="tg-content" class="tg-content">
                                    
                                    <form class="pt-3" method="POST" action="" enctype="multipart/form-data">
                                        <div class='form-group'>
                                            <label for='name'>Tên Người Dùng</label>
                                            <input  type='text' name='name' class='form-control' id='name' value="{{ $users->name }}" placeholder='Tên Người Dùng'>
                                        </div>
                                        <div class ='form-group'>
                                            <label for='email'>Email</label>
                                            <input  type='email' name='email' class='form-control' id='email' value="{{ $users->email }}" placeholder='Email'>
                                        </div>
                                        {{-- <div class='form-group'>
                                            <label for='password'>Password</label>
                                            <input  type='text' name='password' class='form-control' id='password' value="{{ $users->password }}" placeholder='Password'>
                                        </div> --}}
                                        <div class="form-group">
                                        <label for='file_upload'>Upload Hình</label>
                                        <input type="file" name='file_upload' class="form-control"  value="{{ $users->image }}">
                                        <a href="{{ url('/uploads/users') }}/{{ $users->image }}" target="_blank">
                                            <img src="{{ url('/uploads/users') }}/{{ $users->image }}" width="50" alt="">  
                                        </a>
                                        </div>
                                        <div class='form-group'>
                                            <label for='date_birth'>Ngày Sinh</label>
                                            <input  type='date' name='date_birth' class='form-control' id='date_birth' value="{{ $users->date_birth }}">
                                        </div>
                                        <label class="col-sm-3 col-form-label">Giới Tính</label>
                                        <div class="form-group row">
                                            <div class="col-sm-4">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="sex" id="sex" value="1" 
                                                {{ $users->sex==1?'checked=""':'' }}>Nam</label> 
                                            </div>
                                            </div>
                                            <div class="col-sm-5">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="sex" id="sex" value="0"
                                                {{ $users->sex==0 ? 'checked=""' : '' }}>Nữ</label>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='form-group'>
                                            <label for='address'>Địa Chỉ</label>
                                            <input  type='text' name='address' class='form-control' id='address' value="{!! $users->address !!}">
                                        </div>
                                    
                                        <div class ='form-group'>
                                            <label for='CCCD'>Căn Cước Công Dân</label>
                                            <input  type='text' name='CCCD' class='form-control' id='CCCD' value="{{ $users->CCCD }}" >
                                        </div>

                                        <button type='submit' class='btn btn-primary mr-2'>Update</button>
                                        <a href='/books' type='submit' class='btn btn-light'>Cancel</a>

                                        @csrf
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</main>


@include('User/footer')

<script>
  ClassicEditor
          .create( document.querySelector( '#dia_chi' ) )
          .then( editor => {
                  console.log( editor );
          } )
          .catch( error => {
                  console.error( error );
          } );
</script>
