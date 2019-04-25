@if(session('success'))
<div class="col-md-4 offset-md-4">
  <div class="alert alert-success">
    <strong>Success!</strong> {{session('success')}}.
  </div>
</div>
@endif