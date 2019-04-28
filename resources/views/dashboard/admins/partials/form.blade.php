{{ BsForm::text('name')->maxlength(255) }}
{{ BsForm::email('email')->maxlength(255) }}
{{ BsForm::password('password')->maxlength(255) }}
{{ BsForm::password('password_confirmation')->maxlength(255) }}
<file-uploader
    label="@lang('admins.attributes.avatar')"
    name="avatar"
    max="1"
    id="avatar"
    media="{{ json_encode($admin->getMediaResource()) }}"
></file-uploader>

@slot('footer')
    {{ BsForm::submit()->label(trans('admins.actions.save')) }}
@endslot
