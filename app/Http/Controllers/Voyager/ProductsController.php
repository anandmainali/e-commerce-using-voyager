<?php

namespace App\Http\Controllers\Voyager;
use App\ChildCategory;
use App\ProductCategory;
use App\SubCategory;
use App\Product;
use Cart;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class ProductsController extends VoyagerBaseController
{

   public function subcategories(){
       $categories_id = Input::get('category_id');
       $subcategories = SubCategory::where('product_category_id','=',$categories_id)->get();
       return response()->json($subcategories);
   }

    public function childcategories(){
       $subcategories_id = Input::get('subcategory_id');
       $childcategories = ChildCategory::where('product_subcategory_id','=',$subcategories_id)->get();
       return response()->json($childcategories);
   }
   
       //***************************************
    //                ______
    //               |  ____|
    //               | |__
    //               |  __|
    //               | |____
    //               |______|
    //
    //  Edit an item of our Data Type BR(E)AD
    //
    //****************************************

    public function edit(Request $request, $id)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Compatibility with Model binding.
        $id = $id instanceof Model ? $id->{$id->getKeyName()} : $id;

        $relationships = $this->getRelationships($dataType);

        $dataTypeContent = (strlen($dataType->model_name) != 0)
            ? app($dataType->model_name)->with($relationships)->findOrFail($id)
            : DB::table($dataType->name)->where('id', $id)->first(); // If Model doest exist, get data from table name

        foreach ($dataType->editRows as $key => $row) {
            $details = json_decode($row->details);
            $dataType->editRows[$key]['col_width'] = isset($details->width) ? $details->width : 100;
        }

        // If a column has a relationship associated with it, we do not want to show that field
        $this->removeRelationshipField($dataType, 'edit');

        // Check permission
        $this->authorize('edit', $dataTypeContent);

        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($dataTypeContent);

        $view = 'voyager::bread.edit-add';

        if (view()->exists("voyager::$slug.edit-add")) {
            $view = "voyager::$slug.edit-add";
        }
        
        $product = Product::find($id);
        
        $editSubcategories = SubCategory::where('product_category_id',$product->category_id)->get();
        $editChildcategories = ChildCategory::where('product_subcategory_id',$product->subcategory_id)->get();
       $editCategory = ProductCategory::where('id',$product->category_id)->get();
       $editSubcategory = SubCategory::where('id',$product->subcategory_id)->get();
       $editChildcategory = ChildCategory::where('id',$product->childcategory_id)->get();
     
        
        return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable','selectedvalue','editCategory','editSubcategory','editChildcategory','editSubcategories','editChildcategories'));
    }

    // POST BR(E)AD
    public function update(Request $request, $id)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Compatibility with Model binding.
        $id = $id instanceof Model ? $id->{$id->getKeyName()} : $id;
        
        $data = call_user_func([$dataType->model_name, 'findOrFail'], $id);
        
        // Check permission
        $this->authorize('edit', $data);

        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->editRows, $slug, $id);
       

        if ($val->fails()) {
            return response()->json(['errors' => $val->messages()]);
        }

        if (!$request->ajax()) {
            $data['category_id'] = $request->category_id; 
            $data['subcategory_id'] = $request->subcategory_id; 
            $data['childcategory_id'] = $request->childcategory_id;
            
            $this->insertUpdateData($request, $slug, $dataType->editRows, $data);

            event(new BreadDataUpdated($dataType, $data));

            return redirect()
                ->route("voyager.{$dataType->slug}.index")
                ->with([
                    'message'    => __('voyager.generic.successfully_updated')." {$dataType->display_name_singular}",
                    'alert-type' => 'success',
                ]);
        }
    }
    
    
   
   
   
    //***************************************
    //
    //                   /\
    //                  /  \
    //                 / /\ \
    //                / ____ \
    //               /_/    \_\
    //
    //
    // Add a new item of our Data Type BRE(A)D
    //
    //****************************************

    public function create(Request $request)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));

        $dataTypeContent = (strlen($dataType->model_name) != 0)
                            ? new $dataType->model_name()
                            : false;

        foreach ($dataType->addRows as $key => $row) {
            $details = json_decode($row->details);
            $dataType->addRows[$key]['col_width'] = isset($details->width) ? $details->width : 100;
        }

        // If a column has a relationship associated with it, we do not want to show that field
        $this->removeRelationshipField($dataType, 'add');

        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($dataTypeContent);

        $view = 'voyager::bread.edit-add';

        if (view()->exists("voyager::$slug.edit-add")) {
            $view = "voyager::$slug.edit-add";
        }
        
        $editCategory = collect([]);
       
       $editSubcategories = '';
       $editChildcategories = '';

        return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable','editCategory','editSubcategories','editChildcategories'));
    }

    /**
     * POST BRE(A)D - Store data.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
       
            dd($request->all());
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));

        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->addRows);

        if ($val->fails()) {
            return response()->json(['errors' => $val->messages()]);
        }

        if (!$request->ajax()) {

            $data['category_id'] = $request->category_id; 
            $data['subcategory_id'] = $request->subcategory_id; 
            $data['childcategory_id'] = $request->childcategory_id;
            
            $data = $this->insertUpdateData($request, $slug, $dataType->addRows, new $dataType->model_name());

            event(new BreadDataAdded($dataType, $data));

            return redirect()
                ->route("voyager.{$dataType->slug}.index")
                ->with([
                        'message'    => __('voyager.generic.successfully_added_new')." {$dataType->display_name_singular}",
                        'alert-type' => 'success',
                    ]);
        }
    }

}
