<div class="container">
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
        	<button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
        </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
        	<button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
        </div>
    @endif


    @if ($errors->any())
    <ul class="alert alert-danger alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>
     	@foreach ($errors->all() as $error)
    		  <li>{{$error}}</li>
          @endforeach
      </ul>
    @endif

  <!-- Display ajax response messages -->
  <div class="ajax-messages">
    <div id="form-messages" class="alert alert-success alert-block" style="display: none;">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong></strong>
      </div>
  </div>
  <!-- Display ajax response messages -->
  <div id="form-messages" class="alert alert-danger alert-block" style="display: none;">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong></strong>
    </div>
  <!-- Display ajax response messages -->
  <div id="form-messages" class="alert alert-danger alert-block" style="display: none;">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong></strong>
    </div>
  <!-- Display ajax response messages -->
  <div id="form-messages" class="alert alert-danger alert-block" style="display: none;">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong></strong>
    </div>
</div>
