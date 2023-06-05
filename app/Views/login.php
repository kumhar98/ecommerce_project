<!--signup section start hare-->
<section class="Signup_section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="Signup_textsc">
                    <div class="Signup_lefttxtbox">
                        <img src="<?php echo base_url('assets/images/15.jpg') ?> " alt="" class="Signup_img">
                    </div>
                    <div class="Signup_righttxtbox">
                        <?php
                        if (isset($errors)) {
                            echo validation_list_errors();
                        }
                        ?>
                        <h3>Login</h3>

                        <form class="Signup_formsc text-center" action="<?php echo base_url('login') ?>" method="post">
                            <input type="text" placeholder="Email" class="Signup_input" name="email" value="<?= set_value('email') ?>" required>
                            <?php if (isset($emailErrors)) {
                                   echo "<span class='errors'>".$emailErrors."</span>";
                                } ?>
                            <div class="position-relative">
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                <input type="password" placeholder="Password" class="Signup_input" id="password-field" name="password" value="<?= set_value('password') ?>" required>
                                <?php if (isset($passwordErrors)) {
                                   echo "<span class='errors'>".$passwordErrors."</span>";
                                } ?>
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" class="Signup_passwordicon" fill="currentColor"
                                    class="bi bi-eye-slash" viewBox="0 0 16 16">
                                    <path
                                        d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z" />
                                    <path
                                        d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z" />
                                    <path
                                        d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z" />
                                </svg> -->
                            </div>
                            <button class="Signup_formbtn">Login</button>
                        </form>
                        <h5><a href="<?php echo base_url('signup') ?>">Need An Account <span></span></a></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>