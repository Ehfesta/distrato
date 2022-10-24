<html lang="en" style="height: auto;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eh Festa | Dashboard</title>
    <link rel="shortcut icon" href="<?= base_url() ?>/resources/images/EhFesta.ico" type="image/x-icon">
    <script>
        const urlSistema = '<?= base_url() ?>/';
    </script>

    <!-- css -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/fontawesome-free/css/all.min.css?v=<?= getenv('Version') ?>">
    <link rel="stylesheet" href="<?= base_url() ?>/resources/css/adminlte.min.css?v=<?= getenv('Version') ?>">
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>/resources/css/Dashboard/style.css?v=<?= getenv('Version') ?>">
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css?v=<?= getenv('Version') ?>">
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/toastr/toastr.min.css?v=<?= getenv('Version') ?>">
    <!-- js -->
    <script src="<?= base_url() ?>/plugins/jquery/jquery.min.js?v=<?= getenv('Version') ?>"></script>
    <script src="<?= base_url() ?>/plugins/jquery-ui/jquery-ui.min.js?v=<?= getenv('Version') ?>"></script>
    <script src="<?= base_url() ?>/plugins/bootstrap/js/bootstrap.min.js?v=<?= getenv('Version') ?>"></script>
    <script src="<?= base_url() ?>/plugins/bootstrap/js/bootstrap.bundle.min.js?v=<?= getenv('Version') ?>"></script>
    <script src="<?= base_url() ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js?v=<?= getenv('Version') ?>"></script>
    <script src="<?= base_url() ?>/resources/js/adminlte.min.js?v=<?= getenv('Version') ?>"></script>
    <script src="<?= base_url() ?>/resources/js/adminlte.js?v=3.2.0"></script>
    <script src="<?= base_url() ?>/plugins/jquery-validation/jquery.validate.min.js?v=<?= getenv('Version') ?>"></script>
    <script src="<?= base_url() ?>/plugins/jquery-validation/additional-methods.js?v=<?= getenv('Version') ?>"></script>
    <script src="<?= base_url() ?>/plugins/bootstrap-switch/js/bootstrap-switch.min.js?v=<?= getenv('Version') ?>"></script>
    <script src="<?= base_url() ?>/plugins/sweetalert2/sweetalert2.min.js?v=<?= getenv('Version') ?>"></script>
    <script src="<?= base_url() ?>/plugins/datatables/jquery.dataTables.js?v=<?= getenv('Version') ?>"></script>
    <script src="<?= base_url() ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.js?v=<?= getenv('Version') ?>"></script>
    <script src="<?= base_url() ?>/plugins/toastr/toastr.min.js?v=<?= getenv('Version') ?>"></script>
    <script src="<?= base_url() ?>/resources/js/draggable.min.js?v=<?= getenv('Version') ?>"></script>
    <script src="<?= base_url() ?>/plugins/inputmask/inputmask.js?v=<?= getenv('Version') ?>"></script>
    <script src="<?= base_url() ?>/plugins/inputmask/jquery.inputmask.js?v=<?= getenv('Version') ?>"></script>
    <script src="<?= base_url() ?>/resources/js/common/validacao.js?v=<?= getenv('Version') ?>"></script>
    <script src="<?= base_url() ?>/resources/js/common/index.js?v=<?= getenv('Version') ?>"></script>
    <script src="<?= base_url() ?>/resources/js/bootstrap-datepicker.min.js?v=<?= getenv('Version') ?>"></script>
    <script src="<?= base_url() ?>/resources/js/bootstrap-datepicker.pt-BR.min.js?v=<?= getenv('Version') ?>"></script>
    <script src="<?= base_url() ?>/resources/js/Dashboard/index.js?v=<?= getenv('Version') ?>"></script>



    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>

</head>

