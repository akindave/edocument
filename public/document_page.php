<!doctype html>
<html lang="en">

<?php include_once('include/head.php'); ?>
<body>

<!-- begin::preloader-->
<div class="preloader">
    <div class="preloader-icon"></div>
</div>
<!-- end::preloader -->

<!-- begin::header -->
<?php include_once('include/header.php'); ?>
<!-- end::header -->

<!-- begin::main -->
<div id="main">

    <!-- begin::navigation -->
    <div class="navigation">

        <div class="navigation-menu-tab">
            <div>
                <div class="navigation-menu-tab-header" data-toggle="tooltip" title="Roxana Roussell" data-placement="right">
                    <a href="#" class="nav-link" data-toggle="dropdown" aria-expanded="false">
                        <figure class="avatar avatar-sm">
                            <img src="assets/media/image/user/women_avatar1.jpg" class="rounded-circle" alt="avatar">
                        </figure>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                        <div class="p-3 text-center" data-backround-image="assets/media/image/image1.jpg">
                            <figure class="avatar mb-3">
                                <img src="assets/media/image/user/women_avatar1.jpg" class="rounded-circle" alt="image">
                            </figure>
                            <h6 class="d-flex align-items-center justify-content-center">
                                Roxana Roussell
                                <a href="#" class="btn btn-primary btn-sm ml-2" data-toggle="tooltip" title="Edit profile">
                                    <i data-feather="edit-2"></i>
                                </a>
                            </h6>
                            <small>Balance: <strong>$105</strong></small>
                        </div>
                        <div class="dropdown-menu-body">
                            <div class="border-bottom p-4">
                                <h6 class="text-uppercase font-size-11 d-flex justify-content-between">
                                    Storage
                                    <span>%25</span>
                                </h6>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 35%;"
                                         aria-valuenow="35"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="list-group list-group-flush">
                                <a href="#" class="list-group-item">Profile</a>
                                <a href="#" class="list-group-item d-flex">
                                    Followers <span class="text-muted ml-auto">214</span>
                                </a>
                                <a href="#" class="list-group-item d-flex">
                                    Inbox <span class="text-muted ml-auto">18</span>
                                </a>
                                <a href="#" class="list-group-item" data-sidebar-target="#settings">Billing</a>
                                <a href="#" class="list-group-item" data-sidebar-target="#settings">Need help?</a>
                                <a href="#" class="list-group-item text-danger" data-sidebar-target="#settings">Sign Out!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-grow-1">
                <ul>
                    <li>
                        <a href="#" data-toggle="tooltip" data-placement="right" title="Dashboards"
                           data-nav-target="#dashboards">
                            <i data-feather="bar-chart-2"></i>
                        </a>
                    </li>
                    <li>
                        <a class="active" href="#" data-toggle="tooltip" data-placement="right" title="Apps" data-nav-target="#apps">
                            <i data-feather="command"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-toggle="tooltip" data-placement="right" title="UI Elements"
                           data-nav-target="#elements">
                            <i data-feather="layers"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-toggle="tooltip" data-placement="right" title="Pages" data-nav-target="#pages">
                            <i data-feather="copy"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div>
                <ul>
                    <li>
                        <a href="#" data-toggle="tooltip" data-placement="right" title="Settings">
                            <i data-feather="settings"></i>
                        </a>
                    </li>
                    <li>
                        <a href="login.html" data-toggle="tooltip" data-placement="right" title="Logout">
                            <i data-feather="log-out"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- begin::navigation menu -->
        <div class="navigation-menu-body">

            <!-- begin::navigation-logo -->
            <div>
                <div id="navigation-logo">
                    <a href="index.html">
                        <img class="logo" src="assets/media/image/logo.png" alt="logo">
                        <img class="logo-light" src="assets/media/image/logo-light.png" alt="light logo">
                    </a>
                </div>
            </div>
            <!-- end::navigation-logo -->

            <div class="navigation-menu-group">

                <?php include_once('include/sidebar_dashboard.php'); ?>

                <div class="open" id="apps">
                    <ul>
                        <li class="navigation-divider">OAUSTECH EDOCUMENT</li>
                        <!-- <li>
                            <a href="chat.html">
                                <span>Chat</span>
                                <span class="badge badge-danger">5</span>
                            </a>
                        </li>
                       
                        <li>
                            <a href="app-todo.html">
                                <span>Todo</span>
                                <span class="badge badge-warning">2</span>
                            </a>
                        </li> -->
                        <li>
                            <a class="active" href="document_page.html">
                                <span>File Manager</span>
                            </a>
                        </li>
                        <!-- <li>
                            <a href="calendar.html">
                                <span>Calendar</span>
                            </a>
                        </li> -->
                    </ul>
                </div>

                <!-- <div id="elements">
                    <ul>
                        <li class="navigation-divider">UI Elements</li>
                        <li>
                            <a href="#">Basic</a>
                            <ul>
                                <li><a href="alerts.html">Alert</a></li>
                                <li><a href="accordion.html">Accordion</a></li>
                                <li><a href="buttons.html">Buttons</a></li>
                                <li><a href="dropdown.html">Dropdown</a></li>
                                <li><a href="list-group.html">List Group</a></li>
                                <li><a href="pagination.html">Pagination</a></li>
                                <li><a href="typography.html">Typography</a></li>
                                <li><a href="media-object.html">Media Object</a></li>
                                <li><a href="progress.html">Progress</a></li>
                                <li><a href="modal.html">Modal</a></li>
                                <li><a href="spinners.html">Spinners</a></li>
                                <li><a href="navs.html">Navs</a></li>
                                <li><a href="tab.html">Tab</a></li>
                                <li><a href="tooltip.html">Tooltip</a></li>
                                <li><a href="popovers.html">Popovers</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Cards</a>
                            <ul>
                                <li><a href="basic-cards.html">Basic Cards </a></li>
                                <li><a href="image-cards.html">Image Cards </a></li>
                                <li><a href="card-scroll.html">Card Scroll </a></li>
                                <li><a href="other-cards.html">Others </a></li>
                            </ul>
                        </li>
                        <li><a href="avatar.html">Avatar</a></li>
                        <li><a href="icons.html">Icons</a></li>
                        <li><a href="colors.html">Colors</a></li>
                        <li>
                            <a href="#">Plugins</a>
                            <ul>
                                <li><a href="sweet-alert.html">Sweet Alert</a></li>
                                <li><a href="lightbox.html">Lightbox</a></li>
                                <li><a href="toast.html">Toast</a></li>
                                <li><a href="tour.html">Tour</a></li>
                                <li><a href="slick-slide.html">Slick Slide</a></li>
                                <li><a href="nestable.html">Nestable</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Forms</a>
                            <ul>
                                <li><a href="basic-form.html">Form Layouts</a></li>
                                <li><a href="custom-form.html">Custom Forms</a></li>
                                <li><a href="advanced-form.html">Advanced Form</a></li>
                                <li><a href="form-validation.html">Validation</a></li>
                                <li><a href="form-wizard.html">Wizard</a></li>
                                <li><a href="file-upload.html">File Upload</a></li>
                                <li><a href="datepicker.html">Datepicker</a></li>
                                <li><a href="timepicker.html">Timepicker</a></li>
                                <li><a href="colorpicker.html">Colorpicker</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Tables</a>
                            <ul>
                                <li><a href="tables.html">Basic Tables</a></li>
                                <li><a href="data-table.html">Datatable</a></li>
                                <li><a href="responsive-table.html">Responsive Tables</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Charts</a>
                            <ul>
                                <li><a href="apexchart.html">Apex</a></li>
                                <li><a href="chartjs.html">Chartjs</a></li>
                                <li><a href="justgage.html">Justgage</a></li>
                                <li><a href="morsis.html">Morsis</a></li>
                                <li><a href="peity.html">Peity</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Maps</a>
                            <ul>
                                <li><a href="google-map.html">Google</a></li>
                                <li><a href="vector-map.html">Vector</a></li>
                            </ul>
                        </li>
                    </ul>
                </div> -->
                <?php include_once('include/sidebar_uiElement.php'); ?>

                <!-- <div id="pages">
                    <ul>
                        <li class="navigation-divider">Pages</li>
                        <li><a href="login.html">Login</a></li>
                        <li><a href="register.html">Register</a></li>
                        <li><a href="recover-password.html">Recovery Password</a></li>
                        <li><a href="lock-screen.html">Lock Screen</a></li>
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="timeline.html">Timeline</a></li>
                        <li><a href="invoice.html">Invoice</a></li>

                        <li><a href="pricing-table.html">Pricing Table</a></li>
                        <li><a href="search-result.html">Search Result</a></li>
                        <li>
                            <a href="#">Error Pages</a>
                            <ul>
                                <li><a href="404.html">404</a></li>
                                <li><a href="404-2.html">404 V2</a></li>
                                <li><a href="503.html">503</a></li>
                                <li><a href="mean-at-work.html">Mean at Work</a></li>
                            </ul>
                        </li>
                        <li><a href="blank-page.html">Starter Page</a></li>
                        <li>
                            <a href="#">Email Templates</a>
                            <ul>
                                <li><a href="email-template-basic.html">Basic</a></li>
                                <li><a href="email-template-alert.html">Alert</a></li>
                                <li><a href="email-template-billing.html">Billing</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Menu Level</a>
                            <ul>
                                <li>
                                    <a href="#">Menu Level</a>
                                    <ul>
                                        <li>
                                            <a href="#">Menu Level </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div> -->
                <?php include_once('include/sidebar_pages.php'); ?>

            </div>
        </div>
        <!-- end::navigation menu -->

    </div>
    <!-- end::navigation -->

    <!-- begin::main-content -->
    <div class="main-content">

        <!-- begin::page-header -->
        <div class="page-header">
            <div class="container-fluid d-sm-flex justify-content-between">
                <h4>File Manager</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Apps</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">File Manager</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- end::page-header -->

        <div class="container-fluid">

            <div class="row app-block">
                <div class="col-md-4 app-sidebar">
                    <div class="card">
                        <div class="card-body">
                            <!-- <button class="btn btn-secondary btn-block file-upload-btn" data-toggle="modal"
                                    data-target="#compose">
                                Upload Files
                            </button> -->
                            <form class="d-none" id="file-upload">
                                <input type="file" multiple>
                            </form>
                        </div>
                        <div class="app-sidebar-menu">
                            <div class="list-group list-group-flush">
                                <a href="#" class="list-group-item active d-flex align-items-center">
                                    <i data-feather="folder" class="width-15 height-15 mr-2"></i>
                                    All Folder <span class=" small ml-auto badge badge-primary">2</span>
                                </a>
                                <a href="#" class="list-group-item active d-flex align-items-center">
                                    <i data-feather="file" class="width-15 height-15 mr-2"></i>
                                    Recent Files
                                    <span class=" small ml-auto badge badge-primary">45</span>
                                </a>
                                <a href="#" class="list-group-item active d-flex align-items-center">
                                    <i data-feather="arrow-down" class="width-15 height-15 mr-2"></i>
                                    Incoming Requests
                                    <span class=" small ml-auto badge badge-primary">45</span>
                                </a>
                                <a href="#" class="list-group-item active d-flex align-items-center">
                                    <i data-feather="arrow-up" class="width-15 height-15 mr-2"></i>
                                    Outgoing Requests
                                    <span class=" small ml-auto badge badge-primary">45</span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i data-feather="upload-cloud" class="width-15 height-15 mr-2"></i>
                                    Recents
                                </a>
                                <!-- <a href="#" class="list-group-item d-flex align-items-center">
                                    <i data-feather="star" class="width-15 height-15 mr-2"></i>
                                    Important
                                    <span class="small ml-auto">10</span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i data-feather="trash" class="width-15 height-15 mr-2"></i>
                                    Deleted Files
                                </a> -->
                            </div>
                            <div class="card-body">
                                <h6 class="mb-4">Storage Status</h6>
                                <div class="d-flex align-items-center">
                                    <div class="mr-3">
                                        <i data-feather="database" class="width-30 height-30"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="progress" style="height: 10px">
                                            <div class="progress-bar progress-bar-striped" role="progressbar"
                                                 style="width: 40%" aria-valuenow="10" aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                        <div class="line-height-12 small text-muted mt-2">19.5GB used of 25GB</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 app-content">
                    <div class="app-content-overlay"></div>
                    <div class="app-action">
                        <div class="action-left">
                            <ul class="list-inline">
                                <li class="list-inline-item mb-0">
                                    <a href="#" class="btn btn-outline-light dropdown-toggle" data-toggle="dropdown">
                                        <i data-feather="plus" class="mr-2"></i>
                                        Add
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal">Folder</a>
                                        <!-- <a class="dropdown-item" href="#">File</a> -->
                                    </div>
                                </li>
                                <li class="list-inline-item mb-0">
                                    <a href="#" class="btn btn-outline-light dropdown-toggle" data-toggle="dropdown">Folders</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item d-flex justify-content-between" href="#">
                                            Video
                                            <span class="text-muted">21</span>
                                        </a>
                                        <a class="dropdown-item d-flex justify-content-between" href="#">
                                            Image
                                            <span class="text-muted">5</span>
                                        </a>
                                        <a class="dropdown-item d-flex justify-content-between" href="#">
                                            Audio
                                            <span class="text-muted">12</span>
                                        </a>
                                        <a class="dropdown-item d-flex justify-content-between" href="#">
                                            Documents
                                            <span class="text-muted">7</span>
                                        </a>
                                    </div>
                                </li>
                                <li class="list-inline-item mb-0">
                                    <a href="#" class="btn btn-outline-light dropdown-toggle" data-toggle="dropdown">
                                        Order by
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Date</a>
                                        <a class="dropdown-item" href="#">Name</a>
                                        <a class="dropdown-item" href="#">Size</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="action-right">
                            <form class="d-flex mr-3">
                                <a href="#" class="app-sidebar-menu-button btn btn-outline-light">
                                    <i data-feather="menu"></i>
                                </a>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search file"
                                           aria-describedby="button-addon1">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-light" type="button" id="button-addon1">
                                            <i data-feather="search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Add FOlder List -->
                    <div class="card app-content-body">

                        <div class="card-body">

                            <h6 class="font-size-11 text-uppercase mb-4">Folder List</h6>
                        <div class = "container_fluid">
                            <div class="row">
                                    <!-- <div class="row"> -->
                                        <div class="col-sm-3">
                                            <img style= "height:80px;cursor:pointer" src="assets/media/image/user/folderImg.jfif" alt="" srcset="">
                                        </div>
                                        <div class="col-sm-3">
                                            <img style= "height:80px;cursor:pointer" src="assets/media/image/user/folderImg.jfif" alt="" srcset="">
                                        </div>
                                        <div class="col-sm-3">
                                            <img style= "height:80px;cursor:pointer" src="assets/media/image/user/folderImg.jfif" alt="" srcset="">
                                        </div>
                                        <div class="col-sm-3">
                                            <img style= "height:80px;cursor:pointer" src="assets/media/image/user/folderImg.jfif" alt="" srcset="">
                                        </div>
                                    </div>
                                <!-- </div> -->
                            </div>

                            <!-- </div> -->

                        </div>
                    <!-- Add FOlder List End Here -->

                </div>
            </div>

        </div>
        
          <!-- Create Folder Modal -->
          <div class="modal" tabindex="-1" role="dialog" id="exampleModal">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Create Folder</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form >
                        <div class="form-group error text-danger text-center">
                        
                        </div>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Folder Name:</label>
                          <input id = "folder_name" type="text" class="form-control" >
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button id = "create_folder" type="button" class="btn btn-primary">Create</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Create Folder Modal End  -->

          <script type = "module" src="assets/js/document.js"></script>
        <!-- begin::footer -->
        <footer>
            <div class="container-fluid">
                <div>© 2022 Edocument v1.0.0 Made by <a href="http://laborasyon.com/">Akintan David && Olajide Ayomide</a></div>
                <div>
                    <nav class="nav">
                        <a href="https://themeforest.net/licenses/standard" class="nav-link">Licenses</a>
                        <a href="#" class="nav-link">Change Log</a>
                        <a href="#" class="nav-link">Get Help</a>
                    </nav>
                </div>
            </div>
        </footer>
        <!-- end::footer -->

    </div>
    <!-- end::main-content -->

