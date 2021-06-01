    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                  <h3 class="mb-0">Contacts</h3>
                
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
                    <th scope="col" class="sort" data-sort="completion">created date</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                    
                      <?php if(!empty($contacts)) foreach ($contacts as $contact) { ?>
                        <tr>
                            <td><?php echo $contact->id; ?></td>
                            <td><?php echo $contact->name; ?></td>
                            <td ><?php echo $contact->created_date; ?></td>
                            <td >
                              <a href="<?php echo base_url(); ?>user_loop/contact/<?php echo $contact->id; ?>"  class="btn btn-success btn-circle btn-outline"><i class="ni ni-single-02"></i></a>
                              <a href="#editModal" data-toggle="modal" class="btn btn-success btn-circle btn-outline open-editcontactModal" data-id='<?php echo $contact->id; ?>' data-name='<?php echo $contact->name; ?>' type="button"><i class="ni ni-ruler-pencil"></i></a>
                              <a href="#deleteModal" data-toggle="modal" class="btn btn-danger btn-circle  btn-outline open-deletecontactModal" data-id='<?php echo $contact->id; ?>' data-name='<?php echo $contact->name; ?>' type="button"><i class="fa fa-trash"></i></a>
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
        <h5 class="modal-title" id="exampleModalLabel">Add contact</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <?php echo form_open_multipart(base_url().'user_loop/add_contact_func');?>
      <div class="modal-body">
                <div class="form-group"><label>Full name</label> <input autocomplete="off" type="text" name="name" placeholder="Enter Full name" class="form-control" required="required"></div>
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
        <h5 class="modal-title" id="exampleModalLabel">Edit contact</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <?php echo form_open_multipart(base_url().'user_loop/edit_contact_func');?>
      <div class="modal-body">
                <div class="form-group"><label>Full name</label> <input autocomplete="off" type="text" name="name" id="edit_name" placeholder="Enter Full name" class="form-control" required="required"></div>
                <input type="hidden" name="id" id="edit_id">
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
        <h5 class="modal-title" id="exampleModalLabel">Delete contact</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <?php echo form_open_multipart(base_url().'user_loop/delete_contact_func');?>
      <div class="modal-body">
            <p>Are you sure you want to delete contact (<label id="delete_name"></label>)</p>
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

$(document).on("click", ".open-editcontactModal", function () {

     var id         = $(this).data('id');
     var name       = $(this).data('name');

     $("#edit_id").val( id );  
     $("#edit_name").val( name );  

    
});

$(document).on("click", ".open-deletecontactModal", function () {

     var id         = $(this).data('id');
     var name       = $(this).data('name');  
     $("#delete_id").val( id );  
     $("#delete_name").html( name ); 
});


</script>