@extends('site.layouts.header')

@section('content')
    <style scoped>
        .softsource-top-contianer {
            background-image: url("{{ asset('frontend/images/web_img/faqbg.jpg') }}");
            background-position: center;
            background-size: cover;
        }
    </style>
    <!--============ Resolutions Hero Start ============-->
    <div class="position-relative softsource-top-contianer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 ms-auto me-auto">
                    <div class="position-relative">
                        <div class="text-center softsource-font ">
                            <h1 class="text-white softsoutce-top-banner-text">FAQs</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--============ Founder Start ============-->
    <div class="softsource-faq-section pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- section-title-wrap Start -->
                    <div class="softsource-faq-heading text-center">
                        <h3>Frequently asked questions</h3>
                    </div>
                    <!-- section-title-wrap Start -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="softsource-faq-accordion-wrapper mt-5">
                        <div id="softsource-faq-accordion">
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn-link collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Do stories on History Chip have to be true? <span> <i
                                                    class="fas fa-chevron-down"></i>
                                                <i class="fas fa-chevron-up"></i> </span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#softsource-faq-accordion">
                                    <div class="card-body">
                                        <p>The short answer is a resounding YES! We want you to write your stories
                                            honestly and truthfully, to the best of your ability. However, we know that
                                            memories can be fuzzy and sometimes can be just plain wrong, even when we
                                            believe we remember them very clearly. That is why we want lots of people to
                                            tell their stories. With a lot of stories on a given topic, we can formulate
                                            a clearer understanding of what really happened.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn-link collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            What requirements do you have for stories? <span> <i
                                                    class="fas fa-chevron-down"></i>
                                                <i class="fas fa-chevron-up"></i> </span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                    data-bs-parent="#softsource-faq-accordion">
                                    <div class="card-body">
                                        <p>All stories must be true to the best of the story teller’s ability. Also,
                                            stories must meet our criteria for civility as laid out in our <a
                                                href="/termsandconditions" target="_blank"> <u>Terms Of Use.</u></a>
                                            Please refer to the <a href="/writingtips" target="_blank"> <u>Writing
                                                    Tips</u></a> page for helpful suggestions on writing.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingFour">
                                    <h5 class="mb-0">
                                        <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                            aria-expanded="false" aria-controls="collapseFour">
                                            Are there limits to the length of stories? <span> <i
                                                    class="fas fa-chevron-down"></i>
                                                <i class="fas fa-chevron-up"></i> </span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                    data-bs-parent="#softsource-faq-accordion">
                                    <div class="card-body">
                                        <p>Yes. We limit the stories to 500 words. However, you can always break up your
                                            story into sections, posting the sections with chapter headings. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingSix">
                                    <h5 class="mb-0">
                                        <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseSix"
                                            aria-expanded="false" aria-controls="collapseSix">
                                            Can I tell a story that someone else told me, one that I didn’t witness?
                                            <span> <i class="fas fa-chevron-down"></i>
                                                <i class="fas fa-chevron-up"></i> </span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseSix" class="collapse" aria-labelledby="headingSix"
                                    data-bs-parent="#softsource-faq-accordion">
                                    <div class="card-body">
                                        <p>Yes, you can, as long as you make it clear that the story was told to you and
                                            that you did not witness the event. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingSeven">
                                    <h5 class="mb-0">
                                        <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseSeven"
                                            aria-expanded="false" aria-controls="collapseSeven">
                                            What if someone else tells the same story but remembers it differently?
                                            <span> <i class="fas fa-chevron-down"></i>
                                                <i class="fas fa-chevron-up"></i> </span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven"
                                    data-bs-parent="#softsource-faq-accordion">
                                    <div class="card-body">
                                        <p>At History Chip we welcome different memories and points of view. These
                                            varied perspectives are necessary to developing a fuller understanding of
                                            history. Imagine being at a family gathering when someone tells a story from
                                            your childhood. Everyone will likely chime in with their own memories, some
                                            of which may be contradictory. All those stories together are necessary to
                                            get a full picture of that event.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingEight">
                                    <h5 class="mb-0">
                                        <button class="collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#collapseEight" aria-expanded="false"
                                            aria-controls="collapseEight">
                                            I want to be a part of this project but my life seems pretty ordinary. What
                                            should I write about? <span> <i class="fas fa-chevron-down"></i>
                                                <i class="fas fa-chevron-up"></i> </span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseEight" class="collapse" aria-labelledby="headingEight"
                                    data-bs-parent="#softsource-faq-accordion">
                                    <div class="card-body">
                                        <p>One thing we know at History Chip is that everybody has a story, each of us
                                            has a story to tell that might not seem dramatic to you but offers insights
                                            into your particular way of life. Descriptions of your job, your school, the
                                            foods you eat or the clothes you wear all add to our understanding of life
                                            where you live. Let’s say you are a farmer. Stories of life on your farm in
                                            Canada may be very different from descriptions of life on a farm in
                                            Argentina or Senegal or Mongolia or Spain. These are wonderful stories and
                                            are so vital to the mission of History Chip.
                                            Please refer to the <a href="/writingtips" target="_blank"><u>Writing
                                                    Tips</u></a> page for helpful suggestions on writing.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingNine">
                                    <h5 class="mb-0">
                                        <button class="collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#collapseNine" aria-expanded="false"
                                            aria-controls="collapseNine">
                                            What if I am not a good writer? <span> <i class="fas fa-chevron-down"></i>
                                                <i class="fas fa-chevron-up"></i> </span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseNine" class="collapse" aria-labelledby="headingNine"
                                    data-bs-parent="#softsource-faq-accordion">
                                    <div class="card-body">
                                        <p>If you can tell a simple story, you can write for History Chip. We know that
                                            all of us talk all the time. We tell stories all the time. If you can do
                                            that, writing a simple story is no more difficult that simply writing down a
                                            story you might tell a friend. We invite you to be comfortable about
                                            writing. Just write what you know. We just ask that you make sure you are
                                            writing as truthfully as possible. Try to include as much detail as you can
                                            remember. Please refer to the <a href="/writingtips"
                                                target="_blank"><u>Writing Tips</u></a> page for helpful suggestions on
                                            writing.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingTen">
                                    <h5 class="mb-0">
                                        <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTen"
                                            aria-expanded="false" aria-controls="collapseTen">
                                            Are all stories submitted to History Chip posted? <span> <i
                                                    class="fas fa-chevron-down"></i>
                                                <i class="fas fa-chevron-up"></i> </span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTen" class="collapse" aria-labelledby="headingTen"
                                    data-bs-parent="#softsource-faq-accordion">
                                    <div class="card-body">
                                        <p>No, History Chip reserves the right to not post, or to remove stories that
                                            are found to have unsuitable content. Once a story is submitted to History
                                            Chip, it is reviewed and if accepted, will be posted on the site and the
                                            writer will be notified of the posting. Please see the <a
                                                href="/termsandconditions" target="_blank"><u>Terms Of Use</u></a> for
                                            additional details.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingEleven">
                                    <h5 class="mb-0">
                                        <button class="collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#collapseEleven" aria-expanded="false"
                                            aria-controls="collapseEleven">
                                            How to register on the site? <span> <i class="fas fa-chevron-down"></i>
                                                <i class="fas fa-chevron-up"></i> </span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseEleven" class="collapse" aria-labelledby="headingEleven"
                                    data-bs-parent="#softsource-faq-accordion">
                                    <div class="card-body">
                                        <p>You may click on the <a href="/register"
                                                target="_blank"><u>LogIn/Register</u></a> tab to register. You will be
                                            asked to add your Name, email and other profile information, including a
                                            username if you prefer not have your name public. Additionally, when you
                                            prepare to add a story, you will be prompted to log in to History Chip, or
                                            if you have not already done so you will be asked to register.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="softsource-faq-accordion-wrapper mt-5">
                        <div id="softsource-faq-accordion-2">
                            <div class="card">
                                <div class="card-header" id="faq_2">
                                    <h5 class="mb-0">
                                        <button class="btn-link collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#faq_two" aria-expanded="false" aria-controls="faq_two">
                                            Do you have any tips on story writing?<span> <i
                                                    class="fas fa-chevron-down"></i>
                                                <i class="fas fa-chevron-up"></i> </span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="faq_two" class="collapse" aria-labelledby="faq_2" data-bs-parent="#softsource-faq-accordion-2">
                                    <div class="card-body">
                                        <p>Yes. Please refer to the <a href="/writingtips" target="_blank"><u>Writing
                                                    Tips</u></a> page for helpful
                                            suggestions on writing.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faq_3">
                                    <h5 class="mb-0">
                                        <button class="btn-link collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#faq_three" aria-expanded="false" aria-controls="faq_three">
                                            What if I am not certain of the facts? <span> <i
                                                    class="fas fa-chevron-down"></i>
                                                <i class="fas fa-chevron-up"></i> </span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="faq_three" class="collapse" aria-labelledby="faq_3" data-bs-parent="#softsource-faq-accordion-2">
                                    <div class="card-body">
                                        <p>That is OK. Write down what you remember. Your memories might spark
                                            others to write their own memories of the event and together those
                                            combined stories will help to clarify our understanding of history.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faq_4">
                                    <h5 class="mb-0">
                                        <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#faq_four"
                                            aria-expanded="false" aria-controls="faq_four">
                                            Does History Chip verify or correct my stories? <span> <i
                                                    class="fas fa-chevron-down"></i>
                                                <i class="fas fa-chevron-up"></i> </span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="faq_four" class="collapse" aria-labelledby="faq_4"
                                    data-bs-parent="#softsource-faq-accordion-2">
                                    <div class="card-body">
                                        <p>No, we do not. These are your memories and we are looking to aggregate
                                            historical memories and tidbits, not alter your perceptions or memories.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faq_6">
                                    <h5 class="mb-0">
                                        <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#faq_Six"
                                            aria-expanded="false" aria-controls="faq_Six">
                                            Can I add a story that was written down a long time ago by a deceased
                                            ancestor? <span> <i class="fas fa-chevron-down"></i>
                                                <i class="fas fa-chevron-up"></i> </span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="faq_Six" class="collapse" aria-labelledby="faq_6"
                                    data-bs-parent="#softsource-faq-accordion-2">
                                    <div class="card-body">
                                        <p>Yes, absolutely! Please attribute them to the writer and the time the
                                            story was written.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faq_7">
                                    <h5 class="mb-0">
                                        <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#faq_Seven"
                                            aria-expanded="false" aria-controls="faq_Seven">
                                            What if someone disputes my version of the story? <span> <i
                                                    class="fas fa-chevron-down"></i>
                                                <i class="fas fa-chevron-up"></i> </span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="faq_Seven" class="collapse" aria-labelledby="faq_7"
                                    data-bs-parent="#softsource-faq-accordion-2">
                                    <div class="card-body">
                                        <p>At History Chip we welcome varying accounts of stories. We believe these
                                            differing versions help to ensure that our history is accurate.
                                            Different versions of a story augment the narrative.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faq_8">
                                    <h5 class="mb-0">
                                        <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#faq_Eight"
                                            aria-expanded="false" aria-controls="faq_Eight">
                                            Can I contact other story tellers? <span> <i class="fas fa-chevron-down"></i>
                                                <i class="fas fa-chevron-up"></i> </span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="faq_Eight" class="collapse" aria-labelledby="faq_8"
                                    data-bs-parent="#softsource-faq-accordion-2">
                                    <div class="card-body">
                                        <p>We are in the process of implementing this functionality. Please keep
                                            checking in as we continue to enhance the site.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faq_9">
                                    <h5 class="mb-0">
                                        <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#faq_Nine"
                                            aria-expanded="false" aria-controls="faq_Nine">
                                            What if someone posts a story that is harmful or a blatant lie? <span>
                                                <i class="fas fa-chevron-down"></i>
                                                <i class="fas fa-chevron-up"></i> </span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="faq_Nine" class="collapse" aria-labelledby="faq_9"
                                    data-bs-parent="#softsource-faq-accordion-2">
                                    <div class="card-body">
                                        <p>History Chip’s mission is to strengthen the truth of history. Stories
                                            that undermine that effort, stories that seek to advance an untruthful
                                            narrative will be rejected from the site. Please see our <a
                                                href="/termsandconditions" target="_blank"><u>Terms Of Use</u></a>
                                            for further information.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faq_10">
                                    <h5 class="mb-0">
                                        <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#faq_Ten"
                                            aria-expanded="false" aria-controls="faq_Ten">
                                            Must I register with the site before adding a story? <span> <i
                                                    class="fas fa-chevron-down"></i>
                                                <i class="fas fa-chevron-up"></i> </span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="faq_Ten" class="collapse" aria-labelledby="faq_10"
                                    data-bs-parent="#softsource-faq-accordion-2">
                                    <div class="card-body">
                                        <p>Yes, story tellers must register with the site in order add a story.
                                            Registering with the site allows History Chip to protect the integrity
                                            of the site. We believe this will encourage sincere and committed users
                                            on the site. Additionally, we will reach out to the story teller to
                                            confirm posting of their story. Registering also allows us to reach out
                                            with news
                                            about History Chip and our expanding offerings.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faq_11">
                                    <h5 class="mb-0">
                                        <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#faq_Eleven"
                                            aria-expanded="false" aria-controls="faq_Eleven">
                                            Whom do I contact if I have questions? <span> <i
                                                    class="fas fa-chevron-down"></i>
                                                <i class="fas fa-chevron-up"></i> </span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="faq_Eleven" class="collapse" aria-labelledby="faq_11"
                                    data-bs-parent="#softsource-faq-accordion-2">
                                    <div class="card-body">
                                        <p>Please note the <a href="/contactus" target="_blank"><u>contact
                                                    us</u></a> link under Resource both at the top of the page and
                                            the bottom.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>



                </div>
            </div>
        </div>
    @endsection
