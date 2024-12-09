<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Buku</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Buku</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Buku</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-md btn-primary" onclick="tambahData()">
                    Tambah
                </button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-sm table-bordered table-striped" id="table-data">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Kode Buku</th>
                        <th>Nama Buku</th>
                        <th>Jumlah</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</section>

<div class="modal fade" id="form-data" style="display: none;" aria-hidden="true">
    <form action="action/bukuAction.php?act=save" method="post" id="form-tambah">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Buku</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kategori ID</label>
                        <select name="kategori_id" class="form-control" id="kategori_id" required>
                            <option value=""> Pilih Kategori ID </option>
                            <?php
                            require_once __DIR__ . '/../lib/Connection.php';

                            function getKategori()
                            {
                                global $db, $use_driver;
                                $query = "SELECT * FROM m_kategori ORDER BY kategori_nama ASC";
                                $kategori = [];

                                if ($use_driver == 'mysql') {
                                    $result = $db->query($query);
                                    while ($row = $result->fetch_assoc()) {
                                        $kategori[] = $row;
                                    }
                                } else if ($use_driver == 'sqlsrv') {
                                    $stmt = sqlsrv_query($db, $query);
                                    if ($stmt === false) {
                                        $errors = sqlsrv_errors();
                                        die("SQL Server Query Error: " . $errors[0]['message']);
                                    }
                                    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                                        $kategori[] = $row;
                                    }
                                }

                                return $kategori;
                            }

                            $kategori = getKategori();

                            if (!empty($kategori)):
                                foreach ($kategori as $k): ?>
                                    <option value="<?= htmlspecialchars($k['kategori_id']); ?>">
                                        <?= htmlspecialchars($k['kategori_nama']); ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <option value="">Kategori Tidak Ditemukan</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kode Buku</label>
                        <input type="text" class="form-control" name="buku_kode" id="buku_kode">
                    </div>
                    <div class="form-group">
                        <label>Nama Buku</label>
                        <input type="text" class="form-control" name="buku_nama" id="buku_nama">
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" id="jumlah">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="text" class="form-control" name="gambar" id="gambar">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    function tambahData() {
        $('#form-data').modal('show');
        $('#form-tambah').attr('action', 'action/bukuAction.php?act=save');
        $('#kategori_id, #buku_kode, #buku_nama, #jumlah, #deskripsi, #gambar').val('');
    }

    function editData(id) {
        $.ajax({
            url: 'action/bukuAction.php?act=get&id=' + id,
            method: 'post',
            success: function(response) {
                var data = JSON.parse(response);
                $('#form-data').modal('show');
                $('#form-tambah').attr('action', 'action/bukuAction.php?act=update&id=' + id);
                $('#kategori_id').val(data.kategori_id);
                $('#buku_kode').val(data.buku_kode);
                $('#buku_nama').val(data.buku_nama);
                $('#jumlah').val(data.jumlah);
                $('#deskripsi').val(data.deskripsi);
                $('#gambar').val(data.gambar);
            }
        });
    }

    function deleteData(id) {
        if (confirm('Apakah anda yakin?')) {
            $.ajax({
                url: 'action/bukuAction.php?act=delete&id=' + id,
                method: 'post',
                success: function(response) {
                    var result = JSON.parse(response);
                    if (result.status) {
                        tabelData.ajax.reload();
                    } else {
                        alert(result.message);
                    }
                }
            });
        }
    }

    var tabelData;
    $(document).ready(function() {
        tabelData = $('#table-data').DataTable({
            ajax: 'action/bukuAction.php?act=load',
        });

        $('#form-tambah').validate({
            rules: {
                kategori_id: {
                    required: true
                },
                buku_kode: {
                    required: true,
                    minlength: 3
                },
                buku_nama: {
                    required: true,
                    minlength: 5
                },
                jumlah: {
                    required: true,
                    digits: true
                },
                deskripsi: {
                    required: true
                },
                gambar: {
                    required: true
                }
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
            submitHandler: function(form) {
                $.ajax({
                    url: $(form).attr('action'),
                    method: 'post',
                    data: $(form).serialize(),
                    success: function(response) {
                        var result = JSON.parse(response);
                        if (result.status) {
                            $('#form-data').modal('hide');
                            tabelData.ajax.reload();
                        } else {
                            alert(result.message);
                        }
                    }
                });
            }
        });
    });
</script>