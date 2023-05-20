<footer class="pt-5">
    <div class="row g-0">
        <div class="col-12 text-center">
            <div class="footer-box d-inline-block px-3 py-2">
                <div class="softsource-add-your-story-box softsource-btn-hover-transition">
                    <a href="{{ route('story.write') }}"
                        class="softsource-add-your-story-box-btn softsource-btn-hover-transition">Add Your Story</a>
                    <div class="softsource-add-story-link">
                        <a title="Add with Audio" href="{{ route('story.write', ['type' => 'audio']) }}"><i
                                class="fa fa-music"></i></a>
                        <a title="Add with Video" href="{{ route('story.write', ['type' => 'audio']) }}"><i
                                class="fa fa-video"></i></a>
                        <a title="Add Only Text" href="{{ route('story.write', ['type' => 'text']) }}"
                            class="music"><i class="fa fa-file"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 text-center mt-4">
            <div class="softsource-footer-horizontal-border"></div>
            <div class="softsource-footer-image">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('frontend/images/logo/logo-light.png') }}" class="img-fluid dark-logo"
                        alt="History Chip Logo">
                    <p class="softsource-footer-image-tag">every person, every story, all the truth</p>
                </a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row softsource-footer-widget-wrapper softsource-nomargin cust-col">
            <div class="col-md-4 col-lg-3 softsource-footer-widget">
                <h6 class="softsource-footer-widget__title">Quick links</h6>
                <ul class="softsource-footer-widget__list">
                    <li><a href="{{ route('about') }}"><span>About History Chip</span></a></li>
                    <li><a href="{{ route('story.read') }}"><span>Read a Story</span></a></li>
                    <li><a href="{{ route('story.write') }}"><span>Write a Story</span></a></li>
                    <li><a href="{{ route('writingprompt') }}"><span>Writing Prompts</span></a></li>
                </ul>
            </div>

            <div class="col-6 col-md-4 col-lg-3 softsource-footer-widget">
                <h6 class="softsource-footer-widget__title">Resource</h6>
                <ul class="softsource-footer-widget__list">
                    <li><a href="{{ route('faq') }}"><span>FAQ</span></a></li>
                    <li><a href="{{ route('blogs') }}"><span>Blogs</span></a></li>
                    <li><a href="{{ route('register') }}"><span>Registration</span></a></li>
                    <li><a href="{{ route('termsandconditions') }}"><span>Terms of Use</span></a></li>
                    <li><a href="{{ route('privacypolicy') }}"><span>Privacy Policy</span></a></li>
                    <li><a href="{{ route('contactus') }}"><span>Contact Us</span></a></li>
                </ul>
            </div>

            <div class="col-6 col-md-4 col-lg-3 softsource-footer-widget">

                <div class="hero-button-group m-none bgover text-center">
                    <a href="{{ route('login') }}"
                        class="softsource-footer-login-btn btn softsource-btn-hover-transition"><span
                            class="btn-icon mr-2"></span>Log in / Register</a>

                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3 mt-3 mt-lg-0 footer-widget">
                <h6 class="softsource-footer-widget__title">Contact Us</h6>
                <ul class="softsource-footer-widget__list">
                    <li>History Chip, LLC<br> P.O. Box 516<br> Watertown,
                        CT 06795-9988. <br>info@historychip.com</li>
                </ul>
            </div>


            <div class="col-6 col-md-4 col-lg-3 mt-3 mt-lg-0 footer-widget">
                <h6 class="softsource-footer-widget__title">Connect Socially</h6>
                <ul class="softsource-social-networks softsource-footer-widget__list">
                    <li class="item">
                        <a href="https://www.facebook.com/HistoryChip/" target="_blank" aria-label="Facebook"
                            class="social-link">
                            <img alt="facebook-icon" src="{{ asset('frontend/images/social-media/facebook-footer.png')}}">
                        </a>
                    </li>
                    <li class="item">
                        <a href="https://instagram.com/historychipofficial?igshid=7bbizkt10clm" target="_blank"
                            aria-label="Instgram" class="social-link">
                            <img alt="instagram-icon" src="{{ asset('frontend/images/social-media/insta-footer.png')}}">
                        </a>
                    </li>


                    <li class="item">
                        <a href="https://www.youtube.com/channel/UCSrIvdo034dV1rOL-adGu1g" target="_blank"
                            aria-label="You Tube" class="social-link">
                            <img alt="youtube-icon" src="{{ asset('frontend/images/social-media/youtube-footer.png')}}">
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
    <div class="softsource-border-light mt-4"></div>
    <div class="row py-1 g-0">
        <div class="col-md-4 offset-md-2">
            &copy; 2019 - {{ date('Y') }}. Version : 2.0. History Chip. All Rights Reserved.
        </div>
        <div class="col-md-4 text-md-end">
            Web designed by <a title="SoftSource, Bangladesh" href="https://wersoftsource.com/" target="_blank"
                rel="noopener noreferrer">SoftSource, Bangladesh</a>
        </div>
    </div>

</footer>






