@extends('layouts.admin-panel')
@section('title','Edit Video')
@section('header_title','Manage Video')
@section('styles')
<style>
    .video-frame {
        border: 1px solid #ddd;
        width: 100%;
        height: 200px;
        line-height: 300px;
        text-align: center;
        background: #eee;
        margin-right: 30px;
        margin-bottom: 30px;
    }
</style>
@endsection

@section('content')
<div class="row ">
    <div class="col-md-12">
        <h4 class="card-title mb-3">Edit Youtube Video</h4>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('admin.video.update',$data->id) }}" class="needs-validation" method="POST" novalidate enctype="multipart/form-data">
            <div class="row mb-3">
                <div class="col-md-4">
                    <div class="card h-auto">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Preview</h5>
                        </div>
                        <div class="card-body">
                            <div id="video-content" class="video-frame">
                                @if(!empty($data->youtube_id))
                                <iframe width="100%" height="250" src="//www.youtube.com/embed/{{$data->youtube_id}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen=""></iframe>
                                @endif
                            </div>

                        </div>
                    </div>


                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="validationTooltip01" class="form-label">Youtube ID / Youtube URL</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="youtube_id" id="youtube_id" value="{{ $data->youtube_id }}" class="form-control  @error('title') is-invalid @enderror">
                                    <button id="preview" class="btn btn-primary" type="button">Preview</button>
                                </div>
                                @error('youtube_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="validationTooltip01" class="form-label">Title</label>
                                <input type="text" name="title" id="title" value="{{ $data->title }}" class="form-control form-control-sm @error('title') is-invalid @enderror" id="validationTooltip01" value="{{ old('post_title') }}" required>
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="invalid-feedback">
                                    The Title is required
                                </div>

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea id="description" class="form-control  form-control-sm @error('description') is-invalid @enderror" name="description"  required> {!! $data->description !!}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="invalid-feedback">
                                    The Content Text is required
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputUsername" class="form-label">Publish</label>
                                <input type="hidden" name="publish" value="0">
                                <input type="checkbox" name="publish" value="1" checked data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="xs" data-width="70">


                            </div>

                        </div>
                    </div>
                </div>


                <div class="pt-2 d-flex">
                    @method('PUT')
                    @csrf
                    <button type="submit" class="btn btn-outline-primary  mx-3">Update</button>
                    <a href="{{ route('admin.video.index') }}" class="btn btn-outline-danger ">Back</a>
                </div>

            </div>

        </form>
    </div>
</div>



@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#preview").click(function() {
            let youtube_id = $('#youtube_id').val();
            let title = $('#title');
            let description = $('#description');
            $('#video-content').html();
            title.val('');
            description.html('');

            $.ajax({
                type: 'POST',
                url: "{{ route('admin.video.preview') }}",
                data: {
                    youtube_id: youtube_id
                },
                dataType: 'json',
                success: function(data) {
                    if (!data.error) {
                        $('#youtube_id').val(data.data.id);
                        $('#title').val(data.data.title);
                        $('#description').val(data.data.description);
                        $('#video-content').html(data.data.iframe);
                    } else {
                        notif('URL / Youtube ID not valid', 'warning');
                    }
                }
            });



        });


    });
</script>
@endsection