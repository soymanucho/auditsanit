{{ csrf_field() }}


<div class="form-group">
  <label for="name">Nombre</label>
  <input type="text" name="name" id="name" value="{{ old('name',$serviceType->name)}}"/>
</div>

<div class="form-group form-group col-sm-12 col-md-6 col-lg-6">
    <label for="is_transport_service">Es de tipo transporte?:</label>
    <br>
    SI
    <input type="radio" name="is_transport_service" id="is_transport_service" value="1"
    @if (old('is_transport_service',$serviceType->is_transport_service))
      checked
    @endif/>
    NO
    <input type="radio" name="is_transport_service" id="is_transport_service" value="0"
    @if (!old('is_transport_service',$serviceType->is_transport_service))
      checked
    @endif/>


</div>
