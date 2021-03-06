<link href="<?php echo base_url("assets/css/plugins/dataTables/datatables.min.css"); ?>" rel="stylesheet">

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2>Pengajar</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url() ?>home">Beranda</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Data Pengajar</strong>
                        </li>
                    </ol>
                </div>
            </div><br>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Data Pengajar
                        <div class="btn-group float-right" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
                            <a <?= $this->uri->segment(1) == '' || $this->uri->segment(2) == '' || $this->uri->segment(3) == 'active' ? 'class="btn btn-success btn-sm"' : 'class="btn btn-light"' ?> href="<?php echo base_url() ?>sa/pengajar/active" role="button">Aktif</a>
                            <a <?= $this->uri->segment(1) == '' || $this->uri->segment(2) == '' || $this->uri->segment(3) == 'disable' ? 'class="btn btn-success btn-sm"' : 'class="btn btn-light"' ?> href="<?php echo base_url() ?>sa/pengajar/disable" role="button">Non-Aktif</a>
                        </div>
                </div>
                <div class="card-body">
                    <?php echo $this->session->flashdata('pesan'); ?>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="10%">No.</th>
                                    <th>NIP</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Status</th>
                                    <th width="20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($pengajar as $value) : ?>
                                    <tr>
                                        <th scope="row"><?= $no ?></th>
                                        <td><?= $value['nip']; ?></td>
                                        <td><?= $value['nama']; ?></td>
                                        <?php if ($value['jenis_kelamin'] == '1') : ?>
                                            <td>Laki-Laki</td>
                                        <?php elseif ($value['jenis_kelamin'] == '2') : ?>
                                            <td>Perempuan</td>
                                        <?php endif; ?>
                                        <?php if ($value['status'] == '0') : ?>
                                            <td>Pending</td>
                                        <?php elseif ($value['status'] == '1') : ?>
                                            <td>Aktif</td>
                                        <?php endif; ?>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="<?php echo base_url() ?>sa/pengajar/detail_data/<?php echo $value['id_pengajar']; ?>" role="button">Detail</a>
                                            <a class="btn btn-danger btn-sm" href="<?php echo base_url() ?>sa/pengajar/hapus_data/<?php echo $value['user_id']; ?>" role="button">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th width="10%">No.</th>
                                    <th>NIP</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Status</th>
                                    <th width="20%">Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
</div>
<!-- End of Content Wrapper -->

<!-- Start of Modal Tambah Data -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open_multipart('sa/pengajar/proses_tambah_data'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label><strong>NIP</strong></label>
                    <input name="nip" type="number" placeholder="Masukkan NIP" class="form-control">
                </div>
                <div class="form-group">
                    <label><strong>Nama Lengkap</strong></label>
                    <input name="nama" type="text" placeholder="Masukkan Nama Lengkap" class="form-control">
                </div>
                <div class="form-group">
                    <label><strong>Jenis Kelamin</strong></label>
                    <select class="form-control" name="jenis_kelamin">
                        <option value="1">Laki-Laki</option>
                        <option value="2">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label><strong>Tempat Lahir</strong></label>
                    <input name="tempat_lahir" type="text" placeholder="Masukkan Tempat Lahir" class="form-control">
                </div>
                <div class="form-group">
                    <label><strong>Tanggal Lahir</strong></label>
                    <input name="tanggal_lahir" type="date" placeholder="Masukkan Tanggal Lahir" class="form-control">
                </div>
                <!--
                <div class="form-group">
                    <label><strong>Mata Pelajaran yang Diampu</strong></label>
                    <select class="form-control" name="matapelajaran_id" id="matapelajaran_id" required>
                        <?php foreach ($matapelajaran as $row) : ?>
                            <option value=" <?php echo $row['id_matapelajaran'] ?>"><?php echo $row['matapelajaran']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>-->
                <div class="form-group">
                    <label><strong>Agama</strong></label>
                    <select class="form-control" name="agama">
                        <option value="Islam">Islam</option>
                        <option value="Protestan">Protestan</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Khonghucu">Khonghucu</option>
                    </select>
                </div>
                <div class="form-group">
                    <label><strong>Alamat</strong></label>
                    <input name="alamat" type="text" placeholder="Masukkan Alamat" class="form-control">
                </div>
                <div class="form-group">
                    <label><strong>Foto</strong></label>
                    <input name="foto" type="file" class="form-control">
                </div>
                <div class="form-group">
                    <label><strong>Username</strong></label>
                    <input name="username" type="text" placeholder="Masukkan Username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label><strong>Password</strong></label>
                    <input name="password" type="password" value="smansatarajaya" placeholder="Masukkan Password" class="form-control" required>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>
<!-- End of Modal Tambah Data -->