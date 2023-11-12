@extends('layouts.app')

@section('content')

<style>

    .btn-primary {
       background-color: #5c2c78;
       border-color: #5c2c78;
        }

    .btn-primary:hover {
        background-color: #f8d041;
        border-color: ##f8d041;
        }
    /* Custom styles for the footer */
    .footer-content {
        text-align: right;
    }

    .contact-heading {
        text-align: right;
        margin-top: 0;
    }

    .divider-primary {
        background-color: #000000;
        height: 2px;
        margin: 1rem 0;
    }

    /* Custom style for the contact icon */
    .contact-icon {
        font-size: 24px;
        vertical-align: middle;
        margin-right: 5px;
        color: #000000;
    }

    @keyframes pulse {
        0% {
            transform: scale(0.9);
        }
        50% {
            transform: scale(1);
        }
        100% {
            transform: scale(0.9);
        }
    }

    /* Image Animation */
    .animated-image {
        animation: rotate 4s linear infinite;
    }

    @keyframes rotate {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
</style>


    <!-- Masthead -->
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">Announcements!</h1>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">Stay Informed</p>
                    <a class="btn btn-primary btn-xl" href="#mtc">Find Out More</a>
                </div>
            </div>
        </div>
    </header>

    <!-- MTC Group of Schools -->
    <section class="page-section" style="background-color: #5c2c78;" id="mtc">
        <div class="container px-4 px-lg-5" style="">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-4 d-flex justify-content-center align-items-center">
                    <img src="/img/aboutt.jpg" alt="about" width="1520" height="900">
                </div>
            </div>
        </div>    
    </section>    
    
    <!-- About -->
    <section class="page-section" style="background-color: #5c2c78;" id="about">
        <div class="container px-4 px-lg-5" style="">
            <div class="row gx-4 gx-lg-5 justify-content-start">
                <div class="col-lg-8 text-start">
                    <!-- Title for the About section -->
                    <h1 class="text-white mt-0" style="font-size: 36px; font-weight: bold; text-transform: uppercase;">About the School</h1>
                    <hr class="divider divider-primary" style="background-color: #000000;" />
                    
                    <!-- Introduction paragraph about the school -->
                    <p class="text-white mb-4 text-justify" style="font-size: 18px; line-height: 1.5; font-family: 'Arial', sans-serif;">
                        <b>Mother Theresa Colegio Group of Schools</b> positions itself as a forerunner in providing scholarship programs to the Filipino youth around the globe, aiming to produce quality young innovators who will become the competitive advantage of the Philippine Nation.
                    </p>
    
                    <!-- Additional paragraph about the school -->
                    <p class="text-white mb-4 text-justify" style="font-size: 18px; line-height: 1.5; font-family: 'Arial', sans-serif;">For more than 30 years of existence, Mother Theresa Colegio Group of Schools has maintained its stature of providing quality education and scholarship opportunities.
                    </p>
    
                    <hr class="divider divider-primary" style="background-color: #000000;" />
                </div>
                <!-- Image -->
                <div class="col-lg-4" style="display: inline-block; vertical-align: top;">
                    <img src="/img/about_the_school.jpg" alt="about" width="500" height="300" style="border-radius: 10px; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.3);">
                </div>
                <!-- End of Image -->
            </div>
        </div>
    </section>
    
   <!-- Philosophy -->
<section class="page-section" style="background-color: #5c2c78;" id="philosophy">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 text-center">
                <h1 class="text-white mt-0" style="font-size: 36px; font-weight: bold;">Philosophy</h1>
                <hr class="divider divider-primary" style="background-color: #000000;" />
                <ul class="text-white mb-4 text-justify" style="font-size: 18px; line-height: 1.5;">
                    <li>Christ-Centered: <strong>“God above all.”</strong></li>
                    <li>Champion: <strong>“Excellence is our Air.”</strong></li>
                    <li>Collaborative: <strong>“Competition is out, Collaboration is in.”</strong></li>
                    <li>Community: <strong>“WE is better than I.”</strong></li>
                    <li>Caring: <strong>“We are each other’s keeper.”</strong></li>
                    <li>Celebrated: <strong>“We cheered and celebrated one’s YOUniqueness.”</strong></li>
                    <li>Contemporary: <strong>“Innovate Always.”</strong></li>
                </ul>
                <hr class="divider divider-primary" style="background-color: #000000;" />
            </div>
            <!--DITO MAG LALAGAY NG IMAGE-->

            <!--END-->
        </div>
    </div>
</section>

<!-- Vision -->
<section class="page-section" style="background-color: #5c2c78;" id="vision">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 text-center">
                <h1 class="text-white mt-0" style="font-size: 36px; font-weight: bold;">Vision</h1>
                <hr class="divider divider-primary" style="background-color: #000000;" />
                <p class="text-white mb-4 text-justify" style="font-size: 18px; line-height: 1.5;">
                    Mother Theresa Colegio Group of Schools is a platform for the development of students’ core gifts and a channel of serving others through discipleship, education, and volunteerism.
                </p>
                <p class="text-white mb-4 text-justify" style="font-size: 18px; line-height: 1.5;">
                    Mother Theresa Colegio Group of Schools envisions to be the Top-of-the-mind scholarship institution in the Philippines, serving 100,000 scholars by the year 2050.
                </p>
                <hr class="divider divider-primary" style="background-color: #000000;" />
            </div>
            <!--DITO MAG LALAGAY NG IMAGE-->

            <!--END-->
        </div>
    </div>
</section>

<!-- Mission -->
<section class="page-section" style="background-color: #5c2c78;" id="mission">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 text-center">
                <h1 class="text-white mt-0" style="font-size: 36px; font-weight: bold;">Mission</h1>
                <hr class="divider divider-primary" style="background-color: #000000;" />
                <p class="text-white mb-4 text-justify" style="font-size: 18px; line-height: 1.5;">
                    Mother Theresa Colegio Group of Schools advocates passion-driven community, developing passionate, above-average students in their chosen crafts, allowing them to embrace their uniqueness and encourage them to strengthen their core as they bless the world with their gifts.
                </p>
                <hr class="divider divider-primary" style="background-color: #000000;" />
            </div>
            <!--DITO MAG LALAGAY NG IMAGE-->

            <!--END-->
        </div>
    </div>
</section>

<!-- Goals -->
<section class="page-section" style="background-color: #5c2c78;" id="goals">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 text-center">
                <h1 class="text-white mt-0" style="font-size: 36px; font-weight: bold;">Goals</h1>
                <hr class="divider divider-primary" style="background-color: #000000;" />
                <ul class="text-white mb-4 text-justify" style="font-size: 18px; line-height: 1.5;">
                    <li>Achieve peak performance in academic and non-academic pursuits.</li>
                    <li>Encourage involvement of diversified learners in all undertakings.</li>
                    <li>Highlight transparency and accountability of available education resources.</li>
                    <li>Safeguard that the learning competencies are proactive to the demands of the 21st Century.</li>
                    <li>Enrollment to Employment of the students.</li>
                </ul>
                <hr class="divider divider-primary" style="background-color: #000000;" />
            </div>
            <!--DITO MAG LALAGAY NG IMAGE-->

            <!--END-->
        </div>
    </div>
</section>


    <!-- Footer -->
    <footer class="bg-light py-5">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-end small text-end text-muted">
                <div class="col-lg-8">
                    <h3 class="contact-heading text-black mt-0">
                        <span class="contact-icon">&#9990;</span> Contact us <!-- Unicode call icon -->
                    </h3>
                    <p class="text-black mb-2 footer-content">Address: Brookside, San Roque, Iriga City</p>
                    <p class="text-black mb-2 footer-content">Email: <a href="mailto:mtc.iriga@gmail.com">mtc.iriga@gmail.com</a></p>
                    <p class="text-black mb-2 footer-content">Contact numbers: 0946-340-3540 / 0946-879-3445</p>
                    <p class="text-black mb-2 footer-content">Phone: 05 433 16866</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer -->
@endsection