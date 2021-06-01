    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                  <h3 class="mb-0">Users</h3>
                
                </div>
                <div class="col-lg-6 col-5 text-right">  
                  <button class="btn btn-primary btn-circle" type="button"  data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i>
                  </button>
                </div>
              </div>
              
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush " id="datatable">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">ID</th>
                    <th scope="col" class="sort" data-sort="budget">name</th>
                    <th scope="col" class="sort" data-sort="status">username</th>
                    <th scope="col">level</th>
                    <th scope="col" class="sort" data-sort="completion">created date</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                    
                      <?php if(!empty($users)) foreach ($users as $user) { ?>
                        <tr>
                            <td><?php echo $user->id; ?></td>
                            <td><?php echo $user->name; ?></td>
                            <td><?php echo $user->username; ?></td>
                            <td ><?php if($user->level == 1) echo 'Admin' ;else echo 'Normal'; ?></td>
                            <td ><?php echo $user->created_date; ?></td>
                            <td >
                              <a href="#editModal" data-toggle="modal" class="btn btn-success btn-circle btn-outline open-editUserModal" data-id='<?php echo $user->id; ?>' data-name='<?php echo $user->name; ?>' data-username='<?php echo $user->username; ?>'  data-level='<?php echo $user->level; ?>' type="button"><i class="ni ni-ruler-pencil"></i></a>
                              <a href="#deleteModal" data-toggle="modal" class="btn btn-danger btn-circle  btn-outline open-deleteUserModal" data-id='<?php echo $user->id; ?>' data-name='<?php echo $user->name; ?>' type="button"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                      <?php } ?>
                </tbody>
              </table>
            </div>
          
          </div>
        </div>
      </div>
    </div>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <?php echo form_open_multipart(base_url().'admin_loop/add_user_func');?>
      <div class="modal-body">
                <div class="form-group"><label>Full name</label> <input autocomplete="off" type="text" name="name" placeholder="Enter Full name" class="form-control" required="required"></div>
                <div class="form-group"><label>Username</label> <input autocomplete="off" type="text" name="username" placeholder="Enter Username" class="form-control"required="required"></div>
                <div class="form-group"><label>Password</label> <input autocomplete="off" type="password" name="password" placeholder="Password" class="form-control"required="required"></div>
                <div class="form-group"><label>Level</label> 
                  <select name="level" class="form-control"required="required">
                      <option value="1">Admin</option>
                      <option value="2">Normal</option>
                  </select>
              </div>             
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
        </form>
    </div>
  </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <?php echo form_open_multipart(base_url().'admin_loop/edit_user_func');?>
      <div class="modal-body">
                <div class="form-group"><label>Full name</label> <input autocomplete="off" type="text" name="name" id="edit_name" placeholder="Enter Full name" class="form-control" required="required"></div>
                <div class="form-group"><label>Username</label> <input autocomplete="off" type="text" name="username" id="edit_username" placeholder="Enter Username" class="form-control"required="required"></div>
                <div class="form-group"><label>Password</label> <input autocomplete="off" type="password" name="password" id="edit_password"  placeholder="Leave it empty if you dont want change password" class="form-control" ></div>
                <input type="hidden" name="id" id="edit_id">
                <div class="form-group"><label>Level</label> 
                  <select name="level" id="edit_kind" class="form-control edit_kind_select" required="required">
                      <option value="1">Admin</option>
                      <option value="2">Normal</option>
                  </select>
                </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit</button>
      </div>
        </form>
    </div>
  </div>
</div>


<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <?php echo form_open_multipart(base_url().'admin_loop/delete_user_func');?>
      <div class="modal-body">
            <p>Are you sure you want to delete user (<label id="delete_name"></label>)</p>
                <input type="hidden" name="id" id="delete_id">
                                   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Delete</button>
      </div>
        </form>
    </div>
  </div>
</div>


<script src="<?php echo base_url();?>theme/assets/vendor/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
$(document).on("click", ".open-editUserModal", function () {

     var id         = $(this).data('id');
     var username   = $(this).data('username');
     var name       = $(this).data('name');
     var level       = $(this).data('level');

     $("#edit_id").val( id );  
     $("#edit_name").val( name );  
     $("#edit_username").val( username );  
     $("#edit_kind").val( level );  
     $("#edit_password").val( "" );  

    
});

$(document).on("click", ".open-deleteUserModal", function () {

     var id         = $(this).data('id');
     var name       = $(this).data('name');  
     $("#delete_id").val( id );  
     $("#delete_name").html( name ); 
});


</script>