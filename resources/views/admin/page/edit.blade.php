@extends('layouts.admin.app')

@section('content')
<!-- <div class="container">
  <div class="row justify-content-center"> -->
    <!-- <div class="col-md-12">--><div class="well">
      <!-- if there are creation errors, they will show here -->
      <form method="POST"  action="/manage/page/{{ $page->id }}" class="form-horizontal">
        @csrf
        @method('PUT')
        <fieldset >
          <div style="width: 90%;" class="row">
            <div class="col-12 col-xl-8 col-lg-8 col-md-8">
              <div class="mb-3">
                <label for="desc" class="control-label">Full text</label>
                <textarea id="editor" placeholder="Add desctiption" name="desc">{{ $page->lb_raw_content }}</textarea>
                <!-- <textarea id="desc" placeholder="Add desctiption" name="desc" hidden></textarea> -->
              </div>
            </div>
            <div class="col-12 col-xl-2 col-lg-2 col-md-2">
              <div class="mb-3">
                <label for="title" class="control-label">Title</label>
                <input type="text" placeholder="Title" value="{{ $page->title }}" id="title" name="title" class=" form-control {{ $errors->has('title') ? 'error' : '' }}" />
              </div>
              <div class="mb-3">
                <label for="parent_category" class="control-label">Parent</label>
                <select style="width:200px; height: 30px; " class="custom-select" name="parent_category" id="parent_category">
                  @foreach ($data as $item): ?>
                    <option value="{{ $item->id }}"
                      @if ($item->id == $page->category)
                        selected
                      @endif
                      >
                      {{ $item->title }}
                    </option>
                  @endforeach;
                </select>
              </div>
              <div class="mb-3">
                <label for="lang" class="control-label">Langauge</label>
                <select style="width:200px; height: 30px; " class="custom-select" name="lang" id="lang">
                  @foreach ($langArray as $lang): ?>
                    <option value="{{ $lang->id }}"
                      @if ($lang->id == $page->language )
                        Selected
                      @endif
                      >
                      {{ $lang->name }}
                    </option>
                  @endforeach;
                </select>
              </div>
             </div>
           </div>
        </fieldset>

        <div style="text-align:center;" class="align-items-center col-12  col-xl-12 col-lg-12 col-md-12">
              <input class="btn btn-primary" type="submit" name="save" id="save" value="Save">
              @if ($page->shw == 'Y')
                <input class="btn btn-primary" type="submit" name="draft" id="draft" value="Draft">
              @else
                <input class="btn btn-primary" type="submit" name="publish" id="publish" value="Publish">
              @endif
              <input class="btn btn-primary" type="reset" value="Reset">
              <a class="btn btn-primary" href="{{ route('page.index') }}">Cancel</a>
            </div>
        </div>
      </form>
    <!-- </div>
  </div> -->
</div>
<!-- <script type="text/javascript">
    //   window.addEventListener('DOMContentLoaded', () => {
    //     Laraberg.init('desc', { height: '600px', laravelFilemanager: true, sidebar: true })
    // })
</script> -->

<script src="{{ asset('assets') }}/build/ckeditor.js"></script>
<script>

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
