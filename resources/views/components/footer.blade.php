<footer class="page-footer">
    <div class="shell offset-top-60">
        <hr class="divider divider-lg offset-0">
        <div class="range text-center text-lg-left section offset-top-0">
            <div class="cell-sm-preffix-2 cell-sm-8 cell-lg-4 cell-xl-3 cell-lg-preffix-0 cell-lg-push-4">
                <h3 class="text-regular text-italic font-accent">Get latest news delivered daily!</h3>
                <div>
                    <p class="small">Get the hottest news in your inbox</p>
                </div>
                @include('components.delivery_mail')
                <div class="rd-mailform-validate"></div>
            </div>
            @if(count($tags) > 0)
                <div class="cell-sm-preffix-1 cell-sm-10 cell-lg-4 cell-xl-3 cell-lg-preffix-0 offset-top-45 offset-lg-top-0 cell-lg-push-3">
                    <h6 class="text-bold">Tags</h6>
                    <div class="offset-top-20">
                        <ul class="element-groups-sm-custom small text-italic">
                            @foreach($tags as $tag)
                                <li><a class="btn btn-default btn-sm btn-rect text-regular font-accent">{{ $tag->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <div class="cell-xs-6 cell-xl-3 cell-lg-2 offset-top-45 offset-lg-top-0">
                <h6>Categories</h6>
                <ul class="small text-center text-lg-left list-unstyled list text-italic font-accent">
                    <li class="active"><a href="{{ url('/') }}">Home</a></li>
                    @if(count($categories) > 0)
                        @foreach($categories as $category)
                            <li><a href="{{ url($category->url) }}">{{ $category->name }}</a></li>
                        @endforeach
                    @endif
                </ul>
            </div>
            <div class="cell-xs-6 cell-lg-2 cell-xl-3 offset-top-45 offset-lg-top-0">
                <h6>Information</h6>
                <ul class="small text-center text-lg-left list-unstyled list text-italic font-accent">
                    <li><a href="{{ url('/market-cap') }}">Market Cap</a></li>
                    <li><a href="{{ url('/coin-info') }}">Coin Info</a></li>
                    <li><a href="{{ url('/about-us') }}">About Us</a></li>
                    <li><a href="{{ url('/terms-of-service') }}">Terms of Service</a></li>
                    <li><a href="{{ url('/cookie-policy') }}">Cookie Policy</a></li>
                    <li><a href="{{ url('/advertise ') }}">Advertise</a></li>
                    <li><a href="{{ url('/privacy-policy') }}">Privacy policy</a></li>
                </ul>
            </div>
        </div>
        <hr class="divider divider-offset-top-52">
        <div class="range text-left offset-top-36">
            <div class="cell-md-5 cell-md-push-1 text-center text-md-right">
                <div class="sharethis-inline-follow-buttons"></div>
            </div>
            <div class="cell-md-7 text-center text-md-left offset-top-25 offset-md-top-0">
                <div class="brand reveal-md-inline-block"><a class="brand-name" href="./"><img src="{{ asset('images/logo-footer.png') }}" alt="Crypto Markets News"></a></div>
                <hr class="divider divider-offset-top-52">
                <h6>Disclaimer</h6>
                <p class="small">
                    Crypto Markets News provides an information-only service, and does not advise on trading risks, on the merits of any particular purchase of cryptographic tokens or its tax or legal consequences. Opinions found on Crypto Markets News are those of writers quoted. In making the information on Crypto Markets News available, neither Miriam Holdings Ltd. nor anyone on its behalf give any advice or make any recommendation on whether to buy, sell, hold or otherwise deal in any investments including any cryptographic tokens. Any person, at any time, acquiring or contemplating to acquire cryptographic tokens or any other asset for investment, must do so only on the basis of such person’s own judgement of the merits or the suitability of such acquiring for such person’s purpose, and only based on such person’s own independent research, after having taken all such professional and other advice as such person considers necessary or appropriate in the circumstances, and not in reliance on the information contained on Crypto Markets News. To the best of our knowledge, the services provided on Crypto Market News do not require any specific licenses or governmental authority. Any additional services which may be integrated on the website, as well as new regulation or changes in government policies, may be restricted and subject to licensing or other permits.
                </p>
            </div>
        </div>
    </div>
</footer>
