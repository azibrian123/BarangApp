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

            <form action="/barang/save" method="post">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="nama" class="col-sm-4 col-form-label">Nama Barang</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control <?= ((session('validation') && session('validation')->hasError('nama'))) ? 'is-invalid' : '' ?>" id="nama" name="nama" autofocus value="<?= old('nama'); ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?php if (session('validation')) : ?>
                                <?= session('validation')->getError('nama'); ?>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>


                <div class="row mb-3">
                    <label for="klasifikasi" class="col-sm-4 col-form-label">Klasifikasi</label>

                    <div class="col-sm-8">
                        <select class="form-select <?= ((session('validation') && session('validation')->hasError('klasifikasi'))) ? 'is-invalid' : '' ?>" aria-label="Default select example" name="klasifikasi">
                            <option selected disabled>Open this select menu</option>
                            <?php foreach ($klasifikasi as $k) : ?>
                                <option value="<?= $k['id']; ?>"><?= $k['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?php if (session('validation')) : ?>
                                <?= session('validation')->getError('klasifikasi'); ?>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>

                <div class="row mb-3">
                    <label for="jumlah" class="col-sm-4 col-form-label">Jumlah</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control <?= ((session('validation') && session('validation')->hasError('jumlah'))) ? 'is-invalid' : '' ?>" id="jumlah" name="jumlah" autofocus value="<?= old('jumlah'); ?>" min="0">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?php if (session('validation')) : ?>
                                <?= session('validation')->getError('jumlah'); ?>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>

        </div>
    </div>

</div>

<?= $this->endSection(); ?>