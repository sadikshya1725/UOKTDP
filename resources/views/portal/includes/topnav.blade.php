    {{-- For Navbar --}}

    <section class="topheader">
        <div class="container">

            <div class="row">
                <div class="col-md-9 top_left">
                    <img src="{{ asset('uploads/sitesetting/' . $sitesetting->main_logo) }}" alt=""
                        class="logo_img">

                        <p class="top_header">
                            {{ __('Government of Bagmati') }} <br>
                            <span class="ministry_name">{{ __('Ministry of Culture, Tourism & Civil Aviation') }}</span><br>
                
                            {{ __('Tourism Development Plan') }}<br>
                            <span class="office_name">{{ __('Unit Office, Kathmandu') }}</span><br>
                            {{ __('Baneshwar, Kathmandu') }}
                        </p>

                </div>



                <div class="col-md-3 top_right">
                    <p class="date_time">
                        <span id="DATE_IN_NEPALI"></span><br>
                        <span id="TIME_IN_NEPALI"></span>

                    </p>
                    <img src="{{ asset('uploads/sitesetting/' . $sitesetting->flag_logo) }}" alt=""
                        class="logo_img">
                    <div class="en_ne">
                        @foreach (config('app.languages') as $langLocale => $langName)
                            <a href="{{ url()->current() }}?change_language={{ $langLocale }}" class="btn_en {{ app()->getLocale() === $langLocale ? 'active' : '' }}">
                                {{ strtoupper($langLocale) }}
                            </a>
                        @endforeach
                    </div>


                 
                </div>
            </div>
    </section>
