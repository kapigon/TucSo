<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Túc số tu tập</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'customs/css/bootstrap.css' ?>"/>
        
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url() . 'customs/css/customs.css' ?>"/>
        
         <!-- Themes -->
        <!-- 
        <link rel="stylesheet" href="<?php echo base_url() . 'customs/css'?>/themes/bars-1to10.css">
        <link rel="stylesheet" href="<?php echo base_url() . 'customs/css'?>/themes/bars-movie.css">
        <link rel="stylesheet" href="<?php echo base_url() . 'customs/css'?>/themes/bars-square.css">
        <link rel="stylesheet" href="<?php echo base_url() . 'customs/css'?>/themes/bars-pill.css">
        <link rel="stylesheet" href="<?php echo base_url() . 'customs/css'?>/themes/bars-reversed.css">
        <link rel="stylesheet" href="<?php echo base_url() . 'customs/css'?>/themes/bars-horizontal.css">

        <link rel="stylesheet" href="<?php echo base_url() . 'customs/css'?>/themes/fontawesome-stars.css">
        <link rel="stylesheet" href="<?php echo base_url() . 'customs/css'?>/themes/css-stars.css">
        <link rel="stylesheet" href="<?php echo base_url() . 'customs/css'?>/themes/bootstrap-stars.css">
        <link rel="stylesheet" href="<?php echo base_url() . 'customs/css'?>/themes/fontawesome-stars-o.css"> -->
        
        
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <style>
            /*.frmSearch {border: 1px solid #a8d4b1;background-color: #c6f7d0;margin: 2px 0px;padding:40px;border-radius:4px; position: relative;}
            #country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute;}
            #country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
            #country-list li:hover{background:#ece3d2;cursor: pointer;}
            #txtTextSearch1{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}*/
        </style>
    </head>
    <body>
        <?php
        $currentUser = null;
        if(!isset($_SESSION)) 
        { 
            session_start();
        }
        if(isset($_SESSION["cUser"])){
            $currentUser = $_SESSION["cUser"];
        }
        ?>
        <div class="container">
            <div class ="row">
                <div class="span12">
                    <div class="well">
                        <center><h1>TÚC SỐ</h1></center>
                    </div>
                </div>
            </div>
            
            <?php include 'navbar.php';?>
            
            <?php 
            if($this->session->flashdata('user_registered')):
                echo '<p class="alert alert-success">' . $this->session->flashdata('user_registered') . '</p>';
            endif;
            ?>
            
            <?php 
            if($this->session->flashdata('user_loggedin')):
                echo '<p class="alert alert-success">' . $this->session->flashdata('user_loggedin') . '</p>';
            endif;
            ?>
            
            <?php 
            if($this->session->flashdata('user_loggedout')):
                echo '<p class="alert alert-success">' . $this->session->flashdata('user_loggedout') . '</p>';
            endif;
            ?>
            
            <?php 
            if($this->session->flashdata('login_falied')):
                echo '<p class="alert alert-danger">' . $this->session->flashdata('login_falied') . '</p>';
            endif;
            ?>
            
             <?php 
            if($this->session->flashdata('Buddha_update')):
                echo '<p class="alert alert-success">' . $this->session->flashdata('Buddha_update') . '</p>';
            endif;
            ?>
             <?php 
            if($this->session->flashdata('Buddha_create')):
                echo '<p class="alert alert-success">' . $this->session->flashdata('Buddha_create') . '</p>';
            endif;
            ?>
            <?php 
            if($this->session->flashdata('favorite_add')):
                echo '<p class="alert alert-success">' . $this->session->flashdata('favorite_add') . '</p>';
            endif;
            ?>
            <?php 
            if($this->session->flashdata('favorite_failed')):
                echo '<p class="alert alert-danger">' . $this->session->flashdata('favorite_failed') . '</p>';
            endif;
            ?>
            <div class="ui-widget">
                <!--<label for="tags">Tags: </label>
                <input id="tags">-->
              </div>
            <?php
                // Check Session User đăng nhập, chưa
            ?>