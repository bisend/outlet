<div class="modal fade default-modal loginModal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Вхід</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="input-group-default">
                        <label>Електрона адреса :</label>
                        <input type="text" class="input-default" placeholder="Електрона адреса">
                    </div>
                    <div class="input-group-default">
                        <label>Пароль :</label>
                        <input type="password" class="input-default" placeholder="Пароль">
                    </div>
                    <div class="input-group-default">
                        <div class="add-prod-check">
                            <input type="checkbox" id="saveLogin" name="check" value="">
                            <label for="saveLogin">
                                <span></span>Запам'ятати мене?
                            </label>
                        </div>
                    </div>
                    <div class="input-group-default">
                       <button type="submit" class="btn">Увійти</button>
                    </div>
                </form>
                <div class="other-info">
                    {{--<span><a href="javascript:void(0);">Відновити пароль</a></span>--}}
                    <span>Забули пароль?
                        <a href="javascript:void(0);" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#restoreModal">
                            Відновити пароль
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>