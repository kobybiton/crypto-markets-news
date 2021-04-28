@extends('inner_pages.master')
@section('dinamic_content')

    @section('title')
        <title>Cookie Policy</title>
    @endsection

    <div class="heading-divider">
        <h2>Cookie Policy</h2>
    </div>
    <div class="gdpr_compliance">
        <p class="offset-top-15">To read more - please refer to our <a href="{{ url('/privacy-policy') }}">Privacy Policy </a></p>
        <h4 class="offset-top-45 text-bold text-normal font-accent-2">What are cookies?</h4>
        <p class="offset-top-15">
            Cookies are small text files, created by the website visited, that contain data. They are stored on the visitor’s computer to give the user access to various functions. Both session cookies and non-session cookies are used on this website (the “Site”). A session cookie is temporarily stored in the computer memory while the visitor is browsing the website. This cookie is erased when the user closes their web browser or after a certain time has passed (meaning that the session expires). A non-session cookie remains on the visitor’s computer until it is deleted.
        </p>
        <h4 class="offset-top-45 text-bold text-normal font-accent-2">Why do we use cookies?</h4>
        <p class="offset-top-15">
            We use cookies to learn more about the way visitors interact with our content and help us to improve the experience when visiting our Site.
        </p>
        <h4 class="offset-top-45 text-bold text-normal font-accent-2">Site Functionality</h4>
        <p class="offset-top-15">
            The share function is used by visitors to recommend our site and content on social networks such as Facebook and Twitter. Cookies store information on how visitors use the share function – although not at an individual level – so that the Site can be improved. If you do not accept cookies, no information is stored. For some of the functions within our Site we use third party suppliers, for example, when you visit a page with videos embedded from or links to YouTube. These videos or links (and any other content from third party suppliers) may contain third party cookies and you may wish to consult the policies of these third party websites for information regarding their use of cookies.
        </p>
        <h4 class="offset-top-45 text-bold text-normal font-accent-2">Cookies we use:</h4>
        <p class="offset-top-15">
            This site uses Google Analytics which use cookies. At the aggregate level, cookies store information on how visitors use the site, including the number of pages displayed, where the visitor comes from, and the number of visits, to improve the website and ensure a good user experience. If you do not accept cookies, no information is stored.
        </p>
        <h4 class="offset-top-45 text-bold text-normal font-accent-2">How to reject cookies?</h4>
        <p class="offset-top-15">
            We will not use cookies to collect personally identifiable information about a visitor. However you can choose to reject or block the cookies set by our site by changing your browser settings – see the Help function within your browser for further details. Please note that most browsers automatically accept cookies so if you do not wish cookies to be used, you may need to actively delete or block the cookies. For information on the use of cookies in mobile phone browsers and for details on how to reject or delete such cookies, please refer to your mobile phone manual.
        </p>
        <h4 class="offset-top-45 text-bold text-normal font-accent-2">Request</h4>
        <div class="contact-us">
            <p class="offset-top-15">You may contact our DPO and request to forget you and request any data stored on you via email at</p>
            <a href="mailto:Contact@crypto-markets.news">advertise@crypto-markets.news</a>
        </div>
    </div>

@endsection
