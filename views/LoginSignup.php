<div class="container">
    <div class="error_div"></div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-login">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="#" class="active" id="login-form-link">Login</a>
                        </div>
                        <div class="col-xs-6">
                            <a href="#" id="register-form-link">Register</a>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="login-form" action="/site/login" method="post" role="form"
                                  style="display: block;">
                                <div class="form-group">
                                    <input type="text" name="username" id="username" tabindex="1" class="form-control"
                                           placeholder="Username" value="">
                                    <label id="username-error" class="error" for="username"
                                           style="display: inline-block;"></label>

                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" tabindex="2"
                                           class="form-control" placeholder="Password">
                                    <label id="password-error" class="error" for="password"
                                           style="display: inline-block;"></label>

                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="login-submit" id="login-submit" tabindex="4"
                                                   class="form-control btn btn-login" value="Log In">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form id="register-form" name="register-form"
                                  action="/site/signup" method="post" role="form" style="display: none;">
                                <div class="form-group">
                                    <input type="text" name="reg-username" id="reg-username" tabindex="1"
                                           class="form-control" placeholder="Username" value="">
                                    <label id="reg-username-error" class="error" for="reg-username"
                                           style="display: inline-block;"></label>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" id="email" tabindex="1" class="form-control"
                                           placeholder="Email Address" value="">
                                    <label id="email-error" class="error" for="email"
                                           style="display: inline-block;"></label>

                                </div>

                                <div class="form-group">
                                    <input type="password" name="password1" id="password1" tabindex="2"
                                           class="form-control" placeholder="Password">
                                    <label id="password1-error" class="error" for="password1"
                                           style="display: inline-block;"></label>

                                </div>
                                <div class="form-group">
                                    <input type="password" name="confirm-password" id="confirm-password" tabindex="2"
                                           class="form-control" placeholder="Confirm Password">
                                    <label id="confirm-password-error" class="error" for="confirm-password"
                                           style="display: inline-block;"></label>

                                </div>
                                <div class="form-group">
                                    <input type="text" name="number" id="number" class="form-control" min="1" max="5"
                                           placeholder="Box quantity">
                                    <label id="number-error" class="error" for="number"
                                           style="display: inline-block;"></label>

                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="register-submit" id="register-submit"
                                                   tabindex="4" class="form-control btn btn-register"
                                                   value="Next">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>