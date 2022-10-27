@extends('layouts.admin.app')

@section('content')
<!-- <div class="container">
-->

    <!-- <div class="col-md-12">-->
    <!--<div class="well"> -->
      <!-- if there are creation errors, they will show here -->
      <form style="margin-right: 0; margin-left: 0; margin-top: 10px;" method="POST" action="/admin/post" class="row gy-2 align-items-center" enctype="multipart/form-data">
        @csrf
         <fieldset >
           <div style="width: 90%;" class="row">
             <div class="col-12 col-xl-8 col-lg-8 col-md-8">
               <div class="mb-3">
                  <!-- <input type="text" class="uk-input uk-form-large laraberg-sidebar {{ $errors->get('title') ? 'uk-form-danger' : '' }}" name="title_sub" placeholder="Title" value=""> -->
                    <label for="desc" class="control-label">Full text</label>
                  <!-- <textarea id="desc" placeholder="Add desctiption" name="desc" hidden></textarea> -->
                    <!-- <textarea class="form-control" id="desc" name="desc"></textarea> -->
                    <!-- <textarea style="width: 75%; height: 400px; display: none;" class="form-control" id="desc" placeholder="Full text" name="desc"></textarea> -->
                    <textarea name="desc" id="editor"></textarea>
                    <!-- <div class="centered">
                			<div class="row row-editor">
                				<div class="desc">
                        </div>
                      </div>
                    </div> -->
                </div>
              </div>
              <div class="col-12 col-xl-2 col-lg-2 col-md-2">
              <!--  <div class="col-lg-4"> -->
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" placeholder="Title" id="title" name="title"  class=" form-control " value="" required>
                </div>
                <div class="mb-3">
                    <label for="parent_category" class="col-lg-2 control-label">Parent</label>
                    <select class="form-select" name="parent_category" id="parent_category">
                      @foreach ($data as $item): ?>
                        <option value="{{ $item->id }}">
                          {{ $item->title }}
                        </option>
                      @endforeach;
                    </select>
                </div>
                <div class="mb-3">
                  <label for="lang" class="control-label">Langauge</label>
                  <select class="form-select" name="lang" id="lang">
                    @foreach ($langArray as $lang): ?>
                      <option value="{{ $lang->id }}">
                        {{ $lang->name }}
                      </option>
                    @endforeach;
                  </select>
                </div>
                <div class="file-loading">
                    <input id="post_image" name="post_image" multiple type="file" class="file" accept="image/*" data-allowed-file-extensions='["csv", "txt"]' data-browse-on-zone-click="true">
                </div>
              </div>
            </div>
        </fieldset>

        <div style="text-align:center;" class="align-items-center col-12  col-xl-12 col-lg-12 col-md-12">
                <input class="btn btn-primary" type="submit" name="save" id="save" value="Save">
                <input class="btn btn-primary" type="submit" name="publish" id="publish" value="Publish">
                <input class="btn btn-primary" type="reset" value="Reset">
                <a class="btn btn-primary" href="{{ route('post.index') }}">Cancel</a>
            </div>
      </form>
    <!-- </div>
  </div> -->

<!-- <script type="text/javascript">
    //   window.addEventListener('DOMContentLoaded', () => {
    //     Laraberg.init('desc', { height: '600px', laravelFilemanager: true, sidebar: true })
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
