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

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <form method="post" action="{{ route('store.designTheme') }}">
          @csrf

        <div class="card card-outline card-primary mt-3">
          <div class="card-header">
            <div class="d-flex">
              <div class="flex-grow-1">
                <h6 class="text-effect"><i class="nav-icon ion-settings"></i> Website Themes Design</h6>
              </div>
              <div class="">
                <button type="submit" role="button" class="btn btn-success" id="submitBtn">Update</button>
                <a href="{{ url('site-settings/butex_builder/' . $page_id . '/' . $page_tab_id) }}">
                  <button type="button" class="btn btn-danger" role="button">Back</button>
                </a>
              </div>
            </div>
          </div>

          <div class="card-body">
            <div class="">
               
                    <div class="">
                        <input type="hidden" name="action" class="action" id="action" value="update">
                        <input type="hidden" name="id" id="id" value="{{ @$data->id }}">
                        <input type="hidden" name="page_id" id="page_id" value="{{ @$page_id }}">
                        <input type="hidden" name="page_tab_id" id="page_tab_id" value="{{ @$page_tab_id }}">

                          <h3 class="text-center">Top Menu Design</h3>
                              <div class="row">
                                <div class="col-sm-12">
                                    <div class="p-3 mb-3 custom-shadow design-card rounded">
                                        <div class="row">
                                            <div class="col-sm-3">
                                              <label class="">Text Font</label>  
                                              <select id="topmenu_font_family" name="topmenu_font_family" class="form-control form-control-sm" oninput="updateTopDesign()" value="{{ @$custom_style['topmenu_font_family'] }}">
                                                  <option value="Titillium Web" @if (@$custom_style['font_family'] == 'Titillium Web') selected @endif>Titillium Web</option>
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
                                            <div class="col-sm-2">
                                                <label class="">Text Size</label>  
                                                <input type="number" id="topmenu_text_size" name="topmenu_text_size" oninput="updateTopDesign()" value="{{ @$custom_style['topmenu_text_size'] }}" class="form-control form-control-sm" style="margin-top: -1px;">
                                            </div>
                                            <div class="col-sm-2">
                                                <label class="">Text Color</label>  
                                                <input type="color" id="topmenu_text_color" name="topmenu_text_color" oninput="updateTopDesign()" value="{{ @$custom_style['topmenu_text_color'] }}" class="form-control form-control-sm" style="margin-top: -1px;">
                                            </div>
                                            <div class="col-sm-2">
                                                <label class="">Text Hover Color</label>  
                                                <input type="color" id="topmenu_text_hover_color" name="topmenu_text_hover_color" oninput="updateTopDesign()" value="{{ @$custom_style['topmenu_text_hover_color'] }}" class="form-control form-control-sm" style="margin-top: -1px;">
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="">Background Color</label>  
                                                <input type="color" id="topmenu_bg_color" name="topmenu_bg_color" oninput="updateTopDesign()" value="{{ @$custom_style['topmenu_bg_color'] }}" class="form-control form-control-sm" style="margin-top: -1px;">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                              </div>

                          <h3 class="text-center">Footer Design</h3>

                          <div class="row">
                            <div class="col-sm-5">
                                <div class="p-3 mb-3 custom-shadow design-card rounded">
                                    <label class="">Width & Animation</label>
                                    <div class="row">
                                      <div class="col-sm-6">
                                        <div class="form-group">
                                          <label class="mt-2">Layout</label>
                                          <select name="footer_layout" id="footer_layout" class="form-control form-control-sm layout">
                                            <option value="" @if (@$custom_class['footer_layout'] == '') selected @endif>Full Width</option>
                                            <option value="container" @if (@$custom_class['footer_layout'] == 'container') selected @endif>Container</option>
                                            <option value="container-fluid" @if (@$custom_class['footer_layout'] == 'container-fluid') selected @endif>Container Fluid</option>
                                            <option value="container-sm" @if (@$custom_class['footer_layout'] == 'container-sm') selected @endif>Small Container</option>
                                            <option value="container-md" @if (@$custom_class['footer_layout'] == 'container-md') selected @endif>Medium Container</option>
                                            <option value="container-lg" @if (@$custom_class['footer_layout'] == 'container-lg') selected @endif>Learge Container</option>
                                            <option value="container-xl" @if (@$custom_class['footer_layout'] == 'container-xl') selected @endif>Extra Learge Container</option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="col-sm-6">
                                        <div class="form-group">
                                          <label class="mt-2">Fade Animation</label>  
                                          <select name="footer_fade" id="footer_fade" class="form-control form-control-sm">
                                            <option value="" @if (@$custom_class['footer_fade'] == '') selected @endif>None</option>
                                            <option value="fade" @if (@$custom_class['footer_fade'] == 'fade') selected @endif>Fade</option>
                                            <option value="fade-up" @if (@$custom_class['footer_fade'] == 'fade-up') selected @endif>Fade Up</option>
                                            <option value="fade-down" @if (@$custom_class['footer_fade'] == 'fade-down') selected @endif>Fade Down</option>
                                            <option value="fade-left" @if (@$custom_class['footer_fade'] == 'fade-left') selected @endif>Fade Left</option>
                                            <option value="fade-right" @if (@$custom_class['footer_fade'] == 'fade-right') selected @endif>Fade Right</option>
                                            <option value="fade-up-right" @if (@$custom_class['footer_fade'] == 'fade-up-right') selected @endif>Fade Up Right</option>
                                            <option value="fade-up-left" @if (@$custom_class['footer_fade'] == 'fade-up-left') selected @endif>Fade Up Left</option>
                                            <option value="fade-down-right" @if (@$custom_class['footer_fade'] == 'fade-down-right') selected @endif>Fade Down Right</option>
                                            <option value="fade-down-left" @if (@$custom_class['footer_fade'] == 'fade-down-left') selected @endif>Fade Down Left</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <div class="p-3 mb-3 custom-shadow design-card rounded">
                                    <label class="">Footer Item</label>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label class="">Text Color</label>  
                                            <input type="color" id="footer_text_color" name="footer_text_color" oninput="updateFooterDesign()" value="{{ @$custom_style['footer_text_color'] }}" class="form-control form-control-sm" style="margin-top: -1px;">
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="">Text Hover Color</label>  
                                            <input type="color" id="footer_hover_color" name="footer_hover_color" oninput="updateFooterDesign()" value="{{ @$custom_style['footer_hover_color'] }}" class="form-control form-control-sm" style="margin-top: -1px;">
                                        </div>
                                        <div class="col-sm-3">
                                          <label class="">Text Font</label>  
                                          <select id="footer_font_family" name="footer_font_family" oninput="updateFooterDesign()" value="{{ @$custom_style['footer_font_family'] }}" class="form-control form-control-sm" style="margin-top: -1px;">
                                              <option value="Titillium Web" @if (@$custom_style['font_family'] == 'Titillium Web') selected @endif>Titillium Web</option>
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
                                        <div class="col-sm-3">
                                            <label class="">Text Font Size</label>  
                                            <input type="number" id="footer_font_size" name="footer_font_size" oninput="updateFooterDesign()" value="{{ @$custom_style['footer_font_size'] }}" class="form-control form-control-sm" style="margin-top: -1px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
            
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="p-3 mb-3 custom-shadow design-card rounded">
                                <label class="mt-2">Footer Padding</label>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <label class="">Top (<span id="paddingTopValue">px</span>)</label>
                                    <input type="number" id="footer_paddingTop" name="footer_paddingTop" oninput="updateFooterDesign()" value="{{ @$custom_style['footer_paddingTop'] }}" class="form-control form-control-sm">
                                  </div>
                                  <div class="col-sm-3">
                                    <label class="">Right (<span id="paddingRightValue">px</span>)</label>
                                    <input type="number" id="footer_paddingRight" name="footer_paddingRight" oninput="updateFooterDesign()" value="{{ @$custom_style['footer_paddingRight'] }}" class="form-control form-control-sm">
                                  </div>
                                  <div class="col-sm-3">
                                    <label class="">Bottom (<span id="paddingBottomValue">px</span>)</label>
                                    <input type="number" id="footer_paddingBottom" name="footer_paddingBottom" oninput="updateFooterDesign()" value="{{ @$custom_style['footer_paddingBottom'] }}" class="form-control form-control-sm">
                                  </div>
                                  <div class="col-sm-3">
                                    <label class="">Left (<span id="paddingLeftValue">px</span>)</label>
                                    <input type="number" id="footer_paddingLeft" name="footer_paddingLeft" oninput="updateFooterDesign()" value="{{ @$custom_style['footer_paddingLeft'] }}" class="form-control form-control-sm">             
                                  </div>
                                </div>
                              </div>
                            </div>
                                  
                            <div class="col-sm-6">
                              <div class="p-3 mb-3 custom-shadow design-card rounded">
                                <label class="mt-2">Footer Margin</label>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <label class="">Top (<span id="marginTopValue">px</span>)</label>  
                                    <input type="number" id="footer_marginTop" name="footer_marginTop" oninput="updateFooterDesign()" value="{{ @$custom_style['footer_marginTop'] ?? '' }}" class="form-control form-control-sm">
                                  </div>
                                  <div class="col-sm-3">
                                    <label class="">Right (<span id="marginRightValue">px</span>)</label>  
                                    <input type="number" id="footer_marginRight" name="footer_marginRight" oninput="updateFooterDesign()" value="{{ @$custom_style['footer_marginRight'] ?? '' }}" class="form-control form-control-sm">
                                  </div>
                                  <div class="col-sm-3">
                                    <label class="">Bottom (<span id="marginBottomValue">px</span>)</label>  
                                    <input type="number" id="footer_marginBottom" name="footer_marginBottom" oninput="updateFooterDesign()" value="{{ @$custom_style['footer_marginBottom'] ?? '' }}" class="form-control form-control-sm">
                                  </div>
                                  <div class="col-sm-3">
                                    <label class="">Left (<span id="marginLeftValue">px</span>)</label>  
                                    <input type="number" id="footer_marginLeft" name="footer_marginLeft" oninput="updateFooterDesign()" value="{{ @$custom_style['footer_marginLeft'] ?? '' }}" class="form-control form-control-sm">
                                  </div>
                                </div>
                              </div>
                            </div>
 
                            <div class="col-sm-6">
                                <div class="p-3 mb-2 custom-shadow rounded gradient-container" style="height: 400px;">
                                    <label>Footer Background Color Generator</label>
                                    <div class="color-inputs text-center">
                                      <label for="color1">Color 1 </label>
                                      <input type="color" class="form-control form-control-sm" id="footer_color1" name="footer_color1" value="{{ @$custom_style['footer_color1'] ?? '#050D39' }}">
                                      <label for="color2">Color 2 </label>
                                      <input type="color" class="form-control form-control-sm" id="footer_color2" name="footer_color2" value="{{ @$custom_style['footer_color2'] ?? '#022802' }}">
                                    </div>

                                    <div class="border-radius">
                                      <div class="controls text-center">
                                        <label for="borderRadius">Background Opacity</label>
                                        <input type="range" id="footer_bg_opacity" name="footer_bg_opacity" min="0" max="100" onchange="updateFooterDesign()" value="{{ @$custom_style['footer_bg_opacity'] ?? 100 }}">
                                      </div>
                                    </div>

                                    <div class="text-center">
                                      <button id="generate" type="button" class="btn btn-sm btn-success" onclick="updateBG()">Generate</button>
                                      <button id="reset" class="btn btn-sm btn-danger" onclick="bgRemove()" type="button">Background None</button>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="col-sm-6">
                              <div class="p-3 mb-3 custom-shadow rounded" style="height: 400px;">
                                <div class="border-radius">
                                    <div class="controls">
                                      <label for="borderRadius">Footer Border Radius: (px)</label>
                                      <input type="range" id="footer_borderRadius" name="footer_borderRadius" min="0" max="50" onchange="updateFooterDesign()" value="{{ @$custom_style['footer_borderRadius'] ?? 0 }}">
                                    </div>
                                </div>

                                <div class="border-style">
                                  <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                          <label class="">Border Top Width (px)</label>  
                                          <input type="number" id="footer_border_top_width" name="footer_border_top_width" oninput="updateFooterDesign()" value="{{ @$custom_style['footer_border_top_width'] }}" class="form-control form-control-sm">
                                        </div>
                                        <div class="col-sm-4">
                                          <label class="">Border Top Style</label>  
                                          <select name="footer_border_top_style" id="footer_border_top_style" class="form-control form-control-sm" onchange="updateFooterDesign()">
                                            <option value="none" @if (@$custom_style['footer_border_top_style'] == 'none') selected @endif>none</option>
                                            <option value="solid" @if (@$custom_style['footer_border_top_style'] == 'solid') selected @endif>solid</option>
                                            <option value="dotted" @if (@$custom_style['footer_border_top_style'] == 'dotted') selected @endif>dotted</option>
                                            <option value="dashed" @if (@$custom_style['footer_border_top_style'] == 'dashed') selected @endif>dashed</option>
                                            <option value="double" @if (@$custom_style['footer_border_top_style'] == 'double') selected @endif>double</option>
                                            <option value="groove" @if (@$custom_style['footer_border_top_style'] == 'groove') selected @endif>groove</option>
                                            <option value="ridge" @if (@$custom_style['footer_border_top_style'] == 'ridge') selected @endif>ridge</option>
                                            <option value="inset" @if (@$custom_style['footer_border_top_style'] == 'inset') selected @endif>inset</option>
                                            <option value="outset" @if (@$custom_style['footer_border_top_style'] == 'outset') selected @endif>outset</option>
                                            <option value="hidden" @if (@$custom_style['footer_border_top_style'] == 'hidden') selected @endif>hidden</option>
                                          </select> 
                                        </div>
                                        <div class="col-sm-4">
                                          <label class="">Border Top Color</label>
                                          <input type="color" id="footer_border_top_color" name="footer_border_top_color" oninput="updateFooterDesign()" value="{{ @$custom_style['footer_border_top_color'] }}" class="form-control form-control-sm" style="margin-top: -1px;">
                                        </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-sm-4">
                                        <label class="">Border Right Width (px)</label>  
                                        <input type="number" id="footer_border_right_width" name="footer_border_right_width" oninput="updateFooterDesign()" value="{{ @$custom_style['footer_border_right_width'] }}" class="form-control form-control-sm">
                                      </div>
                                      <div class="col-sm-4">
                                        <label class="">Border Right Style</label>
                                        <select name="footer_border_right_style" id="footer_border_right_style" class="form-control form-control-sm" onchange="updateFooterDesign()">
                                          <option value="none" @if (@$custom_style['footer_border_right_style'] == 'none') selected @endif>none</option>
                                          <option value="solid" @if (@$custom_style['footer_border_right_style'] == 'solid') selected @endif>solid</option>
                                          <option value="dotted" @if (@$custom_style['footer_border_right_style'] == 'dotted') selected @endif>dotted</option>
                                          <option value="dashed" @if (@$custom_style['footer_border_right_style'] == 'dashed') selected @endif>dashed</option>
                                          <option value="double" @if (@$custom_style['footer_border_right_style'] == 'double') selected @endif>double</option>
                                          <option value="groove" @if (@$custom_style['footer_border_right_style'] == 'groove') selected @endif>groove</option>
                                          <option value="ridge" @if (@$custom_style['footer_border_right_style'] == 'ridge') selected @endif>ridge</option>
                                          <option value="inset" @if (@$custom_style['footer_border_right_style'] == 'inset') selected @endif>inset</option>
                                          <option value="outset" @if (@$custom_style['footer_border_right_style'] == 'outset') selected @endif>outset</option>
                                          <option value="hidden" @if (@$custom_style['footer_border_right_style'] == 'hidden') selected @endif>hidden</option>
                                        </select>
                                      </div>
                                      <div class="col-sm-4">
                                        <label class="">Border Right Color</label>
                                        <input type="color" id="footer_border_right_color" name="footer_border_right_color" oninput="updateFooterDesign()" value="{{ @$custom_style['footer_border_right_color'] }}" class="form-control form-control-sm" style="margin-top: -1px;">
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-sm-4">
                                        <label class="">Border Bottom Width</label>  
                                        <input type="number" id="footer_border_bottom_width" name="footer_border_bottom_width" oninput="updateFooterDesign()" value="{{ @$custom_style['footer_border_bottom_width'] }}" class="form-control form-control-sm">
                                      </div>
                                      <div class="col-sm-4">
                                        <label class="">Border Bottom Style</label>  
                                        <select name="footer_border_bottom_style" id="footer_border_bottom_style" class="form-control form-control-sm" onchange="updateFooterDesign()">
                                          <option value="none" @if (@$custom_style['footer_border_bottom_style'] == 'none') selected @endif>none</option>
                                          <option value="solid" @if (@$custom_style['footer_border_bottom_style'] == 'solid') selected @endif>solid</option>
                                          <option value="dotted" @if (@$custom_style['footer_border_bottom_style'] == 'dotted') selected @endif>dotted</option>
                                          <option value="dashed" @if (@$custom_style['footer_border_bottom_style'] == 'dashed') selected @endif>dashed</option>
                                          <option value="double" @if (@$custom_style['footer_border_bottom_style'] == 'double') selected @endif>double</option>
                                          <option value="groove" @if (@$custom_style['footer_border_bottom_style'] == 'groove') selected @endif>groove</option>
                                          <option value="ridge" @if (@$custom_style['footer_border_bottom_style'] == 'ridge') selected @endif>ridge</option>
                                          <option value="inset" @if (@$custom_style['footer_border_bottom_style'] == 'inset') selected @endif>inset</option>
                                          <option value="outset" @if (@$custom_style['footer_border_bottom_style'] == 'outset') selected @endif>outset</option>
                                          <option value="hidden" @if (@$custom_style['footer_border_bottom_style'] == 'hidden') selected @endif>hidden</option>
                                        </select> 
                                      </div>
                                      <div class="col-sm-4">
                                        <label class="">Border Bottom Color</label>
                                        <input type="color" id="footer_border_bottom_color" name="footer_border_bottom_color" oninput="updateFooterDesign()" value="{{ @$custom_style['footer_border_bottom_color'] }}" class="form-control form-control-sm" style="margin-top: -1px;">
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-sm-4">
                                        <label class="">Border left Width (px)</label>  
                                        <input type="number" id="footer_border_left_width" name="footer_border_left_width" oninput="updateFooterDesign()" value="{{ @$custom_style['footer_border_left_width'] }}" class="form-control form-control-sm">
                                      </div>
                                      <div class="col-sm-4">
                                        <label class="">Border left Style</label>  
                                        <select name="footer_border_left_style" id="footer_border_left_style" class="form-control form-control-sm" onchange="updateFooterDesign()">
                                          <option value="none" @if (@$custom_style['footer_border_left_style'] == 'none') selected @endif>none</option>
                                          <option value="solid" @if (@$custom_style['footer_border_left_style'] == 'solid') selected @endif>solid</option>
                                          <option value="dotted" @if (@$custom_style['footer_border_left_style'] == 'dotted') selected @endif>dotted</option>
                                          <option value="dashed" @if (@$custom_style['footer_border_left_style'] == 'dashed') selected @endif>dashed</option>
                                          <option value="double" @if (@$custom_style['footer_border_left_style'] == 'double') selected @endif>double</option>
                                          <option value="groove" @if (@$custom_style['footer_border_left_style'] == 'groove') selected @endif>groove</option>
                                          <option value="ridge" @if (@$custom_style['footer_border_left_style'] == 'ridge') selected @endif>ridge</option>
                                          <option value="inset" @if (@$custom_style['footer_border_left_style'] == 'inset') selected @endif>inset</option>
                                          <option value="outset" @if (@$custom_style['footer_border_left_style'] == 'outset') selected @endif>outset</option>
                                          <option value="hidden" @if (@$custom_style['footer_border_left_style'] == 'hidden') selected @endif>hidden</option>
                                        </select> 
                                      </div>
                                      <div class="col-sm-4">
                                        <label class="">Border left Color</label>
                                        <input type="color" id="footer_border_left_color" name="footer_border_left_color" oninput="updateFooterDesign()" value="{{ @$custom_style['footer_border_left_color'] }}" class="form-control form-control-sm" style="margin-top: -1px;">
                                      </div>
                                    </div>

                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-sm-12">
                              <div id="cssOutput">
                                <div class="gradient-box bg_color" id="bg_color" style="background: {{ @$custom_style['footer_bg_color'] ?? '' }};"></div>
                              </div>
                            </div>

                            <div class="col-sm-12">
                              <h3 class="text-center">Bottom Menu Design</h3>
                                <div class="p-3 mb-3 custom-shadow design-card rounded">
                                  <div class="row">
                                      <div class="col-sm-2">
                                          <label class="">Text Size</label>
                                          <input type="number" id="bottom_text_size" name="bottom_text_size" oninput="updateBottomDesign()" value="{{ @$custom_style['bottom_text_size'] }}" class="form-control form-control-sm" style="margin-top: -1px;">
                                      </div>
                                      <div class="col-sm-3">
                                        <label class="">Text Font</label>  
                                          <select id="bottom_font_family" name="bottom_font_family" class="form-control form-control-sm" onclick="updateBottomDesign()" value="{{ @$custom_style['bottom_font_family'] }}">
                                            <option value="Titillium Web" @if (@$custom_style['font_family'] == 'Titillium Web') selected @endif>Titillium Web</option>
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
                                      <div class="col-sm-2">
                                          <label class="">Text Color</label>  
                                          <input type="color" id="bottom_text_color" name="bottom_text_color" oninput="updateBottomDesign()" value="{{ @$custom_style['bottom_text_color'] }}" class="form-control form-control-sm" style="margin-top: -1px;">
                                      </div>
                                      <div class="col-sm-2">
                                          <label class="">Text Hover Color</label>  
                                          <input type="color" id="bottom_text_hover_color" name="bottom_text_hover_color" oninput="updateBottomDesign()" value="{{ @$custom_style['bottom_text_hover_color'] }}" class="form-control form-control-sm" style="margin-top: -1px;">
                                      </div>
                                      <div class="col-sm-3">
                                          <label class="">Background Color</label>  
                                          <input type="color" id="bottom_bg_color" name="bottom_bg_color" oninput="updateBottomDesign()" value="{{ @$custom_style['bottom_bg_color'] }}" class="form-control form-control-sm" style="margin-top: -1px;">
                                      </div>
                                  </div>
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

                    <input type="hidden" id="cssPreviewTop" name="cssPreviewTop" class="cssPreviewTop">
                    <input type="hidden" id="cssPreviewFooter" name="cssPreviewFooter" class="cssPreviewFooter">
                    <input type="hidden" id="cssPreviewBottom" name="cssPreviewBottom" class="cssPreviewBottom">
                    <input type="hidden" id="footer_bg_color" name="footer_bg_color" value="{{ @$custom_style['footer_bg_color'] ?? '' }}" class="footer_bg_color">
                    
                   
               
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
    updateFooterDesign()
    updateTopDesign();
    updateBottomDesign();

    function updateFooterDesign(){
      const footer_text_color          = document.getElementById('footer_text_color').value;
      const footer_hover_color         = document.getElementById('footer_hover_color').value;
      const footer_font_size           = document.getElementById('footer_font_size').value;
      const footer_font_family         = document.getElementById('footer_font_family').value;
      const footer_paddingTop          = document.getElementById('footer_paddingTop').value;
      const footer_paddingRight        = document.getElementById('footer_paddingRight').value;
      const footer_paddingBottom       = document.getElementById('footer_paddingBottom').value;
      const footer_paddingLeft         = document.getElementById('footer_paddingLeft').value;
      const footer_marginTop           = document.getElementById('footer_marginTop').value;
      const footer_marginRight         = document.getElementById('footer_marginRight').value;
      const footer_marginBottom        = document.getElementById('footer_marginBottom').value;
      const footer_marginLeft          = document.getElementById('footer_marginLeft').value;
      const footer_bg_opacity          = document.getElementById('footer_bg_opacity').value;
      const footer_borderRadius        = document.getElementById('footer_borderRadius').value;
      const footer_border_top_width    = document.getElementById('footer_border_top_width').value; 
      const footer_border_top_style    = document.getElementById('footer_border_top_style').value;
      const footer_border_top_color    = document.getElementById('footer_border_top_color').value;
      const footer_border_right_width  = document.getElementById('footer_border_right_width').value;
      const footer_border_right_style  = document.getElementById('footer_border_right_style').value;
      const footer_border_right_color  = document.getElementById('footer_border_right_color').value;
      const footer_border_bottom_width = document.getElementById('footer_border_bottom_width').value;
      const footer_border_bottom_style = document.getElementById('footer_border_bottom_style').value;
      const footer_border_bottom_color = document.getElementById('footer_border_bottom_color').value;
      const footer_border_left_width   = document.getElementById('footer_border_left_width').value;
      const footer_border_left_style   = document.getElementById('footer_border_left_style').value;
      const footer_border_left_color   = document.getElementById('footer_border_left_color').value;
      const footer_bg_color            = document.getElementById('footer_bg_color').value;
      const custom_css                 = document.getElementById('custom_css').value;
      const footer_color1              = document.getElementById('footer_color1').value;
      const footer_color2              = document.getElementById('footer_color2').value;

      cssOutput.style.paddingTop    = `${footer_paddingTop}px`;
      cssOutput.style.paddingRight  = `${footer_paddingRight}px`;
      cssOutput.style.paddingBottom = `${footer_paddingBottom}px`;
      cssOutput.style.paddingLeft   = `${footer_paddingLeft}px`;

      cssOutput.style.marginTop     = `${footer_marginTop}px`;
      cssOutput.style.marginRight   = `${footer_marginRight}px`;
      cssOutput.style.marginBottom  = `${footer_marginBottom}px`;
      cssOutput.style.marginLeft    = `${footer_marginLeft}px`;

      cssOutput.style.borderRadius  = `${footer_borderRadius}px`;

      cssOutput.style.borderTop     = `${footer_border_top_width}px ${footer_border_top_style} ${footer_border_top_color}`;
      cssOutput.style.borderRight   = `${footer_border_right_width}px ${footer_border_right_style} ${footer_border_right_color}`;
      cssOutput.style.borderBottom  = `${footer_border_bottom_width}px ${footer_border_bottom_style} ${footer_border_bottom_color}`;
      cssOutput.style.borderLeft    = `${footer_border_left_width}px ${footer_border_left_style} ${footer_border_left_color}`;

      cssOutput.style.opacity       = footer_bg_opacity / 100;
      const opacity                 = footer_bg_opacity / 100;

      //cssOutput.style.background   = `linear-gradient(to right, ${footer_color1}, ${footer_color2})`;

      const footer_css= `color: ${footer_text_color}; font-size: ${footer_font_size}px; font-family: ${footer_font_family}; padding-top: ${footer_paddingTop}px; padding-right: ${footer_paddingRight}px; padding-bottom: ${footer_paddingBottom}px; padding-left: ${footer_paddingLeft}px; margin-top: ${footer_marginTop}px; margin-right: ${footer_marginRight}px; margin-bottom: ${footer_marginBottom}px; margin-left: ${footer_marginLeft}px; background: ${footer_bg_color}; opacity: ${opacity}; border-radius: ${footer_borderRadius}; border-top: ${footer_border_top_width}px ${footer_border_top_style} ${footer_border_top_color}; border-right: ${footer_border_right_width}px ${footer_border_right_style} ${footer_border_right_color}; border-bottom: ${footer_border_bottom_width}px ${footer_border_bottom_style} ${footer_border_bottom_color}; border-left: ${footer_border_left_width}px ${footer_border_left_style} ${footer_border_left_color};`;
      const footer_menu_hover   = `this.style.color='${footer_hover_color}';`;
      $('.cssPreviewFooter').val(footer_css);
      $('.cssPreviewFooterHover').val(footer_menu_hover);
    }

    function updateTopDesign(){
      const topmenu_font_family      = document.getElementById('topmenu_font_family').value;
      const topmenu_text_size        = document.getElementById('topmenu_text_size').value;
      const topmenu_text_color       = document.getElementById('topmenu_text_color').value;
      const topmenu_text_hover_color = document.getElementById('topmenu_text_hover_color').value;
      const topmenu_bg_color         = document.getElementById('topmenu_bg_color').value;

      const top_menu_css      = `color: ${topmenu_text_color}; font-size: ${topmenu_text_size}px; font-family: ${topmenu_font_family}; background-color: ${topmenu_bg_color};`;
      const top_menu_hovercss = `this.style.color='${topmenu_text_hover_color}';`;
      $('.cssPreviewTop').val(top_menu_css);
      $('.cssPreviewTopHover').val(top_menu_hovercss);
    }

    function updateBottomDesign(){
      const bottom_text_hover_color    = document.getElementById('bottom_text_hover_color').value;
      const bottom_text_color          = document.getElementById('bottom_text_color').value;
      const bottom_text_size           = document.getElementById('bottom_text_size').value;
      const bottom_font_family         = document.getElementById('bottom_font_family').value;
      const bottom_bg_color            = document.getElementById('bottom_bg_color').value;

      const bottom_menu_css      = `color: ${bottom_text_color}; font-size: ${bottom_text_size}px; font-family: ${bottom_font_family}; background-color: ${bottom_bg_color};`;
      const bottom_menu_hovercss = `this.style.color='${bottom_text_hover_color}';`;
      $('.cssPreviewBottom').val(bottom_menu_css);
    }

    function updateBG(){
      const footer_color1     = document.getElementById('footer_color1').value;
      const footer_color2     = document.getElementById('footer_color2').value;
      //const cssOutput         = document.getElementById('cssOutput'); 
      //const bg_color          = document.getElementById('bg_color'); 
      cssOutput.style.background   = `linear-gradient(to right, ${footer_color1}, ${footer_color2})`;
      $('.footer_bg_color').val(`linear-gradient(to right, ${footer_color1}, ${footer_color2})`);
      updateFooterDesign();
    }

    function bgRemove(){
    //  alert('dd')
      cssOutput.style.background = 'none';
      bg_color.style.background = 'none';
      $('.footer_bg_color').val('');
      updateFooterDesign();
    }
</script>

@endsection