<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Test CRUD Laravel - Junior Programmer</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf_token" content="{{ csrf_token() }}">
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,,500,600,700" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css">

        <style>
            @import 'https://code.highcharts.com/css/highcharts.css';
            .highcharts-pie-series .highcharts-point {
                stroke: #EDE;
                stroke-width: 2px;
            }
            .highcharts-pie-series .highcharts-data-label-connector {
                stroke: silver;
                stroke-dasharray: 2, 2;
                stroke-width: 2px;
            }

            .highcharts-figure, .highcharts-data-table table {
                min-width: 320px; 
                max-width: 600px;
                margin: 1em auto;
            }

            .highcharts-data-table table {
                font-family: Verdana, sans-serif;
                border-collapse: collapse;
                border: 1px solid #EBEBEB;
                margin: 10px auto;
                text-align: center;
                width: 100%;
                max-width: 500px;
            }
            .highcharts-data-table caption {
                padding: 1em 0;
                font-size: 1.2em;
                color: #555;
            }
            .highcharts-data-table th {
                font-weight: 600;
                padding: 0.5em;
            }
            .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
                padding: 0.5em;
            }
            .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
                background: #f8f8f8;
            }
            .highcharts-data-table tr:hover {
                background: #f1f7ff;
            }
        </style>
    </head>

    <body>
        <div class="container py-4">
            <div class="row">
                <div class="col-md-12">
                    <h2>Test Laravel CRUD - Junior Programmer</h2>
                </div>
            </div>
            <div class="row pt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="py-2 mb-0">Data Alumni Universitas YYY</h5>
                                </div>
                                <div class="col-md-4 text-right">
                                    <div class="btn-group">
                                        <a href="{{ route('alumni.export') }}" class="btn btn-info mr-2">
                                            Ekspor Data
                                        </a>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#alumniModal">
                                            Tambah Data
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="alumniTable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Jurusan</th>
                                        <th>Tanggal Lulus</th>
                                        <th>IPK</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Jurusan</th>
                                        <th>Tanggal Lulus</th>
                                        <th>IPK</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="row">
                                <div class="col-md-6">
                                    <figure class="highcharts-figure">
                                        <div id="container"></div>
                                    </figure>
                                </div>
                                <div class="col-md-6">
                                    <figure class="highcharts-figure">
                                        <div id="container2"></div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="alumniModal" tabindex="-1" role="dialog" aria-labelledby="alumniModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="alumniModalLabel">Tambah Data Alumni</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-form-label">Nama:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Jenis Kelamin:</label>
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input gender" type="radio" name="gender" id="gender1" value="Laki-laki" checked>
                                    <label class="form-check-label" for="gender1">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="gender2" value="Perempuan">
                                    <label class="form-check-label" for="gender2">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Jurusan:</label>
                            <select class="form-control" id="department" name="department">
                                <option value="Teknik Informatika">Teknik Informatika</option>
                                <option value="Sistem Informasi">Sistem Informasi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Tanggal Lulus:</label>
                            <div class='input-group date'>
                                <input type='text' id="graduation_date" name="graduation_date" class="form-control" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">IPK:</label>
                            <input type='number' id="ipk" name="ipk" class="form-control" required/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary" id="saveButton">Simpan Data</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="alumniEditModal" tabindex="-1" role="dialog" aria-labelledby="alumniEditModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="alumniEditModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-form-label">Nama:</label>
                            <input type="text" class="form-control" id="nameEdit" name="nameEdit" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Jenis Kelamin:</label>
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input genderEdit" type="radio" name="genderEdit" id="gender3" value="Laki-laki" checked>
                                    <label class="form-check-label" for="gender3">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="genderEdit" id="gender4" value="Perempuan">
                                    <label class="form-check-label" for="gender4">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Jurusan:</label>
                            <select class="form-control" id="departmentEdit" name="departmentEdit">
                                <option value="Teknik Informatika">Teknik Informatika</option>
                                <option value="Sistem Informasi">Sistem Informasi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Tanggal Lulus:</label>
                            <div class='input-group date'>
                                <input type='text' id="graduation_dateEdit" name="graduation_dateEdit" class="form-control" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">IPK:</label>
                            <input type='number' id="ipkEdit" name="ipkEdit" class="form-control" required/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary" id="updateButton">Perbarui Data</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
        <script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/locales/bootstrap-datepicker.id.min.js"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>
        <script>
            $(document).ready( function () {
                var table = $('#alumniTable').DataTable({
                    "ServerSide": true,
                    ajax: {
                        "url": "{{ route('alumni.api') }}",
                        "dataSrc": "data"
                    },
                    "columns": [
                        { "data": "name", "orderable": true },
                        { "data": "gender", "orderable" : true },
                        { "data": "department", "orderable" : true },
                        { "data": "graduation_date", "orderable" : true },
                        { "data": "ipk", "orderable": true },
                        {
                            "render": function ( data, type, row, meta ) {
                                var id = row.id
                                return "<button type='button' id='editButton' data-toggle='modal' data-target='#alumniEditModal' class='btn btn-success mr-2' data-id='"+id+"'>Ubah</button><button type='button' class='btn btn-danger' id='deleteButton' data-id='"+id+"'>Hapus</button>"
                                console.log(data)
                            }
                        }
                    ],
                    "oLanguage": {
                        "sLengthMenu": "Tampilkan _MENU_ orang",
                        "sZeroRecords": "Belum ada alumni",
                        "sInfoEmpty": "Menampilkan 0 data",
                        "sInfoFiltered": "",
                        "sInfo": "Menampilkan _START_ - _END_ dari _TOTAL_ orang",
                        "sSearch": "Cari: ",
                        "oPaginate": {
                            "sNext": "Selanjutnya",
                            "sPrevious": "Sebelumnya",
                        }
                    },
                    stateSave: true
                });
                $("#saveButton").click(function(){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ route('alumni.store') }}",
                        type: 'POST',
                        data: {
                            name: $('#name').val(),
                            gender: $("input[name='gender']:checked").val(),
                            department: $('#department').val(),
                            graduation_date: $('#graduation_date').val(),
                            ipk: $('#ipk').val()
                        },
                        success: function(result){
                            console.log(result)
                            document.getElementById('name').value = "";
                            document.getElementById('graduation_date').value = "";
                            document.getElementById('ipk').value = "";
                            $('#alumniModal').modal('toggle');
                            table.ajax.reload()
                        }
                    });
                });
                $(document).on("click", "#editButton", function (){
                    var id = $(this).data('id')
                    $.ajax({
                        url: "/api/alumniapi/detail/"+id,
                        type: 'GET',
                        success: function(data){
                            $('#alumniEditModalLabel').text("Ubah Data " + data.data.name);
                            document.getElementById('nameEdit').value = data.data.name;
                            if (data.data.gender == "Laki-laki") {
                                document.getElementById('gender3').checked = true;   
                            }
                            else {
                                document.getElementById('gender4').checked = true;
                            }
                            document.getElementById('departmentEdit').value = data.data.department;
                            document.getElementById('graduation_dateEdit').value = data.data.graduation_date;
                            document.getElementById('ipkEdit').value = data.data.ipk;
                        }
                    });
                    document.getElementById("updateButton").setAttribute('data-id' , id);
                });
                $(document).on("click", "#updateButton", function (){
                    var id = $(this).data('id')
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "/alumni/" + id,
                        type: 'PUT',
                        data: {
                            name: $('#nameEdit').val(),
                            gender: $("input[name='genderEdit']:checked").val(),
                            department: $('#departmentEdit').val(),
                            graduation_date: $('#graduation_dateEdit').val(),
                            ipk: $('#ipkEdit').val()
                        },
                        success: function(result){
                            console.log(result)
                            document.getElementById('nameEdit').value = "";
                            document.getElementById('graduation_dateEdit').value = "";
                            document.getElementById('ipkEdit').value = "";
                            $('#alumniEditModal').modal('toggle');
                            table.ajax.reload()
                        }
                    });
                });
                $(document).on("click", "#deleteButton", function (){
                    var id = $(this).data('id')
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                        }
                    });
                    if (confirm("Yakin dihapus?") == true) {
                        $.ajax({
                            url: "/alumni/" + id,
                            type: 'DELETE',
                            data: {
                                id: id
                            },
                            success: function(result){
                                console.log(result)
                                table.ajax.reload()
                            }
                        });
                    }
                });
            });
            $('.date input').datepicker({
                language: 'id',
                format: 'yyyy-mm-dd'
            });
        </script>
        <script>
            $(document).ready( function () {
                fetchData();
            });
            var chartPie;
            var piechartalumni = {!! json_encode($piechartalumni) !!};
            var dtPie = [];
            var contentPie = [];
            for(var i in piechartalumni) {
                dtPie = [piechartalumni[i].gender, piechartalumni[i].total, "true"];
                contentPie.push(dtPie);
            }
            chartPie = new Highcharts.chart('container', {
                chart: {
                    styledMode: true
                },
                title: {
                    text: 'Statistik Alumni Berdasarkan Jenis Kelamin'
                },
                xAxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                },
                series: [{
                    type: 'pie',
                    allowPointSelect: true,
                    keys: ['name', 'y', 'selected', 'sliced'],
                    data: contentPie,
                    showInLegend: true
                }],
                events: {
                    load: fetchData
                }
            });
            function fetchData() {
                setInterval(function () {
                    $.ajax({
                        url: "{{ route('alumni.apipiechart') }}",
                        type: 'GET',
                        success: function(data) {
                            var dt = [];
                            var content = [];
                            for(var i in data) {
                                dt = [data[i].gender, data[i].total, "true"];
                                content.push(dt);
                            }
                            chartPie.series[0].setData(content);
                            chartPie.redraw();
                        },
                        cache: false
                    });
                    $.ajax({
                        url: "{{ route('alumni.apibarchart') }}",
                        type: 'GET',
                        success: function(data) {
                            var dt = [];
                            var content = [];
                            for(var i in data) {
                                dt = [data[i].gender, data[i].total, "true"];
                                content.push(dt);
                            }
                            chartBar.series[0].setData(content);
                            chartBar.redraw();
                        },
                        cache: false
                    });
                }, 5000);
            }
            var chartBar;
            var barchartalumni = {!! json_encode($barchartalumni) !!};
            var dtBar = {};
            var contentBar = [];
            var department = []
            for(var i in barchartalumni) {
                department.push(barchartalumni[i].department)
                dtBar = {
                    "name": barchartalumni[i].department,
                    "color": "blue",
                    "y": barchartalumni[i].total
                }
                contentBar.push(dtBar)
            }
            chartBar = Highcharts.chart('container2', {
                title: {
                    text: 'Statistik Alumni Berdasarkan Jurusan'
                },
                chart: {
                    type: 'column'
                },
                xAxis: {
                    categories: department
                },
                series: [{
                    data: contentBar
                }],
                events: {
                    load: fetchData
                }
            });
        </script>
    </body>
</html>