<body class="sidebar-mini layout-fixed sidebar-collapse" data-panel-auto-height-mode="height" style="height: auto;">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <div class="col-sm-6">
                    <h1>EhFesta</h1>
                </div>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#" title="Sair do sistema" st>
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" onclick="btnLogout();">
                        <a class="dropdown-item dropdown-footer" style="cursor: pointer;">Sair do sistema <i class="fas fa-hiking"></i></a>
                    </div>
                </li>
            </ul>
        </nav>


        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-overflow-x">
                <div class="os-resize-observer-host observed">
                    <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
                </div>
                <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
                    <div class="os-resize-observer"></div>
                </div>
                <div class="os-content-glue" style="margin: 0px -8px; width: 73px; height: 567px;"></div>
                <div class="os-padding">
                    <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow: scroll;">
                        <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
                            <nav class="mt-2" style="border-bottom: 1px solid #4f5962;">
                                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                    <li class="nav-item">
                                        <a href="Perfil" class="nav-link" style="padding: 5px 0px;">
                                            <img src="<?= base_url() ?>/resources/img/Perfil/<?php if ($imgpessoa) {
                                                                                                    echo $imgpessoa;
                                                                                                } else {
                                                                                                    echo "avatar.jpg";
                                                                                                } ?>" class="img-circle elevation-2" style="width: 60px;">
                                            <p class="pl-2">
                                                <?php echo $NomePessoa; ?>
                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </nav>

                            <nav class="mt-2" style="border-bottom: 1px solid #4f5962;">
                                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                    <?php echo $MenuConvite; ?>
                                </ul>
                            </nav>


                            <nav class="mt-2" style="border-bottom: 1px solid #4f5962;">
                                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                    <?php echo $MenuEvento; ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-auto-hidden">
                    <div class="os-scrollbar-track">
                        <div class="os-scrollbar-handle" style="width: 49.0066%; transform: translate(0px, 0px);"></div>
                    </div>
                </div>
                <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
                    <div class="os-scrollbar-track">
                        <div class="os-scrollbar-handle" style="height: 62.2807%; transform: translate(0px, 0px);"></div>
                    </div>
                </div>
                <div class="os-scrollbar-corner"></div>
            </div>

        </aside>

        <div class="content-wrapper iframe-mode" data-widget="iframe" data-loading-screen="750" style="height: 511px;">
            <div class="nav navbar navbar-expand navbar-white navbar-light border-bottom p-0">
                <a class="nav-link bg-light" href="#" data-widget="iframe-scrollleft"><i class="fas fa-angle-double-left"></i></a>
                <ul class="navbar-nav overflow-hidden" role="tablist">
                    <li class="nav-item active" role="presentation">
                        <a href="#" class="btn-iframe-close" data-widget="iframe-close" data-type="only-this">
                            <i class="fas fa-times"></i>
                        </a>
                        <a class="nav-link active" data-toggle="row" id="tab-Convites" href="#panel-Convites" role="tab" aria-controls="panel-Convites" aria-selected="true">
                            Meus Convites
                        </a>
                    </li>
                </ul>
                <a class="nav-link bg-light" href="#" data-widget="iframe-scrollright"><i class="fas fa-angle-double-right"></i></a>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade active show" id="panel-Convites" role="tabpanel" aria-labelledby="tab-index">
                    <iframe src="Convites" style="height: 671px;"></iframe>
                </div>
                <div class="tab-empty" style="height: 470px;">
                    <h2 class="display-4">No tab selected!</h2>
                </div>
                <div class="tab-loading" style="height: 470px;">
                    <div>
                        <h2 class="display-4">Tab is loading <i class="fa fa-sync fa-spin"></i></h2>
                    </div>
                </div>
            </div>
        </div>

        <footer class="main-footer">
            Copyright © 2021-<?= date("Y") ?> EhFesta.
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                Version <?= getenv('Version') ?>
            </div>
        </footer>

        <aside class="control-sidebar control-sidebar-dark" style="display: none; bottom: 57px; top: 57px; height: 511px;">

            <div class="p-3 control-sidebar-content os-host os-theme-light os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-scrollbar-vertical-hidden os-host-transition" style="height: 511px;">
                <div class="os-resize-observer-host observed">
                    <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
                </div>
                <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
                    <div class="os-resize-observer"></div>
                </div>
                <div class="os-content-glue" style="margin: -16px; width: 0px; height: 0px;"></div>
                <div class="os-padding">
                    <div class="os-viewport os-viewport-native-scrollbars-invisible">
                        <div class="os-content" style="padding: 16px; height: 100%; width: 100%;">
                            <h5>Customize AdminLTE</h5>
                            <hr class="mb-2">
                            <div class="mb-4"><input type="checkbox" value="1" class="mr-1"><span>Dark Mode</span></div>
                            <h6>Header Options</h6>
                            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Fixed</span></div>
                            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Dropdown Legacy Offset</span></div>
                            <div class="mb-4"><input type="checkbox" value="1" class="mr-1"><span>No border</span></div>
                            <h6>Sidebar Options</h6>
                            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Collapsed</span></div>
                            <div class="mb-1"><input type="checkbox" value="1" checked="checked" class="mr-1"><span>Fixed</span></div>
                            <div class="mb-1"><input type="checkbox" value="1" checked="checked" class="mr-1"><span>Sidebar Mini</span></div>
                            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Sidebar Mini MD</span></div>
                            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Sidebar Mini XS</span></div>
                            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Nav Flat Style</span></div>
                            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Nav Legacy Style</span></div>
                            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Nav Compact</span></div>
                            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Nav Child Indent</span></div>
                            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Nav Child Hide on Collapse</span></div>
                            <div class="mb-4"><input type="checkbox" value="1" class="mr-1"><span>Disable Hover/Focus Auto-Expand</span></div>
                            <h6>Footer Options</h6>
                            <div class="mb-4"><input type="checkbox" value="1" class="mr-1"><span>Fixed</span></div>
                            <h6>Small Text Options</h6>
                            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Body</span></div>
                            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Navbar</span></div>
                            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Brand</span></div>
                            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Sidebar Nav</span></div>
                            <div class="mb-4"><input type="checkbox" value="1" class="mr-1"><span>Footer</span></div>
                            <h6>Navbar Variants</h6>
                            <div class="d-flex"><select class="custom-select mb-3 text-light border-0 bg-white">
                                    <option class="bg-primary">Primary</option>
                                    <option class="bg-secondary">Secondary</option>
                                    <option class="bg-info">Info</option>
                                    <option class="bg-success">Success</option>
                                    <option class="bg-danger">Danger</option>
                                    <option class="bg-indigo">Indigo</option>
                                    <option class="bg-purple">Purple</option>
                                    <option class="bg-pink">Pink</option>
                                    <option class="bg-navy">Navy</option>
                                    <option class="bg-lightblue">Lightblue</option>
                                    <option class="bg-teal">Teal</option>
                                    <option class="bg-cyan">Cyan</option>
                                    <option class="bg-dark">Dark</option>
                                    <option class="bg-gray-dark">Gray dark</option>
                                    <option class="bg-gray">Gray</option>
                                    <option class="bg-light">Light</option>
                                    <option class="bg-warning">Warning</option>
                                    <option class="bg-white">White</option>
                                    <option class="bg-orange">Orange</option>
                                </select></div>
                            <h6>Accent Color Variants</h6>
                            <div class="d-flex"></div><select class="custom-select mb-3 border-0">
                                <option>None Selected</option>
                                <option class="bg-primary">Primary</option>
                                <option class="bg-warning">Warning</option>
                                <option class="bg-info">Info</option>
                                <option class="bg-danger">Danger</option>
                                <option class="bg-success">Success</option>
                                <option class="bg-indigo">Indigo</option>
                                <option class="bg-lightblue">Lightblue</option>
                                <option class="bg-navy">Navy</option>
                                <option class="bg-purple">Purple</option>
                                <option class="bg-fuchsia">Fuchsia</option>
                                <option class="bg-pink">Pink</option>
                                <option class="bg-maroon">Maroon</option>
                                <option class="bg-orange">Orange</option>
                                <option class="bg-lime">Lime</option>
                                <option class="bg-teal">Teal</option>
                                <option class="bg-olive">Olive</option>
                            </select>
                            <h6>Dark Sidebar Variants</h6>
                            <div class="d-flex"></div><select class="custom-select mb-3 text-light border-0 bg-primary">
                                <option>None Selected</option>
                                <option class="bg-primary">Primary</option>
                                <option class="bg-warning">Warning</option>
                                <option class="bg-info">Info</option>
                                <option class="bg-danger">Danger</option>
                                <option class="bg-success">Success</option>
                                <option class="bg-indigo">Indigo</option>
                                <option class="bg-lightblue">Lightblue</option>
                                <option class="bg-navy">Navy</option>
                                <option class="bg-purple">Purple</option>
                                <option class="bg-fuchsia">Fuchsia</option>
                                <option class="bg-pink">Pink</option>
                                <option class="bg-maroon">Maroon</option>
                                <option class="bg-orange">Orange</option>
                                <option class="bg-lime">Lime</option>
                                <option class="bg-teal">Teal</option>
                                <option class="bg-olive">Olive</option>
                            </select>
                            <h6>Light Sidebar Variants</h6>
                            <div class="d-flex"></div><select class="custom-select mb-3 border-0">
                                <option>None Selected</option>
                                <option class="bg-primary">Primary</option>
                                <option class="bg-warning">Warning</option>
                                <option class="bg-info">Info</option>
                                <option class="bg-danger">Danger</option>
                                <option class="bg-success">Success</option>
                                <option class="bg-indigo">Indigo</option>
                                <option class="bg-lightblue">Lightblue</option>
                                <option class="bg-navy">Navy</option>
                                <option class="bg-purple">Purple</option>
                                <option class="bg-fuchsia">Fuchsia</option>
                                <option class="bg-pink">Pink</option>
                                <option class="bg-maroon">Maroon</option>
                                <option class="bg-orange">Orange</option>
                                <option class="bg-lime">Lime</option>
                                <option class="bg-teal">Teal</option>
                                <option class="bg-olive">Olive</option>
                            </select>
                            <h6>Brand Logo Variants</h6>
                            <div class="d-flex"></div><select class="custom-select mb-3 border-0">
                                <option>None Selected</option>
                                <option class="bg-primary">Primary</option>
                                <option class="bg-secondary">Secondary</option>
                                <option class="bg-info">Info</option>
                                <option class="bg-success">Success</option>
                                <option class="bg-danger">Danger</option>
                                <option class="bg-indigo">Indigo</option>
                                <option class="bg-purple">Purple</option>
                                <option class="bg-pink">Pink</option>
                                <option class="bg-navy">Navy</option>
                                <option class="bg-lightblue">Lightblue</option>
                                <option class="bg-teal">Teal</option>
                                <option class="bg-cyan">Cyan</option>
                                <option class="bg-dark">Dark</option>
                                <option class="bg-gray-dark">Gray dark</option>
                                <option class="bg-gray">Gray</option>
                                <option class="bg-light">Light</option>
                                <option class="bg-warning">Warning</option>
                                <option class="bg-white">White</option>
                                <option class="bg-orange">Orange</option><a href="#">clear</a>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
                    <div class="os-scrollbar-track">
                        <div class="os-scrollbar-handle" style="transform: translate(0px, 0px);"></div>
                    </div>
                </div>
                <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-unusable os-scrollbar-auto-hidden">
                    <div class="os-scrollbar-track">
                        <div class="os-scrollbar-handle" style="transform: translate(0px, 0px);"></div>
                    </div>
                </div>
                <div class="os-scrollbar-corner"></div>
            </div>
        </aside>

        <div id="sidebar-overlay"></div>
    </div>

</body>

</html>