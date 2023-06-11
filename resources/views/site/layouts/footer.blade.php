 <footer class="pt-5 softsource-footer">
     <div class="mx-5 px-5">
         <div class="row softsource-footer-widget-wrapper softsource-nomargin">

             <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 softsource-footer-div-1">
                 {{-- <img src="{{ asset('frontend/images/logo/logo-light-old.png') }}" alt="History Chip Footer Logo" class="img-fluid w-25"> --}}
                 <div class="softsource-footer-logo-div text-start">
                     <a href="{{ route('home') }}">
                         <img src="{{ asset('frontend/images/logo/logo-light.png') }}" class="img-fluid w-75">
                     </a>
                     <p class="softsource-footer-cust-tag">every person, every story, all the truth</p>
                 </div>
                 <div class="softsource-footer-social-div mt-5 text-start">
                     <ul class="softsource-social-networks softsource-footer-widget__list">
                         <li class="item">
                             <a href="https://www.facebook.com/HistoryChip/" target="_blank" aria-label="Facebook"
                                 class="social-link">
                                 <img alt="facebook-icon"
                                     src="{{ asset('frontend/images/social-media/fbVector.svg') }}">
                             </a>
                         </li>
                         <li class="item">
                             <a href="https://www.youtube.com/channel/UCSrIvdo034dV1rOL-adGu1g" target="_blank"
                                 aria-label="You Tube" class="social-link">
                                 <img alt="youtube-icon"
                                     src="{{ asset('frontend/images/social-media/ytVector.png') }}">
                             </a>
                         </li>
                         <li class="item">
                             <a href="https://instagram.com/historychipofficial?igshid=7bbizkt10clm" target="_blank"
                                 aria-label="Instgram" class="social-link">
                                 <img alt="instagram-icon"
                                     src="{{ asset('frontend/images/social-media/insVector.svg') }}">
                             </a>
                         </li>


                     </ul>
                 </div>

             </div>
             <div
                 class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 softsource-footer-div-1 softsource-footer-widget">
                 <h6 class="softsource-footer-widget__title">QUICK LINKS</h6>
                 <ul class="softsource-footer-widget__list">
                     <li><a href="{{ route('about') }}"><span>About History Chip</span></a></li>
                     <li><a href="{{ route('story.read') }}"><span>Read a Story</span></a></li>
                     <li><a href="{{ route('story.write') }}"><span>Write a Story</span></a></li>
                     <li><a href="{{ route('writingprompt') }}"><span>Writing Prompts</span></a></li>
                 </ul>
             </div>

             <div
                 class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 softsource-footer-div-1 softsource-footer-widget">
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

             <div
                 class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 softsource-footer-div-1 softsource-footer-widget">
                 <h6 class="softsource-footer-widget__title">Contact Us</h6>
                 <ul class="softsource-footer-widget__list">
                     <li>History Chip, LLC P.O. Box 516 Watertown, CT</li>
                     <li>06795-9988</li>
                     <li>info@historychip.com</li>
                 </ul>
             </div>
         </div>
         <div class="softsource-footer-border mt-4"></div>
         <div class="row py-1 g-0">
             <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  softsource-footer-copyright-text">
                 &copy; 2019 - {{ date('Y') }}. Version : 2.0. History Chip. All Rights Reserved.
             </div>
             <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 text-end softsource-footer-poweredby-text">
                 Web designed by <a title="SoftSource, Bangladesh" href="https://wersoftsource.com/" target="_blank"
                     rel="noopener noreferrer">SoftSource, Bangladesh</a>
             </div>
         </div>

     </div>

 </footer>
