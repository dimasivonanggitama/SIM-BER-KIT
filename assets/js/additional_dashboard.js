function additional_sidebarClose() {
	//document.getElementById("admin_sidebar").style.display = "none";
	//admin_sidebar.className = "additional_sidebar-mobile-close";
}

function additional_addVarietas(count, dataNamaMenuVarietas) {
	// increment the count
	count++;
	
	if (count - 1 == 1) {
		document.getElementById("btnAdd").href = "#varietas-tab-"+count;
	}
	
	// reset the count on html via hidden input form
	document.getElementById("input_hidden_count").value = count;
	
	//var nextTab 	= $('#addDataTab li').length + 1;
	
	// create the tab button bar
	$('<li><a class="border nav-link text-white" id="varietas-tab-'+count+'" href="#varietas-tab-content-'+count+'" data-toggle="tab" onclick="additional_changeAddVarietasTabButtonColor('+count+', '+count+')" style="background-color: dodgerblue;">Varietas '+count+'</a></li>').appendTo('#addDataTab');
	
	// create the tab content
	$('<div class="tab-pane fade" id="varietas-tab-content-'+count+'" role="tabpanel">tabcontent-'+count+'</div>').appendTo('#addTabContent');
	$(
		'<div class="form-group">'
			+'<label for="select_add_varietas-'+count+'">Nama Varietas<b class="text-danger">*</b></label>'
			+'<select class="form-control selectpicker" data-live-search="true" id="select_add_varietas-'+count+'" name="select_add_varietas-'+count+'" required>'
				+'<option disabled selected>- - Pilih Varietas - -</option>'
			+'</select>'
		+'</div>'
		+'<div class="form-group">'
			+'<label for="input_add_benihDasar-'+count+'">Benih Dasar<b class="text-danger">*</b></label>'
			+'<input class="form-control" id="input_add_benihDasar-'+count+'" name="input_add_benihDasar-'+count+'" placeholder="Masukkan Benih Dasar" type="number" required>'
		+'</div>'
		+'<div class="form-group">'
			+'<label for="input_add_benihPokok-'+count+'">Benih Pokok<b class="text-danger">*</b></label>'
			+'<input class="form-control" id="input_add_benihPokok-'+count+'" name="input_add_benihPokok-'+count+'" placeholder="Masukkan Benih Pokok" type="number" required>'
		+'</div>'
		+'<div class="form-group">'
			+'<label for="input_add_keterangan-'+count+'">Keterangan <small>(Opsional)</small></label>'
			+'<textarea class="form-control" id="input_add_keterangan-'+count+'" name="input_add_keterangan-'+count+'" placeholder="Masukkan Keterangan"></textarea>'
		+'</div>'
	).appendTo('#varietas-tab-content-'+count);
	for (i = 0; i < dataNamaMenuVarietas.length; i++) {
		$('<option value="'+dataNamaMenuVarietas[i]+'">'+dataNamaMenuVarietas[i]+'</option>').appendTo('#select_add_varietas-'+count);
	}
	
	// make the new tab active
	$('#addDataTab a:last').tab('show');
	
	// reset the btnAdd
	$('#btnAdd').remove();
	$('<li><a value="test" class="border bg-success nav-link text-white text-white" href="#" id="btnAdd" onclick="additional_addVarietas('+count+', dataNamaMenuVarietas)" style="line-height:0.8;"><small>Tambah<br>Varietas</small></a></li>').appendTo('#addDataTab');
	document.getElementById("btnAdd").href = "#varietas-tab-"+count;
	
	// make another tab inactive (tab button color)
	for (i = 1; i <= count; i++) {
		document.getElementById("varietas-tab-"+i).setAttribute("onClick", "additional_changeAddVarietasTabButtonColor("+i+", "+count+")");
		if (i == count) {
			document.getElementById("varietas-tab-"+i).style.backgroundColor = "dodgerblue";
		} else {
			document.getElementById("varietas-tab-"+i).style.backgroundColor = "#666D73";
		}
	}
}

function additional_changeAddVarietasTabButtonColor(row, totalRow) {
	//alert('button (i): '+i+', row: '+row+', totalRow: '+totalRow);
	for (i = 1; i <= totalRow; i++) {
		if (i == row) {
			document.getElementById("varietas-tab-"+i).style.backgroundColor = "dodgerblue";
		} else {
			//alert('(else) i: '+i+', row: '+row+', totalRow: '+totalRow);
			document.getElementById("varietas-tab-"+i).style.backgroundColor = "#666D73";
		}
	}
}

function additional_changeDeleteIDTabButtonColor_dataDistribusi(row, varietas) {
	if (document.getElementById("deleteIDTab-row-"+row+"-varietas-"+varietas).style.backgroundColor != "dodgerblue") {
		document.getElementById("deleteIDTab-row-"+row+"-varietas-"+varietas).style.backgroundColor = "dodgerblue";
		if (document.getElementById("deleteVarietasTab-row-"+row+"-varietas-"+varietas).style.backgroundColor == "dodgerblue") {
			document.getElementById("deleteVarietasTab-row-"+row+"-varietas-"+varietas).style.backgroundColor = "#666D73";
		}
	}
}

