{{ csrf_field() }}


<div class="form-group">
  <label for="companyName">Nombre</label>
  <input type="text" name="companyName" id="companyName" value="{{ old('companyName',$client->companyName)}}"/>
</div>
