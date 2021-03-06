
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">All Registered Users</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover " >
											<thead>
												<tr>
													<th>Sr no.</th>
													<th>Registered Email</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>Sr no.</th>
													<th>Registered Email</th>												
												</tr>
											</tfoot>
											<tbody id="userList"></tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Datatables -->
		<script src="<?php echo base_url()?>assets/admin_panel/js/core/jquery.3.2.1.min.js"></script>
		<script src="<?php echo base_url()?>assets/admin_panel/js/plugin/datatables/datatables.min.js"></script>
		<script src="<?php echo base_url()?>assets/admin_panel/libs/common.js"></script>
		<script src="<?php echo base_url()?>assets/admin_panel/libs/userProcess.js"></script>
		<script>
			get_user_list();
		</script>