function additional_changeDeleteVarietasTabButtonColor_dataDistribusi(row, varietas) {
	if (document.getElementById("deleteVarietasTab-row-"+row+"-varietas-"+varietas).style.backgroundColor != "dodgerblue") {
		document.getElementById("deleteVarietasTab-row-"+row+"-varietas-"+varietas).style.backgroundColor = "dodgerblue";
		if (document.getElementById("deleteIDTab-row-"+row+"-varietas-"+varietas).style.backgroundColor == "dodgerblue") {
			document.getElementById("deleteIDTab-row-"+row+"-varietas-"+varietas).style.backgroundColor = "#666D73";
		}
	}
}

function additional_changeNamaKonsumenAndTanggalDistribusiTabButtonColor_dataDistribusi(row, varietas) {
	if (document.getElementById("namaKonsumenAndTanggalDistribusiTab-row-"+row+"-varietas-"+varietas).style.backgroundColor != "dodgerblue") {
		document.getElementById("namaKonsumenAndTanggalDistribusiTab-row-"+row+"-varietas-"+varietas).style.backgroundColor = "dodgerblue";
		if (document.getElementById("varietasTab-row-"+row+"-varietas-"+varietas).style.backgroundColor == "dodgerblue") {
			document.getElementById("varietasTab-row-"+row+"-varietas-"+varietas).style.backgroundColor = "#666D73";
		}
	}
}

function additional_changeVarietasTabButtonColor_dataDistribusi(row, varietas) {
	if (document.getElementById("varietasTab-row-"+row+"-varietas-"+varietas).style.backgroundColor != "dodgerblue") {
		document.getElementById("varietasTab-row-"+row+"-varietas-"+varietas).style.backgroundColor = "dodgerblue";
		if (document.getElementById("namaKonsumenAndTanggalDistribusiTab-row-"+row+"-varietas-"+varietas).style.backgroundColor == "dodgerblue") {
			document.getElementById("namaKonsumenAndTanggalDistribusiTab-row-"+row+"-varietas-"+varietas).style.backgroundColor = "#666D73";
		}
	}
}

function additional_countTotalBenih_dataDistribusi(row, varietas) {
	var benihDasar = Number(document.getElementById("input_edit_benihDasar-row-"+row+"-varietas-"+varietas).value);
	var benihPokok = Number(document.getElementById("input_edit_benihPokok-row-"+row+"-varietas-"+varietas).value);
	document.getElementById("input_disabled_totalBenih-row-"+row+"-varietas-"+varietas).value = benihDasar + benihPokok;
}

function additional_focusTambahKonsumen() {
	document.getElementById("tambahKonsumen").className = "card container additional_colorChanging-tambahKonsumen";
	setTimeout(additional_unfocusTambahKonsumen, 3000);
}

function additional_onLoad_dataDistribusi() {
	document.getElementById("varietas-tab-1").style.backgroundColor = "dodgerblue";
}

function additional_onModalDeleteOpened_dataDistribusi(row, varietas) {
	document.getElementById("deleteVarietasTab-row-"+row+"-varietas-"+varietas).style.backgroundColor = "dodgerblue";
	document.getElementById("deleteIDTab-row-"+row+"-varietas-"+varietas).style.backgroundColor = "#666D73";
}

function additional_onModalEditOpened_dataDistribusi(row, varietas) {
	document.getElementById("varietasTab-row-"+row+"-varietas-"+varietas).style.backgroundColor = "dodgerblue";
	document.getElementById("namaKonsumenAndTanggalDistribusiTab-row-"+row+"-varietas-"+varietas).style.backgroundColor = "#666D73";
}

function additional_sidebarOpen() {
	document.getElementById("admin_sidebar").style.display = "block";
	document.getElementById("admin_sidebar_button_close").style.display = "block";
}

function additional_unfocusTambahKonsumen() {
	document.getElementById("tambahKonsumen").className = "card container";
}

function changeFilterButtonColor() {
	if (document.getElementById("button_filter_dataKonsumen").style.backgroundColor != "dodgerblue") {
		document.getElementById("button_filter_dataKonsumen").style.backgroundColor = "dodgerblue";
		if (document.getElementById("button_urut_dataKonsumen").style.backgroundColor == "dodgerblue") {
			document.getElementById("button_urut_dataKonsumen").style.backgroundColor = "#666D73";
		}
	} else {
		document.getElementById("button_filter_dataKonsumen").style.backgroundColor = "#666D73";
	}
}

function changeUrutButtonColor() {
	if (document.getElementById("button_urut_dataKonsumen").style.backgroundColor != "dodgerblue") {
		document.getElementById("button_urut_dataKonsumen").style.backgroundColor = "dodgerblue";
		if (document.getElementById("button_filter_dataKonsumen").style.backgroundColor == "dodgerblue") {
			document.getElementById("button_filter_dataKonsumen").style.backgroundColor = "#666D73";
		}
	} else {
		document.getElementById("button_urut_dataKonsumen").style.backgroundColor = "#666D73";
	}
}
