@if(false)<html xmlns:v-on="http://www.w3.org/1999/xhtml" xmlns:v-bind="http://www.w3.org/1999/xhtml">@endif

<div class="modal fade default-modal socialEmailModal" id="socialEmailModal" tabindex="-1" role="dialog" aria-labelledby="socialEmailModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('auth.social-registration-finish') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
                <form action="/auth/social-email" method="post">
                    <div class="input-group-default">
                        <label>{{ trans('auth.name') }}:</label>
                        <input type="email" class="input-default" placeholder="{{ trans('auth.name') }}" disabled
                               data-social-name-input>
                    </div>
                    <div class="input-group-default">
                        <label>{{ trans('auth.email') }}:</label>
                        <input type="email" class="input-default" placeholder="{{ trans('auth.email') }}"
                               data-social-email-input
                               v-model="email">
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