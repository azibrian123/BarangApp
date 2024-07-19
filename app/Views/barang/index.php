<?= $this->extend('index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col">
            <a href="/barang/create" class="btn btn-primary my-3">Tambah Data</a>
            <table class="table">

                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashData('pesan'); ?>
                    </div>
                <?php endif ?>

                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Jenis Klasifikasi</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($barang as $d) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $d['nama']; ?></td>
                            <td><?= $d['klasifikasi']; ?></td>
                            <td><?= $d['jumlah']; ?></td>
                            <td>
                                <a href="/barang/edit/<?= $d['id']; ?>" class="btn btn-warning">Edit</a>

                                <form action="/barang/<?= $d['id']; ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>

                                    <input type="hidden" name="_method" value="DELETE">

                                    <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>