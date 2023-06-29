@extends('site.layouts.header')

@section('content')
    <!--============ Resolutions Hero Start ============-->
    <div class="position-relative softsource-top-contianer">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ms-auto me-auto">
                    <div class="position-relative">
                        <div class="text-center softsource-font ">
                            <h1 class="text-white softsoutce-top-banner-text">Founder</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--============ Founder Start ============-->
    <div class="softsource-founder-section">
        <div class="container">
            <section class="softsource-founder-section-about" id="about">

                <div class="softsource-founder-section-about-wrap">

                    <div class="row justify-content-center align-items-center">

                        <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">
                            <div class="about-desc">
                                <div class="about-desc-content softsource-founder-section_cust">
                                    <h2 class="font-weight--reguler mb-15">My Name is <span class="softsource-text-color-secondary">Jean McGavin </span>and I am The Founder of <span class="softsource-text-color-secondary">History Chip. </span></h2>
                                    <p>I am also a child of the American South. My fourth grade Virginia history textbook taught us the official state version of the “truth” that the slaves were happy on the plantations.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12  d-md-block">
                            <img class="img-fluid img-thumbnail" src="{{asset('frontend/images/web_img/f.jpg')}}" alt="Founder's Picture">
                        </div>

                    </div>

                </div>
            </section>
            <div class="pt-3 pb-3 mt-5 softsource-text-justify">
                <p class="softsource-founder-section_ht">As an adult, recognizing that the stories of slaves were not included in that textbook, I had to unlearn that “truth”, recreate that “history,”. That book didn’t present history. It presented the story of a small group of people with a very specific point of view and agenda. Our history textbooks were wrong. They needed the perspectives of slaves, among others, to represent historical truth. </p>
                <p>In my 8th grade history class, we were given a couple of dozen versions of the Battle of Lexington and Concord. Our job was to read these stories and determine the course of the battle—who fired the first shot, etc. That second lesson in history taught me that history was not carved in stone and many stories are needed to flesh out the truth. I learned that history is open to interpretation based on the greatest possible amount of information available.</p>
                <p>Those two important lessons have laid the groundwork for History Chip:</p>
                <ul class="softsource-unorder-list">
                    <li>History can’t be true when crucial voices are excluded.</li>
                    <li>Multiple stories add clarity and truth to history</li>
                </ul>

                <p class="softsource-founder-section_ht mt-3"><span>We all know that one story, one vote, one picture, can change the world.</span>
                    <br>Now, imagine the power of everyone’s true stories. The power of storytelling to help us understand each other and our collective story is what drives us at History Chip. </p>
            </div>
        </div>
    </div>
@endsection
