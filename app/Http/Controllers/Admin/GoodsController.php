<?php

namespace App\Http\Controllers\Admin;

use App\Models\Goods;
use App\Models\Supplier;
use App\Services\Core;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GoodsController extends BaseController
{
    use Core;
    public function index(Request $request)
    {
        $where = [];
        if($keywords = $request->input('keywords')){
            array_push($where,['goods_name','like','%'.$keywords.'%']);
        }
        $list = Goods::orderBy('id','desc')->where($where)->paginate(10);
        if($keywords){
            $list->appends(['keywords'=>$keywords]);
        }
        return view('admin.goods-list',compact('list','keywords'));
    }

    public function create()
    {
        $supplier = Supplier::orderBy('id','desc')->get();
        return view('admin.goods-add',compact('supplier'));
    }

    public function store(Request $request)
    {
        $post = $request->all();
        $validator = Validator::make($post,[
            'goods_name'=>'required',
            'supplier_id'=>'required',
            'spec'=>'required',
        ],[
            'goods_name.required'=>'参数错误,请输入商品名称',
            'supplier_id.required'=>'参数错误,请选择供应商',
            'spec.required'=>'参数错误,请输入规格',
        ]);

        if($validator->fails()){
            return $this->output_error($validator->messages()->first());
        }


        $goods = Goods::where('supplier_id')->where('goods_name',$post['goods_name'])->where('spec',$post['spec'])->first();
        if($goods)return $this->output_error("商品已存在,请修改商品信息");

        if(Goods::create($post)){
            $this->AdminLog("添加商品-[".$post['goods_name']."]");
            return $this->output_data("保存成功");
        }
        return $this->output_error("保存失败,请重试");
    }

    public function destroy(Goods $good)
    {
        $this->AdminLog("删除商品-[".$good->goods_name."]");
        if($good->delete()){
            return $this->output_data("删除成功");
        }
        return $this->output_error("删除失败");
    }

    public function show(Goods $good)
    {
        return $this->output_data($good);
    }

    public function edit(Goods $good)
    {
        $supplier = Supplier::orderBy('id','desc')->get();
        return view('admin.goods-edit',compact('good','supplier'));
    }

    public function update(Goods $good,Request $request)
    {
        $post = $request->all();
        $validator = Validator::make($post,[
            'goods_name'=>'required',
            'spec'=>'required',
        ],[
            'goods_name.required'=>'参数错误,请输入商品名称',
            'spec.required'=>'参数错误,请输入规格',
        ]);

        if($validator->fails()){
            return $this->output_error($validator->messages()->first());
        }

        if($good->update($post)){
            $this->AdminLog("修改商品-[".$good->goods_name."]");
            return $this->output_data("保存成功");
        }
        return $this->output_error("保存失败,请重试");
    }
}
