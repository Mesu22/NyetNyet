<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admin Panel' ?></title>
    <!-- AdminLTE 3 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <?= $this->renderSection('styles') ?>
    <style>
        .sidebar-mini .nav-sidebar .nav-treeview {
            display: none;
        }
        .sidebar-mini .nav-sidebar .menu-open > .nav-treeview {
            display: block;
        }
        @media (max-width: 767.98px) {
            .content-wrapper {
                margin-left: 0;
            }
            .main-sidebar {
                transform: translate(-250px, 0);
                transition: transform .3s ease-in-out;
            }
            .sidebar-open .main-sidebar {
                transform: translate(0, 0);
            }
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="<?= base_url('Beranda') ?>" class="nav-link btn btn-danger text-white">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <span class="brand-text font-weight-light">Admin Panel</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Manage NyetNyet Dropdown -->
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>
                                    Manage NyetNyet
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <!-- Dashboard -->
                                <li class="nav-item">
                                    <a href="#" class="nav-link" id="dashboard-link" data-url="<?= base_url('admin/hero-section') ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Carousel</p>
                                    </a>
                                </li>
                                <!-- Users -->
                                <li class="nav-item">
                                    <a href="#" class="nav-link" id="list-users-link" data-url="<?= base_url('admin/contacts') ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Contact</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link" id="add-user-link" data-url="<?= base_url('admin/about') ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>About Us</p>
                                    </a>
                                </li>
                                <!-- Manage Menu -->
                                <li class="nav-item">
                                    <a href="#" class="nav-link" id="manage-menu-link" data-url="<?= base_url('admin/menu') ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Manage Menu</p>
                                    </a>
                                </li>
                                <!-- Settings -->
                                <li class="nav-item">
                                    <a href="#" class="nav-link" id="settings-link" data-url="<?= base_url('admin/paket') ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Paket Makanan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link" id="settings-link" data-url="<?= base_url('admin/clients') ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Clients</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link" id="settings-link" data-url="<?= base_url('admin/services') ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Services</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Content Header -->
            <div class="content-header">
                <div class="container-fluid">
                    <h1 class="m-0" id="page-title">Dashboard</h1>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid" id="main-content">
                    <!-- Your main content here -->
                </div>
            </section>
        </div>

        <!-- Footer -->
        <footer class="main-footer">
            <strong>&copy; <?= date('Y') ?> Your Company Name.</strong>
            All rights reserved.
        </footer>
    </div>

    <!-- AdminLTE 3 JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Custom JavaScript -->
    <script>
    $(document).ready(function() {
        function loadContent(url, title) {
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    $('#main-content').html(response);
                    $('#page-title').text(title);
                },
                error: function() {
                    alert('Error loading content');
                }
            });
        }

        $('.nav-link').on('click', function(e) {
            e.preventDefault();
            var url = $(this).data('url');
            var title = $(this).find('p').text();
            if (url) {
                loadContent(url, title);
            }
            if ($(window).width() < 768) {
                $('body').removeClass('sidebar-open');
            }
        });

        // Toggle dropdown menu
        $('.nav-item.has-treeview > .nav-link').on('click', function(e) {
            e.preventDefault();
            $(this).parent().toggleClass('menu-open');
        });

        // Handle form submissions for create, edit, and delete
        $(document).on('submit', 'form', function(e) {
            e.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            var method = form.attr('method');
            var formData = new FormData(this);

            $.ajax({
                url: url,
                method: method,
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        // Reload the current page content
                        loadContent('<?= base_url('admin/menu') ?>', 'Manage Menu');
                    } else {
                        alert('Error: ' + response.message);
                    }
                },
                error: function() {
                    alert('Error processing request');
                }
            });
        });

        // Handle delete button clicks
        $(document).on('click', '.delete-btn', function(e) {
            e.preventDefault();
            if (confirm('Are you sure you want to delete this item?')) {
                var url = $(this).attr('href');
                $.ajax({
                    url: url,
                    method: 'POST',
                    success: function(response) {
                        if (response.success) {
                            // Reload the current page content
                            loadContent('<?= base_url('admin/menu') ?>', 'Manage Menu');
                        } else {
                            alert('Error: ' + response.message);
                        }
                    },
                    error: function() {
                        alert('Error processing request');
                    }
                });
            }
        });

        // Handle sidebar toggle for mobile
        $('[data-widget="pushmenu"]').on('click', function() {
            $('body').toggleClass('sidebar-open');
        });

        // Handle logout
        $('.nav-link.btn-danger').on('click', function(e) {
            e.preventDefault();
            window.location.href = $(this).attr('href');
        });
    });
    </script>
    
</body>
</html>
