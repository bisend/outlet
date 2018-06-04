@if(false)<html xmlns:v-on="http://www.w3.org/1999/xhtml" xmlns:v-bind="http://www.w3.org/1999/xhtml">@endif

<div class="modal fade default-modal loginModal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('auth.login') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
                <form action="/auth/login" method="post">
                    <div class="input-group-default">
                        <label>{{ trans('auth.email') }}:</label>
                        <input type="text" class="input-default" placeholder="{{ trans('auth.email') }}"
                               data-login-email
                               v-model="email">
                    </div>
                    <div class="input-group-default">
                        <label>{{ trans('auth.password') }}:</label>
                        <input type="password" class="input-default" placeholder="{{ trans('auth.password') }}"
                               data-login-password
                               v-model="password">
                    </div>
                    <div class="input-group-default">
                        <div class="add-prod-check">
                            <input type="checkbox" id="saveLogin" name="check"
                                   v-model="rememberMe">
                            <label for="saveLogin">
                                <span></span>{{ trans('auth.remember-me') }}
                            </label>
                        </div>
                    </div>
                    <div class="input-group-default">
                       <button type="submit" class="btn"
                               v-on:click.prevent="validateBeforeSubmit()">{{ trans('auth.login-submit') }}</button>
                    </div>
                </form>
                <div class="other-info login-restore-password">
                    {{--<span><a href="javascript:void(0);">Відновити пароль</a></span>--}}
                    <span>{{ trans('auth.forgot-password') }}
                        <a href="javascript:void(0);" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#restoreModal">
                            {{ trans('auth.restore-password-link') }}
                        </a>
                    </span>
                </div>
                <div class="input-group-default social-login-box">
                    <a class="btn-google-login" href="{{ route('google-login', ['language' => get_url_language($model->language)]) }}">Google+</a>
                    <a class="btn-facebook-login" href="{{ route('facebook-login', ['language' => get_url_language($model->language)]) }}">Facebook</a>
                </div>
            </div>
        </div>
    </div>
</div>