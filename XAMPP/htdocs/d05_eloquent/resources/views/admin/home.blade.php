<style>
    #row{
        margin-top: 10%;
    }


</style>

@extends('admin-layout.layout')
@section('title','Home Admin')
@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small card -->
       
        </div>
          <div class="col-lg-3 col-6"  id="row">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$countbook}}</h3>

                <p>Kho sách</p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-cart"></i>
              </div>
              <a href="{{url('admin/book')}}" class="small-box-footer">
                Xem thông tin <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-6"  id="row">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$countuser}}</h3>

                <p>Quản lý nhân sự</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="{{url('admin/user')}}" class="small-box-footer">
                Xem thông tin <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small card -->
            
          </div>

        </div>
       

@endsection

@section('script-section')
<script>
  sessionStorage.setItem("name", "{{$name}}");
  sessionStorage.setItem("image", "{{$image}}");
</script>
@endsection


