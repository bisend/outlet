@if(false)<html xmlns:v-on="http://www.w3.org/1999/xhtml" xmlns:v-bind="http://www.w3.org/1999/xhtml">@endif

<div class="modal fade default-modal registrModal" id="registrModal" tabindex="-1" role="dialog" aria-labelledby="registrModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('auth.register') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
                <form action="/auth/register" method="post" autocomplete="off">
                    <div class="input-group-default">
                        <label>{{ trans('auth.name') }}:</label>
                        <input type="text" class="input-default" placeholder="{{ trans('auth.name') }}" autocomplete="off"
                               data-register-name
                               v-model="name">
                    </div>
                    <div class="input-group-default">
                        <label>{{ trans('auth.email') }}:</label>
                        <input type="text" class="input-default" placeholder="{{ trans('auth.email') }}" autocomplete="off"
                               data-register-email
                               v-model="email">
                    </div>
                    <div class="input-group-default">
                        <label>{{ trans('auth.password') }}:</label>
                        <input type="password" class="input-default" placeholder="{{ trans('auth.password') }}" autocomplete="off"
                               data-register-password
                               v-model="password">
                    </div>
                    <div class="input-group-default">
                        <label>{{ trans('auth.confirm-password') }}:</label>
                        <input type="password" class="input-default" placeholder="{{ trans('auth.confirm-password') }}" autocomplete="off"
                               data-register-confirm
                               v-model="confirmPassword">
                    </div>
                    <div class="input-group-default">
                       <button type="submit" class="btn"
                               v-on:click.prevent="validateBeforeSubmit()">{{ trans('auth.register-submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>