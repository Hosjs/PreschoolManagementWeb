<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-4">
            <div class="my-4 p-3 bg-light">

                <div>
                    <h4><i class="material-icons">lock_open</i>Đăng nhập</h4>
                    <hr />
                    <?php 
                    $this :: display_page_errors(); 
                    ?>
                    <form name="loginForm" action="<?php print_link('index/login/?csrf_token=' . Csrf::$token); ?>"
                        class="needs-validation form page-form" method="post">
                        <div class="input-group form-group">
                            <input placeholder="Tên đăng nhập" name="username" required="required" class="form-control"
                                type="text" />
                            <div class="input-group-append">
                                <span class="input-group-text"><i
                                        class="form-control-feedback material-icons">account_circle</i></span>
                            </div>
                        </div>

                        <div class="input-group form-group">

                            <input placeholder="Mật khẩu" required="required" v-model="user.password" name="password"
                                class="form-control " type="password" />
                            <div class="input-group-append">
                                <span class="input-group-text"><i
                                        class="form-control-feedback material-icons">lock</i></span>
                            </div>
                        </div>
                        <div class="row clearfix mt-3 mb-3">

                            <div class="col-6">
                                <label class="">
                                    <input value="true" type="checkbox" name="rememberme" />
                                    Ghi nhớ mật khẩu
                                </label>
                            </div>

                            <div class="col-6">
                                <a href="<?php print_link('passwordmanager') ?>" class="text-danger"> Quên mật khẩu?</a>
                            </div>

                        </div>

                        <div class="form-group text-center">
                            <button class="btn btn-primary btn-block btn-md" type="submit">
                                <i class="load-indicator">
                                    <clip-loader :loading="loading" color="#fff" size="20px"></clip-loader>
                                </i>
                                Đăng nhập <i class="material-icons">lock_open</i>
                            </button>
                        </div>
                        <hr />

                        <div class="text-center">
                            Không có tài khoản? <a href="<?php print_link("index/register") ?>"
                                class="btn btn-success">Đăng ký
                                <i class="material-icons">account_box</i></a>
                        </div>

                    </form>
                </div>


            </div>
        </div>
    </div>
</div>