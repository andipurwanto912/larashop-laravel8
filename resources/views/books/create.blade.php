@extends('layouts.global')

@section('footer-scripts')
<link
    href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script>
    $('#categories').select2({
        ajax: {
        url: 'http://larashop.test/ajax/categories/search', processResults: function(data){

            return {
                results: data.map(function(item){return {id: item.id, text:item.name} })
            }
        }
    }
});
</script>
@endsection

@section('title') Create book @endsection

@section('content')

    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif

    <div class="row">
        <div class="col-md-8">
            <form
                action="{{route('books.store')}}"
                method="POST"
                enctype="multipart/form-data"
                class="shadow-sm p-3 bg-white">

                @csrf

                <label for="title">Title</label>
                <br>
                <input
                    type="text"
                    class="form-control"
                    name="title"
                    placeholder="book title">
                <br>

                <label for="cover">Cover</label>
                <input
                    type="file"
                    class="form-control"
                    name="cover">
                <br>

                <label for="description">Description</label>
                <br>
                <textarea
                    name="description"
                    id="description"
                    class="form-control"
                    placeholder="Give a description about this book">
                </textarea>

                <label for="categories">Categories</label>
                <br>
                <select
                    name="categories[]"
                    multiple
                    id="categories"
                    class="form-control">
                </select>
                <br>
                <br>

                <label for="stock">Stock</label>
                <input
                    name="stock"
                    type="number"
                    id="stock"
                    min="0"
                    value="0"
                    class="form-control">
                <br>

                <label for="author">Author</label><br>
                <input
                    type="text"
                    name="author"
                    id="author"
                    class="form-control"
                    placeholder="book author">
                <br>

                <label for="publisher">Publisher</label> <br>
                <input
                    type="text"
                    class="form-control"
                    id="publisher"
                    name="publisher"
                    placeholder="Book publisher">
                <br>

                <label for="Price">Price</label><br>
                <input
                    type="number"
                    name="price"
                    id="price"
                    class="form-control"
                    placeholder="book price">
                <br>

                <button
                    class="btn btn-primary btn-sm"
                    name="save_action"
                    value="PUBLISH">Publish
                </button>

                <button
                    class="btn btn-secondary btn-sm"
                    name="save_action"
                    value="DRAFT">Save as Draft
                </button>

                <a
                    href="{{route('books.index')}}"
                    class="btn text-white btn-danger btn-sm">Back</a>
            </form>
        </div>
    </div>

@endsection
