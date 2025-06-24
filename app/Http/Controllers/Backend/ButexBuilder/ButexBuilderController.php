<?php

namespace App\Http\Controllers\Backend\ButexBuilder;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\CmsSection;
use App\Models\CmsComponent;
use App\Models\CmsThemeDesign;
use App\Models\CmsCustomComponent;
use App\Models\FormTemplate;
use App\Models\CmsTheme;
use App\Models\CmsButexTheme;
use App\Models\Faculty;
use App\Models\Department;
use App\Models\Office;
use App\Models\Club;
use App\Models\MenuType;
use App\Models\Conference;

class ButexBuilderController extends Controller
{
    public function index(Request $request){
        $id     = $request->id;
        $tab_id = $request->tab_id;

        if($id){
            $sections = CmsSection::with('lastComponent')->where('page_id', $id)->where('page_tab_id', $tab_id)->orderBy('section_order', 'asc')->get();
            $page_id = $id;
            $page_tab_id = $tab_id;
        }else{
            $sections = CmsSection::with('lastComponent')->where('page_id', 1)->where('page_tab_id', 1)->orderBy('section_order', 'asc')->get();
            $page_id = 1;
            $page_tab_id = 1;
        }

        $count      = $sections->count();
        $page_data  = $sections->first();
        $count      = $count + 1;

        $components  = FormTemplate::where('status', 'active')->orderBy('id', 'asc')->get();

        $faculties   = Faculty::where('status', 1)->get();
        $departments = Department::where('status', 1)->get();
        $offices     = Office::where('status', 1)->get();
        $clubs       = Club::where('status', 1)->get();
        $alumnis     = Alumni::where('status', 1)->get();
        $menu_types  = MenuType::all();
        $menu        = Conference::find(1);

        return view('backend.butex-builder.index', compact('sections', 'menu', 'components', 'page_id', 'page_tab_id', 'page_data', 'count', 'departments', 'faculties', 'offices', 'clubs', 'menu_types'));
    }

    public function formBuilder(){
        return view('backend.butex_form_builder.index');
    }

