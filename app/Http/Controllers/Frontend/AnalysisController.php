<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Subproduct;
use App\Product;
use App\Http\Requests\AnalysisFilterRequest;
use App\Analysis;
use Illuminate\Database\Eloquent\Collection;

use SEO;

class AnalysisController extends Controller
{
    public function show($product,$subproduct,$analysi)
    {
        $analysi = Analysis::findBySlug($analysi);
        $subproduct =$analysi->subproduct;
        $relateds = $this->related($analysi);

        SEO::setDescription(str_limit($analysi->body,150));
        SEO::metatags()->addMeta('article:published_time', $analysi->created_at->toW3CString(), 'property');
        SEO::metatags()->addMeta('article:section','análisis','property');
        SEO::metatags()->addKeyword($analysi->tags);

        SEO::opengraph()->setTitle($analysi->title)
            ->addImage(url("image/cache/original/".$analysi->file->name))
            ->setArticle([
                'published_time' => $analysi->created_at->toW3CString(),
                'modified_time' => $analysi->updated_at->toW3CString(),
                'author' => $analysi->user->name,
                //'tag' => 'string / array'
            ]);

        return view('frontend.analysis.analysi',compact('analysi','relateds'));
    }
    public function search(AnalysisFilterRequest $request)
    {
        $subproduct = Subproduct::findOrFail($request->subproduct);
        if(is_array($request->brand)){
            $analysis= Analysis::whereIn('brand',$request->brand)->where([
                ['vote','>=',$request->vote],
                ['subproduct_id',$subproduct->id]
            ])->orderBy('created_at', 'DESC')->paginate(5);
            return view('frontend.analysis.subproduct',compact('subproduct','analysis'));
        }else{
            return redirect('analisis/'.$subproduct->product->slug.'/'.$subproduct->slug);
        }
    }
    public function related($analysi)
    {
        $relateds = new Collection();
        $relateds->add(Analysis::where('id','!=',$analysi->id)->search($analysi->title,true)->take(3)->get()) ;
        $relateds = $relateds->filter(function ($item){
            if(!$item->isEmpty()){
                return $item;
            }
        });
        $relateds->forget($analysi->id);
        $relateds=$relateds->flatten();
        return $relateds;
    }
}
