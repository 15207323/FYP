
<body id="page-top" data-spy="scroll" data-target=".navbar-custom" style="background-image: none">

<nav class="navbar navbar-custom navbar-fixed-top top-nav-collapse" role="navigation">
    <div class="container">
        <div class="navbar navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="<?php echo site_url('Home'); ?>">
                <h1>Dine Together!</h1>
            </a>
        </div>
        <?php
        $session_data = $this->session->userdata('logged_in');
        $session_memberName = $session_data['memberName'];
        ?>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo site_url('Home'); ?>">Home</a></li>
                <li><a href="<?php echo site_url('DiningEventHome') ?>">Dining Event</a></li>
                <li><a href="<?php echo site_url('RestaurantHome') ?>">Restaurant</a></li>
                </li>
                <li><a href="<?php echo site_url('CouponHome') ?>">Coupon</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $session_memberName ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url("UserInfo/view/$session_memberName") ?>">View User Profile</a></li>
                        <li><a href="<?php echo site_url('Home/logout') ?>">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
<!--     /.container -->
</nav>

<div class="clearfix"></div>