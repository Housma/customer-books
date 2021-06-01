    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                  <h3 class="mb-0">Addresses</h3>
                </div>
              </div>
              
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush " id="datatable">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="budget">Customer name</th>
                    <th scope="col" class="sort" data-sort="budget">Address</th>
                    <th scope="col" class="sort" data-sort="completion">Created date</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                      <?php if(!empty($addresses)) foreach ($addresses as $address) { ?>
                        <tr>
                            <td><?php echo $address->name; ?></td>
                            <td><?php echo $address->address; ?></td>
                            <td ><?php echo $address->created_date; ?></td>
                            <td >
                              <a href="<?php echo base_url(); ?>user_loop/contact/<?php echo $address->id; ?>"  class="btn btn-success btn-circle btn-outline"><i class="ni ni-single-02"></i></a>
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
