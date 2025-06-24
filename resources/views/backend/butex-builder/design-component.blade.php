@extends('backend.layouts.app')
@section('content')

<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">

<style>

.color-inputs {
    margin-bottom: 20px;
}

label {
    margin-right: 0px;
    font-size: 14px;
}

.gradient-box {
    width: 100%;
    height: 200px;
}

.controls {
    margin-bottom: 20px;
}


input[type="range"],
input[type="color"] {
    display: block;
    margin: 10px auto;
    width: 90%;
}

#borderRadiusValue,
#borderWidthValue {
    font-weight: bold;
}

</style>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        {{-- <h1 class="m-0 text-dark">Manage Banner</h1> --}}
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('butex_builder')}}">Butex Builder</a></li>
          <li class="breadcrumb-item active">Design Component</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        
        <form method="post" action="{{ route('store.designComponent') }}">
          @csrf
          <div class="card card-outline card-primary">
            <div class="card-header">
              <div class="d-flex">
                <div class="flex-grow-1">
                  <h5 class="text-effect"><i class="nav-icon ion-settings"></i> Design Column {{ @$data->column_id }}</h5>
                </div>
                <div class="">
                  <button type="submit" role="button" class="btn btn-success" id="submitBtn">Update</button>
                  <a href="{{ url('site-settings/butex_builder', ['id' => $page_id, 'tab_id' => $page_tab_id]) }}">
                    <button type="button" class="btn btn-danger" role="button">Back</button>
                  </a>
                </div>
              </div>
            </div>
            
            <div class="card-body">
              <div class="">
                      <div class="">
                            <input type="hidden" name="action" class="action" id="action" value="update">
                            <input type="hidden" name="id" class="id" id="id" value="{{ @$data->id }}">

                            <div class="row">
                              <div class="col-sm-6">
                                <div class="p-3 mb-3 custom-shadow design-card rounded">
                                  <div class="row">
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label class="mt-2">Layout</label>  
                                        <select name="layout" id="layout" class="form-control form-control-sm layout">
                                          <option value="" @if (@$custom_class['layout'] == '') selected @endif>Full Width</option>
                                          <option value="container" @if (@$custom_class['layout'] == 'container') selected @endif>Container</option>
                                          <option value="container-fluid" @if (@$custom_class['layout'] == 'container-fluid') selected @endif>Container Fluid</option>
                                          <option value="container-sm" @if (@$custom_class['layout'] == 'container-sm') selected @endif>Small Container</option>
                                          <option value="container-md" @if (@$custom_class['layout'] == 'container-md') selected @endif>Medium Container</option>
                                          <option value="container-lg" @if (@$custom_class['layout'] == 'container-lg') selected @endif>Learge Container</option>
                                          <option value="container-xl" @if (@$custom_class['layout'] == 'container-xl') selected @endif>Extra Learge Container</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label class="mt-2">Fade Animation</label>  
                                        <select name="fade" id="fade" class="form-control form-control-sm">
                                          <option value="" @if (@$custom_class['fade'] == '') selected @endif>None</option>
                                          <option value="fade" @if (@$custom_class['fade'] == 'fade') selected @endif>Fade</option>
                                          <option value="fade-up" @if (@$custom_class['fade'] == 'fade-up') selected @endif>Fade Up</option>
                                          <option value="fade-down" @if (@$custom_class['fade'] == 'fade-down') selected @endif>Fade Down</option>
                                          <option value="fade-left" @if (@$custom_class['fade'] == 'fade-left') selected @endif>Fade Left</option>
                                          <option value="fade-right" @if (@$custom_class['fade'] == 'fade-right') selected @endif>Fade Right</option>
                                          <option value="fade-up-right" @if (@$custom_class['fade'] == 'fade-up-right') selected @endif>Fade Up Right</option>
                                          <option value="fade-up-left" @if (@$custom_class['fade'] == 'fade-up-left') selected @endif>Fade Up Left</option>
                                          <option value="fade-down-right" @if (@$custom_class['fade'] == 'fade-down-right') selected @endif>Fade Down Right</option>
                                          <option value="fade-down-left" @if (@$custom_class['fade'] == 'fade-down-left') selected @endif>Fade Down Left</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-sm-6">
                                <div class="p-3 mb-3 custom-shadow design-card rounded">
                                  <label class="mt-2">Section Padding</label>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <label class="">Top (<span id="paddingTopValue">px</span>)</label>
                                      <input type="number" id="paddingTop" name="paddingTop" oninput="updateDesign()" value="{{ @$custom_style['paddingTop'] }}" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-sm-3">
                                      <label class="">Right (<span id="paddingRightValue">px</span>)</label>
                                      <input type="number" id="paddingRight" name="paddingRight" oninput="updateDesign()" value="{{ @$custom_style['paddingRight'] }}" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-sm-3">
                                      <label class="">Bottom (<span id="paddingBottomValue">px</span>)</label>
                                      <input type="number" id="paddingBottom" name="paddingBottom" oninput="updateDesign()" value="{{ @$custom_style['paddingBottom'] }}" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-sm-3">
                                      <label class="">Left (<span id="paddingLeftValue">px</span>)</label>
                                      <input type="number" id="paddingLeft" name="paddingLeft" oninput="updateDesign()" value="{{ @$custom_style['paddingLeft'] }}" class="form-control form-control-sm">             
                                    </div>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="col-sm-6">
                                <div class="p-3 mb-3 custom-shadow design-card rounded mb-2">
                                  <div class="form-group">
                                    <label class="mt-2">Component Shadow (px)</label>  
                                    <div class="row">
                                      <div class="col-sm-3">
                                        <label class="">Offset-x</label>  
                                        <input type="number" id="offset_x" name="offset_x" oninput="updateDesign()" value="{{ @$custom_style['offset_x'] }}" class="form-control form-control-sm">
                                      </div>
                                      <div class="col-sm-3">
                                        <label class="">Offset-y</label>  
                                        <input type="number" id="offset_y" name="offset_y" oninput="updateDesign()" value="{{ @$custom_style['offset_y'] }}" class="form-control form-control-sm">
                                      </div>
                                      <div class="col-sm-3">
                                        <label class="">Blur Radius</label>  
                                        <input type="number" id="blur_radius" name="blur_radius" oninput="updateDesign()" value="{{ @$custom_style['blur_radius'] }}" class="form-control form-control-sm">
                                      </div>
                                      <div class="col-sm-3">
                                        <label class="">Color</label>
                                        <input type="color" id="shadow_color" name="shadow_color" onchange="updateDesign()" value="{{ @$custom_style['shadow_color'] ?? '' }}" class="form-control form-control-sm" style="margin-top: -1px;">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>


                              <div class="col-sm-6">
                                <div class="p-3 mb-3 custom-shadow design-card rounded">
                                  <label class="mt-2">Section Margin</label>  
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <label class="">Top (<span id="marginTopValue">px</span>)</label>  
                                      <input type="number" id="marginTop" name="marginTop" oninput="updateDesign()" value="{{ @$custom_style['marginTop'] ?? '' }}" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-sm-3">
                                      <label class="">Right (<span id="marginRightValue">px</span>)</label>  
                                      <input type="number" id="marginRight" name="marginRight" oninput="updateDesign()" value="{{ @$custom_style['marginRight'] ?? '' }}" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-sm-3">
                                      <label class="">Bottom (<span id="marginBottomValue">px</span>)</label>  
                                      <input type="number" id="marginBottom" name="marginBottom" oninput="updateDesign()" value="{{ @$custom_style['marginBottom'] ?? '' }}" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-sm-3">
                                      <label class="">Left (<span id="marginLeftValue">px</span>)</label>  
                                      <input type="number" id="marginLeft" name="marginLeft" oninput="updateDesign()" value="{{ @$custom_style['marginLeft'] ?? '' }}" class="form-control form-control-sm">
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-sm-6">
                                  <div class="p-3 mb-3 custom-shadow design-card rounded mb-2">
                                    <div class="form-group">
                                      <label class="mt-2">Text Shadow (px)</label>  
                                      <div class="row">
                                        <div class="col-sm-3">
                                          <label class="">Offset-x</label>  
                                          <input type="number" id="text_offset_x" name="text_offset_x" onchange="updateTextShadow()" value="{{ @$custom_style['text_offset_x'] }}" class="form-control form-control-sm">
                                        </div>
                                        <div class="col-sm-3">
                                          <label class="">Offset-y</label>  
                                          <input type="number" id="text_offset_y" name="text_offset_y" onchange="updateTextShadow()" value="{{ @$custom_style['text_offset_y'] }}" class="form-control form-control-sm">
                                        </div>
                                        <div class="col-sm-3">
                                          <label class="">Blur Radius</label>  
                                          <input type="number" id="text_blur_radius" name="text_blur_radius" onchange="updateTextShadow()" value="{{ @$custom_style['text_blur_radius'] }}" class="form-control form-control-sm">
                                        </div>
                                        <div class="col-sm-3">
                                          <label class="">Color</label>
                                          <input type="color" id="text_shadow_color" name="text_shadow_color" onchange="updateTextShadow()" value="{{ @$custom_style['text_shadow_color'] ?? '' }}" class="form-control form-control-sm" style="margin-top: -1px;">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                              </div>

                              <div class="col-sm-6">
                                  <div class="p-3 mb-3 custom-shadow design-card rounded mb-2">
                                    <div class="form-group">
                                      <p id="sample-text" style="color: {{ @$custom_style['text_color'] ?? 'black' }}; font-family: {{ @$custom_style['font_family'] ?? 'inherit' }}; text-align: {{ @$custom_style['text_alignment'] ?? 'left' }}; text-shadow: {{ @$custom_style['text_offset_x'] }}px {{ @$custom_style['text_offset_y'] }}px {{ @$custom_style['text_blur_radius'] }}px {{ @$custom_style['text_shadow_color'] }}">This is a sample text to demonstrate font changes.</p>
                                      <div class="row">
                                        <div class="col-sm-4">
                                          <label class="">Text Color</label>  
                                          <input type="color" id="text_color" name="text_color" oninput="updateFont()" value="{{ @$custom_style['text_color'] }}" class="form-control form-control-sm" style="margin-top: -1px;">
                                        </div>
                                        <div class="col-sm-4">
                                          <label class="">Text Font</label>  
                                          <select id="font_family" name="font_family" class="form-control form-control-sm" onchange="updateFont()">
                                              <option value="" @if (@$custom_style['font_family'] == '') selected @endif>None</option>
                                              <option value="inherit" @if (@$custom_style['font_family'] == 'inherit') selected @endif>Inherit</option>
                                              <option value="Poppins" @if (@$custom_style['font_family'] == 'Poppins') selected @endif>Poppins</option>
                                              <option value="Roboto" @if (@$custom_style['font_family'] == 'Roboto') selected @endif>Roboto</option>
                                              <option value="Open Sans" @if (@$custom_style['font_family'] == 'Open Sans') selected @endif>Open Sans</option>               
                                              <option value="Lato" @if (@$custom_style['font_family'] == 'Lato') selected @endif>Lato</option>
                                              <option value="Montserrat" @if (@$custom_style['font_family'] == 'Montserrat') selected @endif>Montserrat</option>
                                              <option value="Akzidenz Grotesk BQ Medium" @if (@$custom_style['font_family'] == 'Akzidenz Grotesk BQ Medium') selected @endif>Akzidenz Grotesk BQ Medium</option>
                                              <option value="Noto Sans" @if (@$custom_style['font_family'] == 'Noto Sans') selected @endif>Noto Sans</option>
                                              <option value="Helvetica Neue" @if (@$custom_style['font_family'] == 'Helvetica Neue') selected @endif>Helvetica Neue</option>
                                              <option value="Oswald" @if (@$custom_style['font_family'] == 'Oswald') selected @endif>Oswald</option>
                                              <option value="Arial" @if (@$custom_style['font_family'] == 'Arial') selected @endif>Arial</option>
                                              <option value="Verdana" @if (@$custom_style['font_family'] == 'Verdana') selected @endif>Verdana</option>
                                              <option value="Helvetica" @if (@$custom_style['font_family'] == 'Helvetica') selected @endif>Helvetica</option>
                                              <option value="Times New Roman" @if (@$custom_style['font_family'] == 'Times New Roman') selected @endif>Times New Roman</option>
                                              <option value="Georgia" @if (@$custom_style['font_family'] == 'Georgia') selected @endif>Georgia</option>
                                              <option value="Courier New" @if (@$custom_style['font_family'] == 'Courier New') selected @endif>Courier New</option>
                                              <option value="Trebuchet MS" @if (@$custom_style['font_family'] == 'Trebuchet MS') selected @endif>Trebuchet MS</option>
                                              <option value="Impact" @if (@$custom_style['font_family'] == 'Impact') selected @endif>Impact</option>
                                              <option value="Comic Sans MS" @if (@$custom_style['font_family'] == 'Comic Sans MS') selected @endif>Comic Sans MS</option>
                                              <option value="Lucida Console" @if (@$custom_style['font_family'] == 'Lucida Console') selected @endif>Lucida Console</option>
                                              <option value="Palatino Linotype" @if (@$custom_style['font_family'] == 'Palatino Linotype') selected @endif>Palatino Linotype</option>
                                              <option value="Tahoma" @if (@$custom_style['font_family'] == 'Tahoma') selected @endif>Tahoma</option>
                                              <option value="Geneva" @if (@$custom_style['font_family'] == 'Geneva') selected @endif>Geneva</option>
                                              <option value="Garamond" @if (@$custom_style['font_family'] == 'Garamond') selected @endif>Garamond</option>
                                              <option value="Bookman" @if (@$custom_style['font_family'] == 'Bookman') selected @endif>Bookman</option>
                                              <option value="Candara" @if (@$custom_style['font_family'] == 'Candara') selected @endif>Candara</option>
                                              <option value="Arial Black" @if (@$custom_style['font_family'] == 'Arial Black') selected @endif>Arial Black</option>
                                              <option value="MS Sans Serif" @if (@$custom_style['font_family'] == 'MS Sans Serif') selected @endif>MS Sans Serif</option>
                                              <option value="MS Serif" @if (@$custom_style['font_family'] == 'MS Serif') selected @endif>MS Serif</option>
                                              <option value="New York" @if (@$custom_style['font_family'] == 'New York') selected @endif>New York</option>
                                              <option value="Century Gothic" @if (@$custom_style['font_family'] == 'Century Gothic') selected @endif>Century Gothic</option>
                                              <option value="Lucida Sans" @if (@$custom_style['font_family'] == 'Lucida Sans') selected @endif>Lucida Sans</option>
                                              <option value="Franklin Gothic Medium" @if (@$custom_style['font_family'] == 'Franklin Gothic Medium') selected @endif>Franklin Gothic Medium</option>
                                              <option value="Gill Sans" @if (@$custom_style['font_family'] == 'Gill Sans') selected @endif>Gill Sans</option>
                                              <option value="Calisto MT" @if (@$custom_style['font_family'] == 'Calisto MT') selected @endif>Calisto MT</option>
                                              <option value="Baskerville" @if (@$custom_style['font_family'] == 'Baskerville') selected @endif>Baskerville</option>
                                              <option value="Book Antiqua" @if (@$custom_style['font_family'] == 'Book Antiqua') selected @endif>Book Antiqua</option>
                                              <option value="Courier" @if (@$custom_style['font_family'] == 'Courier') selected @endif>Courier</option>
                                              <option value="Luminari" @if (@$custom_style['font_family'] == 'Luminari') selected @endif>Luminari</option>
                                              <option value="Monaco" @if (@$custom_style['font_family'] == 'Monaco') selected @endif>Monaco</option>
                                              <option value="Brush Script MT" @if (@$custom_style['font_family'] == 'Brush Script MT') selected @endif>Brush Script MT</option>
                                              <option value="Copperplate" @if (@$custom_style['font_family'] == 'Copperplate') selected @endif>Copperplate</option>
                                              <option value="Futura" @if (@$custom_style['font_family'] == 'Futura') selected @endif>Futura</option>
                                              <option value="Optima" @if (@$custom_style['font_family'] == 'Optima') selected @endif>Optima</option>
                                              <option value="Papyrus" @if (@$custom_style['font_family'] == 'Papyrus') selected @endif>Papyrus</option>
                                              <option value="Segoe UI" @if (@$custom_style['font_family'] == 'Segoe UI') selected @endif>Segoe UI</option>
                                              <option value="Bodoni MT" @if (@$custom_style['font_family'] == 'Bodoni MT') selected @endif>Bodoni MT</option>
                                              <option value="Didot" @if (@$custom_style['font_family'] == 'Didot') selected @endif>Didot</option>
                                              <option value="Rockwell" @if (@$custom_style['font_family'] == 'Rockwell') selected @endif>Rockwell</option>
                                              <option value="Big Caslon" @if (@$custom_style['font_family'] == 'Big Caslon') selected @endif>Big Caslon</option>
                                              <option value="Charcoal" @if (@$custom_style['font_family'] == 'Charcoal') selected @endif>Charcoal</option>
                                              <option value="Menlo" @if (@$custom_style['font_family'] == 'Menlo') selected @endif>Menlo</option>
                                              <option value="Consolas" @if (@$custom_style['font_family'] == 'Consolas') selected @endif>Consolas</option>
                                              <option value="Lucida Sans Typewriter" @if (@$custom_style['font_family'] == 'Lucida Sans Typewriter') selected @endif>Lucida Sans Typewriter</option>
                                              <option value="Andale Mono" @if (@$custom_style['font_family'] == 'Andale Mono') selected @endif>Andale Mono</option>
                                              
                                          </select>                                
                                        </div>
                                        <div class="col-sm-4">
                                          <label class="">Text Alignment</label>  
                                          <select id="text_alignment" name="text_alignment" class="form-control form-control-sm" onchange="updateAlignment()">
                                            <option value="left" @if (@$custom_style['text_alignment'] == 'left') selected @endif>Left</option>
                                            <option value="center" @if (@$custom_style['text_alignment'] == 'center') selected @endif>Center</option>
                                            <option value="right" @if (@$custom_style['text_alignment'] == 'right') selected @endif>Right</option>
                                            <option value="justify" @if (@$custom_style['text_alignment'] == 'justify') selected @endif>Justify</option>
                                            <option value="start" @if (@$custom_style['text_alignment'] == 'start') selected @endif>Start</option>
                                            <option value="end" @if (@$custom_style['text_alignment'] == 'end') selected @endif>End</option>
                                            <option value="inherit" @if (@$custom_style['text_alignment'] == 'inherit') selected @endif>Inherit</option>
                                            <option value="initial" @if (@$custom_style['text_alignment'] == 'initial') selected @endif>Initial</option>
                                            <option value="unset" @if (@$custom_style['text_alignment'] == 'unset') selected @endif>Unset</option>                                          
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                              </div>

                              <div class="col-sm-6">
                                    <div class="p-3 mb-2 custom-shadow rounded gradient-container" style="height: 460px;">
                                      <label>Section Background Color Generator</label>
                                      <div class="color-inputs text-center">
                                        <label for="color1">Color 1 </label>
                                        <input type="color" class="form-control form-control-sm" id="color1" name="color1" value="{{ @$custom_style['color1'] ?? '#050D39' }}">
                                        <label for="color2">Color 2 </label>
                                        <input type="color" class="form-control form-control-sm" id="color2" name="color2" value="{{ @$custom_style['color2'] ?? '#022802' }}">
                                      </div>
                                      <div class="border-radius">
                                        <div class="controls text-center">
                                          <label for="borderRadius">Background Opacity</label>
                                          <input type="range" id="bg_opacity" name="bg_opacity" min="0" max="100" onchange="updateDesign()" value="{{ @$custom_style['bg_opacity'] ?? 100 }}">
                                        </div>
                                      </div>

                                      <div class="text-center">
                                        <button id="generate" type="button" class="btn btn-sm btn-success" onclick="updateBG()">Generate</button>
                                        <button id="reset" class="btn btn-sm btn-danger" onclick="bgRemove()" type="button">Background None</button>
                                      </div>

                                      <hr/>

                                      {{-- <div class="border-radius">
                                        <div class="controls">
                                          <label for="borderRadius">Section Opacity</label>
                                          <input type="range" id="opacity" name="opacity" min="0" max="100" onchange="updateDesign()" value="{{ @$custom_style['opacity'] ?? 100 }}">
                                        </div>
                                      </div> --}}

                                  </div>
                              </div>

                              <div class="col-sm-6">
                                <div class="p-3 mb-3 custom-shadow rounded" style="height: 460px;">
                                  <div class="border-radius">
                                      <div class="controls">
                                        <label for="borderRadius">Border Radius: ( <span class="borderRadiusValue">0px</span>)</label>
                                        <input type="range" id="borderRadius" name="borderRadius" min="0" max="50" onchange="updateDesign()" value="{{ @$custom_style['borderRadius'] ?? 0 }}">
                                      </div>
                                  </div>

                                <div class="border-style">
                                  <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                          <label class="">Border Top Width (px)</label>  
                                          <input type="number" id="border_top_width" name="border_top_width" oninput="updateDesign()" value="{{ @$custom_style['border_top_width'] }}" class="form-control form-control-sm">
                                        </div>
                                        <div class="col-sm-4">
                                          <label class="">Border Top Style</label>  
                                          <select name="border_top_style" id="border_top_style" class="form-control form-control-sm" onchange="updateDesign()">
                                            <option value="none" @if (@$custom_style['border_top_style'] == 'none') selected @endif>none</option>
                                            <option value="solid" @if (@$custom_style['border_top_style'] == 'solid') selected @endif>solid</option>
                                            <option value="dotted" @if (@$custom_style['border_top_style'] == 'dotted') selected @endif>dotted</option>
                                            <option value="dashed" @if (@$custom_style['border_top_style'] == 'dashed') selected @endif>dashed</option>
                                            <option value="double" @if (@$custom_style['border_top_style'] == 'double') selected @endif>double</option>
                                            <option value="groove" @if (@$custom_style['border_top_style'] == 'groove') selected @endif>groove</option>
                                            <option value="ridge" @if (@$custom_style['border_top_style'] == 'ridge') selected @endif>ridge</option>
                                            <option value="inset" @if (@$custom_style['border_top_style'] == 'inset') selected @endif>inset</option>
                                            <option value="outset" @if (@$custom_style['border_top_style'] == 'outset') selected @endif>outset</option>
                                            <option value="hidden" @if (@$custom_style['border_top_style'] == 'hidden') selected @endif>hidden</option>
                                          </select> 
                                        </div>
                                        <div class="col-sm-4">
                                          <label class="">Border Top Color</label>
                                          <input type="color" id="border_top_color" name="border_top_color" oninput="updateDesign()" value="{{ @$custom_style['border_top_color'] }}" class="form-control form-control-sm" style="margin-top: -1px;">
                                        </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-sm-4">
                                        <label class="">Border Right Width (px)</label>  
                                        <input type="number" id="border_right_width" name="border_right_width" oninput="updateDesign()" value="{{ @$custom_style['border_right_width'] }}" class="form-control form-control-sm">
                                      </div>
                                      <div class="col-sm-4">
                                        <label class="">Border Right Style</label>  
                                        <select name="border_right_style" id="border_right_style" class="form-control form-control-sm" onchange="updateDesign()">
                                          <option value="none" @if (@$custom_style['border_right_style'] == 'none') selected @endif>none</option>
                                          <option value="solid" @if (@$custom_style['border_right_style'] == 'solid') selected @endif>solid</option>
                                          <option value="dotted" @if (@$custom_style['border_right_style'] == 'dotted') selected @endif>dotted</option>
                                          <option value="dashed" @if (@$custom_style['border_right_style'] == 'dashed') selected @endif>dashed</option>
                                          <option value="double" @if (@$custom_style['border_right_style'] == 'double') selected @endif>double</option>
                                          <option value="groove" @if (@$custom_style['border_right_style'] == 'groove') selected @endif>groove</option>
                                          <option value="ridge" @if (@$custom_style['border_right_style'] == 'ridge') selected @endif>ridge</option>
                                          <option value="inset" @if (@$custom_style['border_right_style'] == 'inset') selected @endif>inset</option>
                                          <option value="outset" @if (@$custom_style['border_right_style'] == 'outset') selected @endif>outset</option>
                                          <option value="hidden" @if (@$custom_style['border_right_style'] == 'hidden') selected @endif>hidden</option>
                                        </select> 
                                      </div>
                                      <div class="col-sm-4">
                                        <label class="">Border Right Color</label>
                                        <input type="color" id="border_right_color" name="border_right_color" oninput="updateDesign()" value="{{ @$custom_style['border_right_color'] }}" class="form-control form-control-sm" style="margin-top: -1px;">
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-sm-4">
                                        <label class="">Border Bottom Width</label>  
                                        <input type="number" id="border_bottom_width" name="border_bottom_width" oninput="updateDesign()" value="{{ @$custom_style['border_bottom_width'] }}" class="form-control form-control-sm">
                                      </div>
                                      <div class="col-sm-4">
                                        <label class="">Border Bottom Style</label>  
                                        <select name="border_bottom_style" id="border_bottom_style" class="form-control form-control-sm" onchange="updateDesign()">
                                          <option value="none" @if (@$custom_style['border_bottom_style'] == 'none') selected @endif>none</option>
                                          <option value="solid" @if (@$custom_style['border_bottom_style'] == 'solid') selected @endif>solid</option>
                                          <option value="dotted" @if (@$custom_style['border_bottom_style'] == 'dotted') selected @endif>dotted</option>
                                          <option value="dashed" @if (@$custom_style['border_bottom_style'] == 'dashed') selected @endif>dashed</option>
                                          <option value="double" @if (@$custom_style['border_bottom_style'] == 'double') selected @endif>double</option>
                                          <option value="groove" @if (@$custom_style['border_bottom_style'] == 'groove') selected @endif>groove</option>
                                          <option value="ridge" @if (@$custom_style['border_bottom_style'] == 'ridge') selected @endif>ridge</option>
                                          <option value="inset" @if (@$custom_style['border_bottom_style'] == 'inset') selected @endif>inset</option>
                                          <option value="outset" @if (@$custom_style['border_bottom_style'] == 'outset') selected @endif>outset</option>
                                          <option value="hidden" @if (@$custom_style['border_bottom_style'] == 'hidden') selected @endif>hidden</option>
                                        </select> 
                                      </div>
                                      <div class="col-sm-4">
                                        <label class="">Border Bottom Color</label>
                                        <input type="color" id="border_bottom_color" name="border_bottom_color" oninput="updateDesign()" value="{{ @$custom_style['border_bottom_color'] }}" class="form-control form-control-sm" style="margin-top: -1px;">
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-sm-4">
                                        <label class="">Border left Width (px)</label>  
                                        <input type="number" id="border_left_width" name="border_left_width" oninput="updateDesign()" value="{{ @$custom_style['border_left_width'] }}" class="form-control form-control-sm">
                                      </div>
                                      <div class="col-sm-4">
                                        <label class="">Border left Style</label>  
                                        <select name="border_left_style" id="border_left_style" class="form-control form-control-sm" onchange="updateDesign()">
                                          <option value="none" @if (@$custom_style['border_left_style'] == 'none') selected @endif>none</option>
                                          <option value="solid" @if (@$custom_style['border_left_style'] == 'solid') selected @endif>solid</option>
                                          <option value="dotted" @if (@$custom_style['border_left_style'] == 'dotted') selected @endif>dotted</option>
                                          <option value="dashed" @if (@$custom_style['border_left_style'] == 'dashed') selected @endif>dashed</option>
                                          <option value="double" @if (@$custom_style['border_left_style'] == 'double') selected @endif>double</option>
                                          <option value="groove" @if (@$custom_style['border_left_style'] == 'groove') selected @endif>groove</option>
                                          <option value="ridge" @if (@$custom_style['border_left_style'] == 'ridge') selected @endif>ridge</option>
                                          <option value="inset" @if (@$custom_style['border_left_style'] == 'inset') selected @endif>inset</option>
                                          <option value="outset" @if (@$custom_style['border_left_style'] == 'outset') selected @endif>outset</option>
                                          <option value="hidden" @if (@$custom_style['border_left_style'] == 'hidden') selected @endif>hidden</option>
                                        </select> 
                                      </div>
                                      <div class="col-sm-4">
                                        <label class="">Border left Color</label>
                                        <input type="color" id="border_left_color" name="border_left_color" oninput="updateDesign()" value="{{ @$custom_style['border_left_color'] }}" class="form-control form-control-sm" style="margin-top: -1px;">
                                      </div>
                                    </div>

                                  </div>   
                                </div>
                              </div>
                            </div>

                              <div class="col-sm-12" id="box_shadow">
                                <div id="cssOutput">
                                  <div class="gradient-box bgOutput" id="bgOutput" style="background: {{ @$custom_style['bg_color'] ?? '' }}; box-shadow: {{ @$custom_style['offset_x'] }}px {{ @$custom_style['offset_y'] }}px {{ @$custom_style['blur_radius'] }}px {{ @$custom_style['shadow_color'] }};"></div>
                                </div>
                              </div>

                              <div class="col-sm-12">
                                <div class="p-2 shadow-sm rounded mb-2">
                                  <div class="form-group">
                                    <label class="mt-2">Custom CSS</label>    
                                    <textarea type="text" id="custom_css" name="custom_css" class="form-control custom_css">{{ @$data->custom_css }}</textarea>
                                    @error('long_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                  </div>
                                </div>
                              </div>
                            
                          </div>
                      </div>
                      
                      <input type="hidden" id="cssPreview" name="cssPreview" class="cssPreview">
                      <input type="hidden" id="bg_color" name="bg_color" value="{{ @$custom_style['bg_color'] ?? '' }}" class="bg_color">
                      
              </div>
            </div>      
          </div>

        </form>
      </div>

    </div>
  </div>
  <!--/. container-fluid -->
</section>

<script>
 function updateDesign() {
      const paddingTop     = document.getElementById('paddingTop').value;
      const paddingRight   = document.getElementById('paddingRight').value;
      const paddingBottom  = document.getElementById('paddingBottom').value;
      const paddingLeft    = document.getElementById('paddingLeft').value;
  
      const marginTop     = document.getElementById('marginTop').value;
      const marginRight   = document.getElementById('marginRight').value;
      const marginBottom  = document.getElementById('marginBottom').value;
      const marginLeft    = document.getElementById('marginLeft').value;
  
      const offset_x      = document.getElementById('offset_x').value;
      const offset_y      = document.getElementById('offset_y').value;
      const blur_radius   = document.getElementById('blur_radius').value;
      const shadow_color  = document.getElementById('shadow_color').value;

      const text_offset_x  = document.getElementById('text_offset_x').value;
      const text_offset_y  = document.getElementById('text_offset_y').value;
      const text_blur_radius  = document.getElementById('text_blur_radius').value;
      const text_shadow_color = document.getElementById('text_shadow_color').value;
  
      const bg_opacity    = document.getElementById('bg_opacity').value;
      // const opacity       = document.getElementById('opacity').value;
  
      const borderRadius  = document.getElementById('borderRadius').value;
  
      const border_top_width = document.getElementById('border_top_width').value;
      const border_top_style = document.getElementById('border_top_style').value;
      const border_top_color = document.getElementById('border_top_color').value;
  
      const border_right_width = document.getElementById('border_right_width').value;
      const border_right_style = document.getElementById('border_right_style').value;
      const border_right_color = document.getElementById('border_right_color').value;
  
      const border_left_width = document.getElementById('border_left_width').value;
      const border_left_style = document.getElementById('border_left_style').value;
      const border_left_color = document.getElementById('border_left_color').value;
  
      const border_bottom_width = document.getElementById('border_bottom_width').value;
      const border_bottom_style = document.getElementById('border_bottom_style').value;
      const border_bottom_color = document.getElementById('border_bottom_color').value;

      const color1   = document.getElementById('color1').value;
      const color2   = document.getElementById('color2').value;
      const bg_color = document.getElementById('bg_color').value;

      const font_family = document.getElementById('font_family').value;
      const text_color  = document.getElementById('text_color').value;
      const text_alignment = document.getElementById('text_alignment').value;

      const box = document.getElementById('box_shadow');
  
      const cssOutput    = document.getElementById('cssOutput');
      const bgOutput     = document.getElementById('bgOutput');
      const classOutput  = document.getElementById('classOutput');

        cssOutput.style.paddingTop    = `${paddingTop}px`;
        cssOutput.style.paddingRight  = `${paddingRight}px`;
        cssOutput.style.paddingBottom = `${paddingBottom}px`;
        cssOutput.style.paddingLeft   = `${paddingLeft}px`;

        cssOutput.style.marginTop     = `${marginTop}px`;
        cssOutput.style.marginRight   = `${marginRight}px`;
        cssOutput.style.marginBottom  = `${marginBottom}px`;
        cssOutput.style.marginLeft    = `${marginLeft}px`;
        
        bgOutput.style.borderRadius   = `${borderRadius}px`;
       // cssOutput.style.opacity       = opacity / 100;
        cssOutput.style.opacity       = bg_opacity / 100;
        const opacity                 = bg_opacity / 100;
        const border                  = `${borderRadius}px`;
        $('.borderRadiusValue').text(border);
   
        box.style.boxShadow   = `${offset_x}px ${offset_y}px ${blur_radius}px ${shadow_color};`;
        //$('.bgOutput').style.boxShadow = `${offset_x}px ${offset_y}px ${blur_radius}px ${shadow_color};`;
       
        bgOutput.style.borderTop     = `${border_top_width}px ${border_top_style} ${border_top_color}`;
        bgOutput.style.borderRight   = `${border_right_width}px ${border_right_style} ${border_right_color}`;
        bgOutput.style.borderBottom  = `${border_bottom_width}px ${border_bottom_style} ${border_bottom_color}`;
        bgOutput.style.borderLeft    = `${border_left_width}px ${border_left_style} ${border_left_color}`;
    
        const cssPreview = `padding: ${paddingTop}px ${paddingRight}px ${paddingBottom}px ${paddingLeft}px;
         box-shadow: ${offset_x}px ${offset_y}px ${blur_radius}px ${shadow_color};
          text-shadow: ${text_offset_x}px ${text_offset_y}px ${text_blur_radius}px ${text_shadow_color};
           margin-top: ${marginTop}px; margin-right: ${marginRight}px; margin-bottom: ${marginBottom}px; margin-left: ${marginLeft}px;
          background: ${bg_color}; font-family: ${font_family}; opacity: ${opacity}; color: ${text_color}; text-align: ${text_alignment}; 
          border-radius: ${border}; 
          border-top: ${border_top_width}px ${border_top_style} ${border_top_color};
          border-right: ${border_right_width}px ${border_right_style} ${border_right_color};
          border-bottom: ${border_bottom_width}px ${border_bottom_style} ${border_bottom_color}; 
          border-left: ${border_left_width}px ${border_left_style} ${border_left_color};`;
        $('.cssPreview').val(cssPreview);
    }

    function updateBG(){
      const color1   = document.getElementById('color1').value;
      const color2   = document.getElementById('color2').value;
      bgOutput.style.background   = `linear-gradient(to right, ${color1}, ${color2})`;
      $('.bg_color').val(`linear-gradient(to right, ${color1}, ${color2})`);
      updateDesign();
    }

    function bgRemove(){
      bgOutput.style.background = 'none';
      $('.bg_color').val('');
      updateDesign();
    }

    function updateFont() {
        const select = document.getElementById('font_family');
        const color  = document.getElementById('text_color');
        const text    = document.getElementById('sample-text');
        text.style.fontFamily = select.value;
        text.style.color = color.value;
        updateDesign();
    }

    function updateAlignment() {
        const select = document.getElementById('text_alignment');
        const text   = document.getElementById('sample-text');
        text.style.textAlign = select.value;
        updateDesign();
    }

    function updateTextShadow(){
        const text_offset_x     = document.getElementById('text_offset_x').value;
        const text_offset_y     = document.getElementById('text_offset_y').value;
        const text_blur_radius  = document.getElementById('text_blur_radius').value;
        const text_shadow_color = document.getElementById('text_shadow_color').value;
        const text              = document.getElementById('sample-text');
        text.style.textShadow   = `${text_offset_x}px ${text_offset_y}px ${text_blur_radius}px ${text_shadow_color};`;
        updateDesign();
    }

updateDesign();

</script>

@endsection