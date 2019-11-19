<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'user';

$route['admin'] 								= 'adminController/index';
$route['dataKonsumen'] 							= 'adminController/dataKonsumen';
$route['dataKonsumen/(:num)'] 					= 'adminController/dataKonsumen';
$route['dataKonsumen_add'] 						= 'adminController/dataKonsumen_add';
$route['dataKonsumen_delete'] 					= 'adminController/dataKonsumen_delete';
$route['dataKonsumen_delete_all'] 				= 'adminController/dataKonsumen_delete_all';
$route['dataKonsumen_filter'] 					= 'adminController/dataKonsumen_filter';
$route['dataKonsumen_filter_reset'] 			= 'adminController/dataKonsumen_filter_reset';
$route['dataKonsumen_sort'] 					= 'adminController/dataKonsumen_sort';
$route['dataKonsumen_sort_reset'] 				= 'adminController/dataKonsumen_sort_reset';
$route['dataKonsumen_update'] 					= 'adminController/dataKonsumen_update';
$route['dataVarietasBenihSumberJeruk'] 			= 'adminController/getDataVarietasBenihSumberJeruk';
$route['dataVarietasBenihSumberJeruk/(:num)'] 	= 'adminController/getDataVarietasBenihSumberJeruk';
$route['deleteData/(:any)/(:any)']				= 'adminController/deleteData';
$route['editDataTable/(:any)'] 					= 'adminController/editDataTable';
$route['filterTable/(:any)'] 					= 'adminController/filterTable';
$route['infoVarietasBenihSumberJeruk'] 			= 'user/getInformasiVarietas';
$route['sortTable/(:any)'] 						= 'adminController/sortTable';
$route['postData/(:any)'] 						= 'adminController/postData';
$route['reset_filterTable/(:any)'] 				= 'adminController/reset_filterTable';
$route['reset_sortTable/(:any)'] 				= 'adminController/reset_sortTable';
$route['home'] 									= 'user/index';
$route['login'] 								= 'user/login';
$route['logout'] 								= 'adminController/logout';
$route['permintaan'] 							= 'user/permintaan';
$route['permintaan_add'] 						= 'user/permintaan_add';

$route['test'] 									= 'user/test_page';

// $route['admin/editNews'] 	= 'admin_Konten/editNews';
// $route['admin/ourClient'] 	= 'admin_Konten/addClient';
// $route['admin/getNews'] 	= 'admin_Konten/getNews';
// $route['admin/manageAccount'] 	= 'admin_Sistem/addAccount';
//$route['admin_Sistem/addNews'] = '/user/login';

//$route['default_controller'] = '';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;










/*
<tbody>
	<?php if ($countRows == "0") { ?>
		<td colspan="4"><h6 class="text-center text-danger">Maaf, hasil pencarian tidak ditemukan.</h6></td>
	<?php } else { ?>
		<?php $id_varietasBenihSumberJeruk = $this->uri->segment('3') + 1; ?>
		<?php foreach ($dataVarietasBenihSumberJeruk->result() as $row): ?>
			<tr class="border-bottom additional-selected-row" id="<?php echo $row->id_varietasBenihSumberJeruk; ?>">
				<th scope="row"><?php echo $row->id_varietasBenihSumberJeruk; ?></th>
				<td 
					<?php if ($this->session->userdata('filterOption_data') != NULL) { ?>
						<?php if ($this->session->userdata['filterOption_data']['filteredBy'] == "namaVarietasBenihSumberJeruk") { ?> 
							class="additional-selected-filter" 
						<?php } ?>
					<?php } ?>
					<?php if ($this->session->userdata('sortOption_data') != NULL) { ?>
						<?php if ($this->session->userdata['sortOption_data']['sortedBy'] == "namaVarietasBenihSumberJeruk") { ?> 
							class="additional-selected-sort" 
						<?php } ?> 
					<?php } ?> 
				>
					<?php echo $row->namaVarietasBenihSumberJeruk; ?>
				</td>
				<td>
					<a data-toggle="modal" data-target="#modal_dataKonsumen-edit-row-<?php echo $row->id_varietasBenihSumberJeruk; ?>" href="#"> 
						<div class="additional-table-edit-button" data-toggle="tooltip" data-placement="bottom" title="Edit">
						</div>
					</a>
					
					<!-- Modal for Edit dataVarietasBenihSumberJeruk -->
					<div class="modal fade" id="modal_dataKonsumen-edit-row-<?php echo $row->id_varietasBenihSumberJeruk; ?>" tabindex="-1" role="dialog" aria-labelledby="modalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="mdi mdi-pencil modal-title" id="modalCenterTitle"> Edit Data Konsumen</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true" class="text-danger">&times;</span>
									</button>
								</div>
								<form action="<?php echo base_url('dataKonsumen_update'); ?>" method="post">
									<div class="modal-body">
										<input type="hidden" name="hidden_input_id" value="<?php echo $row->id_varietasBenihSumberJeruk; ?>">
										<div class="form-group">
											<label for="input_edit_konsumen">Nama Konsumen<b class="text-danger">*</b></label>
											<input class="form-control" id="input_edit_konsumen" name="input_konsumen" type="text" value="<?php echo $row->nama_varietasBenihSumberJeruk; ?>" required>
										</div>
										<small class="form-text text-left text-muted">(<b class="text-danger">*</b>) Diharuskan untuk mengisi bagian formulir.</small>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal">Batalkan</button>
										<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</td>
				<td>
					<a data-toggle="modal" data-target="#modal_dataKonsumen-delete-row-<?php echo $row->id_varietasBenihSumberJeruk; ?>" href="#"> 
						<div class="additional-table-delete-button" data-toggle="tooltip" data-placement="bottom" title="Hapus">
						</div>
					</a>
					
					<!-- Modal for Delete dataVarietasBenihSumberJeruk per row -->
					<div aria-labelledby="modalLabel" aria-hidden="true" class="modal fade" id="modal_dataKonsumen-delete-row-<?php echo $row->id_varietasBenihSumberJeruk; ?>" role="dialog" tabindex="-1">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<form action="<?php echo base_url('dataKonsumen_delete'); ?>" method="post">
									<div class="modal-header">
										<h5 class="mdi mdi-delete modal-title" id="modalLabel"> Hapus Data Konsumen</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true" class="text-danger">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<input type="hidden" name="input_hidden_id" value="<?php echo $row->id_varietasBenihSumberJeruk; ?>">
										<p>Apakah anda yakin ingin menghapus Data Konsumen dengan ID="<b class="text-danger"><?php echo $row->id_varietasBenihSumberJeruk; ?></b>"?</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal">Batalkan</button>
										<button type="submit" class="btn btn-primary">Konfirmasi</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</td>
			</tr>
		<?php endforeach; ?>
	<?php } ?>
</tbody>
*/