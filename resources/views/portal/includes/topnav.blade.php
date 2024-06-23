<section class="topheader">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-4 d-flex align-items-center">
                        <img src="{{ asset('uploads/sitesetting/' . $sitesetting->main_logo) }}" alt="" class="logo_img">
                    </div>
                    <div class="col-md-8 d-flex align-items-center justify-content-center">
                        <p class="top_header text-center">
                            {{ __('Bagmati Province Government') }} <br>
                            <span class="ministry_name">{{ __('Ministry of Culture, Tourism & Coperative') }}</span><br>
                            {{ __('Tourism Development Project') }}<br>
                            <span class="office_name">{{ __('Unit Office Kathmandu') }}</span><br>
                            {{ __('New Baneshwar, Nepal') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 top_right">
                <p class="date_time">
                    <span id="DATE_IN_NEPALI" class="inline-date-time"></span>
                    <span id="TIME_IN_NEPALI" class="inline-date-time"></span>
                </p>
                <div class="container">
                    <img src="{{ asset('uploads/sitesetting/' . $sitesetting->flag_logo) }}" alt="" class="logo_img">
                    <div class="language-switcher">
                        @foreach (config('app.languages') as $langLocale => $langName)
                            <a href="{{ url()->current() }}?change_language={{ $langLocale }}" class="btn_en {{ app()->getLocale() === $langLocale ? 'active' : '' }}">
                                {{ strtoupper($langLocale) }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>