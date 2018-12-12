@extends('layouts.app_client')

@section('content')
    <section class="main-container top-space col1-layout">
        <div class="main container">
            <div class="account-login">
                <div class="page-title">
                    <h2>{{ __('message.register_title') }}</h2>
                </div>
                <fieldset class="col2-set">
                    {!! Form::open(['method' => 'post', 'files' => true, 'id' => 'client_user_register']) !!}
                    <div class="col-1 new-users">
                        <strong>{{ __('message.new_customer') }}</strong>
                        <div class="content">
                            <ul class="form-list">
                                <li>
                                    {!! Form::label('email', __('message.email')) !!}
                                    {!! Form::text('email', null, ['class' => 'input-text', 'id' => 'email',
                                     'autocomplete' => 'off', 'placeholder' => 'Email Address']) !!}
                                </li>
                                <li>
                                    {!! Form::label('pass', __('message.password'), []) !!}
                                    {!! Form::password('password', ['class' => 'input-text', 'id' => 'pass',
                                     'placeholder' => 'Password']) !!}
                                </li>
                                <li>
                                    {!! Form::label('re-pass', __('message.re_password')) !!}
                                    {!! Form::password('password', ['class' => 'input-text', 'id' => 're-pass',
                                     'placeholder' => 'Re-Password']) !!}
                                </li>
                                <li>
                                    {!! Form::label('name', __('message.full_name')) !!}
                                    {!! Form::text('name', null, ['class' => 'input-text', 'id' => 'name',
                                     'placeholder' => 'Your name']) !!}
                                </li>
                                <li>
                                    {!! Form::label('address', __('message.address')) !!}
                                    {!! Form::text('address', null, ['class' => 'input-text', 'id' => 'address',
                                     'placeholder' => 'Your Address']) !!}
                                </li>
                                <li>
                                    {!! Form::label('phone', __('message.phone')) !!}
                                    {!! Form::text('phone', null, ['class' => 'input-text', 'id' => 'phone',
                                     'placeholder' => 'Your Phone']) !!}
                                </li>
                            </ul>
                            <div class="buttons-set">
                                <button id="register" name="send" type="submit" class="button login">
                                    <span>{{ __('message.login') }}</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 registered-users">
                        <div class="content">
                            <br>
                            <h4>Avatar</h4>
                            <div class="buttons-set">
                                <div id="" class="img-fluid">
                                    <img id="image_review_create" src="{{ asset('images/default.jpeg') }}"
                                         style="max-height: 350px;max-width: 200px" class="card-img">
                                </div>
                            </div>
                            {!! Form::file('avatar', ['class' => 'd-none', 'id' => 'avatar_client', 'class' => 'form-control-']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </fieldset>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#avatar_client').val('');
            $('#avatar_client').change(function () {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#image_review_create').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });

            $('#register').click(function (event) {
                event.preventDefault();
                $.ajax({
                    url: route('register'),
                    type: 'post',
                    processData: false,
                    contentType: false,
                    dataType: '',
                    data: new FormData($('form#client_user_register')[0]),
                })
                .done(function () {
                    swal("Account is created ! You need to login now !", {icon: "success"})
                    .then((value) => {
                        window.location.href = route('client.login');
                    });
                })
                .fail(function (xhr, status, error) {
                    swal("Something wrong !", {icon: "error"});
                })
            });
        });
    </script>
@endsection