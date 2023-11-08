    <!-- /.row -->
    <div class="row">
          <div class="col-12">
            <div class="card mt-5">
              <div class="card-header">
                <h3 class="card-title"><?= $title; ?></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                    Tambah
                </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table class="table table-hover text-nowrap" id="myTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Date Created</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach($user as $usr){ ?>
                      <tr>
                      <td><?= $no; ?></td>
                      <td><?= $usr->nama_user ?></td>
                      <td><?= $usr->username ?></td>
                      <td><?= $usr->password ?></td>
                      <td><?= $usr->date_created ?></td>
                      <td><button class ="btn btn-primary btn-edit" data-id="<?= $usr->id?>"><i class="fas fa-pencil-alt"></i></button>
                      <button class ="btn btn-danger btn-delete" data-id="<?= $usr->id?>"><i class="fas fa-trash"></i></button></td>
                      </tr>
                    <?php $no++; } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
   

      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Username</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form action ="<?php echo base_url('user/add_actions'); ?>" method="POST" id="addForm">
                <div class="modal-body">
                    <div class = "form-group">
                        <label>Nama User</label>
                        <input type ="text" class = "form-control" name="nama_user" placeholder="Masukkan Nama User">
                    </div>
                    <div class = "form-group">
                        <label>Username</label>
                        <input type = "text" class = "form-control" name="username" placeholder="Masukkan Username">
                    </div>
                    <div class = "form-group">
                        <label>Password</label>
                        <input type = "password" class = "form-control" name="password" placeholder="Masukkan Password">
                    </div>
 
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" id= "btnSubmit" class="btn btn-primary">Save</button>
                </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <div class="modal fade" id="modal-edit">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form action ="<?php echo base_url('user/add_actions'); ?>" method="POST" id="editForm">
                <div class="modal-body">
                  

                    <div class = "form-group">
                        <label>Nama User</label>
                        <input type="hidden" name="id" id="id">
                        <input type ="text" class = "form-control" name="nama_user" id="nama_user" namplaceholder="Masukkan Nama User">
                    </div>
                    <div class = "form-group">
                        <label>Username</label>
                        <input type = "text" class = "form-control" name="username" id="username" placeholder="Masukkan Username">
                    </div>
                    <div class = "form-group">
                        <label>Password</label>
                        <input type = "text" class = "form-control" name="password" id="password" placeholder="Masukkan Password">
                    </div>
                    
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" id= "btnEdit" class="btn btn-primary">Save</button>
                </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
              <script>
        $(document).ready(function(){
            $('#btnSubmit').click(function(){
              console.log('test')
            var formData = new FormData($('#addForm')[0]);
                $.ajax({
                    url:"<?php echo base_url('user/add_actions'); ?>",
                    type: "POST",
                    cache: false,
                    processData: false,
                    contentType : false,
                    data: formData,
                    dataType: 'json',
                    success: function(result){
                      console.log(result);
                        if(result.status == true){
                          Swal.fire({
                            title: "Success",
                            text: "Your data has been successfully saved",
                            icon: "success",
                            confirmButtonText: "Done",
                            customClass: {
                              confirmButton: "btn btn-primary"
                            }
                          }).then((result)=>{
                            window.location.reload();
                          });
                        }else{

                        }
                    },
                    error: function(xhr, status, error){

                    }
                });
            });

            $('.btn-edit').on("click", function(){
              var id = $(this).data('id');

              $.ajax({
                url:"<?php echo base_url('user/edit_user'); ?>",
                    type: "POST",
                    cache: false,
                    data: {
                      id:id
                    },
                    dataType: 'json',
                    success: function(result){
                      var data = result.data;
                      $('#nama_user').val(data.nama_user);
                      $('#username').val(data.username);
                      $('#password').val(data.password);
                      $('#id').val(data.id);
                      $('#date_created').val(data.date_created);
                      $('#modal-edit').modal('show');
                    }
              })

            })

            $('#btnEdit').click(function(){
              console.log('test')
            var formData = new FormData($('#editForm')[0]);
                $.ajax({
                    url:"<?php echo base_url('user/update'); ?>",
                    type: "POST",
                    cache: false,
                    processData: false,
                    contentType : false,
                    data: formData,
                    dataType: 'json',
                    success: function(result){
                      console.log(result);
                        if(result.status == true){
                          Swal.fire({
                            title: "Success",
                            text: "Your data has been successfully saved",
                            icon: "success",
                            confirmButtonText: "Done",
                            customClass: {
                              confirmButton: "btn btn-primary"
                            }
                          }).then((result)=>{
                            window.location.reload();
                          });
                        }else{

                        }
                    },
                    error: function(xhr, status, error){

                    }
                });
            });

            $('.btn-delete').on("click", function(){
              var id = $(this).data('id');

              Swal.fire({
                title:"Delete",
                text:"Do you want to permanently delete these files?",
                icon:"warning",
                showCancelButton:true
              }).then((result)=>{
                if (result.isConfirmed){

                  $.ajax({
                    url:"<?php echo base_url('user/delete'); ?>",
                    type: "POST",
                    cache: false,
                    data: {
                      id:id
                    },
                    dataType: 'json',
                    success: function(result){
                      console.log(result);
                        
                          Swal.fire({
                            title: "Success",
                            text: "Your data has been successfully saved",
                            icon: "success",
                            confirmButtonText: "Done",
                            customClass: {
                              confirmButton: "btn btn-primary"
                            }
                          }).then((result)=>{
                            window.location.reload();
                          });
                        

                        
                    }

                  })
                }
              })
              
              
            })
        });
      </script>