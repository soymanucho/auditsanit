<div class="box-body">
    <div class="box box-success collapsed-box">
      <div class="box-header with-border">
        <h3 class="box-title">Datos del paciente <strong> {{$audit->expedient->patient->person->name}} {{$audit->expedient->patient->person->surname}}</strong></h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
          </button>
        </div>
      </div>
       <!-- /.box-header -->
      <div class="box-body">
        <form role="form">
          <div class="form-group col-sm-12 col-md-6 col-lg-2">
            <label>DNI</label>
            <input class="form-control input" type="text" value="{{$audit->expedient->patient->person->dni}}" readonly placeholder=".input-lg">
          </div>
          <div class="form-group col-sm-12 col-md-6 col-lg-5">
            <label>Nombre</label>
            <input class="form-control input" type="text" value="{{$audit->expedient->patient->person->name}}" placeholder=".input-lg">
          </div>
          <div class="form-group col-sm-12 col-md-6 col-lg-5">
            <label>Apellido</label>
            <input class="form-control input" type="text" value="{{$audit->expedient->patient->person->surname}}" placeholder=".input-lg">
          </div>
          <div class="form-group col-sm-12 col-md-6 col-lg-3">
            <label>Fecha de nacimiento</label>
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask value="{{$audit->expedient->patient->person->birth_date}}">
            </div>

          </div>
          <div class="form-group col-sm-12 col-md-6 col-lg-2">
            <label>Género</label>
            <select class="form-control select2"  data-placeholder="Seleccioná un genero"
                    style="width: 100%;">
                <option selected="selected">{{$audit->expedient->patient->person->gender->name}}</option>
            </select>
          </div>
        </form>
      </div>
      <div class="box-body">
        <form role="form">
            <div class="form-group col-sm-12 col-md-6 col-lg-3">
              <label>Calle</label>
              <input class="form-control input" type="text" value="{{$audit->expedient->patient->person->address->street}}">
            </div>
            <div class="form-group col-sm-12 col-md-6 col-lg-1">
              <label>Número</label>
              <input class="form-control input" type="text" value="{{$audit->expedient->patient->person->address->number}}">
            </div>
            <div class="form-group col-sm-12 col-md-6 col-lg-1">
              <label>Piso</label>
              <input class="form-control input" type="text" value="{{$audit->expedient->patient->person->address->floor}}">
            </div>
            <div class="form-group col-sm-12 col-md-6 col-lg-4">
             <label>Localidad</label>
             <select class="form-control select2" multiple="multiple" data-placeholder="Seleccioná una localidad"
                     style="width: 100%;">
                 <option selected="selected">{{$audit->expedient->patient->person->address->location->name}}</option>
             </select>
           </div>
            <div class="form-group col-sm-12 col-md-6 col-lg-3">
             <label>Provincia</label>
             <select class="form-control select2" multiple="multiple" data-placeholder="Seleccioná una provincia"
                     style="width: 100%;">
                 <option selected="selected">{{$audit->expedient->patient->person->address->location->province->name}}</option>
             </select>
           </div>
        </form>
      </div>
      <!-- /.box-body -->
    </div>
