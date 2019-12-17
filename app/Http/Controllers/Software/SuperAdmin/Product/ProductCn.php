<?php

namespace App\Http\Controllers\Software\SuperAdmin\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\SubCategory;
use App\Model\Brand;
use App\Model\Product;
use App\Model\ProductImage;
use Image;

class ProductCn extends Controller
{
    public function index()
    {
        $data['products']           = Product::with('category', 'subCategory', 'brand', 'productImg')->orderBy('id', 'desc')->get();
        return saView('pages.product.product.index', $data);
    }

    public function create($id = null)
    {
        $data['categories']         = Category::where('status', 1)->orderBy('id', 'asc')->get();
        $data['sub_categories']     = SubCategory::where('status', 1)->orderBy('id', 'asc')->get();
        $data['brand']              = Brand::where('status', 1)->orderBy('id', 'asc')->get();

        if (!$id){
            $data['action']     = 'save';
        } else {
            $data['action']     = 'edit';
            $data['value']      = Product::with('productImg')->findOrFail($id);
        }

        return saView('pages.product.product.create', $data);
    }

    public function store(Request $request)
    {
        $data['cat_id']             = $request->cat_id;
        $data['sub_cat_id']         = $request->sub_cat_id;
        $data['brand_id']           = $request->brand_id;
        $data['name']               = $request->name;
        $data['description']        = $request->description;
        $data['price']              = $request->price;
        $data['discount']           = $request->discount;
        $data['status']             = $request->status;
        $dz_image                   = $request->dz_image;
        $id                         = $request->id;

        if(!$id)
        {
            $data['post_id']        = uniqNum();
            $data['created_by']     = saUser('id');
            $save                   = Product::create($data)->id;

            if ($dz_image) {
                foreach ($dz_image as $key => $v) {
                    $dzImg['prod_id']   = $save;
                    $dzImg['image']     = $v;
                    $dzImg['thumb']     = 0;
                    ProductImage::create($dzImg);
                }
            }

            msgFlash(CREATE);
        } else {
            $imgs = ProductImage::where('prod_id', $id)->get();

            $files = [];
            foreach ($imgs as $key => $i) {
                $file = 'image'.$i->id;
                if($request->hasFile($file))
                {
                    $doc = $request->file($file);
                    $name = time()+($key+1).'.'.$doc->getClientOriginalExtension();
                    $path = 'upload/products/';
                    $sizes = ['400x400', '100x100'];
                    foreach ($sizes as $size) {
                        $szArr = explode('x', $size);
                        $width = $szArr[0]; $height = $szArr[1];
                        Image::make($doc)->resize($width, $height)->save($path.$size.$name);
                    }
                    $dzImg['image'] = $name;
                    if($id) dbClearFile('product_image', ['id' => $i->id], $path, ['image'], $sizes);

                    ProductImage::whereId($i->id)->update($dzImg);
                }
            }

            if ($dz_image) {
                foreach ($dz_image as $key => $v) {
                    $dzImg['prod_id']   = $id;
                    $dzImg['image']     = $v;
                    $dzImg['thumb']     = 0;
                    ProductImage::create($dzImg);
                }
            }

            $data['updated_by']     = saUser('id');
            $update                 = Product::whereId($id)->update($data);
            msgFlash(UPDATE);
        }

        return saRedirect('product.index');
    }

    public function dropzone(Request $request)
    {
        $sFile = '';
        $files = $request->file;
        // $sizes = ['308x412', '400x400', '450x450', '105x105', '70x80'];
        $sizes = ['400x400', '100x100'];
        foreach ($files as $key => $file)
        {
            $doc = $file;
            $name = time()+($key+1).'.'.$doc->getClientOriginalExtension();
            $path = 'upload/products/';
            foreach ($sizes as $size) {
                $szArr = explode('x', $size);
                $width = $szArr[0]; $height = $szArr[1];
                Image::make($doc)->resize($width, $height)->save($path.$size.$name);
            }
            $sFile .= '<input type="hidden" name="dz_image[]" value="'.$name.'">';
        }

        echo $sFile;
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Request $request)
    {
        $update = Product::whereId($request->id)->update(['deleted_by' => saUser('id')]);

        if(!isSoftDl('App\Model\Product')){
            $sizes = ['400x400', '100x100'];
            dbClearFile('products', ['id' => $request->id], 'upload/products/', ['cat_image'], $sizes);
        }
        
        $delete = Product::destroy($request->id);
        msgFlash(DESTROY);

        return response()->json(['msg' => 'success']);
    }

    public function image_destroy(Request $request)
    {
        $sizes = ['400x400', '100x100'];
        dbClearFile('product_image', ['id' => $request->id], 'upload/products/', ['image'], $sizes);
        
        $delete = ProductImage::destroy($request->id);
        msgFlash(DESTROY);

        return response()->json(['msg' => 'success']);
    }
}