</div>
<!-- end::main -->
    <script type ="module">
        import { getCookie } from './assets/js/functions/utils.js';
        console.log(getCookie('auth'))
        if (getCookie('auth') == false) {
            location.href = '/login.html'
    }
    </script>
<!-- Plugin scripts -->
<script src="vendors/bundle.js"></script>

<!-- Tagsinput -->
<script src="vendors/tagsinput/bootstrap-tagsinput.js"></script>
<script src="assets/js/examples/tagsinput.js"></script>

<!-- App scripts -->
<script src="assets/js/app.min.js"></script>


<!-- js for the library -->
<script src="assets/js/file-explore.js"></script>

<script>
    $(function () {
        $(document).on('click', '.file-upload-btn', function () {
            $('form#file-upload input[type="file"]').trigger('click');
        });

        $(document).on('click', '.app-sidebar-menu-button', function () {
            $('.app-block .app-sidebar, .app-content-overlay').addClass('show');
            // $('.app-block .app-sidebar .app-sidebar-menu').niceScroll().resize();
            return false;
        });

        $(document).on('click', '.app-content-overlay', function () {
            $('.app-block .app-sidebar, .app-content-overlay').removeClass('show');
            return false;
        });
    });

    // $(document).ready(function() {
    //      $(".file-tree").filetree();
    // });
    // $(document).ready(function() {
    //     $(".file-tree").filetree({
    //         collapsed: true,
    //         animationSpeed:'fast'
    // });
// });
</script>

</body>

<!-- Mirrored from bordash.laborasyon.com/demos/default/file-manager.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 14 Aug 2021 10:19:20 GMT -->
</html>
