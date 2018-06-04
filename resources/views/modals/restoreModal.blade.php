@if(false)<html xmlns:v-on="http://www.w3.org/1999/xhtml" xmlns:v-bind="http://www.w3.org/1999/xhtml">@endif

<div class="modal fade default-modal restoreModal" id="restoreModal" tabindex="-1" role="dialog" aria-labelledby="restoreModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('auth.restore-password') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
                <form action="/auth/restore-password" method="post">
                    <div class="input-group-default">
                        <div class="other-info">
                            <span>{{ trans('auth.restore-password-instruction') }}</span>
                        </div>
                    </div>
                    <div class="input-group-default">
                        <label>{{ trans('auth.email') }}:</label>
                        <input type="email" class="input-default" placeholder="{{ trans('auth.email') }}"
                               data-restore-email-input
                               v-model="email">
                    </div>

                    <div class="input-group-default">
                       <button type="submit" class="btn"
                               v-on:click.prevent="validateBeforeSubmit()">{{ trans('auth.restore-password-submit') }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>