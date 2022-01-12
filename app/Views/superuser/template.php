<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?> | Super User</title>

    <link rel="shortcut icon" href="/assets/media/image/favicon.png" />
    <link rel="stylesheet" href="/vendors/bundle.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/app.min.css" type="text/css">

    <?= $this->renderSection('css') ?>
</head>

<body>
    <?= $this->renderSection('topbody') ?>

    <!-- begin::header -->
    <div class="header">

        <div>
            <ul class="navbar-nav">

                <!-- begin::navigation-toggler -->
                <li class="nav-item navigation-toggler">
                    <a href="#" class="nav-link" title="Hide navigation">
                        <i data-feather="arrow-left"></i>
                    </a>
                </li>
                <li class="nav-item navigation-toggler mobile-toggler">
                    <a href="#" class="nav-link" title="Show navigation">
                        <i data-feather="menu"></i>
                    </a>
                </li>
                <!-- end::navigation-toggler -->
            </ul>
        </div>

        <div>
            <ul class="navbar-nav">

                <!--
                <li class="nav-item">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img width="18" class="mr-2" src="/assets/media/image/flags/261-china.png" alt="flag"> China
                    </a>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item">
                            <img width="18" src="/assets/media/image/flags/003-tanzania.png" class="mr-2" alt="flag">
                            Tanzania
                        </a>
                        <a href="#" class="dropdown-item">
                            <img width="18" src="/assets/media/image/flags/262-united-kingdom.png" class="mr-2" alt="flag"> United Kingdom
                        </a>
                        <a href="#" class="dropdown-item">
                            <img width="18" src="/assets/media/image/flags/013-tunisia.png" class="mr-2" alt="flag">
                            Tunisia
                        </a>
                        <a href="#" class="dropdown-item">
                            <img width="18" src="/assets/media/image/flags/044-spain.png" class="mr-2" alt="flag"> Spain
                        </a>
                    </div>
                </li>
                -->

                <!-- begin::header search -->
                <!--
                <li class="nav-item">
                    <a href="#" class="nav-link" title="Search" data-toggle="dropdown">
                        <i data-feather="search"></i>
                    </a>
                    <div class="dropdown-menu p-2 dropdown-menu-right">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search">
                                <div class="input-group-prepend">
                                    <button class="btn" type="button">
                                        <i data-feather="search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
                -->
                <!-- end::header search -->

                <!-- begin::header minimize/maximize -->
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link" title="Fullscreen" data-toggle="fullscreen">
                        <i class="maximize" data-feather="maximize"></i>
                        <i class="minimize" data-feather="minimize"></i>
                    </a>
                </li>
                <!-- end::header minimize/maximize -->

                <!-- begin::header messages dropdown -->
                <!--
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link nav-link-notify" title="Chats" data-toggle="dropdown">
                        <i data-feather="message-circle"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                        <div class="p-4 text-center d-flex justify-content-between" data-backround-image="https://via.placeholder.com/1000X563">
                            <h6 class="mb-0">Chats</h6>
                            <small class="font-size-11 opacity-7">2 unread chats</small>
                        </div>
                        <div>
                            <ul class="list-group list-group-flush">
                                <li>
                                    <a href="#" class="list-group-item d-flex hide-show-toggler">
                                        <div>
                                            <figure class="avatar avatar-sm m-r-15">
                                                <img src="https://via.placeholder.com/128X128" class="rounded-circle" alt="user">
                                            </figure>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                Herbie Pallatina
                                                <i title="Mark as read" data-toggle="tooltip" class="hide-show-toggler-item fa fa-circle-o font-size-11"></i>
                                            </p>
                                            <div class="small text-muted">
                                                <span class="mr-2">02:30 PM</span>
                                                <span>Have you madimage</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="list-group-item d-flex align-items-center hide-show-toggler">
                                        <div>
                                            <figure class="avatar avatar-sm m-r-15">
                                                <img src="https://via.placeholder.com/128X128" class="rounded-circle" alt="user">
                                            </figure>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                Andrei Miners
                                                <i title="Mark as read" data-toggle="tooltip" class="hide-show-toggler-item fa fa-circle-o font-size-11"></i>
                                            </p>
                                            <div class="small text-muted">
                                                <span class="mr-2">08:36 PM</span>
                                                <span>I have a meetinimage</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="text-divider small pb-2 pl-3 pt-3">
                                    <span>Old chats</span>
                                </li>
                                <li>
                                    <a href="#" class="list-group-item d-flex align-items-center hide-show-toggler">
                                        <div>
                                            <figure class="avatar avatar-sm m-r-15">
                                                <img src="https://via.placeholder.com/128X128" class="rounded-circle" alt="user">
                                            </figure>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                Kevin added
                                                <i title="Mark as unread" data-toggle="tooltip" class="hide-show-toggler-item fa fa-check font-size-11"></i>
                                            </p>
                                            <div class="small text-muted">
                                                <span class="mr-2">11:09 PM</span>
                                                <span>Have you madimage</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="list-group-item d-flex hide-show-toggler">
                                        <div>
                                            <figure class="avatar avatar-sm m-r-15">
                                                <img src="https://via.placeholder.com/128X128" class="rounded-circle" alt="user">
                                            </figure>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                Eugenio Carnelley
                                                <i title="Mark as unread" data-toggle="tooltip" class="hide-show-toggler-item fa fa-check font-size-11"></i>
                                            </p>
                                            <div class="small text-muted">
                                                <span class="mr-2">Yesterday</span>
                                                <span>I have a meetinimage</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="list-group-item d-flex align-items-center hide-show-toggler">
                                        <div>
                                            <figure class="avatar avatar-sm m-r-15">
                                                <img src="https://via.placeholder.com/128X128" class="rounded-circle" alt="user">
                                            </figure>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                Neely Ferdinand
                                                <i title="Mark as unread" data-toggle="tooltip" class="hide-show-toggler-item fa fa-check font-size-11"></i>
                                            </p>
                                            <div class="small text-muted">
                                                <span class="mr-2">Yesterday</span>
                                                <span>I have a meetinimage</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="p-2 text-right">
                            <ul class="list-inline small">
                                <li class="list-inline-item">
                                    <a href="#">Mark All Read</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                -->
                <!-- end::header messages dropdown -->

                <!-- begin::header notification dropdown -->
                <!--
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link nav-link-notify" title="Notifications" data-toggle="dropdown">
                        <i data-feather="bell"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                        <div class="p-4 text-center d-flex justify-content-between" data-backround-image="https://via.placeholder.com/1000X563">
                            <h6 class="mb-0">Notifications</h6>
                            <small class="font-size-11 opacity-7">1 unread notifications</small>
                        </div>
                        <div>
                            <ul class="list-group list-group-flush">
                                <li>
                                    <a href="#" class="list-group-item d-flex hide-show-toggler">
                                        <div>
                                            <figure class="avatar avatar-sm m-r-15">
                                                <span class="avatar-title bg-success-bright text-success rounded-circle">
                                                    <i class="ti-user"></i>
                                                </span>
                                            </figure>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                New customer registered
                                                <i title="Mark as read" data-toggle="tooltip" class="hide-show-toggler-item fa fa-circle-o font-size-11"></i>
                                            </p>
                                            <span class="text-muted small">20 min ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="text-divider small pb-2 pl-3 pt-3">
                                    <span>Old notifications</span>
                                </li>
                                <li>
                                    <a href="#" class="list-group-item d-flex hide-show-toggler">
                                        <div>
                                            <figure class="avatar avatar-sm m-r-15">
                                                <span class="avatar-title bg-warning-bright text-warning rounded-circle">
                                                    <i class="ti-package"></i>
                                                </span>
                                            </figure>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                New Order Recieved
                                                <i title="Mark as unread" data-toggle="tooltip" class="hide-show-toggler-item fa fa-check font-size-11"></i>
                                            </p>
                                            <span class="text-muted small">45 sec ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="list-group-item d-flex align-items-center hide-show-toggler">
                                        <div>
                                            <figure class="avatar avatar-sm m-r-15">
                                                <span class="avatar-title bg-danger-bright text-danger rounded-circle">
                                                    <i class="ti-server"></i>
                                                </span>
                                            </figure>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                Server Limit Reached!
                                                <i title="Mark as unread" data-toggle="tooltip" class="hide-show-toggler-item fa fa-check font-size-11"></i>
                                            </p>
                                            <span class="text-muted small">55 sec ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="list-group-item d-flex align-items-center hide-show-toggler">
                                        <div>
                                            <figure class="avatar avatar-sm m-r-15">
                                                <span class="avatar-title bg-info-bright text-info rounded-circle">
                                                    <i class="ti-layers"></i>
                                                </span>
                                            </figure>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                Apps are ready for update
                                                <i title="Mark as unread" data-toggle="tooltip" class="hide-show-toggler-item fa fa-check font-size-11"></i>
                                            </p>
                                            <span class="text-muted small">Yesterday</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="p-2 text-right">
                            <ul class="list-inline small">
                                <li class="list-inline-item">
                                    <a href="#">Mark All Read</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                -->
                <!-- end::header notification dropdown -->

                <!-- begin::user menu -->
                <!--
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link" title="User menu" data-toggle="dropdown">
                        <i data-feather="settings"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                        <div class="p-4 text-center d-flex justify-content-between" data-backround-image="https://via.placeholder.com/1000X563">
                            <h6 class="mb-0">Settings</h6>
                        </div>
                        <div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                                        <label class="custom-control-label" for="customSwitch1">Allow notifications.</label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch2">
                                        <label class="custom-control-label" for="customSwitch2">Hide user requests</label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch3" checked>
                                        <label class="custom-control-label" for="customSwitch3">Speed up demands</label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch4" checked>
                                        <label class="custom-control-label" for="customSwitch4">Hide menus</label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch5">
                                        <label class="custom-control-label" for="customSwitch5">Remember next visits</label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch6">
                                        <label class="custom-control-label" for="customSwitch6">Enable report generation.</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                -->
                <!-- end::user menu -->
            </ul>

            <!-- begin::mobile header toggler -->
            <ul class="navbar-nav d-flex align-items-center">
                <li class="nav-item header-toggler">
                    <a href="#" class="nav-link">
                        <i data-feather="arrow-down"></i>
                    </a>
                </li>
            </ul>
            <!-- end::mobile header toggler -->
        </div>

    </div>
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
                                <img src="https://via.placeholder.com/128X128" class="rounded-circle" alt="avatar">
                            </figure>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                            <div class="p-3 text-center" data-backround-image="https://via.placeholder.com/1000X563">
                                <figure class="avatar mb-3">
                                    <img src="https://via.placeholder.com/128X128" class="rounded-circle" alt="image">
                                </figure>
                                <h6 class="d-flex align-items-center justify-content-center">
                                    <?= $session->full_name ?>
                                    <a href="#" class="btn btn-primary btn-sm ml-2" data-toggle="tooltip" title="Edit profile">
                                        <i data-feather="edit-2"></i>
                                    </a>
                                </h6>
                                <small>Administrator</small>
                            </div>
                            <div class="dropdown-menu-body">
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
                    <?php
                    if (!empty($segment[1])) {
                        $menu = $segment[1];
                        if (!empty($segment[2])) {
                            $submenu = $segment[2];
                        }
                    }
                    ?>
                    <ul>
                        <li>
                            <a href="#" <?= ($menu == 'dashboard') ? 'class="active"' : '' ?> data-toggle="tooltip" data-placement="right" title="Dashboard" data-nav-target="#dashboard">
                                <i data-feather="bar-chart-2"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" <?= ($menu == 'guest') ? 'class="active"' : '' ?> data-toggle="tooltip" data-placement="right" title="Guests" data-nav-target="#guest">
                                <i data-feather="users"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" <?= ($menu == 'reservation') ? 'class="active"' : '' ?> data-toggle="tooltip" data-placement="right" title="Reservations" data-nav-target="#reservations">
                                <i data-feather="calendar"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" <?= ($menu == 'checkin') ? 'class="active"' : '' ?> data-toggle="tooltip" data-placement="right" title="Check In" data-nav-target="#checkin">
                                <i data-feather="user-check"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" <?= ($menu == 'billing') ? 'class="active"' : '' ?> data-toggle="tooltip" data-placement="right" title="Billing" data-nav-target="#billing">
                                <i data-feather="dollar-sign"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" <?= ($menu == 'setup') ? 'class="active"' : '' ?> data-toggle="tooltip" data-placement="right" title="Hotel Setup" data-nav-target="#setup">
                                <i data-feather="tool"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <ul>
                        <li>
                            <a href="/superuser/logout" data-toggle="tooltip" data-placement="right" title="Logout">
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
                        <a href="/superuser/dashboard">
                            <img class="logo" src="/assets/media/image/logo-skala.png" alt="logo">
                            <img class="logo-light" src="/assets/media/image/logo-skala.png" alt="light logo">
                        </a>
                    </div>
                </div>
                <!-- end::navigation-logo -->

                <div class="navigation-menu-group">
                    <div id="dashboard" <?= ($menu == 'dashboard') ? 'class="open"' : '' ?>>
                        <ul>
                            <li class="navigation-divider">Dashboard</li>
                            <li>
                                <a href="/superuser/dashboard" <?= ($menu == 'dashboard' && empty($submenu)) ? 'class="active"' : '' ?>>Overview</a>
                            </li>
                        </ul>
                    </div>

                    <div id="guest" <?= ($menu == 'guest') ? 'class="open"' : '' ?>>
                        <ul>
                            <li class="navigation-divider">Guests</li>
                            <li>
                                <a href="/superuser/guest" <?= ($menu == 'guest' && empty($submenu)) ? 'class="active"' : '' ?>>
                                    <span>All Guest</span>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="/superuser/guest/add" <?= ($menu == 'guest' && (!empty($submenu))) ? (($submenu == 'add') ? 'class="active"' : '') : '' ?>>
                                    <span>Add New Guest</span>
                                </a>
                            </li> -->
                        </ul>
                    </div>
                    <div id="reservations" <?= ($menu == 'reservation') ? 'class="open"' : '' ?>>
                        <ul>
                            <li class="navigation-divider">Reservations</li>
                            <li>
                                <a href="/superuser/reservation" <?= ($menu == 'reservation' && empty($submenu)) ? 'class="active"' : '' ?>>
                                    <span>All Reservations</span>
                                </a>
                            </li>
                            <li>
                                <a href="/superuser/reservation/add" <?= ($menu == 'reservation' && (!empty($submenu))) ? (($submenu == 'add') ? 'class="active"' : '') : '' ?>>
                                    <span>Add New Reservation</span>
                                </a>
                            </li>
                            <li class="navigation-divider">Reports</li>
                            <li>
                                <a href="/superuser/reservation/arrival_list" <?= ($menu == 'reservation' && (!empty($submenu))) ? (($submenu == 'arrival_list') ? 'class="active"' : '') : '' ?>>
                                    <span>Expected Arrival List</span>
                                </a>
                            </li>
                            <li>
                                <a href="/superuser/reservation/diary" <?= ($menu == 'reservation' && (!empty($submenu))) ? (($submenu == 'diary') ? 'class="active"' : '') : '' ?>>
                                    <span>Reservation Diary</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div id="checkin" <?= ($menu == 'checkin') ? 'class="open"' : '' ?>>
                        <ul>
                            <li class="navigation-divider">Check In</li>
                            <li>
                                <a href="/superuser/checkin" <?= ($menu == 'checkin' && empty($submenu)) ? 'class="active"' : '' ?>>
                                    <span>Arrival List</span>
                                </a>
                            </li>
                            <li class="navigation-divider">Reports</li>
                            <li>
                                <a href="/superuser/checkin/morning_call" <?= ($menu == 'checkin' && (!empty($submenu))) ? (($submenu == 'morning_call') ? 'class="active"' : '') : '' ?>>
                                    <span>Mornig Call Sheet</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div id="billing" <?= ($menu == 'billing') ? 'class="open"' : '' ?>>
                        <ul>
                            <li class="navigation-divider">Billing</li>
                            <li>
                                <a href="/superuser/billing" <?= ($menu == 'billing' && empty($submenu)) ? 'class="active"' : '' ?>>
                                    <span>Billing</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div id="setup" <?= ($menu == 'setup') ? 'class="open"' : '' ?>>
                        <ul>
                            <li class="navigation-divider">Hotel Setup</li>
                            <li>
                                <a href="/superuser/setup" <?= ($menu == 'setup' && (empty($submenu))) ? 'class="active"' : '' ?>>
                                    <span><i class="fa fa-question-circle"></i> Download Guide</span>
                                </a>
                            </li>
                            <hr>
                            <li class="navigation-divider">Setup Rooms Type</li>
                            <li>
                                <a href="/superuser/setup/type" <?= ($menu == 'setup' && (!empty($submenu))) ? (($submenu == 'type') ? 'class="active"' : '') : '' ?>>
                                    <span><i class="fa fa-bed"></i> Rooms Type</span>
                                </a>
                            </li>
                            <li>
                                <a href="/superuser/setup/type_add" <?= ($menu == 'setup' && (!empty($submenu))) ? (($submenu == 'type_add') ? 'class="active"' : '') : '' ?>>
                                    <span><i class="fa fa-plus"></i> Add New Type</span>
                                </a>
                            </li>
                            <hr>
                            <li class="navigation-divider">Setup Rooms</li>
                            <li>
                                <a href="/superuser/setup/rooms" <?= ($menu == 'setup' && (!empty($submenu))) ? (($submenu == 'rooms') ? 'class="active"' : '') : '' ?>>
                                    <span><i class="fa fa-bed"></i> All Rooms</span>
                                </a>
                            </li>
                            <li>
                                <a href="/superuser/setup/rooms_add" <?= ($menu == 'setup' && (!empty($submenu))) ? (($submenu == 'rooms_add') ? 'class="active"' : '') : '' ?>>
                                    <span><i class="fa fa-plus"></i> Add New Rooms</span>
                                </a>
                            </li>

                            <hr>
                            <li class="navigation-divider">Setup Pricing</li>
                            <li>
                                <a href="/superuser/setup/price_list" <?= ($menu == 'setup' && (!empty($submenu))) ? (($submenu == 'price_list') ? 'class="active"' : '') : '' ?>>
                                    <span><i class="fa fa-tags"></i> Price List</span>
                                </a>
                            </li>
                            <li>
                                <a href="/superuser/setup/price_add" <?= ($menu == 'setup' && (!empty($submenu))) ? (($submenu == 'price_add') ? 'class="active"' : '') : '' ?>>
                                    <span><i class="fa fa-plus"></i> Add New Price List</span>
                                </a>
                            </li>
                            <li class="navigation-divider">Extra Services</li>
                            <li>
                                <a href="/superuser/setup/service" <?= ($menu == 'setup' && (!empty($submenu))) ? (($submenu == 'service') ? 'class="active"' : '') : '' ?>>
                                    <span><i class="fa fa-archive"></i> All Services</span>
                                </a>
                            </li>
                            <li>
                                <a href="/superuser/setup/service_add" <?= ($menu == 'setup' && (!empty($submenu))) ? (($submenu == 'service_add') ? 'class="active"' : '') : '' ?>>
                                    <span><i class="fa fa-plus"></i> Add New Price List</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end::navigation menu -->

        </div>
        <!-- end::navigation -->

        <!-- begin::main-content -->
        <main class="main-content">

            <?= $this->renderSection('content') ?>

            <!-- begin::footer -->
            <footer>
                <div class="container-fluid">
                    <div>&copy 2021 Hotel Management System v2.0.0 Made by <a href="http://baa.co.id">BAA</a></div>
                    <div>
                        <nav class="nav">
                            <!--
                                <a href="https://themeforest.net/licenses/standard" class="nav-link">Licenses</a>
                            <a href="#" class="nav-link">Change Log</a>
                            <a href="#" class="nav-link">Get Help</a>
                            -->
                        </nav>
                    </div>
                </div>
            </footer>
            <!-- end::footer -->

        </main>
        <!-- end::main-content -->

    </div>
    <!-- end::main -->

    <script src="/vendors/bundle.js"></script>
    <script src="/assets/js/custom.js"></script>
    <script src="/assets/js/app.js"></script>
    <script src="/vendors/printThis/printThis.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?= $this->renderSection('js') ?>

</body>

</html>