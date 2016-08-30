
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-lock"></i> Authentification </h3>
            </div>
            <div class="panel-body">
                
                <form role="form" action="/log/in/" method="POST">
                    <fieldset>
                        <div class="form-group">
                            <input value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" type="text" class="form-control" placeholder="Votre email" name="email" id="email" autofocus>
                        </div>
                        <div class="form-group">
                            <input value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>" type="password" class="form-control" placeholder="Votre mot de passe" name="password" id="password">
                        </div>
                        <button type="submit" class="btn btn-lg btn-success btn-block">Connection</button>
                    </fieldset>
                </form>

                <div class="separator">
                    <div class="bar"></div>
                    <div class="text">OU</div>
                    <div class="bar"></div>
                </div>

                <a href="<?php echo URL; ?>inscription/" title="S'inscrire à <?php echo WEBSITE_NAME; ?>" class="btn btn-lg btn-primary btn-block">Inscription</a>

            </div>
        </div>
    </div>
</div>