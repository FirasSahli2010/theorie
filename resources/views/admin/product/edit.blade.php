@extends('layouts.admin.app')

@section('content')
<!-- <div class="container">
  <div class="row justify-content-center"> -->
    <!-- <div class="col-md-12">-->
    <div class="well">
      <!-- if there are creation errors, they will show here -->
      <form method="POST" action="/admin/products/{{ $product->id }}" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <fieldset >
          <div style="width: 90%;" class="row">
            <div class="col-12 col-xl-8 col-lg-8 col-md-8">
              <div class="mb-3">
                <label for="summ" class="control-label">Summery</label>
                <textarea style="width: 100%;" id="summ" name="summ" placeholder="" cols="80" rows="5">{{ $product->summery }}</textarea>
              </div>
              <div class="mb-3">
               <label for="desc" class="control-label">Full text</label>
               <textarea id="editor" placeholder="Add desctiption" name="desc">{{ $product->description }}</textarea>
              </div>
            </div>
            <div class="col-12 col-xl-2 col-lg-2 col-md-2">
              <div class="mb-3">
                <label for="name" class="control-label">Name</label>
                <input type="text" value="{{ $product->name }}" placeholder="Product name" id="name" name="name" class=" form-control {{ $errors->has('title') ? 'error' : '' }}" />
              </div>
              <div class="mb-3">
                <label for="title" class="control-label">Price</label>
                <input type="number" value="{{ $product->price }}" placeholder="Price" id="price" name="price" step="0.01" class=" form-control " style="width:100px;" /> USD
              </div>
              {{-- <div class="mb-3">
                <label for="parent_category" class=" control-label">Category</label>
                <select style="width:200px; height: 200px; " class="custom-select" name="parent_category[]" id="parent_category" multiple>
                  @foreach ($data as $item): ?>
                    <option value="{{ $item->id }}" <?PHP echo in_array($item->id, $cat_ids)?' SELECTED ':'' ?>>
                      {{ $item->title }}
                    </option>
                  @endforeach;
                </select>
              </div> --}}
              <div class="mb-3">
                <h3>Category</h3>
                @foreach ($data as $item)
                  <label for="parent_category" class=" control-label">{{ $item->title }} </label>
                  <select style="width:200px; height: 200px; " class="custom-select" name="parent_category[]" id="parent_category" multiple>
                    <option value="0" > ---- </option>
                    <?php
                    $categories = App\Models\product_category::where('parent_category', '=', $item->id)->where('shw', '=', 'Y')->get();
                    foreach ($categories as $category) {
                      ?>
                      <option value="{{ $category->id }}" <?PHP echo in_array($category->id, $cat_ids)?' SELECTED ':'' ?>>
                        {{$category->title}}
                      </option>
                      <?php
                    }
                     ?>
                    </select>
                  @endforeach;
              </div>
              <div class="mb-3">
                <label for="lang" class="control-label">Langauge</label>
                <select style="width:200px; height: 30px; " class="custom-select" name="lang" id="lang">
                  @foreach ($langArray as $lang): ?>
                    <option value="{{ $lang->id }}" <?PHP echo ($product->language_id == $lang->id)?' SELECTED ':'' ?>>
                      {{ $lang->name }}
                    </option>
                  @endforeach;
                </select>
              </div>
              <div class="mb-3 gy-3">

                <div class="col p-2" >
                  <label for="title" class="control-label">Image</label>
                  <input type="file" placeholder="Image" id="image" name="image" class=" form-control " />
                </div>
                <div class="col  p-1">
                  <input type="checkbox" value="1" name="deleteImage" id="deleteImage" />
                  <label for="deleteImage" class="control-label"> Delete Image </label>
                </div>
                <div class="col">
                  <figure class="figure">
                    <img src="{{ URL::to('/') }}/images/{{ $product->image }}" style="width: 200px; " />
                    <figcaption class="p-2" style="figure-caption text-align">Current Image</figcaption>
                  </figure>
                </div>
              </div>
          </div>
         </div>

        </fieldset>

        <div style="text-align:center;" class="align-items-center col-12  col-xl-12 col-lg-12 col-md-12">
          <input class="btn btn-primary" type="submit" name="save" id="saqve" value="Save">
          <input class="btn btn-primary" type="submit" name="publish" id="publish" value="Publish">
          <input class="btn btn-primary" type="reset" value="Reset">
          <a class="btn btn-primary" href="{{ route('products.index') }}">Cancel</a>
        </div>
    </form>
  </div>
  <!-- <script type="text/javascript">
      //   window.addEventListener('DOMContentLoaded', () => {
      //     Laraberg.init('desc', { height: '600px', laravelFileadminr: true, sidebar: true })
      // })
  </script> -->
  <!-- <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js" type="text/javascript"></script> -->
  <!-- <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script> -->
  <script src="{{ asset('assets') }}/build/ckeditor.js"></script>
  <script>
  // CKEDITOR.replace( 'desc', {
  //     //filebrowserUploadUrl: "route('App\Http\Controllers\ImageUploadController\imageUpload')",
  //     filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
  //     filebrowserUploadMethod: 'form'
  // });

  ClassicEditor
  			.create( document.querySelector( '#editor' ), {

  				toolbar: {
  					items: [
              'alignment',
              'fontFamily',
  						'fontSize',
  						'fontBackgroundColor',
              '|',
              'strikethrough',
              'underline',
              'subscript',
              'superscript',
              '|',
  						'heading',
  						'|',
  						'bold',
  						'italic',
  						'link',
  						'bulletedList',
  						'numberedList',
              'todoList',
              '|',
              -'-', // break point
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
  						'imageInsert',
              '|',
              'code',
              'codeBlock', '|',
              'insertTable',
              '|',
              'uploadImage',
              'blockQuote',
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
  // ClassicEditor.editorConfig = function( config )
  // {
  // uiColor: '#14B8C4',
  // config.toolbar = 'Full';
  //
  //   config.toolbar_Full =
  // [
  // { name: 'document', items : [ 'Source','-', 'Save','NewPage','DocProps','Preview','Print','-','Templates', 'Emoticons' ] },//solo Source
  // { name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo', 'clipboard' ] },//BIen
  // { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt', 'TextColor' ] },//Solo SpellChecker
  // { name: 'forms', items : [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', //nada
  //     'HiddenField' ] },
  // '/',
  // { name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },//Todas
  // { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv', 'JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },//Todas hasta Bloquiote
  // { name: 'links', items : [ 'Link','Unlink','Anchor' ] }, //Todas
  // { name: 'insert', items : [ 'Image','Flash','Table','HorizontalRule',"Smiley",'SpecialChar','PageBreak','Iframe' ] }, //Falta flash, smiley, ifame
  // '/',
  // { name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
  // { name: 'colors', items : [ 'TextColor','BGColor' ] }, //ninguno
  // { name: 'tools', items : [ 'Maximize', 'ShowBlocks','-' ] }
  // ];
  //
  // //ToolBar groups configuration
  //                 config.toolbarGroups = [
  //                 { name: 'document', groups: ['mode', 'document', 'doctools']},
  //                 { name: 'clipboard', groups: ['clipboard', 'undo']},
  //                 { name: 'editing', groups: ['find', 'selection', 'spellchecker']},
  //                 { name: 'forms'},
  //                 '/',
  //                 { name: 'basicstyles', groups: ['basicstyles', 'cleanup']},
  //                 { name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi']},
  //                 { name: 'links'},
  //                 { name: 'insert'},
  //                 '/',
  //                 { name: 'styles'},
  //                 { name: 'colors'},
  //                 { name: 'tools'},
  //                 { name: 'others'},
  //                 ];
  // };
  </script>
@endsection
<!--  -->
