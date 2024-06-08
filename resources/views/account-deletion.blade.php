<!DOCTYPE html>
<link rel="icon" href="https://res.cloudinary.com/dqxaizgsd/image/upload/w_1000,c_fill,ar_1:1,g_auto,r_max,bo_5px_solid_white,b_rgb:262c35/v1717574008/Logo/OneStop/fd1uuzvb1g7ep88p2pmf.jpg" type="image/jpg">
@extends('layout.indexLayout')
@section('title', 'Account Deletion Policy')
@php( $page = 'home')
@section('contents')
  <!-- loader END -->
  <div class="wrapper">
    <!-- <span class="uisheet screen-darken"></span> -->
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">AA Rasheed Data</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbar-1" aria-controls="navbar-1" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-1">
                <ul class="mb-2 navbar-nav ms-auto mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#reseller">Reseller</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#pricing">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#contact">Contact Us</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link btn btn-light" aria-current="page" href="/user/signin">Sign In</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navbar end -->

    <div class="jumbotron p-5 text-center" style="background: url('{{asset("app/assets/images/dashboard/top-image.jpg")}}')"; background-size: cover; background-repeat: no-repeat; height: 25vh;position: relative;">
        <h1 class="text-white">Account or Data Deletion</h1>
    </div>
    <div class="col-md-7 mx-auto my-4">
        <div class="card">
            <div class="card-body ">
                <p class="text-justify">
                    As a user of AA Rasheed Data, You can request the deletion of your account or your data under certain circumstances.
                    You can request the deletion of the following data :
                    <ul>
                        <li>
                            <p class="text-justify">
                                Personal Data
                            </p>
                        </li>
                        <li>
                            <p class="text-justify">
                                Order and Delivery Data
                            </p>
                        </li>
                        <li>
                            <p class="text-justify">
                                Payment Data
                            </p>
                        </li>
                    </ul>
                </p>
                <p class="text-justify">If you want to delete your account or some of your data, please feel free to contact us using the following contact details:</p>
                <p class="text-justify fw-bold mb-0">Email: info@aarasheeddata.com.ng</p>
                <p class="text-justify fw-bold">Phone: +234 7036774566 </p>
                <p class="text-justify">We are committed to addressing your concerns promptly and ensuring the protection of your privacy and right. Your feedback is important to us, and we encourage you to reach out if you have any questions or require further clarification about our data practices.</p>
            </div>
        </div>
    </div>
    <!-- Footer Section Start -->
    <footer class="footer">
        <div class="footer-body">
            <div class="left-panel ">
                ©<script>document.write(new Date().getFullYear())</script> AARasheed Data
            </div>
            <div class="right-panel">
                Designed by <a href="https://sgr.com.ng/">SGR</a>.
            </div>
        </div>
    </footer>

  </div>
  <!-- Wrapper End-->
