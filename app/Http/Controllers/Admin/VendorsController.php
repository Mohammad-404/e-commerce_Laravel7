<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\MainCategory;
use App\Http\Requests\VendorRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\VendorCreated;

class VendorsController extends Controller
{
    public function index(){
        $Vendors = Vendor::selection()->paginate(PAGINATION_COUNT);
        return view('Admin.vendors.index',compact('Vendors'));
    }

    public function create(){
        // $Main_Categories = MainCategory::where('translation_lang',get_language_deafult())->active()->get();
        $Main_Categories = MainCategory::where('translation_of',0)->active()->get();
        return view('Admin.vendors.create',compact('Main_Categories'));
    }

    public function store(VendorRequest $request){
        try{
            if(!$request->has('active'))
                $request->request->add(['active' => 0]);
            else
                $request->request->add(['active' => 1]);

            $filePath = "";
            if($request->has('logo')){
                $filePath = uploadImage('vendors',$request->logo);
            }

            $vendor = Vendor::create([
                'name'              => $request->name,
                'email'             => $request->email,
                'mobile'            => $request->mobile,
                'active'            => $request->active,
                'address'           => $request->address,
                'category_id'       => $request->category_id,
                'logo'              => $filePath,
            ]);

            Notification::send($vendor, new VendorCreated($vendor));
            // Notification::send($toUser, new MessagesNew($FromUser));

            return redirect()->route('admin.vendors')->with(['success' => 'Done Insert Vendor']);
        }catch(\Exception $ex){
            return redirect()->route('admin.vendors')->with(['error'   => 'Feild Insert Process']);
        }
    }

    
    public function edit($id){

    }

    public function update($id){

    }

    
    public function changeStatus(){

    }

    public function delete($id){

    }
}
