@extends('admin.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $page_title }}</h1>
                        {{-- Add button for creating FAQ --}}
                        <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add new</a>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                            <li class="breadcrumb-item active">FAQs</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->

                @if(session('success'))
                    <div class="alert alert-success">
                        {!! session('success') !!}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {!! session('error') !!}
                    </div>
                @endif

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($faqs as $faq)
                            <tr>
                                <td>{{ $faq->question }}</td>
                                <td>
                                    <div style="display: flex; flex-direction: row;">
                                        <!-- Link to the edit page -->
                                        <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="btn btn-warning">
                                            Update
                                        </a>
                                        <!-- Example delete button (commented out) -->
                                        <a href="{{ url('admin/faqs/delete/'.$faq->id) }}">
                                            <button type="button" class="btn btn-danger">Delete</button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- /.container-fluid -->
        </div><!-- /.content-header -->
    </div><!-- /.content-wrapper -->
@stop
