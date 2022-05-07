<div class="{{$viewClass['form-group']}}">
    <label class="{{$viewClass['label']}} control-label">{{$label}}</label>
    <div class="{{$viewClass['field']}}">
        @include('admin::form.error')
        <textarea id="{{ $editor_id }}" name="{{ $name}}" placeholder="{{ $placeholder }}" {!! $attributes !!} >{!! $value !!}</textarea>
        @include('admin::form.help-block')
    </div>
</div>

<script init="{!! $selector !!}">
    var options = {{ Js::from($config) }};
    var editor = UE.getEditor('{{ $editor_id }}', options);
</script>

<style>
    .edui-button.edui-for-135editor .edui-button-wrap .edui-button-body .edui-icon{
        background-image: url("//static.135editor.com/img/icons/editor-135-icon.png") !important;
        background-size: 85%;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>