    public function store(Request $request){
        $action = $request->input('action');

        $rand_id = Str::random(8);
  
        if($action === 'insert'){
            $data = new CmsSection();
            $data->page_id            = $request->input('page_id');
            $data->page_tab_id        = $request->input('page_tab_id');
            $data->section_title      = $request->input('section_title');
            $data->number_of_column   = $request->input('number_of_column');
            $data->section_order      = $request->input('section_order');
            $data->status             = $request->input('status');
            $data->rand_id            = $rand_id;

            if($request->input('number_of_column') == '01'){
                $data->col1_name   = 'Column-1';
            }elseif($request->input('number_of_column') == '02'){
                $data->col1_name   = 'Column-1';
                $data->col2_name   = 'Column-2';
            }elseif($request->input('number_of_column') == '03'){
                $data->col1_name   = 'Column-1';
                $data->col2_name   = 'Column-2';
            }elseif($request->input('number_of_column') == '04'){
                $data->col1_name   = 'Column-1';
                $data->col2_name   = 'Column-2';
            }elseif($request->input('number_of_column') == '05'){
                $data->col1_name   = 'Column-1';
                $data->col2_name   = 'Column-2';
            }elseif($request->input('number_of_column') == '06'){
                $data->col1_name   = 'Column-1';
                $data->col2_name   = 'Column-2';
            }elseif($request->input('number_of_column') == '07'){
                $data->col1_name   = 'Column-1';
                $data->col2_name   = 'Column-2';
            }elseif($request->input('number_of_column') == '08'){
                $data->col1_name   = 'Column-1';
                $data->col2_name   = 'Column-2';
            }elseif($request->input('number_of_column') == '09'){
                $data->col1_name   = 'Column-1';
                $data->col2_name   = 'Column-2';
            }elseif($request->input('number_of_column') == '10'){
                $data->col1_name   = 'Column-1';
                $data->col2_name   = 'Column-2';
            }elseif($request->input('number_of_column') == '11'){
                $data->col1_name   = 'Column-1';
                $data->col2_name   = 'Column-2';
                $data->col3_name   = 'Column-3';
            }elseif($request->input('number_of_column') == '12'){
                $data->col1_name   = 'Column-1';
                $data->col2_name   = 'Column-2';
                $data->col3_name   = 'Column-3';
                $data->col4_name   = 'Column-4';
            }elseif($request->input('number_of_column') == '13'){
                $data->col1_name   = 'Column-1';
                $data->col2_name   = 'Column-2';
                $data->col3_name   = 'Column-3';
                $data->col4_name   = 'Column-4';
                $data->col5_name   = 'Column-5';
                $data->col6_name   = 'Column-6';
            }elseif($request->input('number_of_column') == '14'){
                $data->col1_name   = 'Column-1';
                $data->col2_name   = 'Column-2';
                $data->col3_name   = 'Column-3';
            }

            $custom_style = [
                'paddingLeft'   => '0px',
                'paddingRight'  => '0px',
                'paddingTop'    => '0px',
                'paddingBottom' => '0px',
                'bg_color'      => '',
                'font_color'    => 'black',
                'color1'        => '',
                'color2'        => '',
                'borderRadius'  => '0',
                'borderWidth'   => '0',
                'borderColor'   => '',
            ];

            $custom_class = [
                'layout' => 'container',
                'fade' => '',
            ];

            $data->custom_style = json_encode($custom_style);
            $data->custom_class = json_encode($custom_class);
            $data->cssPreview = 'padding: 0px 0px 0px 0px;';

            $data->save();

            return response()->json(['message' => 'Section Created Successfully']);

        }elseif($action === 'update'){
            $data = CmsSection::find($request->input('id'));
            $data->page_id            = $request->input('page_id');
            $data->page_tab_id        = $request->input('page_tab_id');
            $data->section_title      = $request->input('section_title');
            $data->number_of_column   = $request->input('number_of_column');
            $data->section_order      = $request->input('section_order');
            $data->status             = $request->input('status');

            if($request->input('number_of_column') == '01'){
                $data->col1_name   = 'Column-1';
                $data->col2_name   = '';
                $data->col3_name   = '';
                $data->col4_name   = '';
                $data->col5_name   = '';
                $data->col6_name   = '';
            }elseif($request->input('number_of_column') == '02'){
                $data->col1_name   = 'Column-1';
                $data->col2_name   = 'Column-2';
                $data->col3_name   = '';
                $data->col4_name   = '';
                $data->col5_name   = '';
                $data->col6_name   = '';
            }elseif($request->input('number_of_column') == '03'){
                $data->col1_name   = 'Column-1';
                $data->col2_name   = 'Column-2';
                $data->col3_name   = '';
                $data->col4_name   = '';
                $data->col5_name   = '';
                $data->col6_name   = '';
            }elseif($request->input('number_of_column') == '04'){
                $data->col1_name   = 'Column-1';
                $data->col2_name   = 'Column-2';
                $data->col3_name   = '';
                $data->col4_name   = '';
                $data->col5_name   = '';
                $data->col6_name   = '';
            }elseif($request->input('number_of_column') == '05'){
                $data->col1_name   = 'Column-1';
                $data->col2_name   = 'Column-2';
                $data->col3_name   = '';
                $data->col4_name   = '';
                $data->col5_name   = '';
                $data->col6_name   = '';
            }elseif($request->input('number_of_column') == '06'){
                $data->col1_name   = 'Column-1';
                $data->col2_name   = 'Column-2';
                $data->col3_name   = '';
                $data->col4_name   = '';
                $data->col5_name   = '';
                $data->col6_name   = '';
            }elseif($request->input('number_of_column') == '07'){
                $data->col1_name   = 'Column-1';
                $data->col2_name   = 'Column-2';
                $data->col3_name   = '';
                $data->col4_name   = '';
                $data->col5_name   = '';
                $data->col6_name   = '';
            }elseif($request->input('number_of_column') == '08'){
                $data->col1_name   = 'Column-1';
                $data->col2_name   = 'Column-2';
                $data->col3_name   = '';
                $data->col4_name   = '';
                $data->col5_name   = '';
                $data->col6_name   = '';
            }elseif($request->input('number_of_column') == '09'){
                $data->col1_name   = 'Column-1';
                $data->col2_name   = 'Column-2';
                $data->col3_name   = '';
                $data->col4_name   = '';
                $data->col5_name   = '';
                $data->col6_name   = '';
            }elseif($request->input('number_of_column') == '10'){
                $data->col1_name   = 'Column-1';
                $data->col2_name   = 'Column-2';
                $data->col3_name   = '';
                $data->col4_name   = '';
                $data->col5_name   = '';
                $data->col6_name   = '';
            }elseif($request->input('number_of_column') == '11'){
                $data->col1_name   = 'Column-1';
                $data->col2_name   = 'Column-2';
                $data->col3_name   = 'Column-3';
                $data->col4_name   = '';
                $data->col5_name   = '';
                $data->col6_name   = '';
            }elseif($request->input('number_of_column') == '12'){
                $data->col1_name   = 'Column-1';
                $data->col2_name   = 'Column-2';
                $data->col3_name   = 'Column-3';
                $data->col4_name   = 'Column-4';
                $data->col5_name   = '';
                $data->col6_name   = '';
            }elseif($request->input('number_of_column') == '13'){
                $data->col1_name   = 'Column-1';
                $data->col2_name   = 'Column-2';
                $data->col3_name   = 'Column-3';
                $data->col4_name   = 'Column-4';
                $data->col5_name   = 'Column-5';
                $data->col6_name   = 'Column-6';
            }elseif($request->input('number_of_column') == '14'){
                $data->col1_name   = 'Column-1';
                $data->col2_name   = 'Column-2';
                $data->col3_name   = 'Column-3';
                $data->col4_name   = '';
                $data->col5_name   = '';
                $data->col6_name   = '';
            }

            $data->save();

            return response()->json(['message' => 'Section Updated Successfully']);
        }
    }

