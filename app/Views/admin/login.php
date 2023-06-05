    <div class="right_box">
        <div class="w-50 m-auto shadow p-3">
            <h3 align="center ">Login</h3>
            <?php
            if (isset($errors)) {
                echo  validation_list_errors();
            }
            ?>
            <form class="login_form" action="<?php echo base_url('admin/login') ?>" method="post">
                <input type="email" placeholder="email" class="login_formele" name="email" value="<?= set_value('email') ?>" required>
                <input type="password" placeholder="password" class="login_formele" name="password" value="<?= set_value('password') ?>" required>
                <a href="index.html">
                    <div class="login_btnsc">
                        <button class="login_btn">Login</button>
                    </div>
                </a>
                <p>
                    if You don't have account
                    <a href="<?= base_url('admin/signUp') ?>">
                        signUp
                    </a>
                </p>
            </form>
        </div>

    </div>
    </div>
    </div>
    </div>
    </section>