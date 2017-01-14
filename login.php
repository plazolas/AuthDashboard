<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>OzCrud Auth Demo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="OzCrud Auth Demo">
        <meta name="keywords" content="Ozcrud Auth Demo">
        <meta name="author" content="Oswald Plazola - Independant Consultant">
        
        <link type="text/css" rel="stylesheet" href="css/bootstrap.css" media="screen">
        <link type="text/css" rel="stylesheet" href="css/font-awesome.css" media="screen">
        <link type="text/css" rel="stylesheet" href="css/et-line.css" media="screen">
        <link type="text/css" rel="stylesheet" href="css/style.css" media="screen">
        <link href="css/login.css" rel='stylesheet' type='text/css' />		
        <!-- Google Font Styles -->
        <link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat+Subrayada:700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Oxygen:400,700,300' rel='stylesheet' type='text/css'>
    </head>
    <body style="background: url('img/bg-login.jpg')">
        <div class="container">
            <header id="Home" class="header" style="height: 88px">
                <div class="menu-wrapper">
                    <nav>
                        <div class="navbar-inner">
                            <div class="navbar-header">
                                <a id="brand" class="navbar-brand" href="http://github.com/plazolas/"><img src="images/logo2.png" alt="Oz Enterprises"></a>
                            </div>
                            <div style="position: relative; bottom: 22px; right: 26px">
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="current"><a href="index.php" >Home</a></li>
                                </ul>
                            </div><!-- end navbar-collapse collapse -->
                        </div><!-- nav -->
                    </nav><!-- end navigation -->
                </div><!-- menu wrapper -->
            </header><!-- end header -->
        </div><!-- end container -->
        <div class="animationload">
            <div class="loader">Loading...</div>
        </div>
        <div id="wrapper">
            <div>
                <div id="login">
                    <div class="title text-center">
                        <h3 class="title-text">&nbsp;&nbsp;&nbsp; Log In Page</h3>
                    </div>
                </div>  
                <div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="Terms and conditions" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title">Terms and conditions</h3>
                            </div>

                            <div class="modal-body">
                                <h2>Terms & Conditions</h2>
                                <br>
                                <h3>By using this site, you signify your assent to these Terms and Conditions. If you do not agree to all of these Terms and Conditions of use, do not use this site!</h3>
                                <h3>The Site Does Not Provide Medical Advice</h3>
                                <p>The contents of The  Site, such as text, graphics, images, information obtained from The Oz Enterprises's licensors, and other material contained on The Oz Enterprises Site ("Content") are for informational purposes only. The Content is not intended to be a substitute for professional medical advice, diagnosis, or treatment. Always seek the advice of your physician or other qualified health provider with any questions you may have regarding a medical condition. Never disregard professional medical advice or delay in seeking it because of something you have read on The Oz Enterprises Site!</p>
                                <p>If you think you may have a medical emergency, call your doctor or 911 immediately. Reliance on any information provided by The Oz Enterprises, The Oz Enterprises employees, others appearing on the Site at the invitation of The Oz Enterprises, or other visitors to the Site is solely at your own risk.</p>
                                <h3>Use of Content</h3>
                                <p>The Oz Enterprises authorizes you to download a copy of the material on The Oz Enterprises Site.   Any special rules for the use of certain software and other items accessible on The Oz Enterprises Site may be included elsewhere within the Site and are incorporated into these Terms and Conditions by reference.</p>
                                <p>The Content is protected by copyright under both United States and foreign laws. Title to the Content remains with The Oz Enterprises. Any use of the Content not expressly permitted by these Terms and Conditions is a breach of these Terms and Conditions and may violate copyright, trademark, and other laws. Content and features are subject to change or termination without notice in the editorial discretion of The Oz Enterprises. All rights not expressly granted herein are reserved to The Oz Enterprises.</p>
                                <p>If you violate any of these Terms and Conditions, your permission to use the Content automatically terminates.</p>
                                <h2>Privacy Policy</h2>
                                <p>The Oz Enterprises understands how important the privacy of personal information is to our users. We understand that your privacy matters and we respect your privacy choices.  This summary of our privacy policy is intended to give you an overview of:</p>
                                <p>•	What information we collect about you</p>
                                <p>•	What choices you have about your information</p>
                                <p>•	How we use your information</p>
                                <p>•	How and with whom we may share the information we have about you</p>
                                <p>•	How we protect your information</p>
                                <p>•	How to contact us with questions or concerns</p>
                                <p>We urge you to take the time to read our entire Privacy Policy for complete detail about our privacy practices and your information.</p>
                                <p>Information Collected About You</p>
                                <p>We may collect "Personal Information" about you – such as your name, address, telephone number, email address or health information – in the following ways:</p>
                                <p> •	When you register for or update an existing profile on our web sites or Apps or register for The Oz Enterprises;</p>
                                <p>•	When you use certain interactive tools and services.</p>
                                <p>We may collect "Non-Personal Information" – information that cannot be used by us to identify you – via Cookies, Web Beacons, The Oz Enterprises mobile device applications and from external sources, even if you have not registered with or provided any Personal Information to The Oz Enterprises.</p>  
                                <p>What Choices Do I Have?</p>
                                <p>If you do not want your Personal Information used by The Oz Enterprises as provided in this Privacy Policy, you should not register as a member or for any specific tool or application that collects Personal Information. You may correct, update or review Personal Information you have submitted through registration, tools and applications by signing in and updating your registration information. If you have registered and no longer want The Oz Enterprises to use your Personal Information, you should delete your information as described in this Policy.</p>
                                <p>Most browser software can be set to reject Cookies.</p>
                                <p>How Information Collected About You Is Used</p>
                                <p>We may use information we collect about you to:</p>
                                <p>•	Administer your account;</p>
                                <p>•	Provide you with access to particular tools and services;</p>
                                <p>•	Respond to your inquiries and send you administrative communications;</p>
                                <p>•	Obtain your feedback on our sites and our offerings;</p>
                                <p>•	Statistically analyze user behavior and activity;</p>
                                <p>•	Provide you and people with similar demographic characteristics and interests with more relevant content and advertisements;</p>
                                <p>•	Conduct research and measurement activities;</p>

                                <p>With Whom Do We Share Your Information?</p>
                                <p>The Oz Enterprises will not disclose any Personal Information about you unless specifically agreed to by you or:</p>
                                <p>•	To comply with legal requirements, such as a law, regulation, search warrant, subpoena, or court order;</p>
                                <p>•	In the event of a corporate change in control resulting from, for example, a merger, a sale of assets, or bankruptcy; or</p>
                                <p>•	In special cases, such as in response to a physical threat to you or others.</p>
                                <p>The Oz Enterprises does not make your Personal Information available to third parties for their marketing purposes without your consent.</p>
                                <p>How Do We Secure and Retain Your Information?</p>
                                <p>We have put in place technical, physical, and administrative safeguards to protect the Personal Information that we collect.</p>
                                <p>Contact The Oz Enterprises</p>
                                <p>Please send us an email using the Contact Us link at the bottom of every page of our site if you have any questions about this Privacy Policy or the Personal Information we maintain about you.</p>


                                <p>This Privacy Policy applies to Web sites owned and operated by The Oz Enterprises that are intended for use by healthcare providers,  including the mobile optimized versions of these sites and our Mobile Device Applications or "Apps" (we refer to these sites and Apps collectively as the "The Oz Enterprises Web Sites"). </p>
                                <p>References to "The Oz Enterprises" mean The Oz Enterprises, including any company that The Oz Enterprises controls (for example, a subsidiary that The Oz Enterprises owns). The Oz Enterprises may share information among its subsidiaries or web sites that it owns or controls, but information collected under this Privacy Policy is always protected under the terms of this Privacy Policy.</p>
                                <p>Information Collected About You</p>
                                <p>Personal Information</p>
                                <p>If you choose to register or update an existing member profile with The Oz Enterprises or access certain functionality on The Oz Enterprises Web Sites, you may be required to submit Personal Information. "Personal Information" means information that we can use to identify or contact you, such as your name, address, telephone number or email address. Some of our interactive tools and services may request you to submit health information, which would also be considered Personal Information. You are responsible for ensuring the accuracy of the Personal Information that you submit to The Oz Enterprises. Inaccurate information will affect your experience when using The Oz Enterprises Web Sites and tools and our ability to contact you as described in this Privacy Policy.</p>
                                <p>Registration</p>
                                <p>Access to some The Oz Enterprises interactive tools and services may be limited to users who have registered.  You may also be asked to provide authorization for uses of personal information in addition to what is in this Privacy Policy when you use certain tools, such as providing personal information to a sponsor of the tool. The Oz Enterprises will not make any use of your personal information beyond the permitted uses in this Privacy Policy unless you provide such additional consent in connection with the specific tool at the time you submit Personal Information in order to use the tool.   However, The Oz Enterprises does not allow any third parties to place Web Beacons or Cookies or to gather any data about you in connection with your use of The Allergy.  Furthermore, The Oz Enterprises does not use any information that you submit in connection with that tool to deliver any advertisements to you on or off of The Oz Enterprises Web Sites.</p>
                                <p>Market Research</p>
                                <p>From time to time, The Oz Enterprises may conduct online research surveys through email invitations, pop-up surveys and online focus groups. When participating in a survey, we may ask you to enter Personal Information. The Personal Information you submit in a survey may be used by The Oz Enterprises for research and measurement purposes, as described below, including to measure the effectiveness of content, advertising or programs. When our market research surveys collect Personal Information we will not knowingly accept participants who are under the age of 13. Market research surveys conducted by or on behalf of The Oz Enterprises will contain a link to this Privacy Policy.</p>
                                <p>Emails You Send to The Oz Enterprises</p>
                                <p>This Privacy Policy does not apply to information, content, business information, ideas, concepts or inventions that you send to The Oz Enterprises by email. If you want to keep content or business information, ideas, concepts or inventions private or proprietary, do not send them in an email to The Oz Enterprises.</p>
                                <p>Non-Personal Information</p>
                                <p>Even if you do not register with or provide any Personal Information to The Oz Enterprises, we collect Non-Personal Information about your use of The Oz Enterprises Web Sites. "Non-Personal Information" means information that we cannot use to identify or contact you. We may also acquire Non-Personal Information about our users from external sources. While you may use some of the functionality of The Oz Enterprises without registration, many of the specific tools and services on The Oz Enterprises Web Sites require that you register with The Oz Enterprises.</p>
                                <p>Cookies and Web Beacons</p>
                                <p>We collect Non-Personal Information about your use of the The Oz Enterprises Web Sites and your use of other web sites through the use of Cookies and Web Beacons. "Cookies" are small data files that are stored on the hard drive of the computer you use to view a web site. Every computer that accesses the The Oz Enterprises Web Sites is assigned a different Cookie by The Oz Enterprises. "Web Beacons" are graphic image files imbedded in a web page typically used to monitor activity on a web page and send back to its home server (which can belong to the host site, a network advertiser or some other third party) information from your browser, such as the IP address, the URL of the page on which the Web Beacon is located, the type of browser that is accessing the site and the ID number of any Cookies on your computer previously placed by that server.</p>
                                <p>Mobile Device Applications ("Apps") and Mobile Optimized Sites</p>
                                <p>Parts of The Oz Enterprises Software require that you be registered and signed in order to use them. Some of The Oz Enterprises, allow you to use many features without being registered but require that you are signed in as a registered user in order to use the complete version of The Oz Enterprises. The information that we collect through your use of these Apps and tools will be treated as Personal Information under this Privacy Policy.</p>
                                <p>When you download and install  The Oz Enterprises Mobile Apps onto your mobile device we assign a random number to your App installation. This number cannot be used to identify you personally, and we cannot identify you personally unless you choose to become a registered user of the App. We use this random number in a manner similar to our use of Cookies as described in this Privacy Policy. Unlike Cookies, the random number is assigned to your installation of the App itself and not a browser, because the App does not work through your browser. Therefore the random number cannot be removed through settings. If you do not want us to use the random number for the purposes for which we use Cookies, please do not use the Mobile Device Apps. Therefore, if you do not want to be Cookied when you use your mobile device you should not use our Mobile Device Apps and you should set your mobile device to reject Cookies when you use our mobile optimized sites.</p>
                                <p>Our use of Cookies and Web Beacons on our mobile optimized sites are similar to our use on our desktop sites</p>
                                <p>What Choices Do I Have?</p>
                                <p>Updating/Removing Your Personal Information</p>
                                <p>If you do not want your Personal Information used by The Oz Enterprises as provided in this Privacy Policy, you should not register as a member. You can correct, update or review Personal Information you have previously submitted by going back to the application, logging-in and making the desired change. You can also update any Personal Information you have submitted by contacting us using the contact information listed below.</p>
                                <p>If you have registered and desire to delete any of your Personal Information you have provided to us from our systems please contact us using the contact information listed below. Upon your request, we will delete your Personal Information from our active databases and where feasible from our back-up media. You should be aware that it is not technologically possible to remove each and every record of the information you have provided to The Oz Enterprises Web Sites from our servers.</p>
                                <p>Cookies</p>
                                <p>Most browser software can be set to reject Cookies. Most browsers offer instructions on how to reset the browser to reject Cookies in the "Help" section of the toolbar. If you reject our Cookies, certain of the functions and conveniences of The Oz Enterprises Web Sites may not work properly but you do not have to accept our Cookies in order to productively use The Oz Enterprises Web Sites. </p>
                                <p>How Do We Secure and Retain Your Information?</p>
                                <p>We take reasonable security measures to protect the security of your Personal Information. Despite The Oz Enterprises's efforts to protect your Personal Information, there is always some risk that an unauthorized third party may find a way around our security systems or that transmissions of your information over the Internet may be intercepted.</p>
                                <p>The security of your Personal Information is important to us.  When you enter Personal Information (including personal health information in various tools on our website), we encrypt the transmission of that information or use SSL connections (Secure Socket Layer) technology.</p>
                                <p>We will retain your Personal Information as long as your account is active or needed to provide you services. At any time you can remove your Personal Information or instruct us to remove it, but you should be aware that it is not technologically possible to remove each and every record of the information you have provided to The Oz Enterprises from our servers. The Oz Enterprises tools that collect and store Personal Information allow you to correct, update or review information you have submitted by going back to the specific tool, logging-in and making the desired changes. We will also retain your Personal Information as necessary to comply with legal obligations, resolve disputes and enforce our agreements.</p>
                                <p>Contacting The Oz Enterprises About Your Personal Information or Privacy</p>
                                <p>Please send us an email by using the Contact Us link at the bottom of every page of our site if you have any questions about this Privacy Policy or the Personal Information we maintain about you.</p>
                                <p>You can also contact The Oz Enterprises's Privacy Office at:</p>
                                <p>The Oz Enterprises</p>
                                <p>Attn: Office of Privacy</p>
                                <p>8645 N. Military Tr • Suite 405-406</p>
                                <p>Palm Beach Gardens, FL 33418</p>
                                <p>Phone:561-557-1645</p>
                                <p>Changes to This Privacy Policy</p>
                                <p>We reserve the right to change or modify this Privacy Policy or any of our tools or services at any time and any changes will be effective upon being posted unless we advise otherwise. If we make any material changes to this policy we will notify you by email (sent to the email address specified when you register) and/or by means of a notice on this website prior to the change becoming effective. We encourage you to periodically review this website for the latest information on our privacy practices. If you do not accept the terms of this Privacy Policy, we ask that you do not register with us and that you do not use The Oz Enterprises Web Sites. Please exit the The Oz Enterprises Web Sites immediately if you do not agree to the terms of this Privacy Policy.</div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="agreeButton" data-dismiss="modal">I Agree</button>                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main">
                    <div class="login-head">
                        <h1></h1>
                    </div>
                    <div  class="wrap">
                        <div class="Regisration" style="min-height: 430px;">
                            <div class="Regisration-head">
                                <h2 style="font-size: 12px; color: red; white-space: nowrap; text-align: center;">
                                    <?php
                                    if (isset($_REQUEST['error']) && $_REQUEST['error'] != "") {
                                        echo $_REQUEST['error'];
                                    }
                                    ?></h2>
                            </div>
                            <form id="form1" name="form1" method="post" action="auth_login.php">
                                <div class="p-container" style="padding-left: 87px">
                                    <table width="100%"><tr><td>
                                                <input type="text" name="email" placeholder="Email Address" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                            this.value = 'Email Address';
                                                        }" >
                                            </td></tr>
                                        <tr><td>
                                                <input type="password" placeholder="Password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                            this.value = 'Password';
                                                        }" >
                                            </td></tr>
                                    </table>
                                </div>
                                <div class="Remember-me">
                                    <div class="p-container">
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#termsModal">Terms & Conditions</button>
                                        <div class ="clear"></div>
                                    </div>
                                    <div class="p-container" style="padding-left: 90px; width: 90%">
                                        <table width="100%"><tr>
                                                <td style="width: 30px;text-align: right">
                                                    <input id="agree" name="agree" value="yes" type="checkbox">
                                                </td><td>
                                                    <h3 style="color: white;">I agree to the Terms and Conditions</h3>
                                                </td></tr></table>
                                    </div>
                                    <div class="submit" id="submit_div" style="display: none">
                                        <input id="mysubmit" type="submit" value="Log In">
                                        <div class="p-container" style="width: 90%">
                                            <table width="100%"><tr>
                                                    <td style="text-align: right">
                                                        <h3 style="color: white;white-space: nowrap">Remember me</h3>
                                                    </td><td style="float: right">
                                                        <input id="rememberme" name="rememberme" value="yes" type="checkbox">
                                                    </td></tr></table>
                                        </div>
                                    </div>
                                    <div class="clear"> </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include '_includes/_footer.php';
        ?>

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/custom.js"></script>
        <script src="js/jquery.nav.js"></script>

        <script>
                                                    $(document).ready(function () {
                                                        $("#submit_div").hide();
                                                        $("#agree").prop('checked', false);
                                                        $('#nav').onePageNav();

                                                        $("#agreeButton").click(function () {
                                                            $("#agree").prop('checked', true);
                                                            $("#submit_div").show();
                                                        });
                                                        $("#agree").click(function () {
                                                            if (this.checked) {
                                                                $("#submit_div").show();
                                                            } else {
                                                                $("#submit_div").hide();
                                                            }
                                                        });
                                                        $("#mysubmit").click(function () {
                                                            if ($('#agree').is(':checked')) {
                                                                return true;
                                                            } else {
                                                                alert('You must agree to the Terms and Conditions');
                                                                return false;
                                                            }
                                                        });
                                                    });
        </script>
    </body>
</html>
