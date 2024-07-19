<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('content'); ?>

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                </div>

                                <?php if (session()->getFlashdata('pesan')) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= session()->getFlashdata('pesan'); ?>
                                    </div>
                                <?php endif ?>

                                <form action="/register" class="user" method="post">

                                    <?= csrf_field(); ?>

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user <?= ((session('validation') && session('validation')->hasError('nama'))) ? 'is-invalid' : '' ?>" id="nama" placeholder="Nama" name="nama">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?php if (session('validation')) : ?>
                                                <?= session('validation')->getError('nama'); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user <?= ((session('validation') && session('validation')->hasError('nama'))) ? 'is-invalid' : '' ?>" id="email" placeholder="Email Address" name="email">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?php if (session('validation')) : ?>
                                                <?= session('validation')->getError('email'); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user <?= ((session('validation') && session('validation')->hasError('password'))) ? 'is-invalid' : '' ?>" id="password" placeholder="Password" name="password">

                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?php if (session('validation')) : ?>
                                                    <?= session('validation')->getError('password'); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user form-control-user <?= ((session('validation') && session('validation')->hasError('repassword'))) ? 'is-invalid' : '' ?>" id="repassword" placeholder="Repeat Password" name="repassword">

                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?php if (session('validation')) : ?>
                                                    <?= session('validation')->getError('repassword'); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary btn-user btn-block" type="submit">
                                        Register Account
                                    </button>

                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="/login">Already have an account? Login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>
    <?= $this->endSection(); ?>