<div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-4 order-xl-2">
          <div class="card card-profile">
            <img src="<?php echo base_url();?>theme/assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="<?php echo base_url();?>theme/avatar.jpg" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              
            </div>
            <div class="card-body pt-0">
              <div class="text-center">
                <br/>
                <br/>
                <h5 class="h3">
                  <?php echo $contact->name; ?>
                </h5>
              
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Phones and addresses </h3>
                </div>
                <div class="col-4 text-right">  
                  <button class="btn btn-primary btn-circle" type="button"  data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i>
                  </button>
                </div>
               
              </div>
            </div>
            <div class="card-body">
            <h3>Phones</h3>
              <div class="table-responsive">
                <table class="table align-items-center table-flush " id="datatable">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" class="sort" data-sort="name">ID</th>
                      <th scope="col" class="sort" data-sort="budget">Phone</th>
                      <th scope="col" class="sort" data-sort="completion">created date</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody class="list">
                      
                        <?php if(!empty($phones)) foreach ($phones as $phone) { ?>
                          <tr>
                              <td><?php echo $phone->id; ?></td>
                              <td><?php echo $phone->phone; ?></td>
                              <td ><?php echo $phone->created_date; ?></td>
                              <td >
                               
                                <a href="#deleteModal" data-toggle="modal" class="btn btn-danger btn-circle  btn-outline open-deletePhoneModal" data-id='<?php echo $phone->id; ?>' data-name='<?php echo $phone->phone; ?>' type="button"><i class="fa fa-trash"></i></a>
                              </td>
                          </tr>
                        <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Addresses </h3>
                </div>
                <div class="col-4 text-right">  
                  <button class="btn btn-primary btn-circle" type="button"  data-toggle="modal" data-target="#addAddressesModal"><i class="fa fa-plus"></i>
                  </button>
                </div>
               
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table align-items-center table-flush " id="datatable2">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" class="sort" data-sort="name">ID</th>
                      <th scope="col" class="sort" data-sort="budget">Address</th>
                      <th scope="col" class="sort" data-sort="completion">created date</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody class="list">
                      
                        <?php if(!empty($addresses)) foreach ($addresses as $address) { ?>
                          <tr>
                              <td><?php echo $address->id; ?></td>
                              <td><?php echo $address->address; ?></td>
                              <td ><?php echo $address->created_date; ?></td>
                              <td >
                                <a href="#deleteAddressModal" data-toggle="modal" class="btn btn-danger btn-circle  btn-outline open-deleteAddressModal" data-id='<?php echo $address->id; ?>' data-name='<?php echo $address->address; ?>' type="button"><i class="fa fa-trash"></i></a>
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

    </div>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add contact's phone</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <?php echo form_open_multipart(base_url().'user_loop/add_contact_phone_func');?>
      <div class="modal-body">
          <div class="form-group"><label>Phone number</label> <input autocomplete="off" type="text" name="phone" placeholder="Enter Phone number" class="form-control" required="required"></div>
      </div>
      <input type="hidden" name="contact_id" value="<?php echo $contact->id; ?>">
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
        </form>
    </div>
  </div>
</div>

<div class="modal fade" id="addAddressesModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add contact's address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <?php echo form_open_multipart(base_url().'user_loop/add_contact_address_func');?>
      <div class="modal-body">
          <div class="form-group"><label>Address</label> <input autocomplete="off" type="text" name="address" placeholder="Enter Address" class="form-control" required="required"></div>
      </div>
      <input type="hidden" name="contact_id" value="<?php echo $contact->id; ?>">
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
        </form>
    </div>
  </div>
</div>


<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete contact's phone</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <?php echo form_open_multipart(base_url().'user_loop/delete_contact_phone_func');?>
      <div class="modal-body">
            <p>Are you sure you want to delete phone (<label id="delete_name"></label>)</p>
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


<div class="modal fade" id="deleteAddressModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete contact's address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <?php echo form_open_multipart(base_url().'user_loop/delete_contact_address_func');?>
      <div class="modal-body">
          <p>Are you sure you want to delete address (<label id="delete_address_name"></label>)</p>
          <input type="hidden" name="id" id="delete_address_id">
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
$(document).on("click", ".open-deletePhoneModal", function () {
     var id         = $(this).data('id');
     var name       = $(this).data('name');  
     $("#delete_id").val( id );  
     $("#delete_name").html( name ); 
});

$(document).on("click", ".open-deleteAddressModal", function () {
     var id         = $(this).data('id');
     var name       = $(this).data('name');  
     $("#delete_address_id").val( id );  
     $("#delete_address_name").html( name ); 
});
</script>
