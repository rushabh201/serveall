<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Image;
use App\Models\Brand;
// use App\Models\VehicleModel;
use App\Models\VehicleModel;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   

        $data = Vehicle::with('brand', 'vehicle_model')->orderBy('id','DESC')->paginate(60);
        // $pathImg = public_path('asset\uploads\Capture.PNG');
        // $pathImg = ;


        // $brandName = Brand::all();
        // $brandName->
        // $products = Product::with('skus')->get();
        // foreach($brandName as  $name) {
        //    $data2 = $name->name;
        // }
        // $print_data = $data->brand_id;
        // $user->roles->all();
        //  return $data[0];
        // $data->brand_id = Vehicle::brand->name;
        return view('vehicles.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    //     $vehicle = Vehicle::orderBy('id', 'desc')
    //     ->get();

    // return view('vehicles.index', compact('vehicle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        //
        // return $vehicles[0];
        // $brand_vehicles = {}
        return view('vehicles.create', compact('brands'));

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'brand_id' => 'required',
            'model_id' => 'required',
            'vehicle_registration_number' => 'required|unique:vehicles,vehicle_registration_number',
            'insurance_expiry_date' => 'required',
            'registration_certificate_img' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'insurance_img' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
    
        $input = $request->all();

        if ($request->hasFile('registration_certificate_img')) {

            $crt_imagename = $request->file('registration_certificate_img')->getClientOriginalName();
        

            $path = $request->file('registration_certificate_img')->storeAs('/uploads/registration_certificate_img',$crt_imagename);
            $save = new Image;

            $save->name = $crt_imagename;
            $save->path = $path;
            $save->save();
            
            $request->file('registration_certificate_img')->move(public_path('uploads/registration_certificate_img'),$crt_imagename);
       
            // $input['registration_certificate_img'] = Image::$user->path->get();
            $input['registration_certificate_img'] = $crt_imagename;

        }

        if ($request->hasFile('insurance_img')) {

            $imagename = $request->file('insurance_img')->getClientOriginalName();
        

            $path = $request->file('insurance_img')->storeAs('/uploads/insurance_img',$imagename);
            $save = new Image;

            $save->name = $imagename;
            $save->path = $path;
            $save->save();
       
            $request->file('insurance_img')->move(public_path('uploads/insurance_img'),$imagename);
           
            // $input['insurance_img'] = Image::$user->path->get();
            $input['insurance_img'] = $imagename;
        }

        $request->insurance_expiry_date = date('Y-m-d' , strtotime($request->insurance_expiry_date));
        $request->manufacturing_date = date('Y-m-d' , strtotime($request->manufacturing_date));
        $request->purchase_date = date('Y-m-d' , strtotime($request->purchase_date));

        $vehicle = Vehicle::create($input);
    
        return redirect()->route('vehicles.index')
                        ->with('success','Vehicle added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $vehicle = Vehicle::find($id);
        
        // return $vehicle->vehicle_registration_number;
        return view('vehicles.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'brand_id' => 'required',
            'model_id' => 'required',
            'vehicle_registration_number' => 'required',
            'insurance_expiry_date' => 'required',
            'registration_certificate_img' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'insurance_img' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        
        $input = $request->all();
        
        if($request->insurance_expiry_date ) {
        $request->insurance_expiry_date = date('Y-m-d' , strtotime($request->insurance_expiry_date));
        }
        if($request->manufacturing_date ) {
        $request->manufacturing_date = date('Y-m-d' , strtotime($request->manufacturing_date)); 
        }
        if($request->purchase_date ) {
        $request->purchase_date = date('Y-m-d' , strtotime($request->purchase_date));
        }

        if ($request->hasFile('registration_certificate_img')) {

            $crt_imagename = $request->file('registration_certificate_img')->getClientOriginalName();
        

            $path = $request->file('registration_certificate_img')->storeAs('/uploads/registration_certificate_img',$crt_imagename);
            $save = new Image;

            $save->name = $crt_imagename;
            $save->path = $path;
            $save->save();
            
            $request->file('registration_certificate_img')->move(public_path('uploads/registration_certificate_img'),$crt_imagename);
       
            // $input['registration_certificate_img'] = Image::$user->path->get();
            $input['registration_certificate_img'] = $crt_imagename;

        }

        if ($request->hasFile('insurance_img')) {

            $imagename = $request->file('insurance_img')->getClientOriginalName();
        

            $path = $request->file('insurance_img')->storeAs('/uploads/insurance_img',$imagename);
            $save = new Image;

            $save->name = $imagename;
            $save->path = $path;
            $save->save();
       
            $request->file('insurance_img')->move(public_path('uploads/insurance_img'),$imagename);
           
            // $input['insurance_img'] = Image::$user->path->get();
            $input['insurance_img'] = $imagename;
        }

        $vehicles = Vehicle::find($id);
      
        $vehicles->update($input);

        return redirect()->route('vehicles.index')->with('success','Vehicle updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Vehicle::findOrFail($id)->delete();
        return redirect()->route('vehicles.index')->with('success','Vehicle deleted successfully');
    }

    public function create_vehicle_model(Request $request) {
        $data = new VehicleModel;
        $data->model_name = $request->model_name;
        $data->brand_id = $request->brand_id;
        $data->save();
        return response()->json($data);
    }

    public function create_brand(Request $request)
    {
        // $data['states'] = Brand::get(["name", "id"]);
        
        $save = new Brand;
        $save->name=$request->name;
        $save->save();
        return response()->json($save);

        $this->validate($request, [
            'name' => 'required|unique:brands',
        ]);
      
         
        $save = new Brand;
        $save->name=$request->name;
        $save->save();
        // return $input;
        
        //  $brands = Brand::create($input);

        return redirect()->route('vehicles.index')->with('success',"Brand added successfully");
    }

    public function fetch_brand()
    {
        $brand_names = Brand::all();
        // $brand_names = Brand::get('name');

        return $brand_names; 
    }

    public function fetch_vehicle_model(Request $request) {
        $data['models'] = VehicleModel::where('brand_id',$request->brand_id)->get(['model_name', "id"]);
        // return $model_names; 
        return response()->json($data);
    }

}
