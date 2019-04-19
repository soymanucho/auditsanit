{{ csrf_field() }}


<div class="form-group">
  <label for="name">Nombre: </label>
  <input type="text" name="name" id="name" value="{{ old('name',$status->name)}}"/>
</div>
<div class="form-group">
  <label for="color">Color: </label>
  <input type="color" name="color" id="color" value="{{ old('name',$status->color)}}"/>
</div>
<div class="form-group">
  <label for="isFinal">Es final?:</label>
  SI
  <input type="radio" name="isFinal" id="isFinal" value="1"
  @if (old('isFinal',$status->isFinal))
    checked
  @endif/>
  NO
  <input type="radio" name="isFinal" id="isFinal" value="0"
  @if (!old('isFinal',$status->isFinal))
    checked
  @endif/>
</div>
