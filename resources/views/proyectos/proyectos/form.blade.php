<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="col-md-4 control-label">{{ 'Nombre' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="nombre" type="text" id="nombre" value="{{ $proyecto->nombre or ''}}" >
        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
    <label for="descripcion" class="col-md-4 control-label">{{ 'Descripcion' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="descripcion" type="textarea" id="descripcion" >{{ $proyecto->descripcion or ''}}</textarea>
        {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('url') ? 'has-error' : ''}}">
    <label for="url" class="col-md-4 control-label">{{ 'Url' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="url" type="text" id="url" value="{{ $proyecto->url or ''}}" >
        {!! $errors->first('url', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('picture_url') ? 'has-error' : ''}}">
    <label for="picture_url" class="col-md-4 control-label">{{ 'Logo del Proyecto' }}</label>
    <div class="col-md-6">
        
        <input class="form-control" name="picture_url" type="file" id="picture_url" value="{{ $proyecto->picture_url or ''}}" >
        {!! $errors->first('picture_url', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('propuesta') ? 'has-error' : ''}}">
    <label for="propuesta" class="col-md-4 control-label">{{ 'Propuesta de proyecto (archivo PDF)' }}</label>
    <div class="col-md-6">
        
        <input class="form-control" name="propuesta" type="file" id="propuesta" value="{{ $proyecto->propuesta or ''}}" >
        {!! $errors->first('propuesta', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
