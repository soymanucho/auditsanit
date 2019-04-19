{{ csrf_field() }}


<div class="form-group">
  <label for="name">Nombre</label>
  <input type="text" name="name" id="name" value="{{ old('name',$diagnosisType->name)}}"/>
</div>

<div class="form-group">
  <label for="code">Codigo</label>
  <input type="text" name="code" id="code" value="{{ old('code',$diagnosisType->code)}}"/>
</div>
