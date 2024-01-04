@extends('Admin.main')

@section('head')
<script src="//cdn.ckeditor.com/4.23.0-lts/standard/ckeditor.js"></script>
@endsection

@section('content')
<form class="pt-3" id="themUser" method="POST" action="" enctype="multipart/form-data">
    <div class='form-group'>
        <label for='name'>Tên Người Dùng</label>
        <input  type='text' name='name' class='form-control' id='name' value="{{ $users->name }}" placeholder='Tên Người Dùng'>
    </div>
    <div class ='form-group'>
        <label for='email'>Email</label>
        <input  type='email' name='email' class='form-control' id='email' value="{{ $users->email }}" placeholder='Email'>
    </div>
    <div class='form-group'>
        <label for='password'>Password</label>
        <input  type='text' name='password' class='form-control' id='password' value="{{ $users->password }}" placeholder='Password'>
    </div>
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
              {{-- {{ $user->sex==1?'checked=""':'' }}--}}>Nam</label> 
          </div>
        </div>
        <div class="col-sm-5">
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="sex" id="sex" value="0"
              {{--  {{ $user->sex==0 ? 'checked=""' : '' }}--}}>Nữ</label>
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

    <div class="form-group">
        <label for="active">Trạng Thái</label>
          <select class="form-control" id="active" name="active">
            @if($users->active==0)
            <option value="0">Không hoạt động</option>
            <option value="1">Hoạt động</option>
            @else
            <option value="1">Hoạt động</option>
            <option value="0">Không hoạt động</option>
            @endif
          </select>
    </div>
    {{-- <div class="form-group">
        <label for="role_id">Vai Trò</label>
          <select class="form-control" id="role_id" name="role_id">

            @foreach ($role_id as $role)
            <option value="{{ $role->id }}" {{ $users->role_id == $role->id ? 'selected' : '' }}>
                {{ $role->name }}</option>
            @endforeach
          </select>
    </div> --}}
    <button type='submit' class='btn btn-primary mr-2'>Save</button>
    <a href='/admin/users/list' type='submit' class='btn btn-light'>Cancel</a>

    @csrf
    
</form>
@endsection

@section('footer')

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
@endsection