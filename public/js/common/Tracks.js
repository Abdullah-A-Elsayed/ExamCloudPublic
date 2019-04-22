var tablename=document.currentScript.getAttribute("tablename"); //1
var authid=document.currentScript.getAttribute("authid"); //1
var authname=document.currentScript.getAttribute("authname");
//Update the path
$(updateBreadCrumb(authname));
var DatatablesDataSourceAjaxServer = function() {

	var initTable1 = function() {
		var table = $('#m_table_1');


		// begin first table
		table.DataTable({
			responsive: true,
			searchDelay: 500,
            processing: true,
            "ordering": false,
			ajax: tablename,
			columns: [

        {data: 'name' ,title: "name"},
        // {data: 'track' ,title: "track"},
        // {data: 'category' ,title: "category"},
				{data: 'created_at' ,title: "Creation date"},
				{data: 'Actions',title: "Actions"},
			],
			columnDefs: [
				{
					targets: -1,
					title: 'Actions',
					orderable: false,
					render: function(data, type, full, meta) {
                        // if (full.status == "approved") {

                        //     status = '<a class="dropdown-item" onclick="delete_item(\'' + full._id + '\')" href="javascript:;"><i class="la la-ban"></i> suspend</a>'

                        // } else {
                        //     status = '<a class="dropdown-item" onclick="delete_item(\'' + full._id + '\' )" href="javascript:;"><i class="la la-check-circle"></i> approve</a>'
                        // }
                        // status = '<a class="dropdown-item" target="_blank" href="?view=AuthProfile&id='` + full._id + `'"><i class="la la-check-circle"></i> Solve the question</a>'
                        status = '<a id="view" href="/showAuth/' + full._id + '" class="dropdown-item" > View Authority</a>'

                        return `
                        <span class="dropdown">
                            <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true">
                              <i class="la la-ellipsis-h"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                `+status+`
                            </div>
                        </span>
                        <a href="#" onclick="fill_portlet('` + full._id + `')"  class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">
                          <i class="la la-edit"></i>
                        </a>
                        `;
					},
				},
				{
					targets: 0,
					title: 'Names',
					orderable: false,
					render: function(data, type, full, meta) {
												// if (full.status == "approved") {

												//     status = '<a class="dropdown-item" onclick="delete_item(\'' + full._id + '\')" href="javascript:;"><i class="la la-ban"></i> suspend</a>'

												// } else {
												//     status = '<a class="dropdown-item" onclick="delete_item(\'' + full._id + '\' )" href="javascript:;"><i class="la la-check-circle"></i> approve</a>'
												// }
												// status = '<a class="dropdown-item" target="_blank" href="?view=AuthProfile&id='` + full._id + `'"><i class="la la-check-circle"></i> Solve the question</a>'
												status = `<a id="view" href="?view=Tracks&id=` + full._id + `&name=`+full.name+`" class="dropdown-item">`+full.name+`</a>`
												return status;

					},
				},
			],
		});
		return table;
	};

	return {

		//main function to initiate the module
		init: function() {
			return initTable1();
		},

	};

}();

var table_reload;
jQuery(document).ready(function() {
    table_reload=DatatablesDataSourceAjaxServer.init();
    validation( {});

});
