@extends('layouts.app')

@section('content')
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
                    <a class="btn btn-primary btn-xl" href="#about">Find Out More</a>
                </div>
            </div>
        </div>
    </header>

    <!-- About -->
    <section class="page-section" style="background-color: #925fc5;" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <!-- Title for the About section -->
                    <h1 class="text-white mt-0">About the School</h1>
                    <hr class="divider divider-primary" />
                    
                    <!-- Introduction paragraph about the school -->
                    <p class="text-white mb-4 text-justify">
                        <b>Mother Theresa Colegio Group of Schools</b> position itself as a forerunner in providing scholarship programs to the Filipino youth around the globe aiming to produce quality young innovators, making them the competitiveadvantage of the Philippine Nation.
                    </p>

                    <!-- Additional paragraph about the school -->
                    <p class="text-white mb-4 text-justify">.For more than 30 years of existence, Mother Theresa Colegio Group of Schools has maintained its stature of quality education and scholarship.
                    </p>
                    <hr class="divider divider-primary" />
                </div>
            </div>
        </div>
    </section>

    <!-- Philosophy -->
    <section class="page-section" style="background-color: #ae84d9;" id="philosophy">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="text-white mt-0">Philosophy</h1>
                    <hr class="divider divider-primary" />
                    <ul class="text-white mb-4 text-justify"> 
                        <li>Christ-Centered: “God above all.”</li>
                        <li>Champion: “Excellence is our Air.”</li>
                        <li>Collaborative: “Competition is out, Collaboration is in.”</li>
                        <li>Community: “WE is better than I.”</li>
                        <li>Caring: “We are each other’s keeper.”</li>
                        <li>Celebrated: “We cheered and celebrated one’s YOUniqueness.”</li>
                        <li>Contemporary: “Innovate Always.”</li>
                    </ul>
                    <hr class="divider divider-primary" />
                </div>
            </div>
        </div>
    </section>
    
    <!-- Vision -->
    <section class="page-section" style="background-color: #925fc5;" id="vision">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="text-white mt-0">Vision</h1>
                    <hr class="divider divider-primary" />
                    <p class="text-white mb-4 text-justify">
                        Mother Theresa Colegio Group of Schools is a platform for the development of students’ core gifts and a channel of serving others through discipleship, education and volunteerism.
                    </p>
                    <p class="text-white mb-4 text-justify">
                        Mother Theresa Colegio Group of Schools envision to be the Top-of-the-mind scholarship institution in the Philippines, serving 100,000 scholars by the year 2050.
                    </p>
                    <hr class="divider divider-primary" />
                </div>
            </div>
        </div>
    </section>

    <!-- Mission -->
    <section class="page-section" style="background-color: #ae84d9;" id="mission">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="text-white mt-0">Mission</h1>
                    <hr class="divider divider-primary" />
                    <p class="text-white mb-4 text-justify">
                        Mother Theresa Colegio Group of Schools advocates passiondriven community, developing passionate, above-average students in their chosen crafts, allowing them to embrace their uniqueness and encourage them to strengthen their core as they bless the world with their gifts.
                    </p>
                    <hr class="divider divider-primary" />
                </div>
            </div>
        </div>
    </section>

    <!-- Goals -->
    <section class="page-section" style="background-color: #925fc5;" id="goals">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="text-white mt-0">Goals</h1>
                    <hr class="divider divider-primary" />
                    <ul class="text-white mb-4 text-justify"> 
                        <li>Achieve peak performance in academic and non-academic pursuits.</li>
                        <li>Encourage involvement of diversified learners in all undertakings.</li>
                        <li>Highlight transparency and accountability of available education resources.</li>
                        <li>Safeguard that the learning competencies are proactive to the demands of 21st Century.</li>
                        <li>Enrollment to Employment of the students.</li>
                    </ul>
                    <hr class="divider divider-primary" />
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-light py-5">
        <div class="container px-4 px-lg-5">
            <div class="small text-center text-muted">Copyright &copy; 2023</div>
        </div>
    </footer>
@endsection