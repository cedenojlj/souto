@extends('layouts.app')

@section('template_title')
    Create Customer
@endsection

@section('content')
    <section class="content container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Customer</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('customers.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('customer.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
