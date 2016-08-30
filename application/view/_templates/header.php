<?php
$user = CurrentUser::$user;
?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo WEBSITE_NAME; ?> <?php echo !empty($user) ? ' - ' . $user->getName() : ''; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo URL; ?>addons/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo URL; ?>addons/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?php echo URL; ?>addons/sbadmin/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo URL; ?>addons/sbadmin/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo URL; ?>addons/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- SweetAlert -->
    <script src="<?php echo URL; ?>addons/sweetalert/sweetalert.css"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php if(empty($user)) { ?>
                <a class="navbar-brand" href="<?php echo URL; ?>"><?php echo WEBSITE_NAME; ?> - Site publique</a>
            <?php } else { ?>
                <a class="navbar-brand" href="<?php echo URL; ?>">
                    <span class="logoHeader"><img src="<?php echo $user->getPicture('logo'); ?>"></span>
                    <?php echo $user->getName()?> - Site publique
                </a>
            <?php } ?>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
        <?php if(!empty($user)) { ?>
            <li class="dropdown">
                <a href="<?php echo URL; ?>log/out/" alt="Se déconnecter">
                    <i class="fa fa-sign-out fa-fw"></i> Se déconnecter
                </a>
                <!-- /.dropdown-messages -->
            </li>
        <?php } ?>
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="<?php echo URL; ?>home/index/"><i class="fa fa-dashboard fa-fw"></i> Accueil</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-arrow-right fa-fw"></i> Log<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo URL; ?>log/in/">In</a>
                            </li>
                            <li>
                                <a href="<?php echo URL; ?>log/out/">Out</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="<?php echo URL; ?>inscription/"><i class="fa fa-arrow-right fa-fw"></i> Inscription</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-arrow-right fa-fw"></i> Compte<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo URL; ?>utilisateur/">Profil</a>
                            </li>
                            <li>
                                <a href="<?php echo URL; ?>utilisateur/modifier/">Modifier</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-arrow-right fa-fw"></i> Articles<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo URL; ?>articles/index/">Tous</a>
                            </li>
                            <li>
                                <a href="<?php echo URL; ?>articles/nouveau/">Nouveau</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>
    <div id="page-wrapper" style="padding-bottom: 20px;">

        <?php echo Alert::getNotifications(); ?>