<!-- Very little is needed to make a happy life. - Marcus Antoninus -->
<div class="alert alert-{{ $type }} {{ $isDismissible($value) ? 'alert-dismissible' : '' }} {{ isset($icon) ? 'alert-has-icon' : '' }}">
  @if(isset($icon))
    <div class="alert-icon"><i class="{{ $icon }}"></i></div>
  @endif
  <div class="alert-body">
    @if($isDismissible)
      <button class="close" data-dismiss="alert"><span>&times;</span></button>
    @endif
    <div class="alert-title">{{ $title }}</div>
    {{ $message }}
  </div>
</div>