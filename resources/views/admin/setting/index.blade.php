@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading main-color-bg">
            <h3 class="panel-title">{{ __('Website Themes and Settings') }}</h3>
          </div>
        </div>
      </div>
      @if( session()->has( 'message' ))
        <div class="col-md-12">
          <div class="alert alert-success">
              {{ session('message') }}
          </div>
        </div>
      @endif
      <div class="col-lg-12 table-responsive" >

        <form style="margin-right: 0; margin-left: 0; margin-top: 10px;" method="POST"  action="/admin/setting/update" class="row gy-2 align-items-center" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <fieldset>
            <div style="width: 90%;" class="mb-3 gy-3 row">
              <div class="col-12 col-md-6 col-lg-6 mb-3 gy-3">
                <div class="form-group">
                  <h3 >Header settings<h3>
                </div>
                <div class="mb-3 ">
                  <div class="input-group">
                    <label for="title_size" class="form-label">Title font size</label>
                    <input style="width: 100px; padding-right: 5px;" type="number" id="title_size" name="title_size" class=" form-control" value="{{ $settingObject->titleSize }}" />
                    <span style="width: 50px;" class="input-group-text">px</span>
                  </div>
                </div>
                <div class="mb-3">
                  <datalist id="presetColors">
                    <option>#000000</option>
                    <option>#FFFFFF</option>
                    <option>#2D2F90</option>
                    <option>#90C643</option>
                  </datalist>
                  <label for="TitleColor" class=" control-label">Title color</label>
                  <input type="color"  id="TitleColor" name="TitleColor" value="{{ $settingObject->siteTitleColor }}" title="Choose your color" list="presetColors">
                </div>
                <div class="mb-3">
                  <datalist id="presetColors">
                    <option>#000000</option>/>
                    <option>#FFFFFF</option>
                    <option>#2D2F90</option>
                    <option>#90C643</option>
                  </datalist>
                  <label for="HeaderTextColor" class=" control-label">Header text color</label>
                  <input type="color" id="HeaderTextColor" name="HeaderTextColor" value="{{ $settingObject->headerTextColor }}" title="Choose your color" list="presetColors">
                </div>
                <div lass="form-group">
                  <h4 class="mb-3">Main menu settings<h2>
                </div>
                <div class="col-lg-12" >
                  <label for="main_menu_size" class=" control-label">main menu font size</label>
                  <div class="input-group">
                    <input type="number" id="main_menu_size" name="main_menu_size" class=" form-control" value="{{$settingObject->MainMenuFontSize}}" />
                    <span class="input-group-text">px</span>
                  </div>
                </div>
                <div class="col-lg-6 " >
                  <datalist id="presetColors">
                    <option>#000000</option>/>
                    <option>#FFFFFF</option>
                    <option>#2D2F90</option>
                    <option>#90C643</option>
                  </datalist>
                    <label for="MainMenuColor" class=" control-label">Main menu text color</label>
                    <input type="color"  id="MainMenuColor" name="MainMenuColor" value="{{$settingObject->MainMenuColor}}" title="Choose your color" list="presetColors">
                </div>
                <div class="col-lg-6" >
                  <datalist id="presetColors">
                    <option>#000000</option>/>
                    <option>#FFFFFF</option>
                    <option>#2D2F90</option>
                    <option>#90C643</option>
                  </datalist>
                    <label for="MainMenuBackgroundColor" class=" control-label">Main menu backgroud color</label>
                    <input type="color"  id="MainMenuBackgroundColor" name="MainMenuBackgroundColor" value="{{$settingObject->MainMenuBackgroundColor}}" title="Choose your color" list="presetColors">
                </div>
              </div>

                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                  <div lass="form-group">
                    <h4 class="mb-3">Menu settings<h2>
                  </div>
                  <div class="col-lg-12" >
                    <label for="menu_title_size" class=" control-label">menu title font size</label>
                    <div class="input-group">
                      <input type="number" id="menu_title_size" name="menu_title_size" class=" form-control" value="{{$settingObject->MenuTitleFontSize}}" />
                      <span class="input-group-text">px</span>
                    </div>
                  </div>
                  <div class="col-lg-6 " >
                    <datalist id="presetColors">
                      <option>#000000</option>/>
                      <option>#FFFFFF</option>
                      <option>#2D2F90</option>
                      <option>#90C643</option>
                    </datalist>
                      <label for="MenuTitleColor" class=" control-label">Menu title text color</label>
                      <input type="color"  id="MenuTitleColor" name="MenuTitleColor" value="{{$settingObject->MenuTitleColor}}" title="Choose your color" list="presetColors">
                  </div>
                  <div class="col-lg-6" >
                    <datalist id="presetColors">
                      <option>#000000</option>/>
                      <option>#FFFFFF</option>
                      <option>#2D2F90</option>
                      <option>#90C643</option>
                    </datalist>
                      <label for="MenuTitleBackgroundColor" class=" control-label">Menu title backgroud color</label>
                      <input type="color"  id="MenuTitleBackgroundColor" name="MenuTitleBackgroundColor" value="{{$settingObject->MenuTitleBackgroundColor}}" title="Choose your color" list="presetColors">
                  </div>
                  <div class="col-lg-12 input-group" >
                      <label for="menu_size" class=" control-label">menu font size</label>
                      <div class="input-group">
                        <input type="number" id="menu_size" name="menu_size" class=" form-control" value="{{$settingObject->MenuFontSize}}" />
                        <div class="input-group-text">px</div>
                      </div>
                  </div>
                    <div class="col-lg-6 " >
                        <label for="MenuColor" class=" control-label">menu text color</label>
                        <input type="color"  id="MenuColor" name="MenuColor" value="{{$settingObject->MenuTextColor}}" title="Choose your color" list="presetColors">
                    </div>
                  <div class="col-lg-6" >
                    <datalist id="presetColors">
                      <option>#000000</option>/>
                      <option>#FFFFFF</option>
                      <option>#2D2F90</option>
                      <option>#90C643</option>
                    </datalist>
                      <label for="MenuTextBackgroundColor" class=" control-label">menu text backgroud color</label>
                      <input type="color"  id="MenuTextBackgroundColor" name="MenuTextBackgroundColor" value="{{$settingObject->MenuBackgroundColor}}" title="Choose your color" list="presetColors">
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                  </div>
                    <div lass="form-group">
                      <h4 class="mb-3">Body settings<h4>
                    </div>
                    <div class="col-lg-12" >
                        <label for="body_title_size" class=" control-label">body title font size</label>
                        <div class="input-group">
                          <input type="number" id="body_title_size" name="body_title_size" class=" form-control" value="{{$settingObject->paragraphTitleSize}}" />
                          <div class="input-group-text">px</div>
                        </div>
                    </div>
                    <div class="col-lg-6" >
                      <datalist id="presetColors">
                        <option>#000000</option>/>
                        <option>#FFFFFF</option>
                        <option>#2D2F90</option>
                        <option>#90C643</option>
                      </datalist>
                      <label for="BodyTitleColor" class=" control-label">Body title text color</label>
                        <input type="color"  id="BodyTitleColor" name="BodyTitleColor" value="{{$settingObject->paragraphTitleColor}}" title="Choose your color" list="presetColors">
                    </div>
                    <div class="col-lg-6 " >
                      <datalist id="presetColors">
                        <option>#000000</option>/>
                        <option>#FFFFFF</option>
                        <option>#2D2F90</option>
                        <option>#90C643</option>
                      </datalist>
                        <label for="BodyTitleBackgroundColor" class=" control-label">Body title backgroud color</label>
                        <input type="color"  id="BodyTitleBackgroundColor" name="BodyTitleBackgroundColor" value="{{$settingObject->paragraphTitleBackgroundColor}}" title="Choose your color" list="presetColors">
                    </div>
                    <div class="col-lg-12 input-group" >
                      <label for="body_size" class=" control-label">body font size</label>
                        <div class="input-group">
                          <input type="number" id="body_size" name="body_size" class=" form-control" value="{{$settingObject->paragraphBodySize}}" />
                          <div class="input-group-text">px</div>
                        </div>
                  </div>
                    <div class="col-lg-6" >
                      <label for="BodyColor" class=" control-label">Body text color</label>
                      <input type="color"  id="BodyColor" name="BodyColor" value="{{$settingObject->paragraphBodyColor}}" title="Choose your color" list="presetColors">
                    </div>
                    <div class="col-lg-6" >
                      <label for="BodyTextBackgroundColor" class=" control-label">Body text backgroud color</label>
                        <input type="color"  id="BodyTextBackgroundColor" name="BodyTextBackgroundColor" value="{{$settingObject->paragraphBodyBackgroudColor}}" title="Choose your color" list="presetColors">
                    </div>
                  </div>
                  <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div lass="form-group">
                      <h4 class="mb-3">Link settings<h4>
                    </div>
                    <div class="col-lg-12" >
                        <label for="link_size" class=" control-label">link text size</label>
                        <div class="input-group">
                          <input type="number" id="link_size" name="link_size" class=" form-control" value="{{$settingObject->LinkTextSize}}" />
                          <div class="input-group-text">px</div>
                        </div>
                    </div>
                    <div class="col-lg-12" >
                      <label for="LinkColor" class=" control-label">link  color</label>
                        <input type="color"  id="LinkColor" name="LinkColor" value="{{$settingObject->linkColor}}" title="Choose your color" list="presetColors">
                    </div>
                    <div class="col-lg-12" >
                        <label for="link_hover_size" class=" control-label">hover link text size</label>
                        <div class="input-group">
                          <input type="number" id="link_hover_size" name="link_hover_size" class=" form-control" value="{{$settingObject->LinkHoverTextSize}}" />
                          <div class="input-group-text">px</div>
                        </div>
                    </div>
                    <div class="col-lg-6" >
                      <label for="LinkHoverColor" class=" control-label">hover link text color</label>
                      <input type="color"  id="LinkHoverColor" name="LinkHoverColor" value="{{$settingObject->hoverLinkColor}}" title="Choose your color" list="presetColors">
                    </div>
                  </div>
            </div>
          </fieldset>
          <div style="text-align: center;" class="form-group">
              <div class="col-lg-12">
                <input class="btn btn-primary" type="submit" name="save" id="save" value="Save">
                <input class="btn btn-primary" type="reset" value="Reset">
                <a class="btn btn-primary" href="{{ route('admin_index') }}">Cancel</a>
              </div>
          </div>
        </form>
      </div>

            </div>
          </div>
@endsection
