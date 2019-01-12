<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $category->id !!}</p>
    <hr>
</div>

<!-- Undefined Field -->
<div class="form-group">
    {!! Form::label('undefined', 'Undefined:') !!}
    <p>{!! $category->undefined !!}</p>
    <hr>
</div>

<!-- Category Field -->
<div class="form-group">
    {!! Form::label('category', 'Category:') !!}
    <p>{!! $category->category !!}</p>
    <hr>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $category->status !!}</p>
    <hr>
</div>

