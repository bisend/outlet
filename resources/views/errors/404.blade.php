@extends('layout')

@section('content')
    <!-- CONTENT AREA -->
    <article class="margin-after-header">


        <!-- ERROR PAGE ---------------------------------------------------------------- -->
        <div class="container ptb-70">
            <div class="row">

                <div class="error-section">
                    <div class="error-num">
                        <h2 class="section-title fsz-56"> {{ $model->error }} </h2>
                    </div>
                    <div class="error-text">
                        <p class="fsz-18 font-2">
                            {{ trans('error.page_not_found') }}
                        </p>
                    </div>
                    <div class="error-link">
                        <a href="{{ url_home($model->language) }}"><i class="fa fa-home" aria-hidden="true"></i> {{ trans('error.go_home') }}</a>
                    </div>
                </div>

            </div>
        </div>
        <!-- ERROR PAGE END---------------------------------------------------------------- -->


    </article>
    <!-- / CONTENT AREA -->
@endsection