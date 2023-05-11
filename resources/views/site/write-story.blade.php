@extends('site.layouts.header')

@section('content')

    <div class="position-relative softsource-top-contianer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 ms-auto me-auto">
                    <div class="position-relative">
                        <div class="text-center softsource-font ">
                            <h1 class="text-white softsoutce-top-banner-text">{{ $page_title }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="softsource-write-story-submit-section pt-3">
        <div class="container">
            <div class="container softsource-write-story-col-container my-5">
                <div class="text-center softsource-tab-buttons">
                    <button type="button" id="text" class="softsource-write-story-btn my-2 px-4 show-action only-text">Only Text</button>
                    <button type="button" id="audio" class="softsource-write-story-btn my-2 px-4 show-action only-audio">Only Audio/Video</button>
                    <button type="button" class="softsource-write-story-btn my-2 px-4 show-action audio-text active">Both</button>
                </div>
                <form method="POST" name="submitStory" id="submitstory" action="javascript:;" enctype="multipart/form-data">
                    <input type="hidden" name="context_type" value="">
                    <input type="hidden" name="_token" value="2edQDklMwusONqe5hOVPH2l0curoi7BQPQje4UW8">                                <div class="row pt-3">
                        <div class="col-12">
                            <input type="hidden" name="_token" value="2edQDklMwusONqe5hOVPH2l0curoi7BQPQje4UW8">                                        <div id="file-upload-form" class="uploader">
                                                                            <div class="form-group form-md-floating-label image-upload-banner">
                                    <div class="fileuploader fileuploader-theme-dragdrop"><input type="hidden" name="fileuploader-list-front_file" value="[]"><input type="file" name="front_file" data-id="https://www.historychip.com/submitastory/delete_image" data-url="https://www.historychip.com/submitastory/save_image" data-name="story" style="position: absolute; z-index: -9999; height: 0px; width: 0px; padding: 0px; margin: 0px; line-height: 0; outline: 0px; border: 0px; opacity: 0;"><div class="fileuploader-input"><div class="fileuploader-input-inner"><div class="fileuploader-icon-main"></div><h3 class="fileuploader-input-caption"><p>choose photo to upload</p></h3><p></p><button type="button" class="fileuploader-input-button"><span>Browse file</span></button><br><br><h6 class="banner-photo-place">Add Banner photo here</h6><span><span class="required">*</span> Note: Photograph should be under 10 MB and Allowed Formats : "JPG", "PNG", "GIF", "JPEG","JFIF"</span></div></div><div class="fileuploader-items"><ul class="fileuploader-items-list"></ul></div></div>
                                    <!--<span class="help-block">Entering a photograph here is optional but will help to introduce and draw attention to your story. <br> <span class="required">*</span> Note: Photograph should be under 10 MB and Allowed Formats : "JPG", "PNG", "GIF", "JPEG","JFIF"</span>-->
                                    <div id="errorBlock" class="help-block"></div>
                                </div>

                                <!-- Star -->
                                <div class="form-group form-row align-items-center">
                                    <div class="col-md-12">
                                        <label>Photo Credit <span class="pcreditRequired required">*</span>:</label>
                                        <input id="photo-credit" type="text" class="form-input form-control" "="" name="pcredit" value="" required="" placeholder="Photo Credit (Required if Uploaded)">


                                                                                        </div>
                                </div>
                                <!-- End -->


                                <hr>
                                <input type="hidden" name="header_image_path" class="front_file-saver" value="">
                            </div>
                            <!--</div>-->
                            <div class="form-group form-row align-items-center">
                                <div class="col-md-4">
                                    <label>Title <span class="required">*</span>:</label>
                                    <input id="story-title" type="text" class="form-input form-control" "="" name="title" value="" required="" placeholder="Title">


                                                                                </div>
                                <div class="col-md-4">
                                    <label>A Story by <span class="required">*</span>:</label>
                                    <input id="author" type="text" class="form-control form-input" "="" name="author" value="Prothom Acharjee" required="" placeholder="Author Name">


                                </div>
                                <div class="col-md-4">
                                    <label>Tag Story</label>
                                    <select class="form-control select2-hidden-accessible" name="tag_ids[]" "="" multiple="" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                                                            <option value="1392">
                                            “All or Nothing at ALL”</option>
                                                                                            <option value="1893">
                                            “Light My Fire</option>
                                                                                            <option value="1388">
                                            “My Time Is Your Time”</option>
                                                                                            <option value="1894">
                                            ” teenager</option>
                                                                                            <option value="2189">
                                            #me</option>
                                                                                            <option value="2190">
                                            #will</option>
                                                                                            <option value="2073">
                                            1281</option>
                                                                                            <option value="2074">
                                            1281</option>
                                                                                            <option value="850">
                                            12th Century</option>
                                                                                            <option value="396">
                                            13 years old</option>
                                                                                            <option value="2083">
                                            1395</option>
                                                                                            <option value="1322">
                                            1800s</option>
                                                                                            <option value="2007">
                                            1848</option>
                                                                                            <option value="1656">
                                            1907</option>
                                                                                            <option value="204">
                                            1920s</option>
                                                                                            <option value="372">
                                            1921</option>
                                                                                            <option value="144">
                                            1925</option>
                                                                                            <option value="1191">
                                            1929</option>
                                                                                            <option value="104">
                                            1930s</option>
                                                                                            <option value="238">
                                            1933</option>
                                                                                            <option value="6">
                                            1936</option>
                                                                                            <option value="120">
                                            1937</option>
                                                                                            <option value="370">
                                            1939</option>
                                                                                            <option value="192">
                                            1940s</option>
                                                                                            <option value="1086">
                                            1942</option>
                                                                                            <option value="31">
                                            1943</option>
                                                                                            <option value="960">
                                            1944</option>
                                                                                            <option value="20">
                                            1946</option>
                                                                                            <option value="1955">
                                            1950</option>
                                                                                            <option value="2193">
                                            1950s</option>
                                                                                            <option value="96">
                                            1960s</option>
                                                                                            <option value="67">
                                            1960s</option>
                                                                                            <option value="769">
                                            1962</option>
                                                                                            <option value="1855">
                                            1971</option>
                                                                                            <option value="976">
                                            1976</option>
                                                                                            <option value="2135">
                                            1977</option>
                                                                                            <option value="1429">
                                            1978</option>
                                                                                            <option value="1545">
                                            1978 Honda Civic</option>
                                                                                            <option value="2133">
                                            1979</option>
                                                                                            <option value="83">
                                            1986</option>
                                                                                            <option value="1856">
                                            2015</option>
                                                                                            <option value="2136">
                                            203</option>
                                                                                            <option value="2069">
                                            2067</option>
                                                                                            <option value="2070">
                                            2068</option>
                                                                                            <option value="2076">
                                            2075</option>
                                                                                            <option value="2079">
                                            2078</option>
                                                                                            <option value="2082">
                                            2080</option>
                                                                                            <option value="2086">
                                            2084</option>
                                                                                            <option value="2087">
                                            2085</option>
                                                                                            <option value="2094">
                                            2092</option>
                                                                                            <option value="2132">
                                            2101</option>
                                                                                            <option value="2134">
                                            2103</option>
                                                                                            <option value="758">
                                            2nd grade</option>
                                                                                            <option value="756">
                                            35th President</option>
                                                                                            <option value="1963">
                                            38th Parallel</option>
                                                                                            <option value="521">
                                            4-color</option>
                                                                                            <option value="1512">
                                            4-H</option>
                                                                                            <option value="1449">
                                            4H</option>
                                                                                            <option value="602">
                                            4pm</option>
                                                                                            <option value="287">
                                            5th Avenue</option>
                                                                                            <option value="2054">
                                            60's</option>
                                                                                            <option value="231">
                                            80s</option>
                                                                                            <option value="1751">
                                            8th Bomber Division</option>
                                                                                            <option value="1766">
                                            9/11</option>
                                                                                            <option value="112">
                                            A Dog’s Purpose</option>
                                                                                            <option value="788">
                                            A&amp;P</option>
                                                                                            <option value="1803">
                                            AAA</option>
                                                                                            <option value="2219">
                                            abortion</option>
                                                                                            <option value="1396">
                                            abuse</option>
                                                                                            <option value="1886">
                                            accident</option>
                                                                                            <option value="1739">
                                            accomplishment</option>
                                                                                            <option value="258">
                                            accordions</option>
                                                                                            <option value="2019">
                                            achievement</option>
                                                                                            <option value="1311">
                                            acrimony</option>
                                                                                            <option value="842">
                                            Adams</option>
                                                                                            <option value="1089">
                                            Adirondacks</option>
                                                                                            <option value="166">
                                            admission price</option>
                                                                                            <option value="1675">
                                            adopted</option>
                                                                                            <option value="1368">
                                            advantages</option>
                                                                                            <option value="1916">
                                            adventure</option>
                                                                                            <option value="1308">
                                            affluence</option>
                                                                                            <option value="2037">
                                            affordability</option>
                                                                                            <option value="1850">
                                            after-shocks</option>
                                                                                            <option value="870">
                                            aftershocks</option>
                                                                                            <option value="244">
                                            age 9</option>
                                                                                            <option value="180">
                                            aging</option>
                                                                                            <option value="1668">
                                            Agricultural College</option>
                                                                                            <option value="1494">
                                            agriculture</option>
                                                                                            <option value="1276">
                                            ailments</option>
                                                                                            <option value="802">
                                            Air Raid Warden</option>
                                                                                            <option value="1316">
                                            air-conditioning</option>
                                                                                            <option value="826">
                                            airplanes</option>
                                                                                            <option value="794">
                                            airport</option>
                                                                                            <option value="1652">
                                            aisle</option>
                                                                                            <option value="585">
                                            Alabama</option>
                                                                                            <option value="1753">
                                            alcohol</option>
                                                                                            <option value="1192">
                                            alcoholic</option>
                                                                                            <option value="1672">
                                            Aldi’s</option>
                                                                                            <option value="155">
                                            Alexander’s</option>
                                                                                            <option value="302">
                                            Alf Landon</option>
                                                                                            <option value="329">
                                            All American</option>
                                                                                            <option value="1288">
                                            Alley Oop</option>
                                                                                            <option value="1644">
                                            Allies</option>
                                                                                            <option value="1557">
                                            alligator</option>
                                                                                            <option value="949">
                                            allowance</option>
                                                                                            <option value="1200">
                                            altercation</option>
                                                                                            <option value="33">
                                            Amazon</option>
                                                                                            <option value="1784">
                                            ambition</option>
                                                                                            <option value="2142">
                                            america</option>
                                                                                            <option value="24">
                                            American Artist Magazine</option>
                                                                                            <option value="2036">
                                            American Dream</option>
                                                                                            <option value="1265">
                                            Americans</option>
                                                                                            <option value="1758">
                                            ammo carrier</option>
                                                                                            <option value="409">
                                            Amusement Park</option>
                                                                                            <option value="1859">
                                            Anchors Aweigh</option>
                                                                                            <option value="1326">
                                            ancient history</option>
                                                                                            <option value="2209">
                                            angel</option>
                                                                                            <option value="420">
                                            Angel Food Cake</option>
                                                                                            <option value="1476">
                                            Angus</option>
                                                                                            <option value="111">
                                            Angus and the Cat</option>
                                                                                            <option value="219">
                                            animals</option>
                                                                                            <option value="493">
                                            Anita Page</option>
                                                                                            <option value="416">
                                            ankle socks</option>
                                                                                            <option value="1582">
                                            Anne Garrels</option>
                                                                                            <option value="1879">
                                            apache</option>
                                                                                            <option value="1438">
                                            Apache Reservation</option>
                                                                                            <option value="1196">
                                            appendicitis</option>
                                                                                            <option value="1680">
                                            appointment</option>
                                                                                            <option value="1283">
                                            appreciation</option>
                                                                                            <option value="502">
                                            Arapahoe County</option>
                                                                                            <option value="844">
                                            Arbeit Macht Frei</option>
                                                                                            <option value="1918">
                                            Argentina</option>
                                                                                            <option value="146">
                                            arguments</option>
                                                                                            <option value="809">
                                            Ariadne</option>
                                                                                            <option value="868">
                                            Arlington</option>
                                                                                            <option value="1459">
                                            armadillo</option>
                                                                                            <option value="816">
                                            Armenian</option>
                                                                                            <option value="1195">
                                            Armistice</option>
                                                                                            <option value="533">
                                            army</option>
                                                                                            <option value="801">
                                            Army Engineers</option>
                                                                                            <option value="684">
                                            Army Reserve</option>
                                                                                            <option value="1908">
                                            arrest</option>
                                                                                            <option value="1890">
                                            arsenic</option>
                                                                                            <option value="1827">
                                            art</option>
                                                                                            <option value="1270">
                                            art director</option>
                                                                                            <option value="1434">
                                            Art History</option>
                                                                                            <option value="132">
                                            Arthur Guiterman</option>
                                                                                            <option value="1840">
                                            artist</option>
                                                                                            <option value="1632">
                                            asphalt</option>
                                                                                            <option value="757">
                                            assassination</option>
                                                                                            <option value="1342">
                                            Astor Hotel</option>
                                                                                            <option value="907">
                                            astronaut</option>
                                                                                            <option value="525">
                                            astronomer</option>
                                                                                            <option value="1423">
                                            Athletics</option>
                                                                                            <option value="1207">
                                            Atlantic and Pacific Tea Company</option>
                                                                                            <option value="640">
                                            atomic bomb</option>
                                                                                            <option value="557">
                                            Atomic bombs</option>
                                                                                            <option value="398">
                                            attack</option>
                                                                                            <option value="1051">
                                            audacity</option>
                                                                                            <option value="1491">
                                            Audubon Society</option>
                                                                                            <option value="2005">
                                            Austin</option>
                                                                                            <option value="1479">
                                            Austin Livestock Auction</option>
                                                                                            <option value="1737">
                                            Australia</option>
                                                                                            <option value="1305">
                                            automat</option>
                                                                                            <option value="1942">
                                            automobile accident</option>
                                                                                            <option value="1010">
                                            autumn</option>
                                                                                            <option value="183">
                                            autumn leaves</option>
                                                                                            <option value="1823">
                                            avant-garde</option>
                                                                                            <option value="1997">
                                            aviation</option>
                                                                                            <option value="1143">
                                            B is for Betsy</option>
                                                                                            <option value="649">
                                            B Model Ford</option>
                                                                                            <option value="1629">
                                            babkas</option>
                                                                                            <option value="431">
                                            babysitting</option>
                                                                                            <option value="1022">
                                            bach</option>
                                                                                            <option value="1780">
                                            Bachelor’s Degree</option>
                                                                                            <option value="1573">
                                            backyard</option>
                                                                                            <option value="1099">
                                            bacon</option>
                                                                                            <option value="355">
                                            bacteria</option>
                                                                                            <option value="1701">
                                            Bainbridge Naval Station</option>
                                                                                            <option value="2168">
                                            bait</option>
                                                                                            <option value="452">
                                            baking</option>
                                                                                            <option value="381">
                                            baking soda</option>
                                                                                            <option value="1623">
                                            balcony</option>
                                                                                            <option value="1920">
                                            ballots</option>
                                                                                            <option value="410">
                                            Ballroom</option>
                                                                                            <option value="1534">
                                            banderillas</option>
                                                                                            <option value="339">
                                            bandstand</option>
                                                                                            <option value="1704">
                                            Bangkok</option>
                                                                                            <option value="608">
                                            bank</option>
                                                                                            <option value="654">
                                            baptism vat</option>
                                                                                            <option value="1678">
                                            bar mitzvah</option>
                                                                                            <option value="890">
                                            Barack Obama</option>
                                                                                            <option value="792">
                                            Barbados</option>
                                                                                            <option value="290">
                                            barbed wire</option>
                                                                                            <option value="1167">
                                            barbershop</option>
                                                                                            <option value="607">
                                            barefooted</option>
                                                                                            <option value="1674">
                                            Barnes and Noble</option>
                                                                                            <option value="658">
                                            barns</option>
                                                                                            <option value="629">
                                            Baseball</option>
                                                                                            <option value="536">
                                            Basic Training</option>
                                                                                            <option value="401">
                                            Bastille</option>
                                                                                            <option value="719">
                                            bathrooms</option>
                                                                                            <option value="555">
                                            Battle of the Bulge</option>
                                                                                            <option value="1140">
                                            beach</option>
                                                                                            <option value="2146">
                                            bearded dragon</option>
                                                                                            <option value="419">
                                            beautiful paper</option>
                                                                                            <option value="1804">
                                            Beckett</option>
                                                                                            <option value="1198">
                                            bed making</option>
                                                                                            <option value="437">
                                            beer</option>
                                                                                            <option value="1306">
                                            beggars</option>
                                                                                            <option value="1949">
                                            begging</option>
                                                                                            <option value="1862">
                                            behemoth</option>
                                                                                            <option value="2194">
                                            Beirut Port explosion</option>
                                                                                            <option value="38">
                                            Belem</option>
                                                                                            <option value="1698">
                                            Ben Gurion</option>
                                                                                            <option value="1706">
                                            Ben Hoa</option>
                                                                                            <option value="1703">
                                            benefits</option>
                                                                                            <option value="1267">
                                            Benjamin Edes</option>
                                                                                            <option value="1382">
                                            berets</option>
                                                                                            <option value="982">
                                            bergen</option>
                                                                                            <option value="852">
                                            Berretto Frigio</option>
                                                                                            <option value="1834">
                                            Betaudier</option>
                                                                                            <option value="1915">
                                            betrayal</option>
                                                                                            <option value="878">
                                            Betty Ann Armstrong</option>
                                                                                            <option value="862">
                                            BG</option>
                                                                                            <option value="599">
                                            bible</option>
                                                                                            <option value="651">
                                            Bible Belt</option>
                                                                                            <option value="1795">
                                            Bicentennial</option>
                                                                                            <option value="1214">
                                            bicycle</option>
                                                                                            <option value="1226">
                                            bicycles</option>
                                                                                            <option value="739">
                                            Big Band</option>
                                                                                            <option value="1930">
                                            big-top</option>
                                                                                            <option value="2051">
                                            bigotry</option>
                                                                                            <option value="958">
                                            Bill Salzillo</option>
                                                                                            <option value="659">
                                            billboards</option>
                                                                                            <option value="492">
                                            Billie Dove</option>
                                                                                            <option value="1860">
                                            Bing Crosby</option>
                                                                                            <option value="1676">
                                            biological</option>
                                                                                            <option value="968">
                                            birthday</option>
                                                                                            <option value="1453">
                                            birthday parties</option>
                                                                                            <option value="1400">
                                            Bishop McDonnell High School</option>
                                                                                            <option value="1366">
                                            Bishop McDonnell Memorial High School</option>
                                                                                            <option value="1899">
                                            bite</option>
                                                                                            <option value="815">
                                            Bitlis</option>
                                                                                            <option value="1052">
                                            black beauty</option>
                                                                                            <option value="139">
                                            black drawing salve</option>
                                                                                            <option value="529">
                                            Black snake</option>
                                                                                            <option value="2208">
                                            blackfriday</option>
                                                                                            <option value="94">
                                            Blackout</option>
                                                                                            <option value="531">
                                            blanket</option>
                                                                                            <option value="593">
                                            blimp</option>
                                                                                            <option value="2064">
                                            blindness</option>
                                                                                            <option value="1648">
                                            blizzard</option>
                                                                                            <option value="462">
                                            blocks</option>
                                                                                            <option value="1006">
                                            blonde</option>
                                                                                            <option value="403">
                                            blood</option>
                                                                                            <option value="861">
                                            Blood Glucose</option>
                                                                                            <option value="833">
                                            Blood Orange</option>
                                                                                            <option value="1928">
                                            bloomers</option>
                                                                                            <option value="1188">
                                            Blue Danube Waltz</option>
                                                                                            <option value="1863">
                                            Blue Gill</option>
                                                                                            <option value="577">
                                            Blue Ridge</option>
                                                                                            <option value="1071">
                                            boarding school</option>
                                                                                            <option value="1292">
                                            Bob Chester</option>
                                                                                            <option value="1053">
                                            Bobbsey Twins</option>
                                                                                            <option value="2039">
                                            Bobby Kennedy</option>
                                                                                            <option value="389">
                                            bobby pins</option>
                                                                                            <option value="157">
                                            bobby socks</option>
                                                                                            <option value="1391">
                                            bobby soxers</option>
                                                                                            <option value="2181">
                                            bombardment</option>
                                                                                            <option value="1642">
                                            bombing</option>
                                                                                            <option value="2066">
                                            bombs</option>
                                                                                            <option value="1985">
                                            bone</option>
                                                                                            <option value="562">
                                            Bonnie and Clyde</option>
                                                                                            <option value="1035">
                                            books</option>
                                                                                            <option value="1069">
                                            boots</option>
                                                                                            <option value="1971">
                                            boredom</option>
                                                                                            <option value="1585">
                                            Bosnia</option>
                                                                                            <option value="500">
                                            Boston</option>
                                                                                            <option value="1263">
                                            Boston Tea Party</option>
                                                                                            <option value="171">
                                            Boston Terrier</option>
                                                                                            <option value="1726">
                                            bottled water</option>
                                                                                            <option value="281">
                                            box car</option>
                                                                                            <option value="921">
                                            boys</option>
                                                                                            <option value="1830">
                                            brackhage</option>
                                                                                            <option value="1504">
                                            Brahma</option>
                                                                                            <option value="1475">
                                            Brahmas</option>
                                                                                            <option value="601">
                                            brain injury</option>
                                                                                            <option value="1618">
                                            brass factories</option>
                                                                                            <option value="1627">
                                            brass mills</option>
                                                                                            <option value="2144">
                                            brave</option>
                                                                                            <option value="99">
                                            Brazil</option>
                                                                                            <option value="744">
                                            bread-winner</option>
                                                                                            <option value="1098">
                                            breakfast</option>
                                                                                            <option value="1500">
                                            breeding horse</option>
                                                                                            <option value="1302">
                                            Brentano’s</option>
                                                                                            <option value="1410">
                                            bricks</option>
                                                                                            <option value="1113">
                                            Broadway</option>
                                                                                            <option value="95">
                                            Brooklyn</option>
                                                                                            <option value="65">
                                            Brooklyn</option>
                                                                                            <option value="239">
                                            Brooklyn CT</option>
                                                                                            <option value="1343">
                                            Brooklyn Technical School</option>
                                                                                            <option value="1028">
                                            Brookyln</option>
                                                                                            <option value="126">
                                            broom</option>
                                                                                            <option value="1872">
                                            brothel</option>
                                                                                            <option value="1039">
                                            brother</option>
                                                                                            <option value="991">
                                            brush</option>
                                                                                            <option value="1940">
                                            bucket bath</option>
                                                                                            <option value="1598">
                                            Budapest</option>
                                                                                            <option value="1919">
                                            Buenos Aires</option>
                                                                                            <option value="623">
                                            buggy</option>
                                                                                            <option value="766">
                                            Buick</option>
                                                                                            <option value="279">
                                            bums</option>
                                                                                            <option value="1034">
                                            Burgess</option>
                                                                                            <option value="913">
                                            burial</option>
                                                                                            <option value="663">
                                            Burma shave</option>
                                                                                            <option value="1973">
                                            burn</option>
                                                                                            <option value="1460">
                                            burro</option>
                                                                                            <option value="385">
                                            Buster Brown</option>
                                                                                            <option value="1526">
                                            butchering</option>
                                                                                            <option value="965">
                                            butter</option>
                                                                                            <option value="1487">
                                            butter fat</option>
                                                                                            <option value="1131">
                                            buttons</option>
                                                                                            <option value="1490">
                                            buzzard trap</option>
                                                                                            <option value="635">
                                            C Rations</option>
                                                                                            <option value="1631">
                                            cabbage</option>
                                                                                            <option value="250">
                                            cabin</option>
                                                                                            <option value="1150">
                                            cafeteria</option>
                                                                                            <option value="2013">
                                            Cajun</option>
                                                                                            <option value="1505">
                                            calf roping</option>
                                                                                            <option value="1883">
                                            caller</option>
                                                                                            <option value="141">
                                            calomine</option>
                                                                                            <option value="720">
                                            camp</option>
                                                                                            <option value="246">
                                            Camp Hawthorn</option>
                                                                                            <option value="1639">
                                            Camp Moosberg</option>
                                                                                            <option value="693">
                                            Camp Shelby</option>
                                                                                            <option value="1694">
                                            campaign</option>
                                                                                            <option value="645">
                                            camping</option>
                                                                                            <option value="1371">
                                            Cana movement</option>
                                                                                            <option value="1562">
                                            cancer</option>
                                                                                            <option value="391">
                                            candy</option>
                                                                                            <option value="326">
                                            canning</option>
                                                                                            <option value="249">
                                            canoe</option>
                                                                                            <option value="351">
                                            capes</option>
                                                                                            <option value="888">
                                            Capitol Hill</option>
                                                                                            <option value="350">
                                            caps</option>
                                                                                            <option value="485">
                                            caps and gown</option>
                                                                                            <option value="1227">
                                            Capture the Flag</option>
                                                                                            <option value="863">
                                            Carbohydrates</option>
                                                                                            <option value="632">
                                            Cardinals</option>
                                                                                            <option value="1252">
                                            care</option>
                                                                                            <option value="2201">
                                            career</option>
                                                                                            <option value="194">
                                            Carnegie Hall</option>
                                                                                            <option value="1929">
                                            carnies</option>
                                                                                            <option value="849">
                                            Carnival</option>
                                                                                            <option value="760">
                                            Caroline</option>
                                                                                            <option value="2151">
                                            caroling</option>
                                                                                            <option value="1144">
                                            Carolyn Haywood</option>
                                                                                            <option value="945">
                                            carpentry</option>
                                                                                            <option value="1370">
                                            cartoonist</option>
                                                                                            <option value="1617">
                                            caster</option>
                                                                                            <option value="1965">
                                            casualties</option>
                                                                                            <option value="400">
                                            cat</option>
                                                                                            <option value="1560">
                                            cat fish</option>
                                                                                            <option value="667">
                                            catalog</option>
                                                                                            <option value="707">
                                            Catalogs</option>
                                                                                            <option value="674">
                                            catfish</option>
                                                                                            <option value="2043">
                                            Catholic</option>
                                                                                            <option value="1468">
                                            cattle</option>
                                                                                            <option value="298">
                                            CCC</option>
                                                                                            <option value="1281">
                                            cell phones</option>
                                                                                            <option value="1411">
                                            cement trail</option>
                                                                                            <option value="1114">
                                            Central Park</option>
                                                                                            <option value="1736">
                                            chain</option>
                                                                                            <option value="309">
                                            chalk drawings</option>
                                                                                            <option value="1063">
                                            challenge</option>
                                                                                            <option value="2038">
                                            change</option>
                                                                                            <option value="1543">
                                            changes</option>
                                                                                            <option value="1020">
                                            chapel</option>
                                                                                            <option value="176">
                                            charity</option>
                                                                                            <option value="1902">
                                            Chase Brass and Copper</option>
                                                                                            <option value="415">
                                            cheerleader</option>
                                                                                            <option value="1563">
                                            cherish</option>
                                                                                            <option value="1284">
                                            cherry cokes</option>
                                                                                            <option value="1509">
                                            chevy pickup truck</option>
                                                                                            <option value="114">
                                            chickens</option>
                                                                                            <option value="200">
                                            child</option>
                                                                                            <option value="379">
                                            child drivers</option>
                                                                                            <option value="996">
                                            childhood</option>
                                                                                            <option value="118">
                                            children</option>
                                                                                            <option value="160">
                                            children’s choir</option>
                                                                                            <option value="1799">
                                            Children’s Museum</option>
                                                                                            <option value="1956">
                                            chinhung-ni</option>
                                                                                            <option value="998">
                                            choir</option>
                                                                                            <option value="1023">
                                            choral</option>
                                                                                            <option value="432">
                                            chores</option>
                                                                                            <option value="1957">
                                            chosin</option>
                                                                                            <option value="145">
                                            Christmas</option>
                                                                                            <option value="295">
                                            church</option>
                                                                                            <option value="999">
                                            church. operetta</option>
                                                                                            <option value="260">
                                            churn butter</option>
                                                                                            <option value="1938">
                                            CIA</option>
                                                                                            <option value="453">
                                            cinnamon rolls</option>
                                                                                            <option value="2182">
                                            city</option>
                                                                                            <option value="793">
                                            Civil War</option>
                                                                                            <option value="2041">
                                            civil-rights</option>
                                                                                            <option value="299">
                                            Civilian Conservation Corps</option>
                                                                                            <option value="1179">
                                            Clark Gable</option>
                                                                                            <option value="818">
                                            climate change</option>
                                                                                            <option value="1741">
                                            climbing</option>
                                                                                            <option value="1577">
                                            clinic</option>
                                                                                            <option value="1417">
                                            Clinton</option>
                                                                                            <option value="456">
                                            clothes line</option>
                                                                                            <option value="1932">
                                            clown</option>
                                                                                            <option value="2216">
                                            Club</option>
                                                                                            <option value="1425">
                                            co-ed</option>
                                                                                            <option value="1309">
                                            co-existence</option>
                                                                                            <option value="1697">
                                            co-pay</option>
                                                                                            <option value="2021">
                                            coach</option>
                                                                                            <option value="617">
                                            coal</option>
                                                                                            <option value="1630">
                                            coal fires</option>
                                                                                            <option value="1318">
                                            coal furnace</option>
                                                                                            <option value="464">
                                            coal grime</option>
                                                                                            <option value="17">
                                            Coast Guard</option>
                                                                                            <option value="382">
                                            cod liver oil</option>
                                                                                            <option value="1686">
                                            coffins</option>
                                                                                            <option value="1749">
                                            cold</option>
                                                                                            <option value="647">
                                            cold food</option>
                                                                                            <option value="1593">
                                            Cold War</option>
                                                                                            <option value="1586">
                                            Cole’s Drug Store</option>
                                                                                            <option value="167">
                                            collecting</option>
                                                                                            <option value="803">
                                            collecting scrap metal</option>
                                                                                            <option value="882">
                                            collective memories</option>
                                                                                            <option value="421">
                                            college</option>
                                                                                            <option value="1710">
                                            Cologne</option>
                                                                                            <option value="811">
                                            Colonels</option>
                                                                                            <option value="588">
                                            colony</option>
                                                                                            <option value="489">
                                            Colorado</option>
                                                                                            <option value="549">
                                            coma</option>
                                                                                            <option value="2009">
                                            Comanche</option>
                                                                                            <option value="992">
                                            comb</option>
                                                                                            <option value="596">
                                            combat</option>
                                                                                            <option value="1709">
                                            combat engineer</option>
                                                                                            <option value="1547">
                                            Comel River</option>
                                                                                            <option value="1070">
                                            comfort</option>
                                                                                            <option value="1168">
                                            comic book</option>
                                                                                            <option value="518">
                                            comics</option>
                                                                                            <option value="1611">
                                            common sense</option>
                                                                                            <option value="131">
                                            communication</option>
                                                                                            <option value="872">
                                            community</option>
                                                                                            <option value="742">
                                            community center</option>
                                                                                            <option value="1779">
                                            Community College</option>
                                                                                            <option value="1420">
                                            Comparative Literature</option>
                                                                                            <option value="897">
                                            concentration</option>
                                                                                            <option value="10">
                                            Concentration Camp</option>
                                                                                            <option value="1854">
                                            concert</option>
                                                                                            <option value="618">
                                            Confederate Army</option>
                                                                                            <option value="323">
                                            confidence</option>
                                                                                            <option value="1012">
                                            Connecticut</option>
                                                                                            <option value="941">
                                            Conscientious Objector</option>
                                                                                            <option value="1516">
                                            conservation</option>
                                                                                            <option value="1688">
                                            conservative</option>
                                                                                            <option value="526">
                                            constellation</option>
                                                                                            <option value="1514">
                                            construction tanks</option>
                                                                                            <option value="1574">
                                            cooking</option>
                                                                                            <option value="1458">
                                            cooks</option>
                                                                                            <option value="1428">
                                            coordinate women’s college</option>
                                                                                            <option value="206">
                                            copperhead</option>
                                                                                            <option value="1096">
                                            corn</option>
                                                                                            <option value="696">
                                            corn meal</option>
                                                                                            <option value="1755">
                                            corpsman</option>
                                                                                            <option value="412">
                                            corsage</option>
                                                                                            <option value="262">
                                            corsets</option>
                                                                                            <option value="851">
                                            costumes</option>
                                                                                            <option value="943">
                                            cotillion</option>
                                                                                            <option value="159">
                                            cotta</option>
                                                                                            <option value="1395">
                                            cottage</option>
                                                                                            <option value="1493">
                                            cotton gin</option>
                                                                                            <option value="904">
                                            country club</option>
                                                                                            <option value="931">
                                            country roads</option>
                                                                                            <option value="201">
                                            courage</option>
                                                                                            <option value="2011">
                                            courthouse</option>
                                                                                            <option value="570">
                                            courting</option>
                                                                                            <option value="987">
                                            cousins</option>
                                                                                            <option value="1239">
                                            covers</option>
                                                                                            <option value="2149">
                                            COVID-19</option>
                                                                                            <option value="856">
                                            cow bells</option>
                                                                                            <option value="1464">
                                            cowboy</option>
                                                                                            <option value="1480">
                                            cows</option>
                                                                                            <option value="928">
                                            coyotes</option>
                                                                                            <option value="1128">
                                            crank</option>
                                                                                            <option value="1190">
                                            crash</option>
                                                                                            <option value="1566">
                                            crate</option>
                                                                                            <option value="892">
                                            creativity</option>
                                                                                            <option value="1877">
                                            creek</option>
                                                                                            <option value="990">
                                            creepy</option>
                                                                                            <option value="12">
                                            Crematoria</option>
                                                                                            <option value="845">
                                            crematorium</option>
                                                                                            <option value="605">
                                            cricket</option>
                                                                                            <option value="1936">
                                            crime</option>
                                                                                            <option value="952">
                                            critical thinking</option>
                                                                                            <option value="1390">
                                            crooner</option>
                                                                                            <option value="1572">
                                            crossbow</option>
                                                                                            <option value="1782">
                                            Crossing Guards</option>
                                                                                            <option value="889">
                                            crowds</option>
                                                                                            <option value="916">
                                            CT</option>
                                                                                            <option value="1954">
                                            culture</option>
                                                                                            <option value="1005">
                                            curls</option>
                                                                                            <option value="1599">
                                            currency</option>
                                                                                            <option value="127">
                                            cursing</option>
                                                                                            <option value="775">
                                            customer service</option>
                                                                                            <option value="1700">
                                            customs</option>
                                                                                            <option value="1180">
                                            cutaway</option>
                                                                                            <option value="522">
                                            Cygnus</option>
                                                                                            <option value="331">
                                            Czechoslovakia</option>
                                                                                            <option value="316">
                                            Czechoslovakian</option>
                                                                                            <option value="539">
                                            D-Day</option>
                                                                                            <option value="855">
                                            D.C.</option>
                                                                                            <option value="1754">
                                            Da Nang</option>
                                                                                            <option value="9">
                                            Dachau</option>
                                                                                            <option value="1482">
                                            dairying</option>
                                                                                            <option value="2055">
                                            dallas</option>
                                                                                            <option value="675">
                                            damn opening</option>
                                                                                            <option value="1824">
                                            dance</option>
                                                                                            <option value="335">
                                            dance lessons</option>
                                                                                            <option value="2044">
                                            dances</option>
                                                                                            <option value="740">
                                            dancing</option>
                                                                                            <option value="564">
                                            dare-devils</option>
                                                                                            <option value="1414">
                                            dark and deep</option>
                                                                                            <option value="703">
                                            Dark Corner</option>
                                                                                            <option value="959">
                                            David Miller</option>
                                                                                            <option value="1871">
                                            dead</option>
                                                                                            <option value="1857">
                                            Deadheads</option>
                                                                                            <option value="107">
                                            death</option>
                                                                                            <option value="824">
                                            debris</option>
                                                                                            <option value="944">
                                            debutante</option>
                                                                                            <option value="3">
                                            Dec. 7, 1941</option>
                                                                                            <option value="994">
                                            December</option>
                                                                                            <option value="1001">
                                            December. Christmas</option>
                                                                                            <option value="627">
                                            Declaration of Independence</option>
                                                                                            <option value="347">
                                            decorate graves</option>
                                                                                            <option value="345">
                                            Decoration Day</option>
                                                                                            <option value="475">
                                            decorations</option>
                                                                                            <option value="1381">
                                            decorative pins</option>
                                                                                            <option value="1590">
                                            Dedham</option>
                                                                                            <option value="2018">
                                            defense</option>
                                                                                            <option value="785">
                                            delivery trucks</option>
                                                                                            <option value="1817">
                                            demestikos</option>
                                                                                            <option value="1921">
                                            democrats-abroad</option>
                                                                                            <option value="523">
                                            Deneb</option>
                                                                                            <option value="979">
                                            denmark</option>
                                                                                            <option value="342">
                                            dental school</option>
                                                                                            <option value="375">
                                            dentist</option>
                                                                                            <option value="511">
                                            Denver University</option>
                                                                                            <option value="776">
                                            department stores</option>
                                                                                            <option value="163">
                                            Depression</option>
                                                                                            <option value="938">
                                            Depression era</option>
                                                                                            <option value="1734">
                                            Derby</option>
                                                                                            <option value="1148">
                                            desegregation</option>
                                                                                            <option value="458">
                                            desperate</option>
                                                                                            <option value="1724">
                                            dessert</option>
                                                                                            <option value="2204">
                                            detective agency</option>
                                                                                            <option value="1765">
                                            deterioration</option>
                                                                                            <option value="2197">
                                            dialogue</option>
                                                                                            <option value="1041">
                                            diamonds</option>
                                                                                            <option value="1054">
                                            Dickens</option>
                                                                                            <option value="1181">
                                            dictatorial</option>
                                                                                            <option value="887">
                                            Dikembe Mutombo</option>
                                                                                            <option value="392">
                                            dime stores</option>
                                                                                            <option value="116">
                                            dinner</option>
                                                                                            <option value="1085">
                                            Dionne Quintuplets</option>
                                                                                            <option value="1991">
                                            dirt</option>
                                                                                            <option value="413">
                                            dirty</option>
                                                                                            <option value="217">
                                            disappearance</option>
                                                                                            <option value="1789">
                                            disappointment</option>
                                                                                            <option value="595">
                                            disaster</option>
                                                                                            <option value="1488">
                                            disaster county</option>
                                                                                            <option value="1792">
                                            Disco</option>
                                                                                            <option value="1663">
                                            discontent</option>
                                                                                            <option value="165">
                                            dishes</option>
                                                                                            <option value="1673">
                                            Disney World</option>
                                                                                            <option value="353">
                                            disposable</option>
                                                                                            <option value="1103">
                                            DIY</option>
                                                                                            <option value="1363">
                                            doctor</option>
                                                                                            <option value="397">
                                            dog</option>
                                                                                            <option value="106">
                                            dogs</option>
                                                                                            <option value="1127">
                                            doll</option>
                                                                                            <option value="477">
                                            dolls</option>
                                                                                            <option value="1351">
                                            Dominican nuns</option>
                                                                                            <option value="1032">
                                            donations</option>
                                                                                            <option value="1408">
                                            Dorothy Day</option>
                                                                                            <option value="1315">
                                            double dutch</option>
                                                                                            <option value="765">
                                            Dr. Spitz</option>
                                                                                            <option value="2059">
                                            draft</option>
                                                                                            <option value="1339">
                                            dread</option>
                                                                                            <option value="1418">
                                            dreams</option>
                                                                                            <option value="783">
                                            dress code</option>
                                                                                            <option value="745">
                                            dress design</option>
                                                                                            <option value="1336">
                                            Drigg’s School</option>
                                                                                            <option value="378">
                                            Driver’s License</option>
                                                                                            <option value="320">
                                            driving</option>
                                                                                            <option value="798">
                                            driving dangers</option>
                                                                                            <option value="591">
                                            drones</option>
                                                                                            <option value="1026">
                                            dropping out</option>
                                                                                            <option value="256">
                                            drought</option>
                                                                                            <option value="140">
                                            Drug Store</option>
                                                                                            <option value="1905">
                                            drugs</option>
                                                                                            <option value="1787">
                                            drums</option>
                                                                                            <option value="1999">
                                            dry goods</option>
                                                                                            <option value="2205">
                                            dubai</option>
                                                                                            <option value="787">
                                            Dugan Bread and Cake Truck</option>
                                                                                            <option value="1990">
                                            dust</option>
                                                                                            <option value="252">
                                            Dust Bowl</option>
                                                                                            <option value="362">
                                            duties</option>
                                                                                            <option value="232">
                                            dying</option>
                                                                                            <option value="1221">
                                            E.M.T.</option>
                                                                                            <option value="380">
                                            earache</option>
                                                                                            <option value="1049">
                                            earth</option>
                                                                                            <option value="1828">
                                            earthquake</option>
                                                                                            <option value="1664">
                                            Easter</option>
                                                                                            <option value="724">
                                            Eastern European</option>
                                                                                            <option value="1541">
                                            Ecclesiastes</option>
                                                                                            <option value="241">
                                            economy</option>
                                                                                            <option value="321">
                                            education</option>
                                                                                            <option value="983">
                                            Edvard Grieg</option>
                                                                                            <option value="2031">
                                            EE-3</option>
                                                                                            <option value="1666">
                                            egg salad</option>
                                                                                            <option value="1097">
                                            eggs</option>
                                                                                            <option value="690">
                                            Einstein</option>
                                                                                            <option value="1699">
                                            El Al</option>
                                                                                            <option value="1540">
                                            elderly</option>
                                                                                            <option value="1922">
                                            election</option>
                                                                                            <option value="2071">
                                            election2020,</option>
                                                                                            <option value="301">
                                            elections</option>
                                                                                            <option value="613">
                                            electricity</option>
                                                                                            <option value="877">
                                            elementary school</option>
                                                                                            <option value="86">
                                            Elephants</option>
                                                                                            <option value="47">
                                            Elephants</option>
                                                                                            <option value="1223">
                                            emergency</option>
                                                                                            <option value="1625">
                                            emotion</option>
                                                                                            <option value="2179">
                                            ENCOUNAGEMENT</option>
                                                                                            <option value="164">
                                            encyclopedia</option>
                                                                                            <option value="1133">
                                            Energizer Bunny</option>
                                                                                            <option value="2095">
                                            energy workshop</option>
                                                                                            <option value="1101">
                                            engagement</option>
                                                                                            <option value="1707">
                                            engine room</option>
                                                                                            <option value="619">
                                            engineer</option>
                                                                                            <option value="552">
                                            England</option>
                                                                                            <option value="1947">
                                            english</option>
                                                                                            <option value="653">
                                            English settlers</option>
                                                                                            <option value="817">
                                            environmental movement</option>
                                                                                            <option value="2198">
                                            envy</option>
                                                                                            <option value="1835">
                                            erfoud</option>
                                                                                            <option value="957">
                                            Esther Barrazone</option>
                                                                                            <option value="1745">
                                            ethnicities</option>
                                                                                            <option value="2052">
                                            ethnicity</option>
                                                                                            <option value="1811">
                                            Eugenie Clark</option>
                                                                                            <option value="832">
                                            Eurail Pass</option>
                                                                                            <option value="977">
                                            europe</option>
                                                                                            <option value="790">
                                            evacuation</option>
                                                                                            <option value="267">
                                            Evening In Paris</option>
                                                                                            <option value="773">
                                            events</option>
                                                                                            <option value="1278">
                                            exercise</option>
                                                                                            <option value="1809">
                                            expats</option>
                                                                                            <option value="1794">
                                            experience</option>
                                                                                            <option value="1831">
                                            experimental film</option>
                                                                                            <option value="858">
                                            exploration</option>
                                                                                            <option value="1415">
                                            explore</option>
                                                                                            <option value="594">
                                            explosion</option>
                                                                                            <option value="587">
                                            extinction</option>
                                                                                            <option value="1583">
                                            eye witness</option>
                                                                                            <option value="276">
                                            F.B.I.</option>
                                                                                            <option value="1329">
                                            factory whistle</option>
                                                                                            <option value="2147">
                                            facts</option>
                                                                                            <option value="1025">
                                            fail</option>
                                                                                            <option value="2185">
                                            failure</option>
                                                                                            <option value="1897">
                                            fairy-tale</option>
                                                                                            <option value="174">
                                            faith</option>
                                                                                            <option value="1634">
                                            fall</option>
                                                                                            <option value="119">
                                            families</option>
                                                                                            <option value="103">
                                            family</option>
                                                                                            <option value="1713">
                                            family business</option>
                                                                                            <option value="293">
                                            family doctor</option>
                                                                                            <option value="665">
                                            family feud</option>
                                                                                            <option value="1452">
                                            Family Reunions</option>
                                                                                            <option value="1186">
                                            family’s box</option>
                                                                                            <option value="2231">
                                            famine</option>
                                                                                            <option value="2218">
                                            famine</option>
                                                                                            <option value="694">
                                            farm</option>
                                                                                            <option value="1519">
                                            farm management</option>
                                                                                            <option value="930">
                                            farm stands</option>
                                                                                            <option value="624">
                                            farmer</option>
                                                                                            <option value="1671">
                                            Farmer Doyle</option>
                                                                                            <option value="1483">
                                            farmers</option>
                                                                                            <option value="610">
                                            farming</option>
                                                                                            <option value="1515">
                                            farms</option>
                                                                                            <option value="1708">
                                            Fasching</option>
                                                                                            <option value="153">
                                            fashion</option>
                                                                                            <option value="1269">
                                            father</option>
                                                                                            <option value="399">
                                            fear</option>
                                                                                            <option value="1742">
                                            fears</option>
                                                                                            <option value="100">
                                            feather beds</option>
                                                                                            <option value="1472">
                                            feed lot</option>
                                                                                            <option value="1525">
                                            feed lot calves</option>
                                                                                            <option value="1492">
                                            feed mill</option>
                                                                                            <option value="710">
                                            felt hats</option>
                                                                                            <option value="2199">
                                            FEMA</option>
                                                                                            <option value="1349">
                                            Female</option>
                                                                                            <option value="1419">
                                            Feminist Archetypal Theory</option>
                                                                                            <option value="1002">
                                            festivities</option>
                                                                                            <option value="1448">
                                            FFA</option>
                                                                                            <option value="1727">
                                            Fiji</option>
                                                                                            <option value="1210">
                                            fire</option>
                                                                                            <option value="1457">
                                            fire box</option>
                                                                                            <option value="1546">
                                            fireworks</option>
                                                                                            <option value="368">
                                            first love</option>
                                                                                            <option value="1517">
                                            fish</option>
                                                                                            <option value="1559">
                                            fish hook</option>
                                                                                            <option value="646">
                                            fishing</option>
                                                                                            <option value="1385">
                                            fits-all ring</option>
                                                                                            <option value="1166">
                                            Five and Dime</option>
                                                                                            <option value="981">
                                            fjords</option>
                                                                                            <option value="735">
                                            flags</option>
                                                                                            <option value="1331">
                                            flat tires</option>
                                                                                            <option value="1364">
                                            Flatbush</option>
                                                                                            <option value="149">
                                            florida</option>
                                                                                            <option value="1692">
                                            flowers</option>
                                                                                            <option value="896">
                                            focus</option>
                                                                                            <option value="1065">
                                            food</option>
                                                                                            <option value="507">
                                            football</option>
                                                                                            <option value="1733">
                                            footlong</option>
                                                                                            <option value="1650">
                                            forecast</option>
                                                                                            <option value="2173">
                                            FORGIVENESS</option>
                                                                                            <option value="1702">
                                            Fort Riley</option>
                                                                                            <option value="909">
                                            Fortune</option>
                                                                                            <option value="152">
                                            Frank Sinatra</option>
                                                                                            <option value="1588">
                                            Frappe</option>
                                                                                            <option value="1931">
                                            freak-show</option>
                                                                                            <option value="933">
                                            free range</option>
                                                                                            <option value="1637">
                                            freedom</option>
                                                                                            <option value="1262">
                                            fresh</option>
                                                                                            <option value="451">
                                            fresh bread</option>
                                                                                            <option value="2223">
                                            Freshman Class</option>
                                                                                            <option value="1015">
                                            friends</option>
                                                                                            <option value="359">
                                            friendship</option>
                                                                                            <option value="270">
                                            front porch</option>
                                                                                            <option value="519">
                                            Frostilla</option>
                                                                                            <option value="834">
                                            fruit</option>
                                                                                            <option value="600">
                                            fruitcake</option>
                                                                                            <option value="517">
                                            fumes</option>
                                                                                            <option value="1217">
                                            funeral</option>
                                                                                            <option value="1579">
                                            fur</option>
                                                                                            <option value="1907">
                                            future</option>
                                                                                            <option value="277">
                                            G.I. Bill</option>
                                                                                            <option value="1987">
                                            gambling</option>
                                                                                            <option value="1988">
                                            games</option>
                                                                                            <option value="291">
                                            gang</option>
                                                                                            <option value="322">
                                            garden</option>
                                                                                            <option value="1162">
                                            Garden City Hotel</option>
                                                                                            <option value="273">
                                            gardens</option>
                                                                                            <option value="366">
                                            garter belt</option>
                                                                                            <option value="263">
                                            garter belts</option>
                                                                                            <option value="633">
                                            Gas House Gang</option>
                                                                                            <option value="472">
                                            gasoline</option>
                                                                                            <option value="1777">
                                            GED</option>
                                                                                            <option value="169">
                                            geese</option>
                                                                                            <option value="363">
                                            gender</option>
                                                                                            <option value="939">
                                            generation gap</option>
                                                                                            <option value="1880">
                                            georgetown</option>
                                                                                            <option value="1245">
                                            Georgia</option>
                                                                                            <option value="2002">
                                            gerard</option>
                                                                                            <option value="662">
                                            Geritol</option>
                                                                                            <option value="1569">
                                            German Shepherd</option>
                                                                                            <option value="689">
                                            German soldiers</option>
                                                                                            <option value="598">
                                            Germans</option>
                                                                                            <option value="11">
                                            Germany</option>
                                                                                            <option value="2099">
                                            ghost</option>
                                                                                            <option value="1442">
                                            ghosts</option>
                                                                                            <option value="343">
                                            GI Bill</option>
                                                                                            <option value="1610">
                                            Giffords</option>
                                                                                            <option value="1043">
                                            gift</option>
                                                                                            <option value="242">
                                            gifts</option>
                                                                                            <option value="1000">
                                            Gilbert and Sullivan</option>
                                                                                            <option value="1470">
                                            gilding</option>
                                                                                            <option value="428">
                                            Girl Reserve</option>
                                                                                            <option value="950">
                                            girls</option>
                                                                                            <option value="1073">
                                            girls’ school</option>
                                                                                            <option value="1553">
                                            glamour</option>
                                                                                            <option value="1258">
                                            glass</option>
                                                                                            <option value="895">
                                            glass ceiling</option>
                                                                                            <option value="1072">
                                            glee club</option>
                                                                                            <option value="738">
                                            Glen Miller</option>
                                                                                            <option value="334">
                                            Glenn Miller</option>
                                                                                            <option value="1658">
                                            global</option>
                                                                                            <option value="227">
                                            gloves</option>
                                                                                            <option value="1781">
                                            goals</option>
                                                                                            <option value="1139">
                                            golf</option>
                                                                                            <option value="1297">
                                            Gone With The Wind</option>
                                                                                            <option value="1277">
                                            good meals</option>
                                                                                            <option value="358">
                                            goodies</option>
                                                                                            <option value="1485">
                                            Government Assistance Program</option>
                                                                                            <option value="1870">
                                            GPS tracker</option>
                                                                                            <option value="29">
                                            Grace Hospital</option>
                                                                                            <option value="234">
                                            grade school</option>
                                                                                            <option value="481">
                                            graduation</option>
                                                                                            <option value="1372">
                                            Grail</option>
                                                                                            <option value="1496">
                                            grain</option>
                                                                                            <option value="22">
                                            Grand Central</option>
                                                                                            <option value="1291">
                                            Grand Central News Reel Station</option>
                                                                                            <option value="1155">
                                            grand parents</option>
                                                                                            <option value="499">
                                            grandmother</option>
                                                                                            <option value="1312">
                                            Grandparents Day</option>
                                                                                            <option value="1111">
                                            gratitude</option>
                                                                                            <option value="1984">
                                            grave</option>
                                                                                            <option value="2101">
                                            graves</option>
                                                                                            <option value="5">
                                            Great Depression</option>
                                                                                            <option value="1654">
                                            Great White Fleet</option>
                                                                                            <option value="1818">
                                            greece</option>
                                                                                            <option value="985">
                                            greek</option>
                                                                                            <option value="1887">
                                            green</option>
                                                                                            <option value="1413">
                                            green space</option>
                                                                                            <option value="695">
                                            grits</option>
                                                                                            <option value="932">
                                            grocery stores</option>
                                                                                            <option value="604">
                                            Grosvenor House</option>
                                                                                            <option value="1556">
                                            ground hornets</option>
                                                                                            <option value="406">
                                            group</option>
                                                                                            <option value="1801">
                                            Grove Street Cemetery</option>
                                                                                            <option value="973">
                                            growth</option>
                                                                                            <option value="1788">
                                            guitar</option>
                                                                                            <option value="1234">
                                            Gulf of Mexico</option>
                                                                                            <option value="2048">
                                            guns</option>
                                                                                            <option value="1222">
                                            gurney</option>
                                                                                            <option value="1441">
                                            H.E.B.</option>
                                                                                            <option value="1958">
                                            hagaru-ri</option>
                                                                                            <option value="754">
                                            Haifa</option>
                                                                                            <option value="1829">
                                            hail</option>
                                                                                            <option value="480">
                                            haircuts</option>
                                                                                            <option value="565">
                                            Halloween</option>
                                                                                            <option value="733">
                                            hamburgers</option>
                                                                                            <option value="1422">
                                            Hamilton College</option>
                                                                                            <option value="115">
                                            hammock</option>
                                                                                            <option value="1655">
                                            Hampton Roads</option>
                                                                                            <option value="1679">
                                            hand specialist</option>
                                                                                            <option value="282">
                                            hand-me-downs</option>
                                                                                            <option value="208">
                                            hand-pump well</option>
                                                                                            <option value="161">
                                            happy birthday</option>
                                                                                            <option value="1761">
                                            happy hours</option>
                                                                                            <option value="1511">
                                            hard scrabble</option>
                                                                                            <option value="1338">
                                            hard times</option>
                                                                                            <option value="1722">
                                            Haredim</option>
                                                                                            <option value="441">
                                            Harlem</option>
                                                                                            <option value="583">
                                            Harper Lee</option>
                                                                                            <option value="901">
                                            hatred</option>
                                                                                            <option value="1461">
                                            Hausenfluke</option>
                                                                                            <option value="1943">
                                            health</option>
                                                                                            <option value="1946">
                                            healthcare</option>
                                                                                            <option value="1219">
                                            heart attack</option>
                                                                                            <option value="2174">
                                            HEART SURVIVOR</option>
                                                                                            <option value="1389">
                                            heartthrob</option>
                                                                                            <option value="1575">
                                            heartworms</option>
                                                                                            <option value="365">
                                            heavy stockings</option>
                                                                                            <option value="1199">
                                            hedge trimming</option>
                                                                                            <option value="1068">
                                            heels</option>
                                                                                            <option value="871">
                                            Hell Mouth</option>
                                                                                            <option value="1876">
                                            hem</option>
                                                                                            <option value="1539">
                                            Hemingway</option>
                                                                                            <option value="712">
                                            hemlines</option>
                                                                                            <option value="1503">
                                            Herefords</option>
                                                                                            <option value="2139">
                                            hhhh</option>
                                                                                            <option value="1456">
                                            hickory</option>
                                                                                            <option value="1228">
                                            Hide and Seek</option>
                                                                                            <option value="1612">
                                            high capacity</option>
                                                                                            <option value="482">
                                            high school</option>
                                                                                            <option value="1740">
                                            hiking</option>
                                                                                            <option value="1800">
                                            Hill-Stead Museum</option>
                                                                                            <option value="678">
                                            Himalayas</option>
                                                                                            <option value="893">
                                            hippies</option>
                                                                                            <option value="1903">
                                            Hiroshima</option>
                                                                                            <option value="1160">
                                            Historical Association</option>
                                                                                            <option value="1584">
                                            history</option>
                                                                                            <option value="1711">
                                            hitch-hiking</option>
                                                                                            <option value="30">
                                            Hitchinson KS</option>
                                                                                            <option value="541">
                                            Hitler</option>
                                                                                            <option value="1950">
                                            HIV</option>
                                                                                            <option value="589">
                                            hives</option>
                                                                                            <option value="4">
                                            Hobos</option>
                                                                                            <option value="1865">
                                            Hockey</option>
                                                                                            <option value="1549">
                                            holiday</option>
                                                                                            <option value="105">
                                            holidays</option>
                                                                                            <option value="2102">
                                            Holocaust</option>
                                                                                            <option value="919">
                                            Home Depot</option>
                                                                                            <option value="936">
                                            home repairs</option>
                                                                                            <option value="278">
                                            homeless</option>
                                                                                            <option value="697">
                                            honey</option>
                                                                                            <option value="918">
                                            Hong Kong</option>
                                                                                            <option value="330">
                                            Honomichl</option>
                                                                                            <option value="1122">
                                            honor</option>
                                                                                            <option value="2016">
                                            hook em horns</option>
                                                                                            <option value="175">
                                            hope</option>
                                                                                            <option value="269">
                                            hopscotch</option>
                                                                                            <option value="1304">
                                            Horn and Hardart</option>
                                                                                            <option value="622">
                                            horse</option>
                                                                                            <option value="716">
                                            horse and buggy</option>
                                                                                            <option value="1501">
                                            horse auctions</option>
                                                                                            <option value="929">
                                            horses</option>
                                                                                            <option value="226">
                                            hosiery</option>
                                                                                            <option value="1030">
                                            hospice</option>
                                                                                            <option value="543">
                                            hospital</option>
                                                                                            <option value="1759">
                                            hospital ship</option>
                                                                                            <option value="1935">
                                            host family</option>
                                                                                            <option value="736">
                                            hot dogs</option>
                                                                                            <option value="638">
                                            hot meal</option>
                                                                                            <option value="1436">
                                            hound</option>
                                                                                            <option value="1177">
                                            house calls</option>
                                                                                            <option value="763">
                                            house-call</option>
                                                                                            <option value="467">
                                            household</option>
                                                                                            <option value="969">
                                            housekeeping</option>
                                                                                            <option value="572">
                                            housewives</option>
                                                                                            <option value="341">
                                            housing</option>
                                                                                            <option value="1767">
                                            Howard Stern</option>
                                                                                            <option value="1798">
                                            Hubbard Park</option>
                                                                                            <option value="1596">
                                            Hungary</option>
                                                                                            <option value="272">
                                            hunger</option>
                                                                                            <option value="457">
                                            hungry</option>
                                                                                            <option value="8">
                                            Hungry Man</option>
                                                                                            <option value="285">
                                            hunting</option>
                                                                                            <option value="1079">
                                            hurdy-gurdyman</option>
                                                                                            <option value="1647">
                                            hurricane</option>
                                                                                            <option value="592">
                                            hydrogen</option>
                                                                                            <option value="1021">
                                            hymn</option>
                                                                                            <option value="1250">
                                            hypocrisy</option>
                                                                                            <option value="1175">
                                            I love a Mystery</option>
                                                                                            <option value="771">
                                            i-pads</option>
                                                                                            <option value="772">
                                            i-phones</option>
                                                                                            <option value="255">
                                            ice box</option>
                                                                                            <option value="789">
                                            Ice Cream Truck</option>
                                                                                            <option value="1866">
                                            ice fishing</option>
                                                                                            <option value="266">
                                            ice man</option>
                                                                                            <option value="463">
                                            ice tongs</option>
                                                                                            <option value="461">
                                            icebox</option>
                                                                                            <option value="1080">
                                            iceman</option>
                                                                                            <option value="2195">
                                            identity</option>
                                                                                            <option value="1310">
                                            ideology</option>
                                                                                            <option value="902">
                                            ignorance</option>
                                                                                            <option value="886">
                                            illustrations</option>
                                                                                            <option value="393">
                                            imagination</option>
                                                                                            <option value="1842">
                                            Imhof</option>
                                                                                            <option value="2217">
                                            immigration</option>
                                                                                            <option value="212">
                                            immune system</option>
                                                                                            <option value="2033">
                                            Imperial</option>
                                                                                            <option value="641">
                                            Imperial Cruise</option>
                                                                                            <option value="2203">
                                            imposter syndrome</option>
                                                                                            <option value="1261">
                                            in-season</option>
                                                                                            <option value="879">
                                            inaccuracies</option>
                                                                                            <option value="1959">
                                            inchon</option>
                                                                                            <option value="1677">
                                            inclusion</option>
                                                                                            <option value="898">
                                            independent thought</option>
                                                                                            <option value="679">
                                            India</option>
                                                                                            <option value="1335">
                                            Indians</option>
                                                                                            <option value="1427">
                                            individuality</option>
                                                                                            <option value="1216">
                                            infantile paralysis</option>
                                                                                            <option value="538">
                                            Infantry</option>
                                                                                            <option value="780">
                                            informal</option>
                                                                                            <option value="1869">
                                            injured</option>
                                                                                            <option value="1088">
                                            injury #brooklyn navy yard</option>
                                                                                            <option value="1398">
                                            innocence</option>
                                                                                            <option value="2228">
                                            innovation</option>
                                                                                            <option value="717">
                                            innovations</option>
                                                                                            <option value="218">
                                            insect</option>
                                                                                            <option value="1744">
                                            integration</option>
                                                                                            <option value="2225">
                                            Intellectual Discipline</option>
                                                                                            <option value="1202">
                                            international school</option>
                                                                                            <option value="1933">
                                            internet</option>
                                                                                            <option value="1282">
                                            interpersonal contact</option>
                                                                                            <option value="692">
                                            Invasion</option>
                                                                                            <option value="556">
                                            Invasion of Japan</option>
                                                                                            <option value="715">
                                            inventions</option>
                                                                                            <option value="284">
                                            Iowa</option>
                                                                                            <option value="1581">
                                            Iraq</option>
                                                                                            <option value="2230">
                                            Ireland</option>
                                                                                            <option value="1885">
                                            Ireland</option>
                                                                                            <option value="1057">
                                            irene nemirovsky</option>
                                                                                            <option value="286">
                                            Irish</option>
                                                                                            <option value="1592">
                                            Iron Curtain</option>
                                                                                            <option value="27">
                                            Iron Lung</option>
                                                                                            <option value="102">
                                            iron wood stove</option>
                                                                                            <option value="136">
                                            irony</option>
                                                                                            <option value="486">
                                            isinglass</option>
                                                                                            <option value="1719">
                                            Israeli Victory</option>
                                                                                            <option value="835">
                                            Italy</option>
                                                                                            <option value="225">
                                            itchy</option>
                                                                                            <option value="2221">
                                            Ivan Marki</option>
                                                                                            <option value="1369">
                                            Jack Berrill</option>
                                                                                            <option value="1506">
                                            jack of all trades</option>
                                                                                            <option value="1843">
                                            Jack Siler</option>
                                                                                            <option value="1819">
                                            jack-siler</option>
                                                                                            <option value="1904">
                                            jail</option>
                                                                                            <option value="1055">
                                            Jane Eyre</option>
                                                                                            <option value="637">
                                            Japan</option>
                                                                                            <option value="1203">
                                            Japanese</option>
                                                                                            <option value="1667">
                                            Jarjura</option>
                                                                                            <option value="777">
                                            Jean’s Dres Store</option>
                                                                                            <option value="1861">
                                            jeannie-peck paramount trench-coat</option>
                                                                                            <option value="781">
                                            jeans</option>
                                                                                            <option value="1945">
                                            Jenison</option>
                                                                                            <option value="797">
                                            Jersey Shore</option>
                                                                                            <option value="749">
                                            Jerusalem</option>
                                                                                            <option value="1972">
                                            jet</option>
                                                                                            <option value="1645">
                                            Jew</option>
                                                                                            <option value="1683">
                                            Jewish</option>
                                                                                            <option value="1979">
                                            Jews</option>
                                                                                            <option value="1891">
                                            Jim Morrison</option>
                                                                                            <option value="1774">
                                            Jimmy Carter</option>
                                                                                            <option value="336">
                                            jitterbug</option>
                                                                                            <option value="1273">
                                            jitterbugging</option>
                                                                                            <option value="240">
                                            jobs</option>
                                                                                            <option value="2003">
                                            joe</option>
                                                                                            <option value="1615">
                                            John Crowe</option>
                                                                                            <option value="625">
                                            John Dunlap</option>
                                                                                            <option value="761">
                                            John Jr.</option>
                                                                                            <option value="1300">
                                            John Steinbeck</option>
                                                                                            <option value="1606">
                                            Johnnie Walker Red</option>
                                                                                            <option value="2170">
                                            jokes</option>
                                                                                            <option value="2047">
                                            Jonathan Swift</option>
                                                                                            <option value="18">
                                            Jones Beach</option>
                                                                                            <option value="2177">
                                            JOY</option>
                                                                                            <option value="753">
                                            Judaism</option>
                                                                                            <option value="1235">
                                            juke box</option>
                                                                                            <option value="261">
                                            jukebox</option>
                                                                                            <option value="975">
                                            july 4</option>
                                                                                            <option value="731">
                                            July 4th</option>
                                                                                            <option value="2077">
                                            jump</option>
                                                                                            <option value="737">
                                            jump rope</option>
                                                                                            <option value="32">
                                            Jungle</option>
                                                                                            <option value="1294">
                                            Junior Literary Guild</option>
                                                                                            <option value="1874">
                                            Justice of the Peace</option>
                                                                                            <option value="1393">
                                            Justin Bieber</option>
                                                                                            <option value="636">
                                            K Rations</option>
                                                                                            <option value="315">
                                            Kansas</option>
                                                                                            <option value="813">
                                            Kars</option>
                                                                                            <option value="1161">
                                            Keds</option>
                                                                                            <option value="612">
                                            Kelvinator</option>
                                                                                            <option value="2056">
                                            kennedy</option>
                                                                                            <option value="97">
                                            Kennedy Assassination</option>
                                                                                            <option value="1354">
                                            Kentucky</option>
                                                                                            <option value="755">
                                            Kibbutz</option>
                                                                                            <option value="2226">
                                            kid</option>
                                                                                            <option value="178">
                                            King James Version</option>
                                                                                            <option value="1416">
                                            Kirkland College</option>
                                                                                            <option value="1993">
                                            knees</option>
                                                                                            <option value="1159">
                                            Knights of Columbus</option>
                                                                                            <option value="404">
                                            knives</option>
                                                                                            <option value="1836">
                                            koran</option>
                                                                                            <option value="449">
                                            Korean War</option>
                                                                                            <option value="1960">
                                            korean-war</option>
                                                                                            <option value="1693">
                                            Kosher</option>
                                                                                            <option value="1961">
                                            koto-ri</option>
                                                                                            <option value="1805">
                                            La Coupole</option>
                                                                                            <option value="1554">
                                            Labrador</option>
                                                                                            <option value="1215">
                                            Ladies’ Bath house</option>
                                                                                            <option value="229">
                                            lady</option>
                                                                                            <option value="2014">
                                            Lafayette</option>
                                                                                            <option value="16">
                                            LaGuardia Airport</option>
                                                                                            <option value="734">
                                            lake</option>
                                                                                            <option value="168">
                                            Lake Pudys NY</option>
                                                                                            <option value="220">
                                            Lake Purdys NY</option>
                                                                                            <option value="248">
                                            Lake Sebago</option>
                                                                                            <option value="337">
                                            Lambeth Walk</option>
                                                                                            <option value="1944">
                                            Landis</option>
                                                                                            <option value="1953">
                                            language</option>
                                                                                            <option value="134">
                                            laughter</option>
                                                                                            <option value="207">
                                            laundry</option>
                                                                                            <option value="1477">
                                            Lavoy Tubbs</option>
                                                                                            <option value="1197">
                                            lawn mowing</option>
                                                                                            <option value="1091">
                                            lean-to</option>
                                                                                            <option value="764">
                                            leather bag</option>
                                                                                            <option value="187">
                                            leeches</option>
                                                                                            <option value="1205">
                                            left side driving</option>
                                                                                            <option value="1986">
                                            leg</option>
                                                                                            <option value="558">
                                            Legion of Honor</option>
                                                                                            <option value="1661">
                                            Leicester</option>
                                                                                            <option value="993">
                                            leisure</option>
                                                                                            <option value="1806">
                                            Les Deux Magots</option>
                                                                                            <option value="1238">
                                            Letters to Channy</option>
                                                                                            <option value="894">
                                            liberal arts</option>
                                                                                            <option value="1643">
                                            liberation</option>
                                                                                            <option value="1446">
                                            Liberty Hill</option>
                                                                                            <option value="1142">
                                            librarian</option>
                                                                                            <option value="1037">
                                            library</option>
                                                                                            <option value="1641">
                                            lice</option>
                                                                                            <option value="1204">
                                            license</option>
                                                                                            <option value="1286">
                                            Lido Beach Casino</option>
                                                                                            <option value="110">
                                            life</option>
                                                                                            <option value="2183">
                                            Life story</option>
                                                                                            <option value="527">
                                            light-waves</option>
                                                                                            <option value="454">
                                            lilacs</option>
                                                                                            <option value="1589">
                                            Lime Rickey</option>
                                                                                            <option value="1084">
                                            Lindbergh</option>
                                                                                            <option value="1820">
                                            lindos</option>
                                                                                            <option value="1376">
                                            Lindy</option>
                                                                                            <option value="2150">
                                            Lionel</option>
                                                                                            <option value="702">
                                            liquor stills</option>
                                                                                            <option value="1280">
                                            listening</option>
                                                                                            <option value="1024">
                                            literature. favorite</option>
                                                                                            <option value="1314">
                                            Little League</option>
                                                                                            <option value="1296">
                                            Liu Li Chan</option>
                                                                                            <option value="1455">
                                            live oak</option>
                                                                                            <option value="506">
                                            live turkey</option>
                                                                                            <option value="1450">
                                            livestock</option>
                                                                                            <option value="1473">
                                            livestock auctions</option>
                                                                                            <option value="1260">
                                            local</option>
                                                                                            <option value="257">
                                            locusts</option>
                                                                                            <option value="762">
                                            lollypop</option>
                                                                                            <option value="962">
                                            long island</option>
                                                                                            <option value="1992">
                                            long pants</option>
                                                                                            <option value="364">
                                            long underwear</option>
                                                                                            <option value="1233">
                                            Longboat Key</option>
                                                                                            <option value="1355">
                                            longshoreman</option>
                                                                                            <option value="1093">
                                            loons</option>
                                                                                            <option value="1046">
                                            lost</option>
                                                                                            <option value="2015">
                                            Louisiana</option>
                                                                                            <option value="1353">
                                            Louisville</option>
                                                                                            <option value="177">
                                            love</option>
                                                                                            <option value="2175">
                                            LOVE</option>
                                                                                            <option value="1888">
                                            luck</option>
                                                                                            <option value="1995">
                                            lucky</option>
                                                                                            <option value="1356">
                                            luggage</option>
                                                                                            <option value="1587">
                                            lunch counter</option>
                                                                                            <option value="1747">
                                            lunch room</option>
                                                                                            <option value="759">
                                            Lyndon Johnson</option>
                                                                                            <option value="426">
                                            lysol</option>
                                                                                            <option value="1170">
                                            Ma Perkins</option>
                                                                                            <option value="1841">
                                            Mabel Dodge</option>
                                                                                            <option value="1083">
                                            mail</option>
                                                                                            <option value="620">
                                            mail carrier</option>
                                                                                            <option value="666">
                                            mail order</option>
                                                                                            <option value="664">
                                            mail route</option>
                                                                                            <option value="770">
                                            maintenance</option>
                                                                                            <option value="1435">
                                            Major Hall</option>
                                                                                            <option value="1910">
                                            malaria</option>
                                                                                            <option value="682">
                                            Malaysia</option>
                                                                                            <option value="1397">
                                            male privilege</option>
                                                                                            <option value="1178">
                                            malpractice insurance</option>
                                                                                            <option value="1570">
                                            mammalogist</option>
                                                                                            <option value="2212">
                                            Manchester</option>
                                                                                            <option value="1605">
                                            Mandalay</option>
                                                                                            <option value="924">
                                            Manuel Rivera</option>
                                                                                            <option value="496">
                                            Manzanola</option>
                                                                                            <option value="1989">
                                            marbles</option>
                                                                                            <option value="478">
                                            marcelled hair</option>
                                                                                            <option value="820">
                                            marches</option>
                                                                                            <option value="848">
                                            Mardi Gras</option>
                                                                                            <option value="264">
                                            margarine pill</option>
                                                                                            <option value="1964">
                                            Marines</option>
                                                                                            <option value="1900">
                                            Marisa DeWolf</option>
                                                                                            <option value="280">
                                            marked house</option>
                                                                                            <option value="1760">
                                            marketing</option>
                                                                                            <option value="1607">
                                            Marlboros</option>
                                                                                            <option value="1100">
                                            marmalade</option>
                                                                                            <option value="970">
                                            marriage</option>
                                                                                            <option value="1344">
                                            marry</option>
                                                                                            <option value="847">
                                            Martedi Grasso</option>
                                                                                            <option value="566">
                                            Martians</option>
                                                                                            <option value="1145">
                                            Martin Luther King</option>
                                                                                            <option value="626">
                                            Mary Katherine Goddard</option>
                                                                                            <option value="494">
                                            Mary Pickford</option>
                                                                                            <option value="750">
                                            Masada</option>
                                                                                            <option value="87">
                                            Masaii</option>
                                                                                            <option value="2184">
                                            Mask</option>
                                                                                            <option value="846">
                                            mass death</option>
                                                                                            <option value="2049">
                                            mass killing</option>
                                                                                            <option value="1591">
                                            Massachusetts</option>
                                                                                            <option value="1614">
                                            massacre</option>
                                                                                            <option value="1537">
                                            matadors</option>
                                                                                            <option value="1941">
                                            matapa</option>
                                                                                            <option value="779">
                                            matching outfits</option>
                                                                                            <option value="1019">
                                            math</option>
                                                                                            <option value="2207">
                                            matrimonialdetectives</option>
                                                                                            <option value="1778">
                                            Mattatuck</option>
                                                                                            <option value="914">
                                            Mattatuck Museum</option>
                                                                                            <option value="2224">
                                            Maturing as a Thinker</option>
                                                                                            <option value="357">
                                            May baskets</option>
                                                                                            <option value="942">
                                            May Day 1971</option>
                                                                                            <option value="356">
                                            May Queen</option>
                                                                                            <option value="1821">
                                            mcdonald's</option>
                                                                                            <option value="1696">
                                            McMahon</option>
                                                                                            <option value="730">
                                            meal</option>
                                                                                            <option value="966">
                                            meat</option>
                                                                                            <option value="1522">
                                            mechanic</option>
                                                                                            <option value="1126">
                                            mechanical</option>
                                                                                            <option value="1129">
                                            mechanism</option>
                                                                                            <option value="1756">
                                            medic</option>
                                                                                            <option value="2227">
                                            medical</option>
                                                                                            <option value="1852">
                                            medical help</option>
                                                                                            <option value="1911">
                                            medication</option>
                                                                                            <option value="143">
                                            medicine</option>
                                                                                            <option value="1793">
                                            Meditation</option>
                                                                                            <option value="1266">
                                            melting pot</option>
                                                                                            <option value="1837">
                                            memoir</option>
                                                                                            <option value="2103">
                                            memorial</option>
                                                                                            <option value="1013">
                                            memories</option>
                                                                                            <option value="551">
                                            Meningitis</option>
                                                                                            <option value="55">
                                            Mental Illness</option>
                                                                                            <option value="90">
                                            Mental Illness</option>
                                                                                            <option value="1524">
                                            mentor</option>
                                                                                            <option value="708">
                                            mercantile store</option>
                                                                                            <option value="1426">
                                            merger</option>
                                                                                            <option value="308">
                                            merry-go-round</option>
                                                                                            <option value="1454">
                                            mesquite</option>
                                                                                            <option value="1912">
                                            methoquin</option>
                                                                                            <option value="988">
                                            Metropolitan Opera</option>
                                                                                            <option value="540">
                                            Metz</option>
                                                                                            <option value="1508">
                                            Mexicans</option>
                                                                                            <option value="296">
                                            Mid-West</option>
                                                                                            <option value="1775">
                                            middle class</option>
                                                                                            <option value="2035">
                                            middle-class</option>
                                                                                            <option value="1358">
                                            Midget Village</option>
                                                                                            <option value="786">
                                            mild</option>
                                                                                            <option value="1735">
                                            Milford</option>
                                                                                            <option value="810">
                                            military take-over</option>
                                                                                            <option value="199">
                                            milk delivery</option>
                                                                                            <option value="1317">
                                            milk man</option>
                                                                                            <option value="1878">
                                            milking</option>
                                                                                            <option value="1081">
                                            milkman</option>
                                                                                            <option value="253">
                                            Milwaukee R.R. stereoscope</option>
                                                                                            <option value="333">
                                            Milwaukee RR</option>
                                                                                            <option value="2065">
                                            mines</option>
                                                                                            <option value="1119">
                                            miniature cars</option>
                                                                                            <option value="2229">
                                            miracle</option>
                                                                                            <option value="1690">
                                            mirrors</option>
                                                                                            <option value="873">
                                            Mischief Night</option>
                                                                                            <option value="237">
                                            Miss Budelman</option>
                                                                                            <option value="544">
                                            Missing in Action</option>
                                                                                            <option value="1407">
                                            mission</option>
                                                                                            <option value="516">
                                            Missouri</option>
                                                                                            <option value="1906">
                                            mistakes</option>
                                                                                            <option value="497">
                                            MIT</option>
                                                                                            <option value="88">
                                            Mizungu Strike</option>
                                                                                            <option value="407">
                                            Model A Ford</option>
                                                                                            <option value="1951">
                                            Model School</option>
                                                                                            <option value="1433">
                                            modern dance</option>
                                                                                            <option value="1531">
                                            mohair</option>
                                                                                            <option value="85">
                                            Mombassa</option>
                                                                                            <option value="1253">
                                            money</option>
                                                                                            <option value="1925">
                                            monkey-bars</option>
                                                                                            <option value="669">
                                            Montgomery Ward</option>
                                                                                            <option value="1047">
                                            moon</option>
                                                                                            <option value="671">
                                            moonshine</option>
                                                                                            <option value="1619">
                                            moonshine still</option>
                                                                                            <option value="701">
                                            moonshiners</option>
                                                                                            <option value="1764">
                                            morale</option>
                                                                                            <option value="442">
                                            Morningside Park</option>
                                                                                            <option value="1838">
                                            morocco</option>
                                                                                            <option value="548">
                                            mortar shell</option>
                                                                                            <option value="223">
                                            mosquitoes</option>
                                                                                            <option value="650">
                                            mosquitos</option>
                                                                                            <option value="2180">
                                            mother</option>
                                                                                            <option value="498">
                                            mother-in-law</option>
                                                                                            <option value="2220">
                                            motherhood</option>
                                                                                            <option value="1352">
                                            Motherhouse</option>
                                                                                            <option value="1832">
                                            Mothlight</option>
                                                                                            <option value="1201">
                                            motor scooter</option>
                                                                                            <option value="1404">
                                            Mott Street</option>
                                                                                            <option value="814">
                                            Mount Ararat</option>
                                                                                            <option value="721">
                                            Mount Holyoke College</option>
                                                                                            <option value="1242">
                                            Mount Vernon</option>
                                                                                            <option value="1094">
                                            mountain</option>
                                                                                            <option value="1440">
                                            mountain lion</option>
                                                                                            <option value="1394">
                                            mountains</option>
                                                                                            <option value="2028">
                                            mourning</option>
                                                                                            <option value="495">
                                            movie stars</option>
                                                                                            <option value="1319">
                                            Movietone</option>
                                                                                            <option value="1917">
                                            mozambique</option>
                                                                                            <option value="1529">
                                            Mr. Carl</option>
                                                                                            <option value="1738">
                                            Mt. Kearsage</option>
                                                                                            <option value="1254">
                                            mud-slinging</option>
                                                                                            <option value="1640">
                                            Munich</option>
                                                                                            <option value="1620">
                                            murder</option>
                                                                                            <option value="1695">
                                            Murphy</option>
                                                                                            <option value="1074">
                                            music</option>
                                                                                            <option value="327">
                                            music lessons</option>
                                                                                            <option value="1622">
                                            musical</option>
                                                                                            <option value="1184">
                                            musical comedies</option>
                                                                                            <option value="193">
                                            Musicians’ Strike</option>
                                                                                            <option value="1469">
                                            mustang</option>
                                                                                            <option value="1682">
                                            mute button</option>
                                                                                            <option value="2140">
                                            my own story</option>
                                                                                            <option value="2138">
                                            My testing on issues</option>
                                                                                            <option value="1601">
                                            Myanmar</option>
                                                                                            <option value="137">
                                            Nachman’s Pharmacy</option>
                                                                                            <option value="84">
                                            Nairobi</option>
                                                                                            <option value="93">
                                            NAMI</option>
                                                                                            <option value="515">
                                            Naru</option>
                                                                                            <option value="2045">
                                            Nat King Cole</option>
                                                                                            <option value="940">
                                            National Guard</option>
                                                                                            <option value="984">
                                            nationalism</option>
                                                                                            <option value="926">
                                            Nationals</option>
                                                                                            <option value="2046">
                                            Nature Boy</option>
                                                                                            <option value="447">
                                            Navy</option>
                                                                                            <option value="275">
                                            Navy Nursing Corps</option>
                                                                                            <option value="274">
                                            Navy Waves</option>
                                                                                            <option value="512">
                                            Navy Yard</option>
                                                                                            <option value="1895">
                                            Navy-brat</option>
                                                                                            <option value="1597">
                                            Nazi</option>
                                                                                            <option value="1977">
                                            Nazis</option>
                                                                                            <option value="1384">
                                            necklaces</option>
                                                                                            <option value="1058">
                                            nemirovsky</option>
                                                                                            <option value="677">
                                            Nepal</option>
                                                                                            <option value="1723">
                                            Netanyahu</option>
                                                                                            <option value="1110">
                                            New England</option>
                                                                                            <option value="1031">
                                            New Haven</option>
                                                                                            <option value="825">
                                            New Jersey</option>
                                                                                            <option value="989">
                                            New York</option>
                                                                                            <option value="138">
                                            New York CIty</option>
                                                                                            <option value="243">
                                            newlyweds</option>
                                                                                            <option value="129">
                                            newspapers</option>
                                                                                            <option value="1244">
                                            Niantic</option>
                                                                                            <option value="691">
                                            Niels Bohr</option>
                                                                                            <option value="524">
                                            night sky</option>
                                                                                            <option value="1008">
                                            nineties</option>
                                                                                            <option value="170">
                                            nipping</option>
                                                                                            <option value="1796">
                                            Nixon</option>
                                                                                            <option value="1962">
                                            NKPA</option>
                                                                                            <option value="1092">
                                            no motors</option>
                                                                                            <option value="953">
                                            non-traditional</option>
                                                                                            <option value="1730">
                                            nor’easter</option>
                                                                                            <option value="324">
                                            Normal School</option>
                                                                                            <option value="2159">
                                            North Dakota</option>
                                                                                            <option value="947">
                                            Northern Virginia Sun</option>
                                                                                            <option value="980">
                                            norway</option>
                                                                                            <option value="1402">
                                            nun</option>
                                                                                            <option value="446">
                                            nurse</option>
                                                                                            <option value="313">
                                            nurses</option>
                                                                                            <option value="374">
                                            nursing</option>
                                                                                            <option value="1361">
                                            NY</option>
                                                                                            <option value="1112">
                                            NYC</option>
                                                                                            <option value="471">
                                            nylon stockings</option>
                                                                                            <option value="1251">
                                            Obama</option>
                                                                                            <option value="1421">
                                            obituary</option>
                                                                                            <option value="1981">
                                            occupation</option>
                                                                                            <option value="1347">
                                            odds</option>
                                                                                            <option value="2017">
                                            offense</option>
                                                                                            <option value="1346">
                                            office football pool</option>
                                                                                            <option value="537">
                                            Officer training</option>
                                                                                            <option value="314">
                                            officers club</option>
                                                                                            <option value="440">
                                            officers’ club</option>
                                                                                            <option value="900">
                                            Oil Crisis</option>
                                                                                            <option value="955">
                                            Oil Crisis 1975</option>
                                                                                            <option value="1495">
                                            oil milling</option>
                                                                                            <option value="1182">
                                            Oklahoma</option>
                                                                                            <option value="325">
                                            old maid</option>
                                                                                            <option value="1321">
                                            old West</option>
                                                                                            <option value="360">
                                            oldest child</option>
                                                                                            <option value="1626">
                                            OLLI</option>
                                                                                            <option value="179">
                                            on dying</option>
                                                                                            <option value="1185">
                                            opera</option>
                                                                                            <option value="1328">
                                            operator</option>
                                                                                            <option value="1571">
                                            opossums</option>
                                                                                            <option value="1638">
                                            optimism</option>
                                                                                            <option value="1050">
                                            orb</option>
                                                                                            <option value="196">
                                            orchestra</option>
                                                                                            <option value="147">
                                            ornaments</option>
                                                                                            <option value="567">
                                            Orson Wells</option>
                                                                                            <option value="876">
                                            Oswald</option>
                                                                                            <option value="1171">
                                            Our Gal Sunday</option>
                                                                                            <option value="611">
                                            outhouse</option>
                                                                                            <option value="709">
                                            overalls</option>
                                                                                            <option value="1467">
                                            pace</option>
                                                                                            <option value="542">
                                            Pacific</option>
                                                                                            <option value="700">
                                            Pacific War</option>
                                                                                            <option value="476">
                                            packages</option>
                                                                                            <option value="1194">
                                            Packer Collegiate</option>
                                                                                            <option value="1016">
                                            Packer Collegiate Institute</option>
                                                                                            <option value="1527">
                                            packer cows</option>
                                                                                            <option value="1528">
                                            packers</option>
                                                                                            <option value="1471">
                                            packing company</option>
                                                                                            <option value="402">
                                            packing house</option>
                                                                                            <option value="1431">
                                            painting</option>
                                                                                            <option value="885">
                                            pajamas</option>
                                                                                            <option value="807">
                                            Palace of Knossos</option>
                                                                                            <option value="1731">
                                            panic</option>
                                                                                            <option value="247">
                                            Panther Pond</option>
                                                                                            <option value="2012">
                                            Papa Noel</option>
                                                                                            <option value="967">
                                            paper</option>
                                                                                            <option value="948">
                                            paper route</option>
                                                                                            <option value="288">
                                            parade</option>
                                                                                            <option value="1387">
                                            Paramount Theater</option>
                                                                                            <option value="1123">
                                            parents</option>
                                                                                            <option value="917">
                                            Paris</option>
                                                                                            <option value="1365">
                                            parish school</option>
                                                                                            <option value="433">
                                            park</option>
                                                                                            <option value="1660">
                                            parking lot</option>
                                                                                            <option value="1633">
                                            parochial school</option>
                                                                                            <option value="124">
                                            parrot</option>
                                                                                            <option value="1327">
                                            party line</option>
                                                                                            <option value="13">
                                            Party Line Teleophone</option>
                                                                                            <option value="1313">
                                            party line telephone</option>
                                                                                            <option value="1853">
                                            Pasadena</option>
                                                                                            <option value="1045">
                                            passed down</option>
                                                                                            <option value="1786">
                                            passion</option>
                                                                                            <option value="843">
                                            Passover</option>
                                                                                            <option value="1600">
                                            passport</option>
                                                                                            <option value="1966">
                                            pastoral</option>
                                                                                            <option value="1478">
                                            pastures</option>
                                                                                            <option value="831">
                                            Path 	Train</option>
                                                                                            <option value="520">
                                            Pathe News</option>
                                                                                            <option value="729">
                                            Patricia Murphy’s Restaurant</option>
                                                                                            <option value="202">
                                            patriotism</option>
                                                                                            <option value="121">
                                            patsy</option>
                                                                                            <option value="713">
                                            Paul Duke</option>
                                                                                            <option value="2176">
                                            PEACE</option>
                                                                                            <option value="1909">
                                            Peace Corps</option>
                                                                                            <option value="609">
                                            peaches</option>
                                                                                            <option value="1">
                                            Pearl Harbor</option>
                                                                                            <option value="1567">
                                            pee</option>
                                                                                            <option value="190">
                                            penny candy</option>
                                                                                            <option value="130">
                                            penny postcard</option>
                                                                                            <option value="455">
                                            perfume</option>
                                                                                            <option value="388">
                                            permanent wave</option>
                                                                                            <option value="373">
                                            Perry Iowa</option>
                                                                                            <option value="2022">
                                            persistence</option>
                                                                                            <option value="778">
                                            personal</option>
                                                                                            <option value="2222">
                                            Personal Development</option>
                                                                                            <option value="2213">
                                            Perspectives of Home</option>
                                                                                            <option value="2145">
                                            pet</option>
                                                                                            <option value="1036">
                                            Peter Rabbit</option>
                                                                                            <option value="125">
                                            pets</option>
                                                                                            <option value="283">
                                            pheasant</option>
                                                                                            <option value="615">
                                            Philco</option>
                                                                                            <option value="1169">
                                            Philco radio</option>
                                                                                            <option value="1825">
                                            phillip</option>
                                                                                            <option value="528">
                                            photons</option>
                                                                                            <option value="937">
                                            physician</option>
                                                                                            <option value="1183">
                                            piano</option>
                                                                                            <option value="1536">
                                            picadors</option>
                                                                                            <option value="1158">
                                            pickle festival</option>
                                                                                            <option value="436">
                                            pickled rind</option>
                                                                                            <option value="732">
                                            picnic</option>
                                                                                            <option value="1341">
                                            Pied Pipers</option>
                                                                                            <option value="503">
                                            Piggly Wiggly</option>
                                                                                            <option value="448">
                                            pilot</option>
                                                                                            <option value="1164">
                                            Pinafore Playshop</option>
                                                                                            <option value="35">
                                            Pink Dolphins</option>
                                                                                            <option value="383">
                                            pipe smoke</option>
                                                                                            <option value="418">
                                            PJs</option>
                                                                                            <option value="1868">
                                            plane crash</option>
                                                                                            <option value="841">
                                            play</option>
                                                                                            <option value="1770">
                                            play-by-play</option>
                                                                                            <option value="303">
                                            playground</option>
                                                                                            <option value="158">
                                            playing hooky</option>
                                                                                            <option value="25">
                                            Pleasantville</option>
                                                                                            <option value="376">
                                            Pleasantville NY</option>
                                                                                            <option value="133">
                                            poetry</option>
                                                                                            <option value="806">
                                            poke salad</option>
                                                                                            <option value="443">
                                            police</option>
                                                                                            <option value="184">
                                            polio</option>
                                                                                            <option value="26">
                                            Poliomyelitis</option>
                                                                                            <option value="1132">
                                            political campaigns</option>
                                                                                            <option value="1681">
                                            political commercials</option>
                                                                                            <option value="586">
                                            pollination</option>
                                                                                            <option value="1193">
                                            Polly Prep</option>
                                                                                            <option value="1163">
                                            Polo Bar</option>
                                                                                            <option value="2058">
                                            Pomperaug</option>
                                                                                            <option value="1105">
                                            Pomperaug Woods</option>
                                                                                            <option value="1568">
                                            poop</option>
                                                                                            <option value="1406">
                                            poor</option>
                                                                                            <option value="568">
                                            porch swing</option>
                                                                                            <option value="699">
                                            pork n’beans</option>
                                                                                            <option value="1274">
                                            portable record player</option>
                                                                                            <option value="1939">
                                            Portuguese</option>
                                                                                            <option value="1520">
                                            post master</option>
                                                                                            <option value="1635">
                                            post-war</option>
                                                                                            <option value="1082">
                                            postman</option>
                                                                                            <option value="628">
                                            Postmaster</option>
                                                                                            <option value="1484">
                                            pot cheese</option>
                                                                                            <option value="853">
                                            Potomac River</option>
                                                                                            <option value="1432">
                                            pottery</option>
                                                                                            <option value="259">
                                            poverty</option>
                                                                                            <option value="1379">
                                            powder puffs</option>
                                                                                            <option value="1665">
                                            powdered</option>
                                                                                            <option value="1659">
                                            power</option>
                                                                                            <option value="319">
                                            practical</option>
                                                                                            <option value="1785">
                                            practice</option>
                                                                                            <option value="1978">
                                            Prague</option>
                                                                                            <option value="2072">
                                            pratikaufman</option>
                                                                                            <option value="211">
                                            prayer</option>
                                                                                            <option value="1653">
                                            preparation. OLLI</option>
                                                                                            <option value="1153">
                                            presents</option>
                                                                                            <option value="880">
                                            preserve</option>
                                                                                            <option value="881">
                                            President Johnson</option>
                                                                                            <option value="1923">
                                            presidential-debate</option>
                                                                                            <option value="1348">
                                            pressure</option>
                                                                                            <option value="1380">
                                            pretty pin cushions</option>
                                                                                            <option value="1059">
                                            pride</option>
                                                                                            <option value="1152">
                                            principal</option>
                                                                                            <option value="2060">
                                            prisoner</option>
                                                                                            <option value="444">
                                            prisoner car</option>
                                                                                            <option value="687">
                                            prisoners</option>
                                                                                            <option value="236">
                                            prize</option>
                                                                                            <option value="1248">
                                            pro-Hitler</option>
                                                                                            <option value="1486">
                                            processing</option>
                                                                                            <option value="1345">
                                            prognosticating</option>
                                                                                            <option value="411">
                                            prom</option>
                                                                                            <option value="1405">
                                            promote social justice</option>
                                                                                            <option value="1762">
                                            promotions</option>
                                                                                            <option value="1669">
                                            Prospect</option>
                                                                                            <option value="819">
                                            protests</option>
                                                                                            <option value="1243">
                                            Providence</option>
                                                                                            <option value="92">
                                            Psychiatric</option>
                                                                                            <option value="2200">
                                            PTSD</option>
                                                                                            <option value="1141">
                                            public library</option>
                                                                                            <option value="1712">
                                            Public Paint</option>
                                                                                            <option value="1783">
                                            Public Safety Officers</option>
                                                                                            <option value="1714">
                                            public school</option>
                                                                                            <option value="704">
                                            public water system</option>
                                                                                            <option value="1845">
                                            pueblo</option>
                                                                                            <option value="508">
                                            pumpkin pie</option>
                                                                                            <option value="1264">
                                            punch bowl</option>
                                                                                            <option value="1121">
                                            punishment</option>
                                                                                            <option value="222">
                                            punk</option>
                                                                                            <option value="530">
                                            pup tent</option>
                                                                                            <option value="1565">
                                            puppy</option>
                                                                                            <option value="559">
                                            Purple Heart</option>
                                                                                            <option value="109">
                                            purpose</option>
                                                                                            <option value="1802">
                                            Putnam Memorial State Park</option>
                                                                                            <option value="920">
                                            PVC pipe</option>
                                                                                            <option value="122">
                                            Quaker</option>
                                                                                            <option value="1211">
                                            Quantuck</option>
                                                                                            <option value="210">
                                            quarantine</option>
                                                                                            <option value="1499">
                                            Quarter Horse</option>
                                                                                            <option value="1538">
                                            queasy</option>
                                                                                            <option value="590">
                                            queen</option>
                                                                                            <option value="1279">
                                            questions</option>
                                                                                            <option value="1062">
                                            quitting</option>
                                                                                            <option value="445">
                                            racial fear</option>
                                                                                            <option value="644">
                                            racism</option>
                                                                                            <option value="490">
                                            radiator</option>
                                                                                            <option value="631">
                                            radio</option>
                                                                                            <option value="195">
                                            Radio City</option>
                                                                                            <option value="429">
                                            Rainbow Girls</option>
                                                                                            <option value="698">
                                            Raleigh Man</option>
                                                                                            <option value="1530">
                                            ranchers</option>
                                                                                            <option value="1497">
                                            ranching</option>
                                                                                            <option value="1325">
                                            Rangers of the Lone Star</option>
                                                                                            <option value="1603">
                                            Rangoon</option>
                                                                                            <option value="468">
                                            ration books</option>
                                                                                            <option value="964">
                                            rationing</option>
                                                                                            <option value="726">
                                            rations</option>
                                                                                            <option value="1561">
                                            rattlesnake</option>
                                                                                            <option value="1444">
                                            rattlesnakes</option>
                                                                                            <option value="245">
                                            Raymond Maine</option>
                                                                                            <option value="616">
                                            RCA</option>
                                                                                            <option value="1033">
                                            reading</option>
                                                                                            <option value="1773">
                                            Reaganomics</option>
                                                                                            <option value="1463">
                                            Real County</option>
                                                                                            <option value="1445">
                                            real estate</option>
                                                                                            <option value="1298">
                                            Rebecca</option>
                                                                                            <option value="1628">
                                            recession</option>
                                                                                            <option value="774">
                                            record</option>
                                                                                            <option value="338">
                                            records</option>
                                                                                            <option value="1948">
                                            recovery</option>
                                                                                            <option value="1027">
                                            recruit</option>
                                                                                            <option value="425">
                                            red and green</option>
                                                                                            <option value="722">
                                            Red Ball Express</option>
                                                                                            <option value="634">
                                            Red Birds</option>
                                                                                            <option value="963">
                                            red cross</option>
                                                                                            <option value="1864">
                                            Red Ears</option>
                                                                                            <option value="344">
                                            Red Light District</option>
                                                                                            <option value="741">
                                            red-heads</option>
                                                                                            <option value="903">
                                            redemption</option>
                                                                                            <option value="685">
                                            refugees</option>
                                                                                            <option value="108">
                                            reincarnation</option>
                                                                                            <option value="974">
                                            relationship</option>
                                                                                            <option value="1898">
                                            relationships</option>
                                                                                            <option value="1156">
                                            relatives</option>
                                                                                            <option value="1748">
                                            religions</option>
                                                                                            <option value="1595">
                                            Renault</option>
                                                                                            <option value="491">
                                            Renée Adorée</option>
                                                                                            <option value="1716">
                                            renewal</option>
                                                                                            <option value="1580">
                                            reporter</option>
                                                                                            <option value="1772">
                                            reporting</option>
                                                                                            <option value="1249">
                                            Republican</option>
                                                                                            <option value="1009">
                                            reputation</option>
                                                                                            <option value="912">
                                            research</option>
                                                                                            <option value="705">
                                            reservoir</option>
                                                                                            <option value="361">
                                            responsibilities</option>
                                                                                            <option value="2172">
                                            RESTORATION</option>
                                                                                            <option value="1106">
                                            retirement home</option>
                                                                                            <option value="1064">
                                            retrospect</option>
                                                                                            <option value="1822">
                                            retsina</option>
                                                                                            <option value="934">
                                            reunion</option>
                                                                                            <option value="532">
                                            reveille</option>
                                                                                            <option value="2001">
                                            revenge</option>
                                                                                            <option value="1268">
                                            revolutionary</option>
                                                                                            <option value="123">
                                            Rhesus Monkey</option>
                                                                                            <option value="1848">
                                            Richter Scale</option>
                                                                                            <option value="1323">
                                            Riders of the Purple Sage</option>
                                                                                            <option value="459">
                                            riding the rails</option>
                                                                                            <option value="2215">
                                            Rifle</option>
                                                                                            <option value="1042">
                                            ring</option>
                                                                                            <option value="1241">
                                            Ringling Brothers</option>
                                                                                            <option value="656">
                                            Rinso</option>
                                                                                            <option value="71">
                                            Riots</option>
                                                                                            <option value="98">
                                            Riots</option>
                                                                                            <option value="1826">
                                            rite of spring</option>
                                                                                            <option value="408">
                                            Riverview</option>
                                                                                            <option value="828">
                                            Rizzoli Bookstore</option>
                                                                                            <option value="1293">
                                            RKO Pathé Newsreels</option>
                                                                                            <option value="1359">
                                            road trip</option>
                                                                                            <option value="1790">
                                            Rock and Roll</option>
                                                                                            <option value="569">
                                            rocker</option>
                                                                                            <option value="488">
                                            Rocky Mountains</option>
                                                                                            <option value="1462">
                                            rodeo</option>
                                                                                            <option value="1285">
                                            roller skate waitresses</option>
                                                                                            <option value="271">
                                            romance</option>
                                                                                            <option value="718">
                                            Romeo Grenier</option>
                                                                                            <option value="300">
                                            Roosevelt</option>
                                                                                            <option value="113">
                                            rooster</option>
                                                                                            <option value="1357">
                                            rope</option>
                                                                                            <option value="1465">
                                            roping calves</option>
                                                                                            <option value="827">
                                            Rosie</option>
                                                                                            <option value="534">
                                            ROTC</option>
                                                                                            <option value="1851">
                                            rubble</option>
                                                                                            <option value="1040">
                                            ruby</option>
                                                                                            <option value="1386">
                                            Rudy Vallee</option>
                                                                                            <option value="465">
                                            rug beater</option>
                                                                                            <option value="553">
                                            Ruhr Valley</option>
                                                                                            <option value="1551">
                                            rum</option>
                                                                                            <option value="191">
                                            rumble seat</option>
                                                                                            <option value="795">
                                            running board</option>
                                                                                            <option value="186">
                                            running boards</option>
                                                                                            <option value="1090">
                                            running water</option>
                                                                                            <option value="1980">
                                            Russian</option>
                                                                                            <option value="688">
                                            Russians</option>
                                                                                            <option value="554">
                                            Saar</option>
                                                                                            <option value="504">
                                            Saars Mercantile</option>
                                                                                            <option value="859">
                                            saccharine</option>
                                                                                            <option value="2042">
                                            Sacred Heart</option>
                                                                                            <option value="156">
                                            saddle shoes</option>
                                                                                            <option value="1937">
                                            safety</option>
                                                                                            <option value="791">
                                            Sailboat</option>
                                                                                            <option value="1138">
                                            sailing</option>
                                                                                            <option value="1816">
                                            sake</option>
                                                                                            <option value="2061">
                                            salisbury</option>
                                                                                            <option value="576">
                                            Saluda</option>
                                                                                            <option value="899">
                                            Sam Babbitt</option>
                                                                                            <option value="1451">
                                            San Gabriel Park</option>
                                                                                            <option value="1275">
                                            sand</option>
                                                                                            <option value="304">
                                            sandbox</option>
                                                                                            <option value="1732">
                                            sandwich</option>
                                                                                            <option value="1729">
                                            Sandy</option>
                                                                                            <option value="1609">
                                            Sandy Hook</option>
                                                                                            <option value="1535">
                                            Sangria</option>
                                                                                            <option value="354">
                                            sanitation</option>
                                                                                            <option value="423">
                                            Santa</option>
                                                                                            <option value="473">
                                            Santa Claus</option>
                                                                                            <option value="2004">
                                            santa-fe</option>
                                                                                            <option value="1256">
                                            Saran Wrap</option>
                                                                                            <option value="1247">
                                            Sarasota</option>
                                                                                            <option value="1807">
                                            Sartre</option>
                                                                                            <option value="1812">
                                            sashimi</option>
                                                                                            <option value="2050">
                                            satire</option>
                                                                                            <option value="479">
                                            sausage curls</option>
                                                                                            <option value="978">
                                            scandinavia</option>
                                                                                            <option value="89">
                                            Schizophrenia</option>
                                                                                            <option value="1839">
                                            schlurs</option>
                                                                                            <option value="483">
                                            scholarships</option>
                                                                                            <option value="367">
                                            school</option>
                                                                                            <option value="1151">
                                            school bus</option>
                                                                                            <option value="1135">
                                            school year</option>
                                                                                            <option value="1604">
                                            Schwedegon Pagoda</option>
                                                                                            <option value="603">
                                            scones</option>
                                                                                            <option value="1901">
                                            Scoville</option>
                                                                                            <option value="1532">
                                            screw worms</option>
                                                                                            <option value="1303">
                                            Scribner’s</option>
                                                                                            <option value="352">
                                            scrubs</option>
                                                                                            <option value="1873">
                                            seamstress</option>
                                                                                            <option value="2191">
                                            search engine optimization</option>
                                                                                            <option value="668">
                                            Sears</option>
                                                                                            <option value="1011">
                                            Seasons</option>
                                                                                            <option value="1926">
                                            second grade</option>
                                                                                            <option value="1718">
                                            Second Temple</option>
                                                                                            <option value="162">
                                            secret mission</option>
                                                                                            <option value="574">
                                            secretaries</option>
                                                                                            <option value="1913">
                                            secrets</option>
                                                                                            <option value="198">
                                            security</option>
                                                                                            <option value="1474">
                                            segregated</option>
                                                                                            <option value="2053">
                                            segregation</option>
                                                                                            <option value="673">
                                            seine</option>
                                                                                            <option value="1061">
                                            self confidence</option>
                                                                                            <option value="1060">
                                            self doubt</option>
                                                                                            <option value="460">
                                            self reliance</option>
                                                                                            <option value="1613">
                                            semi-automatic</option>
                                                                                            <option value="925">
                                            Senators</option>
                                                                                            <option value="954">
                                            Senior Project</option>
                                                                                            <option value="1232">
                                            senior prom</option>
                                                                                            <option value="1124">
                                            sentences</option>
                                                                                            <option value="655">
                                            sermon</option>
                                                                                            <option value="2010">
                                            settlers</option>
                                                                                            <option value="1513">
                                            Sewer Park</option>
                                                                                            <option value="1399">
                                            sewing circle</option>
                                                                                            <option value="1018">
                                            sexism</option>
                                                                                            <option value="946">
                                            sexual assault</option>
                                                                                            <option value="951">
                                            sexual discrimination</option>
                                                                                            <option value="1662">
                                            Shakespeare</option>
                                                                                            <option value="1849">
                                            shaking</option>
                                                                                            <option value="1998">
                                            shame</option>
                                                                                            <option value="2196">
                                            sharing</option>
                                                                                            <option value="1813">
                                            shark</option>
                                                                                            <option value="1691">
                                            shaving</option>
                                                                                            <option value="1507">
                                            shearing</option>
                                                                                            <option value="1481">
                                            sheep</option>
                                                                                            <option value="1510">
                                            Sheep Dealer</option>
                                                                                            <option value="1578">
                                            shelter</option>
                                                                                            <option value="1721">
                                            Shimon Peres</option>
                                                                                            <option value="386">
                                            shingles haircut</option>
                                                                                            <option value="1212">
                                            Shinnocock</option>
                                                                                            <option value="2062">
                                            ships</option>
                                                                                            <option value="1689">
                                            Shiva</option>
                                                                                            <option value="1768">
                                            Shock Jock</option>
                                                                                            <option value="470">
                                            shoes</option>
                                                                                            <option value="1994">
                                            shooter</option>
                                                                                            <option value="1125">
                                            shoplifting</option>
                                                                                            <option value="312">
                                            shortages</option>
                                                                                            <option value="1443">
                                            shot-gun house</option>
                                                                                            <option value="205">
                                            shotgun</option>
                                                                                            <option value="1934">
                                            showers</option>
                                                                                            <option value="561">
                                            shrapnel</option>
                                                                                            <option value="1684">
                                            shroud</option>
                                                                                            <option value="1038">
                                            siblings</option>
                                                                                            <option value="1087">
                                            Sicily</option>
                                                                                            <option value="670">
                                            Siegel</option>
                                                                                            <option value="1375">
                                            silk stockings</option>
                                                                                            <option value="680">
                                            Singapore</option>
                                                                                            <option value="706">
                                            Singer</option>
                                                                                            <option value="424">
                                            singing</option>
                                                                                            <option value="28">
                                            Sister Kenny</option>
                                                                                            <option value="1007">
                                            sisters</option>
                                                                                            <option value="1149">
                                            sit-ins</option>
                                                                                            <option value="1108">
                                            skating</option>
                                                                                            <option value="911">
                                            skeleton</option>
                                                                                            <option value="1044">
                                            ski</option>
                                                                                            <option value="1206">
                                            ski goggles</option>
                                                                                            <option value="1982">
                                            Skidmore</option>
                                                                                            <option value="1109">
                                            skiing</option>
                                                                                            <option value="1875">
                                            skirt</option>
                                                                                            <option value="414">
                                            skirts</option>
                                                                                            <option value="1077">
                                            skyline</option>
                                                                                            <option value="117">
                                            slaughter</option>
                                                                                            <option value="910">
                                            slave</option>
                                                                                            <option value="725">
                                            slaves</option>
                                                                                            <option value="289">
                                            sledding</option>
                                                                                            <option value="1564">
                                            sleep</option>
                                                                                            <option value="1975">
                                            sleepovers</option>
                                                                                            <option value="1107">
                                            sliding</option>
                                                                                            <option value="1066">
                                            slippers</option>
                                                                                            <option value="1134">
                                            slogans</option>
                                                                                            <option value="501">
                                            small town</option>
                                                                                            <option value="1240">
                                            smells</option>
                                                                                            <option value="1651">
                                            snack foods</option>
                                                                                            <option value="1287">
                                            snake charmer</option>
                                                                                            <option value="188">
                                            snakes</option>
                                                                                            <option value="197">
                                            snapshot</option>
                                                                                            <option value="1067">
                                            sneakers</option>
                                                                                            <option value="1757">
                                            sniper</option>
                                                                                            <option value="1705">
                                            sniper fire</option>
                                                                                            <option value="1362">
                                            snow</option>
                                                                                            <option value="956">
                                            snow belt</option>
                                                                                            <option value="1330">
                                            snow days</option>
                                                                                            <option value="1383">
                                            snow globes</option>
                                                                                            <option value="1725">
                                            snow plows</option>
                                                                                            <option value="657">
                                            Soap Operas</option>
                                                                                            <option value="1884">
                                            sober</option>
                                                                                            <option value="2020">
                                            soccer</option>
                                                                                            <option value="1976">
                                            sociable</option>
                                                                                            <option value="2192">
                                            social media marketing</option>
                                                                                            <option value="875">
                                            social unrest</option>
                                                                                            <option value="1373">
                                            Sodality</option>
                                                                                            <option value="1272">
                                            solar panels</option>
                                                                                            <option value="535">
                                            soldier</option>
                                                                                            <option value="1542">
                                            soldiers</option>
                                                                                            <option value="233">
                                            solitary</option>
                                                                                            <option value="1004">
                                            songs</option>
                                                                                            <option value="1498">
                                            sorrel stallion</option>
                                                                                            <option value="1290">
                                            sorrow</option>
                                                                                            <option value="1439">
                                            Sour Dough Pot</option>
                                                                                            <option value="1350">
                                            sour grapes</option>
                                                                                            <option value="2186">
                                            south</option>
                                                                                            <option value="15">
                                            South Carolina</option>
                                                                                            <option value="652">
                                            Southern Baptist</option>
                                                                                            <option value="1594">
                                            Soviet block</option>
                                                                                            <option value="908">
                                            space</option>
                                                                                            <option value="1048">
                                            space travel</option>
                                                                                            <option value="1533">
                                            Spanish goats</option>
                                                                                            <option value="235">
                                            spelling bee</option>
                                                                                            <option value="1616">
                                            spelter-shakes</option>
                                                                                            <option value="2000">
                                            spices</option>
                                                                                            <option value="181">
                                            spider web</option>
                                                                                            <option value="1518">
                                            spillway</option>
                                                                                            <option value="547">
                                            spinal puncture</option>
                                                                                            <option value="2100">
                                            spirits</option>
                                                                                            <option value="972">
                                            spirituality</option>
                                                                                            <option value="387">
                                            spit curls</option>
                                                                                            <option value="1974">
                                            sports</option>
                                                                                            <option value="466">
                                            spring</option>
                                                                                            <option value="328">
                                            spring cleaning</option>
                                                                                            <option value="189">
                                            Spruce’s Market</option>
                                                                                            <option value="582">
                                            spur tracks</option>
                                                                                            <option value="2206">
                                            spy detective dubai</option>
                                                                                            <option value="1881">
                                            square-dance</option>
                                                                                            <option value="961">
                                            st. albans hospital</option>
                                                                                            <option value="1367">
                                            St. Joseph’s College</option>
                                                                                            <option value="2233">
                                            St. Patrick's Day</option>
                                                                                            <option value="1225">
                                            stables</option>
                                                                                            <option value="422">
                                            staircase</option>
                                                                                            <option value="1466">
                                            stallion</option>
                                                                                            <option value="1833">
                                            stan</option>
                                                                                            <option value="630">
                                            Stan Musial</option>
                                                                                            <option value="2029">
                                            Star Wars Battlefront</option>
                                                                                            <option value="727">
                                            starvation</option>
                                                                                            <option value="767">
                                            station wagon</option>
                                                                                            <option value="1078">
                                            Statue of Liberty</option>
                                                                                            <option value="581">
                                            steam engine</option>
                                                                                            <option value="21">
                                            Steam Locomotives</option>
                                                                                            <option value="2006">
                                            Steam Train</option>
                                                                                            <option value="1996">
                                            steely</option>
                                                                                            <option value="1523">
                                            steeple</option>
                                                                                            <option value="91">
                                            Stereotypes</option>
                                                                                            <option value="1189">
                                            stock market</option>
                                                                                            <option value="723">
                                            stockades</option>
                                                                                            <option value="265">
                                            stocking seams</option>
                                                                                            <option value="349">
                                            stockings</option>
                                                                                            <option value="1117">
                                            Stolers</option>
                                                                                            <option value="1552">
                                            stollen</option>
                                                                                            <option value="1649">
                                            Stop &amp; Shop</option>
                                                                                            <option value="305">
                                            store</option>
                                                                                            <option value="883">
                                            stories</option>
                                                                                            <option value="1646">
                                            storm</option>
                                                                                            <option value="2034">
                                            Stormtroopers</option>
                                                                                            <option value="1867">
                                            story-telling</option>
                                                                                            <option value="1550">
                                            storytelling</option>
                                                                                            <option value="230">
                                            straight seams</option>
                                                                                            <option value="1750">
                                            Strategic Air Command</option>
                                                                                            <option value="213">
                                            stray</option>
                                                                                            <option value="2188">
                                            streaming</option>
                                                                                            <option value="857">
                                            streams</option>
                                                                                            <option value="1218">
                                            stroke</option>
                                                                                            <option value="1502">
                                            stud</option>
                                                                                            <option value="1430">
                                            student based</option>
                                                                                            <option value="2063">
                                            submarine</option>
                                                                                            <option value="1401">
                                            suburb</option>
                                                                                            <option value="1636">
                                            suburbia</option>
                                                                                            <option value="469">
                                            sugar</option>
                                                                                            <option value="1752">
                                            suicide</option>
                                                                                            <option value="1056">
                                            suite francaise</option>
                                                                                            <option value="711">
                                            suits</option>
                                                                                            <option value="2032">
                                            Sullust</option>
                                                                                            <option value="185">
                                            summer</option>
                                                                                            <option value="297">
                                            Summer Bible School</option>
                                                                                            <option value="1858">
                                            Summer of Love</option>
                                                                                            <option value="1136">
                                            summer vacation</option>
                                                                                            <option value="840">
                                            summertime</option>
                                                                                            <option value="1743">
                                            summit</option>
                                                                                            <option value="1237">
                                            sun-up</option>
                                                                                            <option value="1120">
                                            sunday papers</option>
                                                                                            <option value="294">
                                            Sunday School</option>
                                                                                            <option value="1271">
                                            Sunray Hot Water Heater Co.</option>
                                                                                            <option value="1685">
                                            sunrise</option>
                                                                                            <option value="1728">
                                            Super Storm</option>
                                                                                            <option value="1173">
                                            Superman</option>
                                                                                            <option value="1209">
                                            supermarket</option>
                                                                                            <option value="839">
                                            supermarket staff</option>
                                                                                            <option value="1889">
                                            superstition</option>
                                                                                            <option value="686">
                                            surrender</option>
                                                                                            <option value="1814">
                                            sushi</option>
                                                                                            <option value="214">
                                            Sweden</option>
                                                                                            <option value="509">
                                            sweet potatoes</option>
                                                                                            <option value="251">
                                            swimming</option>
                                                                                            <option value="306">
                                            swimming pool</option>
                                                                                            <option value="268">
                                            swing</option>
                                                                                            <option value="307">
                                            swings</option>
                                                                                            <option value="1687">
                                            synagogue</option>
                                                                                            <option value="860">
                                            syringes</option>
                                                                                            <option value="2030">
                                            T-21B</option>
                                                                                            <option value="621">
                                            T-Model Ford</option>
                                                                                            <option value="642">
                                            Taft</option>
                                                                                            <option value="865">
                                            Tamiko</option>
                                                                                            <option value="1378">
                                            Tangee lipstick</option>
                                                                                            <option value="1846">
                                            taos</option>
                                                                                            <option value="782">
                                            tasteful</option>
                                                                                            <option value="1447">
                                            taxes</option>
                                                                                            <option value="784">
                                            teacher</option>
                                                                                            <option value="573">
                                            teaching</option>
                                                                                            <option value="1544">
                                            technology</option>
                                                                                            <option value="1289">
                                            Teddy Hamlin</option>
                                                                                            <option value="154">
                                            teen age girls</option>
                                                                                            <option value="435">
                                            teens</option>
                                                                                            <option value="752">
                                            Tel Aviv</option>
                                                                                            <option value="714">
                                            telegraph</option>
                                                                                            <option value="128">
                                            telephone</option>
                                                                                            <option value="14">
                                            Telephone Operator</option>
                                                                                            <option value="660">
                                            television</option>
                                                                                            <option value="1333">
                                            Templeton Street</option>
                                                                                            <option value="1176">
                                            ten cents</option>
                                                                                            <option value="1403">
                                            tenement</option>
                                                                                            <option value="1808">
                                            Tennessee Williams</option>
                                                                                            <option value="927">
                                            tension</option>
                                                                                            <option value="648">
                                            tent</option>
                                                                                            <option value="1771">
                                            terrorism</option>
                                                                                            <option value="2171">
                                            test</option>
                                                                                            <option value="864">
                                            test strips</option>
                                                                                            <option value="2141">
                                            tested it</option>
                                                                                            <option value="2040">
                                            Tet Offensive</option>
                                                                                            <option value="292">
                                            tetanus</option>
                                                                                            <option value="1882">
                                            texas</option>
                                                                                            <option value="1489">
                                            Texas Agricultural Extension Service</option>
                                                                                            <option value="681">
                                            Thailand</option>
                                                                                            <option value="505">
                                            Thanksgiving</option>
                                                                                            <option value="151">
                                            The Capitol</option>
                                                                                            <option value="1548">
                                            The Chute</option>
                                                                                            <option value="1892">
                                            The Doors</option>
                                                                                            <option value="2232">
                                            The Great Hunger</option>
                                                                                            <option value="1174">
                                            The Green Hornet</option>
                                                                                            <option value="23">
                                            The New York Railroad</option>
                                                                                            <option value="150">
                                            The Paramount</option>
                                                                                            <option value="1236">
                                            The Smack</option>
                                                                                            <option value="1324">
                                            The Tall Driver</option>
                                                                                            <option value="1621">
                                            theater</option>
                                                                                            <option value="216">
                                            theft</option>
                                                                                            <option value="643">
                                            Theodore Roosevelt</option>
                                                                                            <option value="808">
                                            Theseus</option>
                                                                                            <option value="318">
                                            thrifty</option>
                                                                                            <option value="371">
                                            thrill</option>
                                                                                            <option value="1259">
                                            tin</option>
                                                                                            <option value="390">
                                            tin can key</option>
                                                                                            <option value="1307">
                                            tin cup</option>
                                                                                            <option value="935">
                                            tinkering</option>
                                                                                            <option value="148">
                                            tinsel</option>
                                                                                            <option value="1602">
                                            Tioman</option>
                                                                                            <option value="1332">
                                            tire chains</option>
                                                                                            <option value="221">
                                            toasting</option>
                                                                                            <option value="866">
                                            Tokyo</option>
                                                                                            <option value="439">
                                            Tom Collins</option>
                                                                                            <option value="1172">
                                            Tom Mix</option>
                                                                                            <option value="417">
                                            tomato aspic</option>
                                                                                            <option value="1983">
                                            tombstone</option>
                                                                                            <option value="905">
                                            tomfoolery</option>
                                                                                            <option value="1340">
                                            Tommy Dorsey</option>
                                                                                            <option value="2008">
                                            Tonkawa</option>
                                                                                            <option value="1844">
                                            Tony Luhan</option>
                                                                                            <option value="1246">
                                            tornado</option>
                                                                                            <option value="1137">
                                            torture</option>
                                                                                            <option value="1115">
                                            tourists</option>
                                                                                            <option value="768">
                                            Toyota Camry</option>
                                                                                            <option value="1118">
                                            toys</option>
                                                                                            <option value="997">
                                            tradition</option>
                                                                                            <option value="1095">
                                            trail</option>
                                                                                            <option value="578">
                                            train</option>
                                                                                            <option value="254">
                                            train travel</option>
                                                                                            <option value="1952">
                                            training</option>
                                                                                            <option value="580">
                                            trains</option>
                                                                                            <option value="1624">
                                            transformative</option>
                                                                                            <option value="2143">
                                            transportaion</option>
                                                                                            <option value="1017">
                                            transportation</option>
                                                                                            <option value="1437">
                                            trapping</option>
                                                                                            <option value="597">
                                            trauma</option>
                                                                                            <option value="986">
                                            travel</option>
                                                                                            <option value="311">
                                            travel restrictions</option>
                                                                                            <option value="1301">
                                            Travels With Charlie</option>
                                                                                            <option value="812">
                                            Trebizond</option>
                                                                                            <option value="474">
                                            tree</option>
                                                                                            <option value="874">
                                            Trick or Treat</option>
                                                                                            <option value="1776">
                                            trickle-down</option>
                                                                                            <option value="1670">
                                            trolley cars</option>
                                                                                            <option value="1104">
                                            trousseau</option>
                                                                                            <option value="1409">
                                            Trump Homes Co.</option>
                                                                                            <option value="1914">
                                            trust</option>
                                                                                            <option value="606">
                                            Trust Fund</option>
                                                                                            <option value="884">
                                            truth</option>
                                                                                            <option value="579">
                                            Tryon</option>
                                                                                            <option value="867">
                                            Tsunami</option>
                                                                                            <option value="823">
                                            tugboats</option>
                                                                                            <option value="1257">
                                            Tupperware</option>
                                                                                            <option value="639">
                                            turkey</option>
                                                                                            <option value="514">
                                            turret</option>
                                                                                            <option value="487">
                                            turtle-back</option>
                                                                                            <option value="822">
                                            Twin Towers</option>
                                                                                            <option value="2187">
                                            twitch</option>
                                                                                            <option value="1847">
                                            U of New Mexico</option>
                                                                                            <option value="546">
                                            unconscious</option>
                                                                                            <option value="1147">
                                            unconstitutional</option>
                                                                                            <option value="2178">
                                            UNDERSTANDING</option>
                                                                                            <option value="746">
                                            unisex</option>
                                                                                            <option value="484">
                                            university</option>
                                                                                            <option value="510">
                                            University of Colorado</option>
                                                                                            <option value="1230">
                                            University of Richmond</option>
                                                                                            <option value="7">
                                            USA</option>
                                                                                            <option value="800">
                                            USO</option>
                                                                                            <option value="869">
                                            VA</option>
                                                                                            <option value="1003">
                                            vacation</option>
                                                                                            <option value="995">
                                            vacations</option>
                                                                                            <option value="2148">
                                            vaccine</option>
                                                                                            <option value="340">
                                            Val Air Ballroom</option>
                                                                                            <option value="1896">
                                            Valentine’s Day</option>
                                                                                            <option value="135">
                                            vanity</option>
                                                                                            <option value="142">
                                            vap-o-rub</option>
                                                                                            <option value="405">
                                            vegetarian</option>
                                                                                            <option value="172">
                                            venomous</option>
                                                                                            <option value="513">
                                            ventilation</option>
                                                                                            <option value="1576">
                                            vet</option>
                                                                                            <option value="560">
                                            Veterans</option>
                                                                                            <option value="173">
                                            veterinarian</option>
                                                                                            <option value="384">
                                            Vicks Vapor Rub</option>
                                                                                            <option value="805">
                                            Victory Garden</option>
                                                                                            <option value="1969">
                                            videos</option>
                                                                                            <option value="906">
                                            Viet Nam</option>
                                                                                            <option value="1967">
                                            vineyards</option>
                                                                                            <option value="346">
                                            Violet Hill Cemetery</option>
                                                                                            <option value="1187">
                                            violin</option>
                                                                                            <option value="1075">
                                            voice</option>
                                                                                            <option value="1220">
                                            volunteer</option>
                                                                                            <option value="1029">
                                            volunteer work</option>
                                                                                            <option value="1715">
                                            volunteering</option>
                                                                                            <option value="1924">
                                            vote</option>
                                                                                            <option value="571">
                                            voting rights</option>
                                                                                            <option value="369">
                                            vows</option>
                                                                                            <option value="1763">
                                            wages</option>
                                                                                            <option value="1412">
                                            wagon</option>
                                                                                            <option value="1717">
                                            Wailing Wall</option>
                                                                                            <option value="1810">
                                            Waiting For Godot</option>
                                                                                            <option value="1116">
                                            Walmsley</option>
                                                                                            <option value="971">
                                            war</option>
                                                                                            <option value="545">
                                            War Department</option>
                                                                                            <option value="804">
                                            war effort</option>
                                                                                            <option value="1146">
                                            Warren Court</option>
                                                                                            <option value="310">
                                            wartime</option>
                                                                                            <option value="854">
                                            Washington</option>
                                                                                            <option value="584">
                                            Watchman</option>
                                                                                            <option value="838">
                                            water balloons</option>
                                                                                            <option value="837">
                                            water guns</option>
                                                                                            <option value="672">
                                            water moccasins</option>
                                                                                            <option value="915">
                                            Waterbury</option>
                                                                                            <option value="434">
                                            watermelon</option>
                                                                                            <option value="2057">
                                            watertown</option>
                                                                                            <option value="676">
                                            wave</option>
                                                                                            <option value="450">
                                            Waves</option>
                                                                                            <option value="1769">
                                            WCCC-FM</option>
                                                                                            <option value="1608">
                                            weapons</option>
                                                                                            <option value="1797">
                                            Webb-Deane-Stevens Museum</option>
                                                                                            <option value="1102">
                                            wedding</option>
                                                                                            <option value="728">
                                            Wedding Anniversary</option>
                                                                                            <option value="1970">
                                            weekend</option>
                                                                                            <option value="1521">
                                            welder</option>
                                                                                            <option value="1224">
                                            West Hampton Beach</option>
                                                                                            <option value="1213">
                                            Westhampton</option>
                                                                                            <option value="1231">
                                            Westhampton College</option>
                                                                                            <option value="1076">
                                            Westover</option>
                                                                                            <option value="799">
                                            wet bathing suits</option>
                                                                                            <option value="661">
                                            Wheaties</option>
                                                                                            <option value="394">
                                            Whippet</option>
                                                                                            <option value="228">
                                            white</option>
                                                                                            <option value="1337">
                                            white flannel trousers</option>
                                                                                            <option value="348">
                                            white uniforms</option>
                                                                                            <option value="1555">
                                            wild boar</option>
                                                                                            <option value="1968">
                                            wild flowers</option>
                                                                                            <option value="1299">
                                            Willa Cather</option>
                                                                                            <option value="1360">
                                            Williamsburg</option>
                                                                                            <option value="563">
                                            Willie Sutton</option>
                                                                                            <option value="377">
                                            Willy’s Knight Sedan</option>
                                                                                            <option value="395">
                                            Willys-Knight</option>
                                                                                            <option value="332">
                                            Wilson KS</option>
                                                                                            <option value="1130">
                                            wind up</option>
                                                                                            <option value="796">
                                            windshield wipers</option>
                                                                                            <option value="438">
                                            wine</option>
                                                                                            <option value="182">
                                            winter</option>
                                                                                            <option value="101">
                                            winter cold</option>
                                                                                            <option value="830">
                                            Winter Garden</option>
                                                                                            <option value="683">
                                            Wofford College</option>
                                                                                            <option value="1558">
                                            wolves</option>
                                                                                            <option value="748">
                                            woman’s place</option>
                                                                                            <option value="743">
                                            women</option>
                                                                                            <option value="2202">
                                            women empowerment</option>
                                                                                            <option value="1424">
                                            Women’s Athletics</option>
                                                                                            <option value="891">
                                            women’s college</option>
                                                                                            <option value="1255">
                                            women’s lib</option>
                                                                                            <option value="575">
                                            Women’s Liberation</option>
                                                                                            <option value="836">
                                            wonderment</option>
                                                                                            <option value="614">
                                            wood</option>
                                                                                            <option value="215">
                                            wood carver</option>
                                                                                            <option value="1334">
                                            Woodlawn Terrace</option>
                                                                                            <option value="1791">
                                            Woodstock</option>
                                                                                            <option value="224">
                                            wool</option>
                                                                                            <option value="430">
                                            Woolworth</option>
                                                                                            <option value="1157">
                                            Woolworth’s</option>
                                                                                            <option value="747">
                                            work</option>
                                                                                            <option value="2211">
                                            WORK_SPACE</option>
                                                                                            <option value="1746">
                                            workplace</option>
                                                                                            <option value="829">
                                            World Financial Center</option>
                                                                                            <option value="922">
                                            World Series</option>
                                                                                            <option value="821">
                                            World Trade Center</option>
                                                                                            <option value="317">
                                            World War I</option>
                                                                                            <option value="203">
                                            World War II</option>
                                                                                            <option value="550">
                                            wounded</option>
                                                                                            <option value="1154">
                                            wrapping</option>
                                                                                            <option value="209">
                                            wringer</option>
                                                                                            <option value="1295">
                                            writer</option>
                                                                                            <option value="1657">
                                            WWI</option>
                                                                                            <option value="2">
                                            WWII</option>
                                                                                            <option value="1927">
                                            x-ray</option>
                                                                                            <option value="1229">
                                            Yacht Club</option>
                                                                                            <option value="751">
                                            Yad Vashem</option>
                                                                                            <option value="1014">
                                            Yale</option>
                                                                                            <option value="923">
                                            Yankees</option>
                                                                                            <option value="427">
                                            Yellow Quarantine Sign</option>
                                                                                            <option value="1720">
                                            Yom Kippur</option>
                                                                                            <option value="2214">
                                            Yorktown</option>
                                                                                            <option value="2210">
                                            Yorktown, soccer, High School</option>
                                                                                            <option value="1374">
                                            youth group</option>
                                                                                            <option value="2088">
                                            youtube</option>
                                                                                            <option value="1815">
                                            Yumiko Motomi</option>
                                                                                            <option value="1320">
                                            Zane Grey</option>
                                                                                            <option value="19">
                                            zero-zero</option>

                                    </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="2" style="width: 373.328px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    <span class="fa fa fa-question-circle field-icon" data-toggle="popover" data-placement="top" data-content="Please add up to 8 tags that best represent your story. Tags will help others as they search
                                                  for stories about similar topics. Tags might include names of people included in your story,
                                                  specific places, events, or key items in your story." data-original-title="" title=""></span>


                                </div>
                            </div>
                            <div class="form-group form-row align-items-center">
                                <div class="col-md-3">
                                    <label>Category <span class="required">*</span>:</label>
                                    <select class="form-control select2-hidden-accessible" name="category_id[]" multiple="" id="category_id" "="" required="" data-select2-id="category_id" tabindex="-1" aria-hidden="true">
                                        <option value="">Please Select</option>
                                                                                            <option value="1">
                                            Adventures</option>
                                                                                            <option value="2">
                                            Agriculture</option>
                                                                                            <option value="3">
                                            Arts</option>
                                                                                            <option value="4">
                                            Being Human</option>
                                                                                            <option value="5">
                                            Celebrations</option>
                                                                                            <option value="6">
                                            Celebrities</option>
                                                                                            <option value="7">
                                            Challenges</option>
                                                                                            <option value="8">
                                            Crisis</option>
                                                                                            <option value="9">
                                            Culture</option>
                                                                                            <option value="10">
                                            Death</option>
                                                                                            <option value="11">
                                            Economy</option>
                                                                                            <option value="12">
                                            Education</option>
                                                                                            <option value="13">
                                            Eras</option>
                                                                                            <option value="14">
                                            Events</option>
                                                                                            <option value="15">
                                            Family</option>
                                                                                            <option value="16">
                                            Geography/Travel</option>
                                                                                            <option value="17">
                                            Good Works</option>
                                                                                            <option value="18">
                                            Government/Politics</option>
                                                                                            <option value="19">
                                            Health</option>
                                                                                            <option value="20">
                                            Home</option>
                                                                                            <option value="21">
                                            Human Rights</option>
                                                                                            <option value="22">
                                            Innovations</option>
                                                                                            <option value="23">
                                            Immigration</option>
                                                                                            <option value="24">
                                            Institutions</option>
                                                                                            <option value="25">
                                            Languages</option>
                                                                                            <option value="26">
                                            Lost and Obsolete</option>
                                                                                            <option value="27">
                                            Love &amp; Friendship</option>
                                                                                            <option value="28">
                                            Media</option>
                                                                                            <option value="29">
                                            Military/War</option>
                                                                                            <option value="30">
                                            Nature/Environment</option>
                                                                                            <option value="31">
                                            Neiborhoods</option>
                                                                                            <option value="32">
                                            Obituaries</option>
                                                                                            <option value="33">
                                            Recreation</option>
                                                                                            <option value="34">
                                            Religion</option>
                                                                                            <option value="35">
                                            Science</option>
                                                                                            <option value="36">
                                            Sports</option>
                                                                                            <option value="37">
                                            Society/Communities</option>
                                                                                            <option value="38">
                                             Surroundings</option>
                                                                                            <option value="39">
                                             Technology</option>
                                                                                            <option value="40">
                                            Transportation</option>
                                                                                            <option value="41">
                                            Work</option>
                                                                                            <option value="42">
                                            Government/Military</option>
                                                                                            <option value="43">
                                            Relationships</option>
                                                                                            <option value="44">
                                            Careers &amp; Jobs</option>
                                                                                            <option value="45">
                                            Personalities</option>
                                                                                            <option value="46">
                                            Obituary</option>
                                                                                            <option value="47">
                                            Industry</option>
                                                                                        </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="3" style="width: 277.5px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>

                                                                                </div>
                                <div class="col-md-3">
                                    <label>Sub Category :</label>
                                                                                    <select class="form-control form-input select2 select2-hidden-accessible" name="level_1_auto_id[]" multiple="" disabled="" id="level_1_auto_id" data-select2-id="level_1_auto_id" tabindex="-1" aria-hidden="true">
                                        <option value="">Please Select</option>
                                    </select><span class="select2 select2-container select2-container--default select2-container--disabled" dir="ltr" data-select2-id="4" style="width: 277.5px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="true"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;" disabled=""></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>

                                                                                </div>
                                <div class="col-md-3">
                                    <label>Sub Level Category :</label>
                                                                                    <select class="form-control select2 select2-hidden-accessible" name="level_2_auto_id[]" multiple="" disabled="" id="level_2_auto_id" data-select2-id="level_2_auto_id" tabindex="-1" aria-hidden="true">
                                        <option value="">Please Select</option>
                                    </select><span class="select2 select2-container select2-container--default select2-container--disabled" dir="ltr" data-select2-id="5" style="width: 277.5px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="true"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;" disabled=""></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>

                                                                                </div>
                                <div class="col-md-3">
                                    <label>Types of Sub level Category :</label>
                                                                                    <select class="form-control select2 select2-hidden-accessible" name="level_3_auto_id[]" multiple="" disabled="" id="level_3_auto_id" data-select2-id="level_3_auto_id" tabindex="-1" aria-hidden="true">
                                        <option value="">Please Select</option>
                                    </select><span class="select2 select2-container select2-container--default select2-container--disabled" dir="ltr" data-select2-id="6" style="width: 277.5px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="true"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;" disabled=""></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>

                                                                                </div>
                            </div>
                            <div class="form-group form-row align-items-center">
                                <div class="col-md-6">
                                    <input id="anonymous" type="checkbox" name="anonymous" value="1" defaultvalue="0">
                                    <label for="name">
                                        <h6>Tag this story as Anonymous</h6>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-md-8 show-text">
                            <label>
                                <h6>Content</h6>
                            </label>
                            <textarea id="context" class="form-input w-100" name="context" rows="16" required="true" placeholder="Tell the world your story..." style="display: none;"></textarea><div class="note-editor note-frame panel panel-default"><div class="note-dropzone"><div class="note-dropzone-message"></div></div><div class="note-toolbar panel-heading" role="toolbar"><div class="note-btn-group btn-group note-style"><button type="button" class="note-btn btn btn-default btn-sm note-btn-bold" tabindex="-1" title="Bold (CTRL+B)" aria-label="Bold (CTRL+B)"><i class="note-icon-bold"></i></button><button type="button" class="note-btn btn btn-default btn-sm note-btn-italic" tabindex="-1" title="Italic (CTRL+I)" aria-label="Italic (CTRL+I)"><i class="note-icon-italic"></i></button><button type="button" class="note-btn btn btn-default btn-sm note-btn-underline" tabindex="-1" title="Underline (CTRL+U)" aria-label="Underline (CTRL+U)"><i class="note-icon-underline"></i></button></div><div class="note-btn-group btn-group note-font"><button type="button" class="note-btn btn btn-default btn-sm note-btn-strikethrough" tabindex="-1" title="Strikethrough (CTRL+SHIFT+S)" aria-label="Strikethrough (CTRL+SHIFT+S)"><i class="note-icon-strikethrough"></i></button><button type="button" class="note-btn btn btn-default btn-sm note-btn-superscript" tabindex="-1" title="Superscript" aria-label="Superscript"><i class="note-icon-superscript"></i></button><button type="button" class="note-btn btn btn-default btn-sm note-btn-subscript" tabindex="-1" title="Subscript" aria-label="Subscript"><i class="note-icon-subscript"></i></button></div><div class="note-btn-group btn-group note-color"></div><div class="note-btn-group btn-group note-insert"><button type="button" class="note-btn btn btn-default btn-sm" tabindex="-1" title="Picture" aria-label="Picture"><i class="note-icon-picture"></i></button></div><div class="note-btn-group btn-group note-para"><button type="button" class="note-btn btn btn-default btn-sm" tabindex="-1" title="Unordered list (CTRL+SHIFT+NUM7)" aria-label="Unordered list (CTRL+SHIFT+NUM7)"><i class="note-icon-unorderedlist"></i></button><button type="button" class="note-btn btn btn-default btn-sm" tabindex="-1" title="Ordered list (CTRL+SHIFT+NUM8)" aria-label="Ordered list (CTRL+SHIFT+NUM8)"><i class="note-icon-orderedlist"></i></button><div class="note-btn-group btn-group"><button type="button" class="note-btn btn btn-default btn-sm dropdown-toggle" tabindex="-1" data-toggle="dropdown" title="Paragraph" aria-label="Paragraph"><i class="note-icon-align-left"></i> <span class="note-icon-caret"></span></button><ul class="note-dropdown-menu dropdown-menu"><div class="note-btn-group btn-group note-align"><button type="button" class="note-btn btn btn-default btn-sm" tabindex="-1" title="Align left (CTRL+SHIFT+L)" aria-label="Align left (CTRL+SHIFT+L)"><i class="note-icon-align-left"></i></button><button type="button" class="note-btn btn btn-default btn-sm" tabindex="-1" title="Align center (CTRL+SHIFT+E)" aria-label="Align center (CTRL+SHIFT+E)"><i class="note-icon-align-center"></i></button><button type="button" class="note-btn btn btn-default btn-sm" tabindex="-1" title="Align right (CTRL+SHIFT+R)" aria-label="Align right (CTRL+SHIFT+R)"><i class="note-icon-align-right"></i></button><button type="button" class="note-btn btn btn-default btn-sm" tabindex="-1" title="Justify full (CTRL+SHIFT+J)" aria-label="Justify full (CTRL+SHIFT+J)"><i class="note-icon-align-justify"></i></button></div><div class="note-btn-group btn-group note-list"><button type="button" class="note-btn btn btn-default btn-sm" tabindex="-1" title="Outdent (CTRL+[)" aria-label="Outdent (CTRL+[)"><i class="note-icon-align-outdent"></i></button><button type="button" class="note-btn btn btn-default btn-sm" tabindex="-1" title="Indent (CTRL+])" aria-label="Indent (CTRL+])"><i class="note-icon-align-indent"></i></button></div></ul></div></div><div class="note-btn-group btn-group note-fontsize"><div class="note-btn-group btn-group"><button type="button" class="note-btn btn btn-default btn-sm dropdown-toggle" tabindex="-1" data-toggle="dropdown" title="Font Size" aria-label="Font Size"><span class="note-current-fontsize">15</span> <span class="note-icon-caret"></span></button><ul class="note-dropdown-menu dropdown-menu note-check dropdown-fontsize" aria-label="Font Size"><li aria-label="8"><a href="#" data-value="8"><i class="note-icon-menu-check"></i> 8</a></li><li aria-label="9"><a href="#" data-value="9"><i class="note-icon-menu-check"></i> 9</a></li><li aria-label="10"><a href="#" data-value="10"><i class="note-icon-menu-check"></i> 10</a></li><li aria-label="11"><a href="#" data-value="11"><i class="note-icon-menu-check"></i> 11</a></li><li aria-label="12"><a href="#" data-value="12"><i class="note-icon-menu-check"></i> 12</a></li><li aria-label="14"><a href="#" data-value="14"><i class="note-icon-menu-check"></i> 14</a></li><li aria-label="18"><a href="#" data-value="18"><i class="note-icon-menu-check"></i> 18</a></li><li aria-label="24"><a href="#" data-value="24"><i class="note-icon-menu-check"></i> 24</a></li><li aria-label="36"><a href="#" data-value="36"><i class="note-icon-menu-check"></i> 36</a></li></ul></div></div></div><div class="note-editing-area"><div class="note-handle"><div class="note-control-selection"><div class="note-control-selection-bg"></div><div class="note-control-holder note-control-nw"></div><div class="note-control-holder note-control-ne"></div><div class="note-control-holder note-control-sw"></div><div class="note-control-sizing note-control-se"></div><div class="note-control-selection-info"></div></div></div><textarea class="note-codable" aria-multiline="true"></textarea><div class="note-editable" contenteditable="true" role="textbox" aria-multiline="true" spellcheck="true" autocorrect="true" style="height: 380px;"><p><br></p></div></div><output class="note-status-output" role="status" aria-live="polite"></output><div class="note-statusbar" role="status"><div class="note-resizebar" aria-label="Resize"><div class="note-icon-bar"></div><div class="note-icon-bar"></div><div class="note-icon-bar"></div></div></div><div class="modal note-modal link-dialog" aria-hidden="false" tabindex="-1" role="dialog" aria-label="Insert Link"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">×</button><h4 class="modal-title">Insert Link</h4></div><div class="modal-body"><div class="form-group note-form-group"><label for="note-dialog-link-txt-16837363338811" class="note-form-label">Text to display</label><input id="note-dialog-link-txt-16837363338811" class="note-link-text form-control note-form-control note-input" type="text"></div><div class="form-group note-form-group"><label for="note-dialog-link-url-16837363338811" class="note-form-label">To what URL should this link go?</label><input id="note-dialog-link-url-16837363338811" class="note-link-url form-control note-form-control note-input" type="text" value="http://"></div><div class="checkbox sn-checkbox-open-in-new-window"><label><input type="checkbox" checked="" aria-checked="true">Open in new window</label></div><div class="checkbox sn-checkbox-use-protocol"><label><input type="checkbox" checked="" aria-checked="true">Use default protocol</label></div></div><div class="modal-footer"><input type="button" href="#" class="btn btn-primary note-btn note-btn-primary note-link-btn" value="Insert Link" disabled=""></div></div></div></div><div class="note-popover popover in note-link-popover bottom"><div class="arrow"></div><div class="popover-content note-children-container"><span><a target="_blank"></a>&nbsp;</span><div class="note-btn-group btn-group note-link"><button type="button" class="note-btn btn btn-default btn-sm" tabindex="-1" title="Edit" aria-label="Edit"><i class="note-icon-link"></i></button><button type="button" class="note-btn btn btn-default btn-sm" tabindex="-1" title="Unlink" aria-label="Unlink"><i class="note-icon-chain-broken"></i></button></div></div></div><div class="modal note-modal" aria-hidden="false" tabindex="-1" role="dialog" aria-label="Insert Image"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">×</button><h4 class="modal-title">Insert Image</h4></div><div class="modal-body"><div class="form-group note-form-group note-group-select-from-files"><label for="note-dialog-image-file-16837363338811" class="note-form-label">Select from files</label><input id="note-dialog-image-file-16837363338811" class="note-image-input form-control-file note-form-control note-input" type="file" name="files" accept="image/*" multiple="multiple"></div><div class="form-group note-group-image-url"><label for="note-dialog-image-url-16837363338811" class="note-form-label">Image URL</label><input id="note-dialog-image-url-16837363338811" class="note-image-url form-control note-form-control note-input" type="text"></div></div><div class="modal-footer"><input type="button" href="#" class="btn btn-primary note-btn note-btn-primary note-image-btn" value="Insert Image" disabled=""></div></div></div></div><div class="note-popover popover in note-image-popover bottom"><div class="arrow"></div><div class="popover-content note-children-container"><div class="note-btn-group btn-group note-resize"><button type="button" class="note-btn btn btn-default btn-sm" tabindex="-1" title="Resize full" aria-label="Resize full"><span class="note-fontsize-10">100%</span></button><button type="button" class="note-btn btn btn-default btn-sm" tabindex="-1" title="Resize half" aria-label="Resize half"><span class="note-fontsize-10">50%</span></button><button type="button" class="note-btn btn btn-default btn-sm" tabindex="-1" title="Resize quarter" aria-label="Resize quarter"><span class="note-fontsize-10">25%</span></button><button type="button" class="note-btn btn btn-default btn-sm" tabindex="-1" title="Original size" aria-label="Original size"><i class="note-icon-rollback"></i></button></div><div class="note-btn-group btn-group note-float"><button type="button" class="note-btn btn btn-default btn-sm" tabindex="-1" title="Float Left" aria-label="Float Left"><i class="note-icon-float-left"></i></button><button type="button" class="note-btn btn btn-default btn-sm" tabindex="-1" title="Float Right" aria-label="Float Right"><i class="note-icon-float-right"></i></button><button type="button" class="note-btn btn btn-default btn-sm" tabindex="-1" title="Remove float" aria-label="Remove float"><i class="note-icon-rollback"></i></button></div><div class="note-btn-group btn-group note-remove"><button type="button" class="note-btn btn btn-default btn-sm" tabindex="-1" title="Remove Image" aria-label="Remove Image"><i class="note-icon-trash"></i></button></div></div></div><div class="note-popover popover in note-table-popover bottom"><div class="arrow"></div><div class="popover-content note-children-container"><div class="note-btn-group btn-group note-add"><button type="button" class="note-btn btn btn-default btn-sm btn-md" tabindex="-1" title="Add row below" aria-label="Add row below"><i class="note-icon-row-below"></i></button><button type="button" class="note-btn btn btn-default btn-sm btn-md" tabindex="-1" title="Add row above" aria-label="Add row above"><i class="note-icon-row-above"></i></button><button type="button" class="note-btn btn btn-default btn-sm btn-md" tabindex="-1" title="Add column left" aria-label="Add column left"><i class="note-icon-col-before"></i></button><button type="button" class="note-btn btn btn-default btn-sm btn-md" tabindex="-1" title="Add column right" aria-label="Add column right"><i class="note-icon-col-after"></i></button></div><div class="note-btn-group btn-group note-delete"><button type="button" class="note-btn btn btn-default btn-sm btn-md" tabindex="-1" title="Delete row" aria-label="Delete row"><i class="note-icon-row-remove"></i></button><button type="button" class="note-btn btn btn-default btn-sm btn-md" tabindex="-1" title="Delete column" aria-label="Delete column"><i class="note-icon-col-remove"></i></button><button type="button" class="note-btn btn btn-default btn-sm btn-md" tabindex="-1" title="Delete table" aria-label="Delete table"><i class="note-icon-trash"></i></button></div></div></div><div class="modal note-modal" aria-hidden="false" tabindex="-1" role="dialog" aria-label="Insert Video"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">×</button><h4 class="modal-title">Insert Video</h4></div><div class="modal-body"><div class="form-group note-form-group row-fluid"><label for="note-dialog-video-url-16837363338811" class="note-form-label">Video URL <small class="text-muted">(YouTube, Vimeo, Vine, Instagram, DailyMotion or Youku)</small></label><input id="note-dialog-video-url-16837363338811" class="note-video-url form-control note-form-control note-input" type="text"></div></div><div class="modal-footer"><input type="button" href="#" class="btn btn-primary note-btn note-btn-primary note-video-btn" value="Insert Video" disabled=""></div></div></div></div><div class="modal note-modal" aria-hidden="false" tabindex="-1" role="dialog" aria-label="Help"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">×</button><h4 class="modal-title">Help</h4></div><div class="modal-body" style="max-height: 300px; overflow: scroll;"><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>ENTER</kbd></label><span>Insert Paragraph</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+Z</kbd></label><span>Undoes the last command</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+Y</kbd></label><span>Redoes the last command</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>TAB</kbd></label><span>Tab</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>SHIFT+TAB</kbd></label><span>Untab</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+B</kbd></label><span>Set a bold style</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+I</kbd></label><span>Set a italic style</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+U</kbd></label><span>Set a underline style</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+S</kbd></label><span>Set a strikethrough style</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+BACKSLASH</kbd></label><span>Clean a style</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+L</kbd></label><span>Set left align</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+E</kbd></label><span>Set center align</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+R</kbd></label><span>Set right align</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+J</kbd></label><span>Set full align</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+NUM7</kbd></label><span>Toggle unordered list</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+SHIFT+NUM8</kbd></label><span>Toggle ordered list</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+LEFTBRACKET</kbd></label><span>Outdent on current paragraph</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+RIGHTBRACKET</kbd></label><span>Indent on current paragraph</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM0</kbd></label><span>Change current block's format as a paragraph(P tag)</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM1</kbd></label><span>Change current block's format as H1</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM2</kbd></label><span>Change current block's format as H2</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM3</kbd></label><span>Change current block's format as H3</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM4</kbd></label><span>Change current block's format as H4</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM5</kbd></label><span>Change current block's format as H5</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+NUM6</kbd></label><span>Change current block's format as H6</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+ENTER</kbd></label><span>Insert horizontal rule</span><div class="help-list-item"></div><label style="width: 180px; margin-right: 10px;"><kbd>CTRL+K</kbd></label><span>Show Link Dialog</span></div><div class="modal-footer"><p class="text-center"><a href="http://summernote.org/" target="_blank">Summernote 0.8.16</a> · <a href="https://github.com/summernote/summernote" target="_blank">Project</a> · <a href="https://github.com/summernote/summernote/issues" target="_blank">Issues</a></p></div></div></div></div></div>
                            <span id="maxContentPost"></span>
                        </div>
                        <div class="col-md-4 show-audio">
                            <label>
                                <h6>Audio/Video</h6>
                            </label>

                            <label><input class="form-check-input" type="checkbox" id="audioconvertcheck">Keep Audio Only for a Video File (Video File
                                will converted to audio).</label>
                            <!-- Star -->
                            <div class="form-group form-row align-items-center">
                                <div class="col-md-12">
                                    <label>Audio/Video Credit <span class="avcreditRequired required">*</span>:</label>
                                    <input id="photo-credit" type="text" class="form-input form-control" "="" name="avcredit" value="" required="" placeholder="Audio/Video Credit (Required if Uploaded)">


                                                                                </div>
                            </div>
                            <!-- End -->
                            <div class="fileuploader fileuploader-theme-dragdrop"><input type="hidden" name="fileuploader-list-audio_file_front" value="[]"><input type="file" name="audio_file_front" data-id="https://www.historychip.com/submitastory/delete_audio" data-url="https://www.historychip.com/submitastory/save_audio" data-name="story" style="position: absolute; z-index: -9999; height: 0px; width: 0px; padding: 0px; margin: 0px; line-height: 0; outline: 0px; border: 0px; opacity: 0;"><div class="fileuploader-input"><div class="fileuploader-input-inner"><div class="fileuploader-icon-main"></div><h3 class="fileuploader-input-caption"><span>Choose file to upload</span></h3><p></p><button type="button" class="fileuploader-input-button"><span>Browse file</span></button><br><br><span><span class="required">*</span> Note: Audio or video ( MP3 or MP4 can be added) files can be uploaded here. </span></div></div><div class="fileuploader-items"><ul class="fileuploader-items-list"></ul></div></div>
                            <div id="errorBlock" class="help-block"></div>
                            <input type="hidden" name="audio_file" class="file-saver" value="">

                            <input type="hidden" name="audioconvert" id="audioconvert" class="audioconvert" value="0">

                        </div>
                    </div>

                    <div class="form-group form-row">

                        <div class="col-md-4">
                            <input id="event_location" type="text" class="form-control " "="" name="event_location" value="" placeholder="Where did this story happen">
                            <span class="fa fa fa-question-circle field-icon" data-toggle="popover" data-placement="top" data-content="Please be as specific as you are able. If you know the city and state where this story
                                          happened, please enter that (Austin, Texas, U.S.A.). If you only know the city or state and
                                          country enter that, (Johannesburg, South Africa). If you only know the country where this story
                                          happened, please enter the country (Japan)." data-original-title="" title=""></span>
                                                                </div>
                        <div class="col-md-4">
                            <input id="event_detail_dates" type="text" class="form-control " "="" name="event_detail_dates" value="" placeholder="When did this story happen?">
                            <span class="fa fa fa-question-circle field-icon" data-toggle="popover" data-placement="top" data-content="If your story spans a period of time, be as specific as possible, for instance, Spring 2004, 1960s, 2001-2003." data-original-title="" title=""></span>
                                                                </div>

                        <div class="col-md-4">
                            <input id="event_dates" type="date" class="form-control" "="" name="event_dates" value="" placeholder="When did this story happen">
                            <span class="fa fa fa-question-circle field-icon" data-toggle="popover" data-placement="top" data-content=" If you know the exact date for your story add it here." data-original-title="" title=""></span>
                                                                </div>

                    </div>

                    <div class="form-group form-row">

                        <!--                                            <div class="col-md-4">


                                                                                <div class="custom-file">
                                                                                    <input type="file" accept="audio/*" class="custom-file-input " id="audio-file" name="audio_file">
                                                                                    <label class="custom-file-label" for="audio-file">Choose audio file...</label>
                                                                                </div>

                                                                                                                                                                        </div>-->

                                                        </div>


                    <button type="submit" id="btn-submit" class="btn btn-blue4 my-2 px-4">
                        Submit
                    </button>
                                                    <button type="submit" id="btn-draft" class="btn btn-blue4 my-2 px-4">
                        Save as Draft
                    </button>
                                                    <button type="submit" id="preview-story" class="btn btn-blue4 my-2 px-4">
                        Story Preview
                    </button>

                    <a href="https://www.historychip.com/stories/mine" type="button" id="my-stories" class="btn btn-blue4 my-2 px-4 pull-right">
                        My Stories <i class="fa fa-angle-right"></i>
                    </a>
                </form>
                                        </div> <!-- / .container -->

        </div>
    </div>


@endsection
