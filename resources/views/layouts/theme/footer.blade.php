<!-- resources/views/layouts/theme/footer.blade.php -->
<!-- footer seaction start -->
<div class="footer-seaction">
    <div class="container common-container">
        <div class="row m-0 justify-content-between">
            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                <div class="mb-3 mb-lg-0">
                    <p class="foot-title"><span>About Us</span></p>
                    <div class="foot-text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt.
                        </p>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
                    </div>
                    <div class="social-img">
                        <img src="{{ asset('images/fb.svg') }}">
                        <img src="{{ asset('images/twi.svg') }}">
                        <img src="{{ asset('images/in.svg') }}">
                        <img src="{{ asset('images/youtube.svg') }}">
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                <div class="mb-3 mb-lg-0">
                    <p class="foot-title"><span>Instagram</span></p>
                    <div>                        
                        <img src="{{ asset('images/List.svg') }}" class="list-img">
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-12 col-12">
                <div class="mb-3 mb-lg-0">
                    <p class="foot-title"><span>Newsletter</span></p>
                    <div class="foot-text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt.
                        </p>
                    </div>
                    <div class="subscribe">
                        <input type="text" placeholder="Email ID"
                            class="w-100 text-white bg-transparent rounded-pill mb-4" />
                        <button class="bg-white border-0 text-center rounded-pill text-uppercase">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container common-container">
            <p class="text-white text-center m-0">© MyParisTrip - 2024 | All Rights Reserved.</p>
        </div>
    </div>
</div>
<!-- footer seaction end -->

<!-- script start -->
 <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
        $(document).ready(function () {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                dots: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                }
            })
        });
</script>
<!-- script end -->