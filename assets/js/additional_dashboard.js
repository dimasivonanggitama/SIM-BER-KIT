function additional_sidebarClose() {
	//document.getElementById("admin_sidebar").style.display = "none";
	//admin_sidebar.className = "additional_sidebar-mobile-close";
}

function additional_focusTambahKonsumen() {
	document.getElementById("tambahKonsumen").className = "card container additional_colorChanging-tambahKonsumen";
	setTimeout(additional_unfocusTambahKonsumen, 3000);
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
