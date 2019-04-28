@bsMultilangualFormTabs
{{ BsForm::text('name')->maxlength(255) }}
@endBsMultilangualFormTabs

@slot('footer')
    {{ BsForm::submit()->label(trans('categories.actions.save')) }}
@endslot
