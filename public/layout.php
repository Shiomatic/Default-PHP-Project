<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link type="text/css" rel="stylesheet" href="<?php echo $view->config->basedir; ?>css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo $view->config->basedir; ?>css/ppcore.min.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo $view->config->basedir; ?>css/default.css" />
    <script type="text/javascript" src="<?php echo $view->config->basedir; ?>js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo $view->config->basedir; ?>js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo $view->config->basedir; ?>js/ppcore.js"></script>
    <script type="text/javascript" src="<?php echo $view->config->basedir; ?>js/default.js"></script>
    <title>New PHP Project</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top bd-navbar flex-md-row flex-column">
        <a class="navbar-brand" href="#">New PHP Project</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link <?php if($current == 'home') echo 'active'; ?>" href="#">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link <?php if($current == 'stage') echo 'active'; ?>" href="/stage/sub1">Stage</a>
                <a class="nav-item nav-link <?php if($current == 'contact') echo 'active'; ?>" href="/contact">Contact</a>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row flex-xl-nowrap">
            <div class="col-12 col-md-3 col-xl-2 bd-sidebar">
                <form class="bd-search d-flex align-items-center">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                </form>
                <?php if($current == 'home'): ?>
                <nav class="collapse bd-links" id="bd-docs-nav">
                    <div class="bd-toc-item<?php if($sub == 'sub1'):?> active<?php endif; ?>">
                        <a class="bd-toc-link" href="/home/sub1">
                            Home 1
                        </a>

                        <ul class="nav bd-sidenav">
                            <li>
                                <a href="/stage/sub1#page1">
                                    Page 1
                                </a>
                            </li>
                            <li>
                                <a href="/stage/sub1#page2">
                                    Page 2
                                </a>
                            </li>

                        </ul>
                    </div>

                    <div class="bd-toc-item<?php if($sub == 'sub2'):?> active<?php endif; ?>">
                        <a class="bd-toc-link" href="/home/sub2">
                            Home 2
                        </a>

                        <ul class="nav bd-sidenav">
                            <li>
                                <a href="/stage/sub2#page1">
                                    Page 1
                                </a>
                            </li>
                            <li>
                                <a href="/stage/sub2#page2">
                                    Page 2
                                </a>
                            </li>

                        </ul>
                    </div>
                </nav>
                <?php endif; ?>
                <?php if($current == 'stage'): ?>
                <nav class="collapse bd-links" id="bd-docs-nav">
                    <div class="bd-toc-item<?php if($sub == 'sub1'):?> active<?php endif; ?>">
                        <a class="bd-toc-link" href="/stage/sub1">
                            Stage 1
                        </a>

                        <ul class="nav bd-sidenav">
                            <li>
                                <a href="/stage/sub1#page1">
                                    Page 1
                                </a>
                            </li>
                            <li>
                                <a href="/stage/sub1#page2">
                                    Page 2
                                </a>
                            </li>

                        </ul>
                    </div>

                    <div class="bd-toc-item<?php if($sub == 'sub2'):?> active<?php endif; ?>">
                        <a class="bd-toc-link" href="/stage/sub2">
                            Stage 2
                        </a>

                        <ul class="nav bd-sidenav">
                            <li>
                                <a href="/stage/sub2#page1">
                                    Page 1
                                </a>
                            </li>
                            <li>
                                <a href="/stage/sub2#page2">
                                    Page 2
                                </a>
                            </li>

                        </ul>
                    </div>
                </nav>
                <?php endif; ?>
            </div>
            <div class="col-12 col-md-9 col-xl-10 py-md-3 pl-md-5 bd-content" role="main">
                <?php echo $view->page->content; ?>
            </div>
        </div>
    </div>
</body>
</html>