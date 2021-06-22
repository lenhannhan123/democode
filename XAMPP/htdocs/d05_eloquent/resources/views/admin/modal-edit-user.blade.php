
<style>


    /* The Modal (background) */
    .modal {
    display: block; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    }

    /* The Close Button */
    .close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    }

    .close:hover,
    .close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
    }
</style>


<!-- The Modal -->
<div id="myModal" class="modal" >

<!-- Modal content -->
<div class="modal-content" data-aos="fade-up">
<span class="close">&times;</span>
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Thêm sách người dùng</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form role="form" action="{{url("admin/user/edit/edituser")}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}

    <input type="text" class="form-control" hidden id="input-group-text" name="id"  value="{{$user->id}}" placeholder="Nhập Tên người dùng">
    <div class="card-body">
        <div class="form-group">
            <label for="input-group-text">Tên người dùng</label>
            <input type="text" class="form-control" id="input-group-text" name="username"  value="{{$user->username}}" placeholder="Nhập Tên người dùng">
          </div>

          <div class="form-group">
            <label for="input-group-text">Mật khẩu</label>
            <input type="text" class="form-control" id="input-group-text" name="password"  value="{{$user->password}}" placeholder="Nhập Mật khẩu">
          </div>

          
          <div class="form-group">
            <label for="exampleInputFile">Hình ảnh</label>
            <br>
            <img src="{{asset("images/$user->userimage")}}" alt="" class='pic-in-list' style="width:100px" >
        </div>


      <div class="form-group">
        <label for="exampleInputFile">Chọn ảnh</label>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" name="image" class="custom-file-input" id="exampleInputFile" multiple accept='image/*'>
            <label class="custom-file-label" for="exampleInputFile">Tải ảnh</label>

            <script>
                // Add the following code if you want the name of the file appear on select
                $(".custom-file-input").on("change", function() {
                  var fileName = $(this).val().split("\\").pop();
                  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                });
            </script>

          </div>
        </div>
      </div>
      <div class="form-group">
        <br>
        <label for="input-group-text">Quyền trong hệ thống</label>
        <br>
        <select class="form-control" name="role"  >
            <option value="0" {{$user->role?"":"selected"}}>User</option>
            <option value="1" {{$user->role?"selected":""}}>Admin</option>

        </select>
      </div>
      
    <!-- /.card-body -->

        <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        </div>
  </form>
</div>
</div>

</div>

<script>
     AOS.init({
    duration: 500,
        });
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 


    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }
</script>