    public function destroy(Request $request)
    {
        $data = CmsSection::find($request->input('id'));
        $data->delete();
        return response()->json(['message' => 'Section Deleted Successfully']);
    }

    public function destroyCol(Request $request)
    {
        $col_id = $request->input('col');
        $record = CmsSection::find($request->input('id'));

        if($col_id === '1'){
            if ($record) {
                $record->col1_name = '';
                $record->save();
            }
        }elseif($col_id === '2'){
            if ($record) {
                $record->col2_name = '';
                $record->save();
            }
        }elseif($col_id === '3'){
            if ($record) {
                $record->col3_name = '';
                $record->save();
            }
        }elseif($col_id === '4'){
            if ($record) {
                $record->col4_name = '';
                $record->save();
            }
        }elseif($col_id === '5'){
            if ($record) {
                $record->col5_name = '';
                $record->save();
            }
        }elseif($col_id === '6'){
            if ($record) {
                $record->col6_name = '';
                $record->save();
            }
        }
            
        return response()->json(['message' => 'Column Deleted Successfully']);
    }
    
    public function addComponent(Request $request)
    {
        //$com = CmsComponent::where('section_id',$request->input('section'))->where('column_id', $request->input('column'))->first();
        //$com->delete();

        $data = new CmsComponent();
        $data->section_id     = $request->input('section');
        $data->column_id      = $request->input('column');
        $data->component_id   = $request->input('id');
        $data->component_type = $request->input('type');
        $data->save();
       
        return response()->json(['message' => 'Component Selected Successfully']);
    }

