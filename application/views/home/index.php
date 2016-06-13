<!DOCTYPE html>
<html lang="pt">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CadêOFoodTruck</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='https://www.google.com/fonts#QuickUsePlace:quickUse/Family:Roboto' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="<?= base_url("font-awesome/css/font-awesome.min.css") ?>" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="<?= base_url("css/animate.css") ?>" type="text/css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url("css/creative.css") ?>" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">CadêOFoodTruck</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#about">Sobre</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Serviços</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#cadastro">Cadastro</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Fale Conosco</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <img class="img-responsive logo-foodtruck" src="img/alta.png">
                <hr>
                <a href="#about" class="btn btn-primary btn-xl page-scroll">Saber mais</a>
            </div>
        </div>
    </header>

    <!-- SOBRE -->
    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Cadê o FoodTruck?</h2>
                    <hr class="light">
                    <p class="text-faded">Para quê rodar a cidade procurando o FoodTruck dos seus desejos se você pode em um click encontrá-lo? Ainda dá para conferir as promoções e o cardápio antes de escolher a melhor opção.</p>
                    <a href="#services" class="btn btn-default btn-xl page-scroll">Cadê?</a>
                </div>
            </div>
        </div>
    </section>

    <!-- SERVIÇOS -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Serviços</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-map-marker wow bounceIn text-primary"></i>
                        <h3>Encontre o FoodTruck</h3>
                        <p class="text-muted">Saiba a localização exata dos principais FoodTrucks da sua região.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-search wow bounceIn text-primary" data-wow-delay=".1s"></i>
                        <h3>Informações</h3>
                        <p class="text-muted">Antes de chegar no FoodTruck, dê uma olhada nas suas informações.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-list-alt wow bounceIn text-primary" data-wow-delay=".2s"></i>
                        <h3>Cardápio</h3>
                        <p class="text-muted">E se você puder ver tudo o que o FoodTruck oferece sem precisar estar lá?</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-money wow bounceIn text-primary" data-wow-delay=".3s"></i>
                        <h3>Promoções</h3>
                        <p class="text-muted">Que tal ser avisado toda vez que seu FoodTruck favorito estiver com uma promoção incrível?</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-primary" id="cadastro">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 text-center">
                    <h2 class="section-heading">Encontre seu FoodTruck</h2>
                    <p>Quer ser o primeir@ a saber sobre nosso app assim que for lançado? Cadastre seu email.</p>
                    <form action="#cadastro" method="POST">
                        <hr class="light">
                        <div class="form-group">
                            <input type="email" class="form-control" name="cadastroEmail" id="cadastroEmail" placeholder="Email" required>
                        </div>
                        <hr class="light">
                        <a class="btn btn-default btn-xl" id="cadastroBotao">Cadastrar</a>
                    </form>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">X</button>
                                    <h4 class="modal-title btn-default">Cadastro</h4>
                                </div>
                                <div class="modal-body btn-default">
                                    <p id="msgCadastro"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!--
    <aside class="bg-dark">
        <div class="container text-center">
            <div class="call-to-action">
                <h2>BAIXE!</h2>
                <a href="#" class="btn btn-default btn-xl wow tada">Download Now!</a>
            </div>
        </div>
    </aside>
    -->

    <!-- CONTATO -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Fale conosco!</h2>
                    <hr class="primary">
                    <p>Quer colocar seu FoodTruck em nosso App? Ou bateu vontade de trocar algumas ideias com nossa equipe? Nos mande uma mensagem.</p>
                </div>
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <form class="form-horizontal" id="formContato">
                        <div class="form-group">
                            <label for="inputNome" class="col-sm-2 control-label">Nome</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="inputNome" id="inputNome" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="inputEmail" id="inputEmail" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputMensagem" class="col-sm-2 control-label">Mensagem</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="inputMsg" id="inputMsg" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <a class="btn btn-primary btn-xl" id="enviar">Enviar</a>
                            </div>
                        </div>
                    </form>
                    <!-- Modal -->
                    <div class="modal fade" id="ModalForm" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">X</button>
                                    <h4 class="modal-title btn-default">Email</h4>
                                </div>
                                <div class="modal-body btn-default">
                                    <p id="msgEmail"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x wow bounceIn"></i>
                    <p>(84) 9949-9238</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p><a href="mailto:contato@cadeofoodtruck.com">contato@cadeofoodtruck.com</a></p>
                </div>
                -->
            </div>
        </div>
    </section>

    <!-- jQuery -->
    <script src="<?= base_url("js/jquery.js") ?>"></script>
    
    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url("js/bootstrap.min.js") ?>"></script>

    <!-- Plugin JavaScript -->
    <script src="<?= base_url("js/jquery.easing.min.js") ?>"></script>
    <script src="<?= base_url("js/jquery.fittext.js") ?>"></script>
    <script src="<?= base_url("js/wow.min.js") ?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url("js/creative.js") ?>"></script>

    <!-- Nosso JavaScript -->
    <script src="<?= base_url("js/script.js") ?>"></script>
    
</body>

</html>
