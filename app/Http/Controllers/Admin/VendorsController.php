<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\MainCategory;
use App\Http\Requests\VendorRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\VendorCreated;
use Illuminate\Support\facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
                // 'password'          => Hash::make($request->password),
                // 'password'          => bcrypt($request->password),
                'password'          => $request->password, //bcrybt in model
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
        try{
            $vendors = Vendor::selection()->find($id);
            if(!$vendors){
                return redirect()->route('admin.vendors')->with(['success' => 'the vendor is not found !!']);
            }

            $Main_Categories = MainCategory::where('translation_of',0)->active()->get();

            return view('Admin.vendors.edit',compact('vendors','Main_Categories'));
        }catch(\Exception $ex){
            return redirect()->route('admin.vendors')->with(['error' => 'Faild Process']);
        }
    }

    public function update($id, VendorRequest $request){
        try{
            $vendors = Vendor::selection()->find($id);
            if(!$vendors){
                return redirect()->route('admin.vendors')->with(['error' => 'the vendor is not found !!']);
            }

            if(!$request->has('active'))
                $request->request->add(['active' => 0]);
            else
                $request->request->add(['active' => 1]);

            
            DB::beginTransaction();

            if($request->has('logo')){
                $filePath = uploadImage('vendors',$request->logo);
                $vendors->update([
                   'logo' => $filePath
                ]);
            }

            $data = $request->except('_token','id','password','logo');

            if($request->has('password')){
                $data['password'] = $request->password;
            }

            $vendors->update($data);

            DB::commit();
            return redirect()->route('admin.vendors')->with(['success' => 'Done Updated Vendor']);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('admin.vendors')->with(['error' => 'Faild Process']);
        }
    }

    public function changeStatus($id){
        try{
            $vendors = Vendor::find($id);
            if(!$vendors){
                return redirect()->route('admin.vendors')->with(['error' => 'Not Found Vendor !']);
            }
            $status = $vendors->active == 1 ? 0 : 1;
            $vendors->update(['active' => $status]);

            return redirect()->route('admin.vendors')->with(['success' => 'Done Update Status Vendor !']);
        }catch(\Exception $ex){
            return redirect()->route('admin.vendors')->with(['error' => 'Faild Process !']);
        }
    }

    public function destroy($id){
        try{
            $vendors = Vendor::find($id);
            if(!$vendors){
                return redirect()->route('admin.vendors')->with(['error' => 'Not Found Vendor !']);
            }

            $images = Str::after($vendors->logo, 'images/');
            $length_logo = ('images/'.$images); 
            unlink($length_logo);

            $vendors->delete();

            return redirect()->route('admin.vendors')->with(['success' => 'Done Delete Vendor !']);
        }catch(\Exception $ex){
            return $ex;
            return redirect()->route('admin.vendors')->with(['error' => 'Faild Process !']);
        }
    }
}
