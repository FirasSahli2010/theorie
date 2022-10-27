@extends('layouts.admin.app')

@section('content')
<!-- <div class="container">
  <div class="row justify-content-center"> -->
    <!-- <div class="col-md-12">--><div class="well">
      <!-- if there are creation errors, they will show here -->
      <form style="margin-right: 0; margin-left: 0; margin-top: 10px;" method="POST"  action="/admin/post/{{ $post->id }}" class="row gy-2 align-items-center" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <fieldset>
          <div style="width: 90%;" class="row">
            <div class="col-12 col-xl-8 col-lg-8 col-md-8">
              <div class="mb-3">
                 <!-- <input type="text" class="uk-input uk-form-large laraberg-sidebar {{ $errors->get('title') ? 'uk-form-danger' : '' }}" name="title_sub" placeholder="Title" value=""> -->
                   <label for="desc" class="control-label">Full text</label>
                 <!-- <textarea id="desc" placeholder="Add desctiption" name="desc" hidden></textarea> -->
                   <!-- <textarea class="form-control" id="desc" name="desc"></textarea> -->
                   <!-- <textarea style="width: 75%; height: 400px; display: none;" class="form-control" id="desc" placeholder="Full text" name="desc">{{ $post-> desc }}</textarea> -->
                   <textarea name="desc" id="editor" style="display: none;">{{ $post-> desc }}</textarea>
               </div>
             </div>
             <div class="col-12 col-xl-2 col-lg-2 col-md-2 gy-3">
               <div class="mb-3">
                   <label for="title" class="form-label">Title</label>
                   <input type="text" placeholder="Title" id="title" name="title"  class=" form-control {{ $errors->has('title') ? 'error' : '' }}" value="{{ $post->title }}" required>
               </div>
                <div class="mb-3">
                    <label for="parent_category" class="col-lg-2 control-label">Parent</label>
                    <select class="form-select" name="parent_category" id="parent_category">
                    @<?php foreach ($data as $item): ?>
                      <option value="{{ $item->id }}"
                        @if ($item->id == $post->category)
                          selected
                        @endif
                        >
                        {{ $item->title }}
                      </option>
                    <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="mb-3" >
                    <label for="lang" class="control-label">Langauge</label>
                    <select class="form-select" name="lang" id="lang">
                      @<?php foreach ($langArray as $lang): ?>
                        <option value="{{ $lang->id }}"
                          @if ($lang->id == $post->language )
                            Selected
                          @endif
                          >
                          {{ $lang->name }}
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="mb-3 gy-3">
                    <div class="col p-2" >
                      <input id="post_image" name="post_image" multiple type="file" class="file" accept="image/*" data-allowed-file-extensions='["csv", "txt"]' data-browse-on-zone-click="true">
                    </div>
                    <div class="col  p-1">
                      <input type="checkbox" value="1" name="deleteImage" id="deleteImage" />
                      <label for="deleteImage" class="control-label"> Delete Image </label>
                    </div>
                    <div class="col">
                      <figure class="figure">
                        <img class="figure-img img-fluid rounded" src="{{ URL::to('/') }}/images/{{ $post->image }}"  />
                        <figcaption class="p-2" style="figure-caption text-align">Current Image</figcaption>
                      </figure>
                    </div>
                  </div>

                </div>
              </div>
            </fieldset>

            <div style="text-align:center; padding-bottom: 3px;" class="align-items-center col-12  col-xl-12 col-lg-12 col-md-12">
              <input class="btn btn-primary" type="submit" name="save" id="save" value="Save">
              @if ($post->shw == 'Y')
                <input class="btn btn-primary" type="submit" name="draft" id="draft" value="Draft">
              @else
                <input class="btn btn-primary" type="submit" name="publish" id="publish" value="Publish">
              @endif
              <input class="btn btn-primary" type="reset" value="Reset">
              <a class="btn btn-primary" href="{{ route('post.index') }}">Cancel</a>
            </div>
      </form>
<script src="{{ asset('assets') }}/build/ckeditor.js"></script>
<script>

ClassicEditor
			.create( document.querySelector( '#editor' ), {

				toolbar: {
					items: [
						'heading',
						'|',
						'bold',
						'italic',
						'link',
						'bulletedList',
						'numberedList',
						'|',
						'outdent',
						'indent',
						'|',
						'imageUpload',
						'blockQuote',
						'insertTable',
						'mediaEmbed',
						'undo',
						'redo',
						'alignment',
						'fontFamily',
						'fontSize',
						'fontBackgroundColor',
						'imageInsert'
					]
				},
				language: 'en',
				image: {
					toolbar: [
						'imageTextAlternative',
						'imageStyle:full',
						'imageStyle:side',
						'linkImage'
					]
				},
				table: {
					contentToolbar: [
						'tableColumn',
						'tableRow',
						'mergeTableCells'
					]
				},
				licenseKey: '70640',


			} )
			.then( editor => {
				window.editor = editor;
			} )
			.catch( error => {
				console.error( 'Oops, something went wrong!' );
				console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
				console.warn( 'Build id: 61qvuzs1f54j-2l8tvt7zkrjw' );
				console.error( error );
			} );
</script>

@endsection
<!--  -->
