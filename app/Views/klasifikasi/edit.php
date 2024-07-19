<?= $this->extend('index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-8">

            <form action="/klasifikasi/update/<?= $klasifikasi['id']; ?>" method="post">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="nama" class="col-sm-4 col-form-label">Nama Klasifikasi</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control <?= ((session('validation') && session('validation')->hasError('nama'))) ? 'is-invalid' : '' ?>" id="nama" name="nama" autofocus value="<?= (old('nama')) ? old('nama') : $klasifikasi['nama'] ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?php if (session('validation')) : ?>
                                <?= session('validation')->getError('nama'); ?>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </form>

        </div>
    </div>

</div>

<?= $this->endSection(); ?>