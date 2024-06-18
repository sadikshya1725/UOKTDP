@extends('admin.layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">{{ $page_title }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <!-- Contact Form -->
    <form id="contactForm" method="post" action="{{ url('contactus/submit') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
            @error('phone')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" name="message" rows="4" required>{{ old('message') }}</textarea>
            @error('message')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>

        <!-- Add reCAPTCHA field -->
        <div class="form-group">
            <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <!-- Contact Messages Table -->
    <table class="table table-bordered table-hover mt-4">
        <thead>
            <tr>
                <th>S.N.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $contact->name ?? '' }}</td>
                    <td>{{ $contact->email ?? '' }}</td>
                    <td>{{ $contact->phone ?? '' }}</td>
                    <td>{{ $contact->message ?? '' }}</td>
                    <td>
                        <a href="{{ url('Admin/Contactus/Destroy/'.$contact->id) }}">
                            <button type="button" class="btn btn-danger btn-sm">Delete</button>
                        </a>
                        <a href="{{ url('Admin/Contactus/Show/'.$contact->id) }}">
                            <button type="button" class="btn btn-success btn-sm">Show</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<!-- reCAPTCHA initialization -->
<script type="text/javascript">
    // Form submission with reCAPTCHA validation
    document.getElementById("contactForm").addEventListener("submit", function(event) {
        var response = grecaptcha.getResponse();
        if (response.length === 0) { // reCAPTCHA not verified
            event.preventDefault(); // Prevent form submission
            alert("Please tick the reCAPTCHA box before submitting.");
        }
    });
</script>