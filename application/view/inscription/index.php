
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-lock"></i> Authentification </h3>
            </div>
            <div class="panel-body">

                <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Nom</label>
                        <div class="col-sm-10">
                            <input value="<?php echo isset($_POST['lastname']) ? $_POST['lastname'] : ''; ?>" type="text" class="form-control" name="lastname" placeholder="Entrez votre nom" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Prénom</label>
                        <div class="col-sm-10">
                            <input value="<?php echo isset($_POST['firstname']) ? $_POST['firstname'] : ''; ?>" type="text" class="form-control" name="firstname" placeholder="Entrez votre prénom">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" type="email" class="form-control" name="email" placeholder="Entrez votre adresse email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Mot de passe</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" placeholder="Entrez votre mot de passe">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <input type="password" class="form-control" name="password_verif" placeholder="Entrez votre mot de passe à nouveau">
                        </div>
                    </div>
                    <?php echo Forms::input('picture',null,'Photo') ?>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Je m'inscris</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>