@extends('layouts.app') 

@section('content')

@section('title', 'Contact')

@include('nav')

    <!-- Header Section -->

<section class="contact-section py-5 py-lg-7">
  <div class="container-fluid p-lg-0">
    <div class="row g-0 align-items-center">
      <!-- Contact Form Column -->
      <div class="col-lg-6 bg-light-gradient">
        <div class="col-lg-10 mx-auto p-4 p-lg-5">
          <div class="section-header mb-5 mt-5">
          <!--   <span class="text-uppercase letter-spacing-1 text-primary fw-bold">Let's Connect</span>  -->
            <h2 class="display-4 fw-bold mt-2 mb-3 custom-heading">Get In Touch</h2>
            <p class="lead text-muted" >Have questions about your stay or want to make a reservation? We’d love to hear from you. Fill out the form below, and our friendly team will get back to you within 24 hours to assist you.</p>
          </div>
          
          <form class="contact-form">
            <div class="row g-3">
              <div class="col-md-12">
                <div class="form-floating">
                  <input type="text" class="form-control" id="name" placeholder="Your name">
                  <label for="name">Your Name</label>
                  <div class="form-underline"></div>
                </div>
              </div>
              
              <div class="col-md-12">
                <div class="form-floating">
                  <input type="email" class="form-control" id="email" placeholder="Your email">
                  <label for="email">Email Address</label>
                  <div class="form-underline"></div>
                </div>
              </div>
              
              <div class="col-md-12">
                <div class="form-floating">
                  <textarea class="form-control" placeholder="Your message" id="message" style="height: 120px"></textarea>
                  <label for="message">Your Message</label>
                  <div class="form-underline"></div>
                </div>
              </div>
              
              <div class="col-md-6">
                <button class="btn-message  btn-lg  py-3 rounded-pill  w-100" type="submit">
                  <span class="position-relative z-1">Send Message</span>
                  <span class="btn-overlay"></span>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
      
      <!-- Map Column -->
      <div class="col-lg-6 position-relative">
        <div class="map-container h-100">
          <!-- Google Maps Embed -->
          <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.215573291865!2d-73.98784492426608!3d40.74844047138971!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259a9b3117469%3A0xd134e199a405a163!2sEmpire%20State%20Building!5e0!3m2!1sen!2sus!4v1689878157035!5m2!1sen!2sus" 
            width="100%" 
            height="100%" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
          
          <!-- Map Overlay Controls -->
          <div class="map-overlay-controls">
            <button class="map-control-btn zoom-in">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#1a365d"viewBox="0 -960 960 960"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580t75.5-184.5T380-840t184.5 75.5T640-580q0 44-14 83t-38 69l252 252zM380-400q75 0 127.5-52.5T560-580t-52.5-127.5T380-760t-127.5 52.5T200-580t52.5 127.5T380-400m-40-60v-80h-80v-80h80v-80h80v80h80v80h-80v80z"/></svg>                                       
            </button>
            <button class="map-control-btn zoom-out">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#1a365d" viewBox="0 -960 960 960"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580t75.5-184.5T380-840t184.5 75.5T640-580q0 44-14 83t-38 69l252 252zM380-400q75 0 127.5-52.5T560-580t-52.5-127.5T380-760t-127.5 52.5T200-580t52.5 127.5T380-400M280-540v-80h200v80z"/></svg>
            </button>
            <button class="map-control-btn locate">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#1a365d" viewBox="0 -960 960 960"><path d="M440-42v-80q-125-14-214.5-103.5T122-440H42v-80h80q14-125 103.5-214.5T440-838v-80h80v80q125 14 214.5 103.5T838-520h80v80h-80q-14 125-103.5 214.5T520-122v80zm40-158q116 0 198-82t82-198-82-198-198-82-198 82-82 198 82 198 198 82m0-120q-66 0-113-47t-47-113 47-113 113-47 113 47 47 113-47 113-113 47m0-80q33 0 56.5-23.5T560-480t-23.5-56.5T480-560t-56.5 23.5T400-480t23.5 56.5T480-400m0-80"/></svg>
            </button>
          </div>
        </div>
        
        <!-- Contact Info Box -->
        <div class="contact-info-box shadow-lg">
          <div class="info-item">
            <div class="info-icon bg-primary-light">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#1a365d" viewBox="0 -960 960 960"><path d="M480-480q33 0 56.5-23.5T560-560t-23.5-56.5T480-640t-56.5 23.5T400-560t23.5 56.5T480-480m0 294q122-112 181-203.5T720-552q0-109-69.5-178.5T480-800t-170.5 69.5T240-552q0 71 59 162.5T480-186m0 106Q319-217 239.5-334.5T160-552q0-150 96.5-239T480-880t223.5 89T800-552q0 100-79.5 217.5T480-80m0-480"/></svg>
            </div>
            <div>
              <h5 class="mb-1">Our Location</h5>
              <p class="mb-0 text-muted">350 5th Avenue<br>New York, NY 10118</p>
            </div>
          </div>
          
          <div class="info-item">
            <div class="info-icon bg-primary-light">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#1a365d" viewBox="0 -960 960 960"><path d="M798-120q-125 0-247-54.5T329-329 174.5-551 120-798q0-18 12-30t30-12h162q14 0 25 9.5t13 22.5l26 140q2 16-1 27t-11 19l-97 98q20 37 47.5 71.5T387-386q31 31 65 57.5t72 48.5l94-94q9-9 23.5-13.5T670-390l138 28q14 4 23 14.5t9 23.5v162q0 18-12 30t-30 12M241-600l66-66-17-94h-89q5 41 14 81t26 79m358 358q39 17 79.5 27t81.5 13v-88l-94-19zm0 0"/></svg>
            </div>
            <div>
              <h5 class="mb-1">Call Us</h5>
              <p class="mb-0 text-muted">+1 (212) 736-3100<br>Mon-Fri, 9am-5pm</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="newsletter-section">
    <div class="newsletter-container">
        <h2 class="newsletter-title">Experience The Haven</h2>
        <p class="newsletter-quote">
            “Where exceptional service meets elegant comfort — your perfect stay begins here.”
        </p>
    </div>
</section>



    <footer class="bg-body-tertiary text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2025 Copyright:
            <a class="text-body" href=" ">The Haven</a>
        </div>
        <!-- Copyright -->
    </footer>

@endsection