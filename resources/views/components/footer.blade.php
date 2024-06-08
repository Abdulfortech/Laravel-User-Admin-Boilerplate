<footer class="footer has-cards">
    <div class="container">
    <hr>
    <div class="row align-items-center justify-content-around">
        <div class="col-md-6 d-flex justify-content-between">
            <div class="copyright d-flex justify-content-between">
                <p>&copy; <?= date('Y');?> <a href="https://onestopshop.ng" class="text-primary" target="_blank">OneStop IT Solutions</a>.</p>
                <div class="icons">
                    <ul class="nav nav-footer justify-content-end">
                        <li class="nav-item">
                            <a href="https://facebook.com/onestopsolution739" class="nav-link text-dark" target="_blank">
                                <span class="text-primary"><i class="fa fa-facebook-square" style="font-size:20px"></i></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="https://instagram.com/onestopsolution739" class="nav-link text-dark" target="_blank">
                                <span class="text-primary"><i class="fa fa-instagram" style="font-size:20px"></i></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="tel:+23407077429320" class="nav-link text-dark" target="_blank">
                                <span class="text-primary"><i class="fa fa-phone" style="font-size:20px"></i></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <ul class="nav nav-footer justify-content-between">
                <li class="nav-item">
                    <a href="{{route('about')}}" class="nav-link text-dark" target="_blank">
                        <span class="text-dark">About Us</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('contact')}}" class="nav-link" target="_blank">
                        <span class="text-dark">Contact Us</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('privacy')}}" class="nav-link" target="_blank">
                        <span class="text-dark">Privacy
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('terms')}}" class="nav-link" target="_blank">
                        <span class="text-dark">Terms & Conditions
                    </a>
                </li>
            </ul>
        </div>
    </div>
    </div>
</footer>