    public function destroyComponent(Request $request)
    {
        $data = CmsCustomComponent::find($request->input('id'));
        $data->delete();

        return response()->json(['message' => 'Component Deleted Successfully']);
    }

    public function getComponents(Request $request)
    {
        $section_id = $request->input('section_id');
        $column_id  = $request->input('column_id');

        $component = CmsComponent::where('section_id', $section_id)
                                  ->where('column_id', $column_id)
                                  ->orderBy('id', 'desc')
                                  ->first();

        return response()->json(['component' => $component]);

        // if ($component) {
        //     Log::info('Component found', ['component' => $component]);
        //     return response()->json(['component' => $component]);
        // } else {
        //     Log::info('No component found');
        //     return response()->json(null);
        // }
    }

    public function editComponent(Request $request){
        $page_id = $request->page;
        $page_tab_id = $request->tabe;
        $data = CmsComponent::where('column_id', $request->col)->where('id', $request->id)->first();
        return view('backend.butex-builder.edit-custom-component', compact('data', 'page_id', 'page_tab_id'));
    }

    public function indexComponent(){
        $components = CmsCustomComponent::orderBy('id', 'desc')->get();
        return view('backend.butex-builder.create-component', compact('components'));
    }

    public function storeComponent(Request $request){
        $action = $request->action;

        if($action === 'insert'){
            $data = new CmsCustomComponent();
            
            $data->component_description      = $request->component_description;
            $custom_class = [
                'layout' => 'container',
                'fade' => '',
            ];
            $data->custom_class = json_encode($custom_class);
            $data->save();

            return redirect()->route('create.component')->with('success','Component Created Successfully');

        }elseif($action === 'update'){
            $data = CmsCustomComponent::find($request->id);
            $data->component_description      = $request->component_description;
            $data->save();

            return redirect()->route('create.component')->with('success','Component Updated Successfully');

        }elseif($action === 'custom'){
            $data = CmsComponent::find($request->id);
            $data->component_title    = $request->component_title;
            $data->long_descriptions  = $request->long_descriptions;
            $data->long_details_descriptions  = $request->long_details_descriptions;
            $data->image_class  = $request->image_class;
            $data->image_style  = $request->image_style;
            $data->image_style2 = $request->image_style2;

            if($request->hasFile('file')){
                $file = $request->file('file');
                $filename = now()->format('YmdHis') . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('upload/themes/'), $filename);
                $data->files = $filename;
            }
            
            $data->save();

            return back()->with('success', 'Component Updated Successfully');
            //return redirect()->route('butex_builder')->with('success','Component Updated Successfully');
        }
    }

    public function deleteComponent(Request $request){
        $data = CmsCustomComponent::find($request->id);
        return view('backend.butex-builder.edit-component', compact('data'));
    }

    public function _reorder(Request $request)
    {
        $posts = CmsSection::all();

        foreach ($posts as $post) {

            foreach ($request->order as $order) {

                if ($order['id'] == $post->id) {

                    $post->update(['section_order' => $order['position']]);
                }
            }
        }

        return response(['message' => 'Update Successfully'], 200);
    }

    public function reorder(Request $request)
    {
        $order = $request->order;

        foreach ($order as $item) {
            CmsSection::where('id', $item['id'])
                        ->update(['section_order' => $item['position']]);
        }

        return response()->json(['success' => true, 'message' => 'Order Updated Successfully']);
    }

    public function savePage(Request $request)
    {
        //dd($request);
        $page_id = $request->page_id;
        $tab_id  = $request->tab_id;
        $action  = $request->action;

        $updated = CmsSection::where('page_id', $page_id)
            ->where('page_tab_id', $tab_id)
            ->update(['page_visivility' => $action]);

        return response()->json(['success' => true, 'message' => 'Page Status Updated Successfully']);
    }

    public function designSection(Request $request){
        $data = CmsSection::find($request->id);
        $custom_style = json_decode($data->custom_style, true);
        $custom_class = json_decode($data->custom_class, true);
        return view('backend.butex-builder.design-section', compact('data', 'custom_style', 'custom_class'));
    }

    public function designComponent(Request $request){
        $data = CmsComponent::find($request->id);
        $custom_style = json_decode($data->custom_style, true);
        $custom_class = json_decode($data->custom_class, true);

        $page_id     = $request->page_id;
        $page_tab_id = $request->page_tab_id;

        return view('backend.butex-builder.design-component', compact('data', 'page_id', 'page_tab_id', 'custom_style', 'custom_class'));
    }

    public function storeDesign(Request $request){
        $data = CmsSection::find($request->id);
        
        $custom_class = [
            'layout' => $request->layout,
            'fade' => $request->fade,
        ];

        $custom_style = [
            'paddingTop'            => $request->paddingTop,
            'paddingRight'          => $request->paddingRight,
            'paddingBottom'         => $request->paddingBottom,
            'paddingLeft'           => $request->paddingLeft,
            'offset_x'              => $request->offset_x,
            'offset_y'              => $request->offset_y,
            'blur_radius'           => $request->blur_radius,   
            'shadow_color'          => $request->shadow_color,
            'marginTop'             => $request->marginTop,
            'marginRight'           => $request->marginRight,
            'marginBottom'          => $request->marginBottom,
            'marginLeft'            => $request->marginLeft,
            'bg_color'              => $request->bg_color,
            'color1'                => $request->color1,
            'color2'                => $request->color2,
            'bg_opacity'            => $request->bg_opacity,
            'borderRadius'          => $request->borderRadius,
            'border_top_width'      => $request->border_top_width,
            'border_top_style'      => $request->border_top_style,
            'border_top_color'      => $request->border_top_color,
            'border_right_width'    => $request->border_right_width,
            'border_right_style'    => $request->border_right_style,
            'border_right_color'    => $request->border_right_color,
            'border_bottom_width'   => $request->border_bottom_width,
            'border_bottom_style'   => $request->border_bottom_style,
            'border_bottom_color'   => $request->border_bottom_color,
            'border_left_width'     => $request->border_left_width,
            'border_left_style'     => $request->border_left_style,
            'border_left_color'     => $request->border_left_color,
        ]; 

        $data->custom_style = json_encode($custom_style);
        $data->custom_css   = $request->custom_css;
        $data->cssPreview   = $request->cssPreview;
        $data->custom_class = json_encode($custom_class);
       
        $data->save();

        return back()->with('success', 'Section Design Updated Successfully');
    }

    public function storeComponentDesign(Request $request){
        $data = CmsComponent::find($request->id);
        
        $custom_class = [
            'layout' => $request->layout,
            'fade' => $request->fade,
        ];

        $custom_style = [
            'paddingTop'            => $request->paddingTop,
            'paddingRight'          => $request->paddingRight,
            'paddingBottom'         => $request->paddingBottom,
            'paddingLeft'           => $request->paddingLeft,
            'offset_x'              => $request->offset_x,
            'offset_y'              => $request->offset_y,
            'blur_radius'           => $request->blur_radius,   
            'shadow_color'          => $request->shadow_color,
            'marginTop'             => $request->marginTop,
            'marginRight'           => $request->marginRight,
            'marginBottom'          => $request->marginBottom,
            'marginLeft'            => $request->marginLeft,
            'bg_color'              => $request->bg_color,
            'color1'                => $request->color1,
            'color2'                => $request->color2,
            'bg_opacity'            => $request->bg_opacity,
            'opacity'               => $request->opacity,
            'borderRadius'          => $request->borderRadius,
            'borderWidth'           => $request->borderWidth,
            'borderColor'           => $request->borderColor,
            'border_top_width'      => $request->border_top_width,
            'border_top_style'      => $request->border_top_style,
            'border_top_color'      => $request->border_top_color,
            'border_right_width'    => $request->border_right_width,
            'border_right_style'    => $request->border_right_style,
            'border_right_color'    => $request->border_right_color,
            'border_bottom_width'   => $request->border_bottom_width,
            'border_bottom_style'   => $request->border_bottom_style,
            'border_bottom_color'   => $request->border_bottom_color,
            'border_left_width'     => $request->border_left_width,
            'border_left_style'     => $request->border_left_style,
            'border_left_color'     => $request->border_left_color,

            'text_offset_x'         => $request->text_offset_x,
            'text_offset_y'         => $request->text_offset_y,
            'text_blur_radius'      => $request->text_blur_radius,
            'text_shadow_color'     => $request->text_shadow_color,
            'text_color'            => $request->text_color,
            'font_family'           => $request->font_family,
            'text_alignment'        => $request->text_alignment,
        ];

        $data->custom_style = json_encode($custom_style);
        $data->custom_css   = $request->custom_css;
        $data->cssPreview   = $request->cssPreview;
        $data->custom_class = json_encode($custom_class);
       
        $data->save();

        return back()->with('success', 'Component Design Updated Successfully');
    }

    public function themes(Request $request){
        $page_id     = $request->page_id;
        $page_tab_id = $request->page_tab_id;

        $data = CmsThemeDesign::where('page_id', $page_id)->where('page_tab_id', $page_tab_id)->first();

        if(is_null($data)){
            $page_id     = (int) $request->page_id;
            $page_tab_id = (int) $request->page_tab_id;
        }

        $custom_style = json_decode(@$data->custom_style, true);
        $custom_class = json_decode(@$data->custom_class, true);
      
        return view('backend.butex_theme_builder.index', compact('data', 'custom_style', 'custom_class', 'page_id', 'page_tab_id'));
    }

    public function storeThemeDesign(Request $request){
        //themes
        if(is_null($request->id)){
            $data = new CmsThemeDesign();
        }else{
            $data = CmsThemeDesign::find($request->id);
        }

        $custom_class = [
            'footer_layout' => $request->footer_layout,
            'footer_fade'   => $request->footer_fade,
        ];

        $custom_style = [
            "topmenu_font_family"        => $request->topmenu_font_family,
            "topmenu_text_size"          => $request->topmenu_text_size,
            "topmenu_text_color"         => $request->topmenu_text_color,
            "topmenu_text_hover_color"   => $request->topmenu_text_hover_color,
            "topmenu_bg_color"           => $request->topmenu_bg_color,
            "footer_layout"              => $request->footer_layout,
            "footer_fade"                => $request->footer_fade,
            "footer_text_color"          => $request->footer_text_color,
            "footer_hover_color"         => $request->footer_hover_color,
            "footer_font_family"         => $request->footer_font_family,
            "footer_font_size"           => $request->footer_font_size,
            "footer_paddingTop"          => $request->footer_paddingTop,
            "footer_paddingRight"        => $request->footer_paddingRight,
            "footer_paddingBottom"       => $request->footer_paddingBottom,
            "footer_paddingLeft"         => $request->footer_paddingLeft,
            "footer_marginTop"           => $request->footer_marginTop,
            "footer_marginRight"         => $request->footer_marginRight,
            "footer_marginBottom"        => $request->footer_marginBottom,
            "footer_marginLeft"          => $request->footer_marginLeft,
            "footer_color1"              => $request->footer_color1,
            "footer_color2"              => $request->footer_color2,
            "footer_bg_opacity"          => $request->footer_bg_opacity,
            "footer_borderRadius"        => $request->footer_borderRadius,
            "footer_border_top_width"    => $request->footer_border_top_width,
            "footer_border_top_style"    => $request->footer_border_top_style,
            "footer_border_top_color"    => $request->footer_border_top_color,
            "footer_border_right_width"  => $request->footer_border_right_width,
            "footer_border_right_style"  => $request->footer_border_right_style,
            "footer_border_right_color"  => $request->footer_border_right_color,
            "footer_border_bottom_width" => $request->footer_border_bottom_width,
            "footer_border_bottom_style" => $request->footer_border_bottom_style,
            "footer_border_bottom_color" => $request->footer_border_bottom_color,
            "footer_border_left_width"   => $request->footer_border_left_width,
            "footer_border_left_style"   => $request->footer_border_left_style,
            "footer_border_left_color"   => $request->footer_border_left_color,
            "bottom_text_size"           => $request->bottom_text_size,
            "bottom_font_family"         => $request->bottom_font_family,
            "bottom_text_color"          => $request->bottom_text_color,
            "bottom_text_hover_color"    => $request->bottom_text_hover_color,
            "bottom_bg_color"            => $request->bottom_bg_color,
            "custom_css"                 => $request->custom_css,
            "cssPreviewTop"              => $request->cssPreviewTop,
            "cssPreviewFooter"           => $request->cssPreviewFooter,
            "cssPreviewBottom"           => $request->cssPreviewBottom,
            "footer_bg_color"            => $request->footer_bg_color,
        ];

        $data->page_id              = $request->page_id;
        $data->page_tab_id          = $request->page_tab_id;
        $data->custom_class         = json_encode($custom_class);
        $data->custom_style         = json_encode($custom_style);
        $data->custom_css           = $request->custom_css;
        $data->css_preview_top      = $request->cssPreviewTop;
        $data->css_preview_footer   = $request->cssPreviewFooter;
        $data->css_preview_bottom   = $request->cssPreviewBottom;
        $data->custom_css_hover     = '';
             
        $data->save();
        return back()->with('success', 'Theme Design Updated Successfully');
    }

    public function butexThemes(Request $request){
        //zahid
        $page_id = $request->page_id;
        $page_tab_id = $request->page_tab_id;
        $themes      = CmsButexTheme::where('page_id', $page_id)->orderBy('id', 'desc')->get();
        
        if($page_id === '1'){
            $data = [];
        }else if($page_id === '2'){
            $data   = Faculty::where('status', 1)->get();
        }else if($page_id === '3'){
            $data   = Department::where('status', 1)->get();
        }else if($page_id === '4'){
            $data   = Office::where('status', 1)->get();
        }else if($page_id === '5'){
            $data   = Club::where('status', 1)->get();
        }else if($page_id === '6'){
            $data   = [];
        }
        
        return view('backend.butex_themes.index', compact('page_id', 'page_tab_id', 'data', 'themes'));
    }
   
    public function storeThemes(Request $request){
        //dd($request->all());
        $page_id     = $request->page_id;
        $page_tab_id = $request->tab_id;

        $sourceData = CmsSection::with('lastComponent')->where('page_id', $page_id)->where('page_tab_id', $page_tab_id)->get();

        $request->validate([
            'theme_name' => 'required|string|max:255',
            'file' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = new CmsButexTheme();
        $data->theme_name  = $request->theme_name;
        $data->status      = '0';
        $data->page_id     = $page_id;
        $data->page_tab_id = $page_tab_id;

        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = now()->format('YmdHis') . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/themes/'), $filename);
            $data->theme_image = $filename;
        }

        $data->save();

        $themes_id = $data->id;

        foreach ($sourceData as $myData){
            CmsTheme::create([
                'theme_id'         => $themes_id,
                'theme_section_id' => $myData->rand_id,
                'section_title'    => $myData->section_title,
                'number_of_column' => $myData->number_of_column,
                'section_order'    => $myData->section_order,
                'status'           => '1',
                'page_visivility'  => '2',
                'col_id'           => $myData->col_id,
                'col1_name'        => $myData->col1_name,
                'col2_id'          => $myData->col2_id,
                'col2_name'        => $myData->col2_name,
                'col3_id'          => $myData->col3_id,
                'col3_name'        => $myData->col3_name,
                'col4_id'          => $myData->col4_id,
                'col4_name'        => $myData->col4_name,
                'col5_id'          => $myData->col5_id,
                'col5_name'        => $myData->col5_name,
                'col6_id'          => $myData->col6_id,
                'col6_name'        => $myData->col6_name,
                'custom_style'     => $myData->custom_style,
                'custom_css'       => $myData->custom_css,
                'cssPreview'       => $myData->cssPreview,
                'custom_class'     => $myData->custom_class,
                'custom_script'    => $myData->custom_script,
            ]);
        }
        return back()->with('success', 'Theme Save Successfully');
    }

    public function storeInstall(Request $request){
        $action      = $request->action;
        $theme_id    = $request->theme_id;
        $page_id     = $request->page_id;
        $tab_id      = $request->tab_id;

        sleep(2);

        if($action === 'install'){
            // First, check if any records exist with the given conditions
            $cmsSections = CmsSection::where('page_id', $page_id)
                ->where('page_tab_id', $tab_id)
                ->get();

            // If records exist, delete them
            if ($cmsSections->isNotEmpty()) {
                CmsSection::where('page_id', $page_id)
                    ->where('page_tab_id', $tab_id)
                    ->delete();
            }

            //CmsSection::where('page_id', $page_id)->where('page_tab_id', $tab_id)->delete();

            $sourceData = CmsTheme::where('theme_id', $theme_id)->get();
            
            foreach ($sourceData as $myData){
                CmsSection::create([
                    'rand_id'          => $myData->theme_section_id,
                    'page_id'          => $page_id,
                    'page_tab_id'      => $tab_id,
                    'section_title'    => $myData->section_title,
                    'number_of_column' => $myData->number_of_column,
                    'section_order'    => $myData->section_order,
                    'status'           => '1',
                    'page_visivility'  => '2',
                    'col_id'           => $myData->col_id,
                    'col1_name'        => $myData->col1_name,
                    'col2_id'          => $myData->col2_id,
                    'col2_name'        => $myData->col2_name,
                    'col3_id'          => $myData->col3_id,
                    'col3_name'        => $myData->col3_name,
                    'col4_id'          => $myData->col4_id,
                    'col4_name'        => $myData->col4_name,
                    'col5_id'          => $myData->col5_id,
                    'col5_name'        => $myData->col5_name,
                    'col6_id'          => $myData->col6_id,
                    'col6_name'        => $myData->col6_name,
                    'custom_style'     => $myData->custom_style,
                    'custom_css'       => $myData->custom_css,
                    'cssPreview'       => $myData->cssPreview,
                    'custom_class'     => $myData->custom_class,
                    'custom_script'    => $myData->custom_script,
                   
                ]);
            }
            CmsButexTheme::where('id', $theme_id)->update(['status' => '1', 'page_id' => $page_id, 'page_tab_id' => $tab_id]);
            return response()->json(['success' => true, 'message' => 'Theme Install Successfully']);

        }else if($action === 'uninstall'){
            CmsSection::where('page_id', $page_id)->where('page_tab_id', $tab_id)->delete();
            CmsButexTheme::where('id', $theme_id)->update(['status' => '0', 'page_id' => '', 'page_tab_id' => '']);

            return response()->json(['success' => true, 'message' => 'Theme Uninstall Successfully']);
        }else if($action === 'delete'){
            CmsButexTheme::where('id', $theme_id)->delete();
            CmsTheme::where('theme_id', $theme_id)->delete();
            return response()->json(['success' => true, 'message' => 'Theme Deleted Successfully']);
        }

        //$sourceData = CmsTheme::where('theme_id', $theme_id)->get();

        //$data = CmsSection::where('page_id', $page_id)->where('page_tab_id', $page_tab_id)->delete();

        // $data->delete();

        // dd($data);

    }

}