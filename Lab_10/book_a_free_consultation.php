<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
        // Dynamic variables
        $keyWords = "Explore jumbo construction loans to finance luxury homes. Understand requirements, benefits, and get competitive rates for your dream build.";
        $pageDescription = "Explore jumbo construction loans to finance luxury homes. Understand requirements, benefits, and get competitive rates for your dream build.";
        $preloadImage = '';
        $canonicalUrl = '';
        $ogUrl = '';
        $ogImage = '';
        $estimatedReadTime = '';
        $title = 'CliffSide | Book a Free Consultation';
        // Include the head.php file
        include("includes/head.php")
        ?>

  </head>

<body>

    <!-- Navbar with Mobile Slider -->
    <?php include_once("includes/nav.php") ?>

    <main>
        <!-- Consultation details and form Section -->
        <section
            class="consultation gap-10 md:gap-0 grid grid-cols-1 md:grid-cols-2 p-10 md:px-[100px] pt-[80px] pb-[120px]">

            <!-- Consultation Details -->
            <div class="details-container md:pr-[48px]">
                <h2 class="text-[50px] font-medium pb-[30px]">
                    Book Your Free Consultation
                </h2>
                <p class="text-[18px] font-light">
                    This isn't going to be a sales pitch disguised as a consultation. We have only one goal: that is to
                    start a genuine conversation about your cybersecurity situation.
                </p>
                <ul class="consultation-bullet pt-[10px] ml-[20px] flex flex-col gap-[10px] font-light">
                    <li class="">Honest assessment of your current security posture</li>
                    <li class="">Clear identification of your real priorities vs. perceived needs</li>
                    <li class="">Straight talk about what's actually putting you at risk</li>
                    <li class="">Discussion of whether our approach fits your situation</li>
                    <li class="">No pressure, no manufactured urgency</li>
                </ul>
            </div>

            <!-- Consultation Form -->
            <div class="form-container">
                <form class="flex flex-col gap-6">

                    <!-- Name Fields -->
                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="flex-1">
                            <label class="block text-[18px] font-light text-black mb-1">First Name</label>
                            <input type="text" name="first_name"
                                class="w-full border border-black rounded-full px-4 py-2 " />
                        </div>
                        <div class="flex-1">
                            <label class="block text-[18px] font-light text-black mb-1">Last Name</label>
                            <input type="text" name="last_name"
                                class="w-full border border-black rounded-full px-4 py-2" />
                        </div>
                    </div>

                    <!-- Email & Phone Row -->
                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="flex-1">
                            <label class="block text-[18px] font-light text-black mb-1">Work Email</label>
                            <input type="email" name="work_email"
                                class="w-full border border-black rounded-full px-4 py-2 " />
                        </div>
                        <div class="flex-1">
                            <label class="block text-[18px] font-light text-black mb-1">Phone Number</label>
                            <input type="tel" name="phone_number"
                                class="w-full border border-black rounded-full px-4 py-2 " />
                        </div>
                    </div>

                    <!-- Full-width Phone Number -->
                    <!-- <div>
                        <label class="block text-sm font-normal text-black mb-1 opacity-0 select-none">Phone
                            Number</label>
                        <input type="tel"
                            class="w-full border border-black rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#FFF455] transition"
                            placeholder="Phone Number" />
                    </div> -->

                    <!-- Radio Group -->
                    <div>
                        <label class="block text-[18px] font-light text-black mb-2">What describes you best?</label>
                        <div class="grid grid-cols-2 gap-y-2 gap-x-4">
                            <label class="flex items-center gap-2 text-black text-[18px] font-light">
                                <input type="radio" name="role" value="business_owner" class="accent-black" />
                                Business Owner
                            </label>
                            <label class="flex items-center gap-2 text-black text-[18px] font-light">
                                <input type="radio" name="role" value="it_manager" class="accent-black" />
                                IT Manager
                            </label>
                            <label class="flex items-center gap-2 text-black text-[18px] font-light">
                                <input type="radio" name="role" value="consultant" class="accent-black" />
                                Consultant
                            </label>
                            <label class="flex items-center gap-2 text-black text-[18px] font-light">
                                <input type="radio" name="role" value="individual" class="accent-black" />
                                Individual
                            </label>
                            <label class="flex items-center gap-2 text-black text-[18px] font-light col-span-2">
                                <input type="radio" name="role" value="other" class="accent-black" />
                                Other
                            </label>
                        </div>
                    </div>

                    <!-- Textarea -->
                    <div>
                        <label class="block text-[18px] font-normal text-black mb-2">What’s your biggest cybersecurity
                            challenge right now?</label>
                        <textarea name="cybersecurity_challenge" rows="3"
                            class="w-full border border-black rounded-xl px-4 py-2 resize-none placeholder:text-gray-500"
                            placeholder="Share your thoughts..."></textarea>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="mt-2 w-fit text-[18px] px-16 rounded-full bg-[#FFF455] hover:bg-[#FFF455]/90 text-black font-medium py-2 transition-all duration-200 shadow-[0_4px_24px_0_rgba(255,244,85,0.45)] focus:outline-none focus:ring-2 focus:ring-[#FFF455]">
                        Submit
                    </button>
                </form>
            </div>
        </section>

        <!-- Consultation Images Section -->
        <section class="relative consultation_images px-4 py-10">
             <div class="absolute inset-0 bg-no-repeat bg-center bg-cover" style="background-image: url('assets/BookConsulatationBg2.webp'); z-index: 0;"></div>
            <div class="grid grid-cols-1 md:grid-cols-[1.2fr_0.8fr] gap-6 px-10 z-10">
                <!-- First Image -->
                <div class="flex items-center justify-center z-10">
                    <h2 class="text-white text-center text-2xl sm:text-3xl md:text-4xl font-bold mb-4 tracking-wider">Brutally Honest Cybersecurity</h2>
                </div>

                <!-- Second Image -->
                <div class="flex items-center justify-center z-10">
                    <img src="assets/person_consulting_CliffSidelogo.webp" alt="CliffSide Logo"
                        class="w-[150px] h-[150px] object-contain aspect-[1.25/0.8] rounded-none" />
                </div>
            </div>
        </section>

        <!-- Testimonials Slider Section -->
        <?php include_once("includes/Testimonials_Slider.php") ?>
    </main>

    <!-- Footer -->
    <?php include_once("includes/footer.php") ?>
    
</body>

</html>