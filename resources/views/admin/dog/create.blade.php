@extends('admin.layouts.master')
@section('title','Dogs')
@section('content')

    <h2>Add Dog</h2>
    @include('admin.layouts.flash-msg')
    <form action="{{ route('dog.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="form-group">
            <label for="category">Dog Category</label>
            <select name="category_id" id="category" class="form-control">
                @foreach($dog_category as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label>Photos</label>
            <input type="file" name="photos[]" class="form-control" multiple id="gallery-photo-add">
            <div class="gallery"></div>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" class="form-control" id="price" name="price">
        </div>
        
        <div class="form-group">
            <label for="pwd">Infomation:</label>
            <div class="input-group input-large date-picker input-daterange">
                <div class="col-md-3">
                    <input type="text" class="form-control" id="height" name="height" placeholder="height:centimet">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="weight" name="weight" placeholder="weight:kilogram">
                </div>
                <div class="col-md-3">
                    <div class="input-group input-large date-picker input-daterange">
                        <input value="{{old('birthday')}}" name="birthday" placeholder="birthday" data-toggle="datepicker" data-provide="datepicker" type="text" class="form-control">
                    </div>
                </div>
            </div>
            
        </div>
        <div class="form-group">
            <label for="pwd">Description:</label>
            <input type="text" class="form-control" id="description" name="description">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    $(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img width="140px" height="100px">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#gallery-photo-add').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
});
</script>