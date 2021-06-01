    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                  <h3 class="mb-0">Logs</h3>
                
                </div>
                <div class="col-lg-6 col-5 text-right">  
                
                </div>
              </div>
              
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush " id="datatable">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">ID</th>
                    <th scope="col" class="sort" data-sort="status">username</th>
                    <th scope="col">description</th>
                    <th scope="col" class="sort" data-sort="completion">created date</th>
                  </tr>
                </thead>
                <tbody class="list">
                    
                      <?php if(!empty($logs)) foreach ($logs as $log) { ?>
                        <tr>
                            <td><?php echo $log->id; ?></td>
                            <td><?php echo $log->username; ?></td>
                            <td><?php echo $log->desc; ?></td>
                            <td ><?php echo $log->created_date; ?></td>
                        </tr>
                      <?php } ?>
                </tbody>
              </table>
            </div>
          
          </div>
        </div>
      </div>
    </div>
