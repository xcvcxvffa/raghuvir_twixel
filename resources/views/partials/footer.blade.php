<footer class="main-footer bg-section dark-section">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 order-xl-1 order-2">
                <!-- About Footer Box Start -->
                <div class="about-footer-box">
                    <!-- Footer Header Box Start -->
                    <div class="footer-contact-info-box">
                        <!-- Footer Header Content Start -->
                        <div class="footer-contact-info">
                            <div class="footer-logo">
                                <img src="{{ asset('images/Raghuvir Logo White.png') }}" alt="" style="max-height: 80px; width: auto;">
                            </div>

                            <!-- Section Title Start -->
                            <div class="footer-contact-info-content">
                                <p>We are committed to sustainable farming, nurturing healthy soil, and providing pure, organic produce straight from our fields to your table.</p>
                            </div>
                            <!-- Section Title End -->

                            <div class="footer-social-links">
                                <ul>
                                    <li><a href="#"><i class="fa-brands fa-dribbble"></i>Dribbble</a></li>
                                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i>Facebook</a></li>
                                    <li><a href="#"><i class="fa-brands fa-instagram"></i>Instagram</a></li>
                                    <li><a href="#"><i class="fa-brands fa-linkedin-in"></i>LinkedIn</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Footer Header Content End -->
                         

                    </div>
                    <!-- Footer Header Box End -->

                    <!-- Footer Links Box Start -->
                    <div class="footer-links-box">
                        <!-- Footer Links End -->
                        <div class="footer-links">
                            <h3>Quick Links</h3>
                            <ul>
                                <li><a href="{{ route('home') }}">Homepage</a></li>
                                <li><a href="{{ route('about') }}">About Us</a></li>
                                <li><a href="{{ route('products') }}">Our Products</a></li>
                                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                            </ul>
                        </div>
                        <!-- Footer Links End -->

                        <!-- Footer Links End -->
                        <div class="footer-links">
                            <h3>Our Products</h3>
                            <ul>
                                <li><a href="{{ route('product-details', ['product' => 'atta']) }}">Chakki Atta</a></li>
                                <li><a href="{{ route('product-details', ['product' => 'maida']) }}">Premium Maida</a></li>
                                <li><a href="{{ route('product-details', ['product' => 'suji']) }}">Fine Suji</a></li>
                                <li><a href="{{ route('product-details', ['product' => 'bran']) }}">Wheat Bran</a></li>
                            </ul>
                        </div>
                        <!-- Footer Links End -->

                        <!-- Footer Links Start -->
                        <div class="footer-links footer-contact-list">
                            <h3>Contact Information</h3>
                            <ul>
                                <li><span>Our Address:</span> Plot No 182, Vibrant Prime Industrial Park, kadadara, GIDC Area, Dehgam, Gandhinagar, Gujarat, 382305</li>
                                <li><span>Customer Care : </span><a href="tel:+919725427727">+91 97254 27727</a></li>
                                <li><span>Email Address : </span><a href="mailto:info@domainname.com">info@domainname.com</a></li>
                            </ul>                                                      
                        </div>
                        <!-- Footer Links End -->
                    </div>
                    <!-- Footer Links Box End -->

                    <!-- Footer Copyright Text Start -->
                    <div class="footer-copyright-text">
                        <p>Copyright &copy; 2025 Raghuvir Atta. All Rights Reserved. Designed &amp; Developed by <a href="https://twixel.media/" target="_blank" style="color: var(--accent-color); font-weight: 600;">Twixel Media</a></p>
                    </div>
                    <!-- Footer Copyright Text End -->
                </div>
                <!-- About Footer Box End -->
            </div>

            <div class="col-xl-4 order-xl-2 order-1">
                <div class="footer-newsletter-box">


                    <!-- Footer Newsletter Box Body Start -->
                    <div class="footer-newsletter-box-body">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3>Our Newsletter</h3>
                            <h2 data-cursor="-opaque">Get Fresh Updates From the Farm</h2>
                        </div>
                        <!-- Section Title End -->

                        <!-- Footer Newsletter Form Start -->
                        <div class="footer-newsletter-form">
                            <form id="newslettersForm" action="#" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="mail" class="form-control" id="mail" placeholder="Email Address*" required>
                                    <button type="submit" class="newsletter-btn"><i class="fa-regular fa-paper-plane"></i></button>
                                </div>
                            </form>
                            <p>** Stay informed with the latest harvest news, seasonal product launches</p>
                        </div>
                        <!-- Footer Newsletter Form End -->

                        <div class="footer-newsletter-btn">
                            <a href="{{ route('contact') }}" class="btn-default btn-highlighted">Subscribe Now</a>
                        </div>
                    </div>
                    <!-- Footer Newsletter Box Body End -->
                </div>
            </div>
        </div>
    </div>
</footer>
