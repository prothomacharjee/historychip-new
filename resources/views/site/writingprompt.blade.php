@extends('site.layouts.header')

@section('content')
    <style scoped>
        .softsource-top-contianer {
            background-image: linear-gradient(rgba(50, 68, 76, 0.76), rgba(79, 104, 116, 0.71)), url("{{ asset('frontend/images/web_img/wtips.png') }}");
            background-position: center;
            background-size: cover;
            height: 500px !important
        }
    </style>
    <!--============ Resolutions Hero Start ============-->
    <div class="position-relative softsource-top-contianer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 me-auto ms-auto">
                    <div class="position-relative">
                        <div class="text-center softsource-font ">
                            <h1 class="text-white softsoutce-top-banner-text">Writing Prompts</h1>
                            <p class=" text-white mb-0 softsoutce-top-banner-paragraph">
                                Every story on <b>History
                                    Chip</b> adds essential details to history. <br>We welcome the
                                power of your stories to transform our understanding of the world.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 ms-auto me-auto">

                </div>

                <div class="col-lg-8 col-md-8 me-auto ms-auto softsource-writing-prompt-div">
                    <h5 class="fadeInUp animate__animated mt-4 text-white">DAILY WRITING PROMPTS</h5>
                    <p class="fadeInUp animate__animated text-white mb-0">Press the GENERATE button for new daily writing
                        prompts.</p>
                </div>

                <div class="col-lg-2 col-md-2 ms-auto me-auto">

                </div>
            </div>
        </div>
    </div>
    <!--============ Founder Start ============-->
    <div class="softsource-writingprompt-section pt-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-11 col-md-11 ms-auto me-auto mb-3">
                    <div class="softsource-word-text-box d-flex">
                        {{-- <textarea name="WordBox" id="wordbox" tabindex="0" rows="2"></textarea> --}}
                        <div id="wordbox" class="softsource-wordbox"></div>
                        <input type="hidden" value="0" id="word_index_prev" tabindex="-1">
                        <input type="hidden" value="0" id="word_index_curr" tabindex="-1">
                        <input type="BUTTON" value="GENERATE PROMPT" onclick="PickRandomWord();" id="button"
                            class="softsource-writing-prompt-button" tabindex="1">
                    </div>
                    <button type="button" class="softsource-btn-direction backBtn"><i class="fa fa-arrow-left"
                            aria-hidden="true"></i></button>
                    <button type="button" class="softsource-btn-direction nextBtn"><i class="fa fa-arrow-right"
                            aria-hidden="true"></i></button>
                </div>

                <div class="col-lg-12 col-md-12 ms-auto me-auto mb-5">
                    <div class="service-hero-wrap wow move-up">
                        <div class="service-hero-text text-center hc-t-font">
                            <h5 class="fadeInUp animate__animated mt-4 text-center">Need more Writing Prompts to Inspire
                                Your Writings?</h5>

                        </div>

                    </div>
                </div>
                <div class="col-lg-2 col-md-2 ms-auto me-auto">

                </div>

                <div class="col-lg-8 col-md-8 ms-auto me-auto">
                    <div class="row">
                        <?php
                        if (count($writingprompt) > 0) {
                            foreach ($writingprompt as $prompt) {
                                if (is_null($prompt->icon) or $prompt->icon == "") {
                                    $headerImage = asset('frontend/images/web_img/default-hc-logo.jpg');
                                } else {
                                    $headerImage = asset($prompt->icon);
                                }
                                ?>


                        <div class="col-lg-4 col-md-6 mb-5 fadeInUp animate__animated text-center"
                            style="visibility: visible;">
                            <img class="img-fluid" src="<?php echo $headerImage; ?>" alt="<?php echo $prompt->title; ?>"
                                style="width: 90px; height: 75px;">
                            <div class="text-justify">
                                <b><?= $prompt->title ?>:</b> <?= $prompt->details ?>
                            </div>

                        </div>
                        <?php
                            }
                        }
                        ?>
                    </div>

                    @if (count($writingprompt) > 0)
                        <div style="width: 280px;margin: 0 auto;" class="d-flex justify-content-center pagination">
                            @csrf
                            {!! $writingprompt->links() !!}
                        </div>
                    @endif

                </div>

                <div class="col-lg-2 col-md-2 ms-auto me-auto">

                </div>
            </div>
        </div>

        <div class="container mt-4 softsource-writingprompt-download">
            <div class="row pt-5">
                <div class="col-lg-2 col-md-2 ms-auto me-auto">

                </div>
                <div class="col-lg-4 col-md-4 ms-auto me-auto mb-5">
                    <div class="_form_15"></div>
                    <script src="https://historychip.activehosted.com/f/embed.php?id=15" type="text/javascript" charset="utf-8"></script>
                </div>
                <div class="col-lg-4 col-md-4 ms-auto me-auto mb-5 mt-5">
                    <img src="{{ asset('frontend/images/web_img/quick-easy.png') }}" alt="writing tips quick easy">
                </div>
                <div class="col-lg-2 col-md-2 ms-auto me-auto">

                </div>
            </div>
        </div>

        <div class="container mb-4" style="">
            <div class="row">
                <div class="col-lg-12 col-md-12 ms-auto me-auto mb-5">
                    <h4 class="fadeInUp animate__animated mt-4 text-center" style="font-color:#2A353B">Quick and Easy Story
                        Writing Guide</h4>
                    <p class="fadeInUp animate__animated text-center"
                        style="font-family:Open Sans; font-size: 28px; font-weight: 400; line-height:38.13px; font-color:#6C6C6C">
                        especially for those of us who think we can’t write a story!</p>
                </div>

                <div class="col-lg-6 col-md-6 ms-auto me-auto">
                    <h5 class="fadeInUp animate__animated mt-2"
                        style="font-family:Open Sans; font-size: 30px; font-weight: 700; line-height:40.85px; font-color:#2A353B">
                        So, you want to add a story to History Chip!</h5>

                    <h5 class="fadeInUp animate__animated mt-5"
                        style="font-family:Open Sans; font-size: 30px; font-weight: 700; line-height:40.85px; font-color:#2A353B">
                        That’s great!</h5>

                    <p class="fadeInUp animate__animated mt-5"
                        style="font-family:Open Sans; font-size: 24px; font-weight: 400; line-height:32.68px; font-color:#2E3B41">
                        The point is to tell your story as you remember it.</p>

                    <p class="fadeInUp animate__animated mt-5"
                        style="font-family:Open Sans; font-size: 24px; font-weight: 400; line-height:32.68px; font-color:#2E3B41">
                        Easy peasy, no stress, no worries.</p>

                    <p class="fadeInUp animate__animated mt-5"
                        style="font-family:Open Sans; font-size: 24px; font-weight: 400; line-height:32.68px; font-color:#2E3B41">
                        Like singing in the shower.</p>

                </div>

                <div class="col-lg-6 col-md-6 ms-auto me-auto">
                    <img src="{{ asset('frontend/images/web_img/writing-guide.png') }}" alt="writing tips quick easy">
                </div>

                <div class="col-lg-12 col-md-12 ms-auto me-auto text-white p-5" style="background: #556F7C;">
                    <p class="fadeInUp animate__animated mt-4 text-center"
                        style="font-family:Open Sans; font-size: 30px; font-weight: 400; line-height:39.03px; font-color:#2E3B41">
                        Now, just take a minute or two to remember the details of the story you want to write.</p>

                    <p class="fadeInUp animate__animated mt-4 text-center"
                        style="font-family:Open Sans; font-size: 28.66px; font-weight: 400; line-height:39.03px; font-color:#2E3B41">
                        Consider the basics which should refresh your memory enough to just sit down and write what you
                        remember.</p>
                </div>


            </div>

            <div class="row text-center mt-5">
                <div class="col-lg-4 col-md-4 ms-auto me-auto">
                    <img src="{{ asset('frontend/images/web_img/who.png') }}" alt="Who" class="img-icon">
                    <h6 class="fadeInUp animate__animated"
                        style="font-family:Open Sans; font-size: 28px; font-weight: 600; line-height:32.25px; color:#000 !important">
                        Who</h6>
                    <h6 class="fadeInUp animate__animated"
                        style="font-family:Open Sans; font-size: 20px; font-weight: 400; line-height:23.04px; color:#000 !important">
                        Who are the people in your story?</h6>
                    <h6 class="fadeInUp animate__animated"
                        style="font-family:Open Sans; font-size: 18px; font-weight: 400; line-height:20.73px; color:#000 !important">
                        Just you, friends, family, strangers?</h6>
                </div>

                <div class="col-lg-4 col-md-4 ms-auto me-auto">
                    <img src="{{ asset('frontend/images/web_img/when.png') }}" alt="when" class="img-icon">
                    <h6 class="fadeInUp animate__animated"
                        style="font-family:Open Sans; font-size: 28px; font-weight: 600; line-height:32.25px; color:#000 !important">
                        When</h6>
                    <h6 class="fadeInUp animate__animated"
                        style="font-family:Open Sans; font-size: 20px; font-weight: 400; line-height:23.04px; color:#000 !important">
                        When did it happen?</h6>
                    <h6 class="fadeInUp animate__animated"
                        style="font-family:Open Sans; font-size: 18px; font-weight: 400; line-height:20.73px; color:#000 !important">
                        What time of day?</h6>
                </div>

                <div class="col-lg-4 col-md-4 ms-auto me-auto">
                    <img src="{{ asset('frontend/images/web_img/where.png') }}" alt="where" class="img-icon">
                    <h6 class="fadeInUp animate__animated"
                        style="font-family:Open Sans; font-size: 28px; font-weight: 600; line-height:32.25px; color:#000 !important">
                        Where</h6>
                    <h6 class="fadeInUp animate__animated"
                        style="font-family:Open Sans; font-size: 20px; font-weight: 400; line-height:23.04px; color:#000 !important">
                        Where did it happen? New York, London, Mogadishu?</h6>
                    <h6 class="fadeInUp animate__animated"
                        style="font-family:Open Sans; font-size: 18px; font-weight: 400; line-height:10px; color:#000 !important">
                        <br>What are the details?
                    </h6>
                </div>
            </div>

            <div class="row text-center my-5">

                <div class="col-lg-4 col-md-4 ms-auto me-auto">
                    <img src="{{ asset('frontend/images/web_img/what.png') }}" alt="what" class="img-icon">
                    <h6 class="fadeInUp animate__animated"
                        style="font-family:Open Sans; font-size: 28px; font-weight: 600; line-height:32.25px; font-color:#000 !important">
                        What</h6>
                    <h6 class="fadeInUp animate__animated"
                        style="font-family:Open Sans; font-size: 20px; font-weight: 400; line-height:23.04px; font-color:#000 !important">
                    </h6>
                    <h6 class="fadeInUp animate__animated"
                        style="font-family:Open Sans; font-size: 18px; font-weight: 400; line-height:20.73px; font-color:#000 !important">
                        What happened? A trip somewhere? A hurricane? What are the important details? </h6>
                </div>

                <div class="col-lg-4 col-md-4 ms-auto me-auto">
                    <img src="{{ asset('frontend/images/web_img/why.png') }}" alt="whyy" class="img-icon">
                    <h6 class="fadeInUp animate__animated"
                        style="font-family:Open Sans; font-size: 28px; font-weight: 600; line-height:32.25px; font-color:#000 !important">
                        Why</h6>
                    <h6 class="fadeInUp animate__animated"
                        style="font-family:Open Sans; font-size: 20px; font-weight: 400; line-height:23.04px; font-color:#000 !important">
                        Why is this important to you?
                    </h6>
                    <h6 class="fadeInUp animate__animated"
                        style="font-family:Open Sans; font-size: 18px; font-weight: 400; line-height:20.73px; font-color:#000 !important">
                        Why do you want to share this story? </h6>
                </div>

                <div class="col-lg-4 col-md-4 ms-auto me-auto">
                    <img src="{{ asset('frontend/images/web_img/how.png') }}" alt="how" class="img-icon">
                    <h6 class="fadeInUp animate__animated"
                        style="font-family:Open Sans; font-size: 28px; font-weight: 600; line-height:32.25px; font-color:#000 !important">
                        How</h6>
                    <h6 class="fadeInUp animate__animated"
                        style="font-family:Open Sans; font-size: 20px; font-weight: 400; line-height:23.04px; font-color:#000 !important">
                    </h6>
                    <h6 class="fadeInUp animate__animated"
                        style="font-family:Open Sans; font-size: 18px; font-weight: 400; line-height:20.73px; font-color:#000 !important">
                        How did it look?How did it feel? Cold, hot, crowded, dangerous, safe, cozy?</h6>
                </div>
            </div>
        </div>

        <div class="softsource-writingprompt-share position-relative d-flex">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 ml-auto mr-auto">
                        <div class="service-hero-wrap wow move-up">
                            <div class="service-hero-text text-center hc-t-font">
                                <h1 class="text-white">WANT TO SHARE YOUR<br>STORY WITH THE WORLD? </h1>
                                <a href="{{ route('story.create') }}" class="btn"
                                    style="background-color: white; color:#3C454C !important">Add a Story</a>

                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>

        <div class="container mt-4" style="">
            <h6 class="animatable fadeInUp text-center mb-5"
                style="font-family:Open Sans; font-size: 28px; font-weight: 700; line-height:38.13px; font-color:#000 !important">
                Sample Story to Help You Write
            </h6>

            <div class="row">
                <div class="col-lg-12 col-md-12 ml-auto mr-auto">
                    <div class="card" style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">

                        <div class="card-body text-justify">
                            <p
                                style="font-family: 'Open Sans';font-style: normal;;font-size: 18px;line-height: 25px;color: #000000;">
                                <b>WHO:</b> I was 28.<br><br>

                                <b>WHERE:</b>  I worked in the City and lived in an apartment building on a high
                                floor.<br><br>

                                <b>WHEN:</b>  It was the middle of March in 2020.<br><br>

                                <b>WHAT:</b>  Suddenly COVID was everywhere and the City was mostly shut down. I
                                couldn’t go to
                                work, I didn’t want to get in the elevator in my apartment building because we
                                were warned
                                to keep 6 feet away from other people. So, I decided to move to the country to
                                my mother’s
                                house. I had to find new ways to do so many things. We ordered groceries online.
                                I had to
                                find new ways to make a living. Because we were in the country we could take
                                long walks
                                outside which made life much more tolerable during ‘lock down’. My sister had
                                stayed in the
                                city with her elderly grand mother who was in danger from COVID because of her
                                age. They did
                                not leave their apartment for nearly 3 months.<br><br>

                                <b>WHY:</b>  Life was turned upside down. Restaurants were closed, kids couldn’t go
                                to school,
                                masks were required everywhere and we were afraid of being close to
                                anyone.<br><br>

                                <b>HOW:</b>  The streets were quiet, the shops and restaurants were closed.
                                People put hearts
                                outside of their houses and in some places people would ring bells or
                                bang on pots at the
                                same time every day to say thank you to healthcare workers and those
                                people who worked in
                                ‘front line’ places like grocery stores and pharmacies. When some
                                businesses began to open,
                                plastic barriers were placed to protect customers from workers, marks
                                were on the floor to
                                direct traffic to keep people from being close to each other, masks were
                                required and air
                                purifiers were everywhere. In the early Spring of 2021, vaccines began
                                to be available and
                                things began to open up a little bit. It was hard to believe that we
                                were experiencing this
                                strange new way of life and could never have imagined that it could last
                                as long as it did.
                                Nearly 3 years later, COVID is still a worry.<br><br>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        let history = ['0', '0', '0'];
        var words = [];
        var NumberOfWords = 0;

        $(document).ready(function() {

            $.ajax({
                type: 'POST',
                url: '{{ route('writing-prompts.get') }}',
                data: {
                    '_token': '{{ csrf_token() }}',
                },
                success: function(data) {
                    //console.log('writingprompt', data.writingprompt);
                    NumberOfWords = data.writingprompt.length;
                    words = new BuildArray(NumberOfWords);

                    for (let i = 0; i < NumberOfWords; i++) {

                        if (data.writingprompt[i].details == '') {
                            words[i] = `Write Something On "${data.writingprompt[i].title}"`;
                        } else {
                            words[i] = data.writingprompt[i].details;

                        }
                    }


                }
            });


            $(".backBtn").click(function() {
                $(".softsource-wordbox").html(words[$("#word_index_prev").val()]);
            });

            $(".nextBtn").click(function() {
                $(".softsource-wordbox").html(words[$("#word_index_curr").val()]);
            });

        })

        function BuildArray(size) {
            this.length = size
            for (var i = 1; i <= size; i++) {
                this[i] = null
            }
            return this
        }

        function PickRandomWord() {
            // Generate a random number between 1 and NumberOfWords
            var rnd = Math.ceil(Math.random() * NumberOfWords)

            // Display the word inside the text box
            $(".softsource-wordbox").html(words[rnd]);
            $("#word_index_prev").val($("#word_index_curr").val());
            $("#word_index_curr").val(rnd);

        }
    </script>
@endsection
