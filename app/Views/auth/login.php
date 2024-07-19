<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('content'); ?>

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>
                                <form action="/login" method="post" class="user">

                                    <?= csrf_field(); ?>

                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user <?= ((session('validation') && session('validation')->hasError('email'))) ? 'is-invalid' : '' ?>" id="email" name="email" placeholder="Enter Email Address...">

                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?php if (session('validation')) : ?>
                                                <?= session('validation')->getError('email'); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user <?= ((session('validation') && session('validation')->hasError('password'))) ? 'is-invalid' : '' ?>" id="password" name="password" placeholder="Password">

                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?php if (session('validation')) : ?>
                                                <?= session('validation')->getError('password'); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>

                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="/register">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<?= $this->endSection(); ?>