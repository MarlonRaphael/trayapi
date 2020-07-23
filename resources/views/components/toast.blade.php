<!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
<script>
  @if(session()->has('info'))
  $.notify({
    icon: "add_alert",
    message: '{!! session('info') !!}'

  }, {
    type: 'info',
    timer: 3000,
    placement: {
      from: bottom,
      align: center
    }
  });
  @endif

  @if(session()->has('success'))
  $.notify({
    icon: "add_alert",
    message: '{!! session('success') !!}'

  }, {
    type: 'success',
    timer: 3000,
    placement: {
      from: bottom,
      align: center
    }
  });
  @endif

  @if(session()->has('error'))
  $.notify({
    icon: "add_alert",
    message: '{!! session('error') !!}'

  }, {
    type: 'error',
    timer: 3000,
    placement: {
      from: bottom,
      align: center
    }
  });
  @endif

  @if(session()->has('warning'))
  $.notify({
    icon: "add_alert",
    message: '{!! session('warning') !!}'

  }, {
    type: 'warning',
    timer: 3000,
    placement: {
      from: bottom,
      align: center
    }
  });
  @endif
</script>