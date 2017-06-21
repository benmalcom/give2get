@extends('frontend.layouts.default')
@section('content')
    <div id="content">
        <div class="container">

            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a>
                    </li>
                    <li>How It Works</li>
                </ul>

            </div>

            <div class="col-md-3">
                <!-- *** PAGES MENU ***
_________________________________________________________ -->
                @include('frontend.layouts.partials.other-pages-sidebar')

                        <!-- *** PAGES MENU END *** -->

            </div>

            <div class="col-md-9">


                <div class="box" id="contact">
                    <h2>Our Privacy Policy</h2>
                    <p>
                        Your privacy is very important to us.
                        We are committed to protection of your personal information by
                        reasonable security safeguards against loss or theft, as well as
                        unauthorized access, disclosure, copying, use or modification. It is
                        our policy to restrict access to sensitive information to the
                        minimum necessary.
                        Our policies and practices relating to the management of personal
                        information are available at all times on our website. If you have
                        questions about our privacy policy, you may <a href="{{url('/contact-us')}}">contact us</a>.
                        Your personal information is retained only as long as necessary
                        for the fulfillment of the specified purpose,
                        or as we are required to do so by law.
                        When ordering or registering on our site, as appropriate, you will
                        be asked to enter your name, email address, mailing address, and
                        phone number.
                        Like most websites, we use cookies to enhance your experience,
                        gather general visitor information, and track visits to our site.
                        Please refer to the “Do we use cookies?” section below for
                        information on cookies and how we use them.
                    </p>

                    <h3>What do we use your information for?</h3>
                    <p class="lead">
                        Any of the information we collect from you may be used in one of the following ways:
                    </p>
                    <ul>
                    <li>To process transactions;</li>
                    <li>To administer a contest, promotion, survey, or other site feature.</li>
                    <li>To personalize your experience: your information helps us to better respond to your individual needs;</li>
                    <li>To improve our site: we continually strive to improve our website offerings based on the information and feedback we receive from you;</li>
                    <li>To improve customer service: your information helps us to more effectively respond to your customer service requests and support needs;</li>
                    <li>To send periodic emails: the email address you provide for order processing may be used to send you information and updates pertaining to your order or request, in addition to receiving occasional company news, updates, promotions, related product or service information, etc. If at any time you wish to unsubscribe from receiving future emails, simply click “unsubscribe” or contact us at the address listed below</li>
                    </ul>
                    <h3>How do we protect your information?</h3>
                    <p>
                        We implement a variety of security measures to maintain the safety of your personal information when you place an order or provide required registration information.
                        These measures include SSL (Secure Sockets Layered) technology to ensure that your information is securely encrypted and sent across the internet securely.
                    </p>
                    <ul>
                        <li>We offer the use of a secure server. All supplied sensitive/credit information is submitted via Secured Socket Layer (SSL) technology and then encrypted into our Payment gateway provider’s database only to be accessible to those authorized with special access rights to such systems, and are required to keep the information confidential.</li>
                        <li>We maintain information as needed for your transactions, and thereafter for the period required by law (if any.) After your transaction, your private information (credit cards, social security numbers, financials, etc.) will not be stored on our servers and physical records will be destroyed by safe means, such as shredding.</li>

                    </ul>
                    <hr>



                </div>


            </div>
            <!-- /.col-md-9 -->
        </div>
        <!-- /.container -->
    </div>
@endsection