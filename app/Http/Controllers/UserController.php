<?php
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Image;
use App\Models\State;
use App\Models\Brand;
use App\Models\City;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\File;
use Illuminate\Http\Storage;
use Illuminate\Http\UploadedFile;
// use DB;
// use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      
        $data = User::with('cities', "states")->orderBy('id','DESC')->paginate(60);
        // $pathImg = public_path('asset\uploads\Capture.PNG');
        // $pathImg = ;
        // return $data[0];
       
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $roles = Role::pluck()->all();
        $roleNames = Role::all()->pluck('name');
        $roles = Role::pluck('name','name')->all();
        // $cities = City::get();
        $states = State::get(["name", "id"]);
        
        // $states = State::all()->pluck('name');
        // return $cities;
        return view('users.create',compact('roles', "roleNames", "states" ));
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
            'name' => 'required',
            'email' => 'nullable|email|unique:users,email',
            'phone_number' => 'required|unique:users,phone_number|max:10',
            'password' => '',
            'roles' => 'required',
            'profile_image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        if ($request->hasFile('profile_image')) {

            $imagename = $request->file('profile_image')->getClientOriginalName();
        

            $path = $request->file('profile_image')->storeAs('/uploads',$imagename);
            $save = new Image;

            $save->name = $imagename;
            $save->path = $path;
            $save->save();
       
            
            // $input['profile_image'] = Image::$user->path->get();
            $input['profile_image'] = $imagename;
            $request->file('profile_image')->move(public_path('uploads'),$imagename);
        }

        $user = User::create($input);
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with('cities',"states")->find($id);
        $roles = Role::all()->pluck('name');
        $states = State::get(["name", "id"]);

        // $roles = Role::pluck('name','name')->all();
        // $roles = Role::all();
        $allcities = City::where('state_id', $user->states->id)->get();
        $userRole = $user->roles->all();
        $userRoles =  $userRole[0]->name;
        // return $user;
        return view('users.edit',compact('user','roles','userRole','userRoles', "states", "allcities"));

        // $roles = Role::pluck('name','name')->all();
        // $userRole = $user->roles->pluck('name','name')->all();
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => '',
            // 'password' => 'same:confirm-password',
            'roles' => 'required',
            // 'profile_image' => 'required',
        ]);
        
        $input = $request->all();

        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }

        if ($request->hasFile('profile_image')) {

            $imagename = $request->file('profile_image')->getClientOriginalName();
        
            $path = $request->file('profile_image')->storeAs('/uploads',$imagename);
            $save = new Image;

            $save->name = $imagename;
            $save->path = $path;
            $save->save();
       
            // $input['profile_image'] = Image::$user->path->get();
            $input['profile_image'] = $imagename;
            $request->file('profile_image')->move(public_path('uploads'),$imagename);
        }

        $user = User::find($id);
      
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }

    public function index_brand()
    {
        return redirect()->route('vechicles.index');
    }
 
    public function create_brand(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:brand,name',
        ]);

        $input = $request->all();
        $brand = new Brand;

        return redirect()->route('vehicles.index')->with('success',"Brand added successfully");
    }

    public function store_brand()
    {
        
    }
    
    public function show_brand()
    {
        
    }
    
    public function edit_brand()
    {
        
    }

    public function update_brand()
    {
        
    }

    public function destroy_brand()
    {
        
    }
}