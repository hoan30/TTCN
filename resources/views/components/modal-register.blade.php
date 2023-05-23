<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('register') }}" method="post" autocomplete="off">
                @method('post')
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Đăng ký</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Họ và tên</label>
                        <input class="form-control" name="name">
                        @if ($errors->has('name'))
                            <span class="text-danger error-form-auth">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                        @if ($errors->has('email'))
                            <span class="text-danger error-form-auth">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Số điện thoại</label>
                        <input type="phone" class="form-control" name="phone">
                        @if ($errors->has('phone'))
                            <span class="text-danger error-form-auth">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mật khẩu</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        @if ($errors->has('password'))
                            <span class="text-danger error-form-auth">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nhập lại mật khẩu</label>
                        <input type="password" name="password_confirmation" class="form-control"
                            id="exampleInputPassword1">
                        @if ($errors->has('password_confirmation'))
                            <span
                                class="text-danger error-form-auth">{{ $errors->first('password_confirmation') }}</span>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Đăng ký</button>
                </div>
            </form>
        </div>
    </div>
</div>
