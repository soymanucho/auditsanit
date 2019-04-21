{{ csrf_field() }}


<div class="form-group">
  <label for="price">Precio: </label>
  <input type="number"  min="0" step='any' name="price" id="price" value="{{ old('price',$module->price)}}"/>
</div>
