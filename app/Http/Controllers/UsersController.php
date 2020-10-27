<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Modules;
use App\Models\Privileges;
use App\Models\Userprofiles;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Image;
use File;


class UsersController extends Controller
{
    public function index()
    {
        // if(!check_privileges('A00003')) return cres403();

        $content = [
            'users' => User::all()
        ];
        
        $pagecontent = view('contents.users.index', $content);

    	//masterpage
        $pagemain = array(
            'title' => 'User',
            'menu' => 'privileges',
            'submenu' => 'users',
            'pagecontent' => $pagecontent,
        );

        return view('contents.masterpage', $pagemain);
    }

    public function addusers()
    {
        $content = [
        ];
        $pagecontent = view('contents.users.addusers', $content);

    	//masterpage
        $pagemain = array(
            'title' => 'Add users',
            'menu' => 'privileges',
            'submenu' => 'users',
            'pagecontent' => $pagecontent,
        );

        return view('contents.masterpage', $pagemain);
    }

    public function addusers_save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'image' => 'required|file|mimes:jpg,jpeg,png|max:50000',
        ]);

        $filename = NULL;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = time()."_".$file->getClientOriginalName();
            $destinasi = env('CDN_URL').'imagesprofile/'; 
            $file->move($destinasi, $filename);
        }

        $user = new User;
        $user->name = $request->name;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->image = $filename;
        $user->role = $request->role;
        // return $user;
        $user->save();

        return redirect('privileges/users');

    }

    public function update_page(User $user)
    {
        // if(!check_privileges('A00003')) return cres403();

        $content = [
            'users' => User::find($user->idusers),
            'access' => $this->module_sort($user->idusers)
        ];

        // return $content;
        
        $pagecontent = view('contents.users.update', $content);

    	//masterpage
        $pagemain = array(
            'title' => 'User',
            'menu' => 'privileges',
            'submenu' => 'users',
            'pagecontent' => $pagecontent,
        );

        return view('contents.masterpage', $pagemain);
    }

    public function update_save(User $user, Request $request)
    {
        // if(!check_privileges('A00004')) return cres403();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            // 'image' => 'required|file|mimes:jpg,jpeg,png|max:50000',
        ]);

        $filename = NULL;
        if (!empty($user->image)) {
            if (!empty($request->image)) {
                $path_image = env('CDN_URL').'imagesprofile/'.$user->image; 
                if(File::exists($path_image)){
                    $image = $request->file('image');
                    $filename = Str::random(20).'.'.$image->getClientOriginalExtension();
                    $cdnpath =  env('CDN_URL').'imagesprofile/';
                    $image->move($cdnpath,$filename);
                }
                File::delete($path_image);
                
            }else{
                $filename = $user->image;
            }
        }elseif ($request->hasFile('image')){
            $file = $request->file('image');
            $filename = time()."_".$file->getClientOriginalName();
            $destinasi = env('CDN_URL').'imagesprofile/'; 
            $file->move($destinasi, $filename);
        }

        $user = User::find($user->idusers);
        $user->name = $request->name;
        $user->role = $request->role;
        $user->image = $filename;
        $user->email = $request->email;
        $user->save();

        return redirect('privileges/users');
    }

    public function save_privileges(User $user, Request $request)
    {
        // return $request->all();
         //get iduser
         $idusers = $user->idusers;

         //delete old privileges
         Privileges::where('idusers',$user->idusers)->delete();
 
         foreach ($request->all() as $key => $val) {
             if($key != '_token') {
                 $saveprv = new Privileges;
                 $saveprv->idusers = $idusers;
                 $saveprv->module_code = $key;
                 $saveprv->save();
             }
         }

        return redirect('privileges/users');

    }

   protected function module_sort($idusers)
   {
    $result = [];

    //privileges
    $datapvl = [];
    $privileges = Privileges::select('module_code')
    ->where('idusers',$idusers)
    ->get();
    foreach ($privileges as $pvl) {
        array_push($datapvl, $pvl->module_code);
    }

    //modules
    $modules = Modules::orderBy('code')->get();
    foreach ($modules as $mod) {
        //user access
        $access = FALSE;
        if(in_array($mod->code, $datapvl)) {
            $access = TRUE;
        }
        //collect module
        $result[$mod->application][$mod->module][$mod->action] = [
            'code' => $mod->code,
            'access' => $access
        ];
    }

    return $result;
   }

   public function create_profile(User $user)
   {
            $users = User::with([
                'userprofiles',
                ])
                ->where('idusers',$user->idusers)
                ->first();
        $contents = [
        'users' => $users,
        'user' => $user
        ];

        $pagecontent = view('contents.users.userprofiles.create', $contents);

        //masterpage
        $pagemain = array(
        'title' => 'Users profiles',
        'menu' => 'privileges',
        'submenu' => 'users',
        'pagecontent' => $pagecontent,
        );

        return view('contents.masterpage', $pagemain);
   }

   public function profile_save(User $user, Request $request)
   {
        // $request->validate([
        //     'firstname' => 'required',
        //     'lastname' => 'required',
        //     'role' => 'required',
        //     'tempatlahir' => 'required',
        //     'date_born' => 'required',
        //     'jobrole' => 'required',
        //     'address' => 'required',
        // ]);

        // if (empty($request->firstname)) {
        //     return redirect()->back()->with('status_error', 'firstname is required ');
        // }

        $userprofile = new Userprofiles;
        $userprofile->firstname = $request->firstname;
        $userprofile->idusers = $user->idusers;
        $userprofile->lastname = $request->lastname;
        $userprofile->tempatlahir = $request->tempatlahir;
        $userprofile->date_born = $request->date_born;
        // $userprofile->tanggallahir = date('Y-m-d H:i:s');
        $userprofile->jobrole = $request->jobrole;
        $userprofile->address = $request->address;
        // return $userprofile;
        $userprofile->save();
        return redirect('privileges/users');
        // return redirect('privileges/users/create-profile/'.$user->idusers)->with('status_success','Successfuly Add User profile');
        // return redirect('lecture/class/detail/'.$class->idclass)->with('status_success','Successfuly Add Subclass Lanjutkan Membuat Materi Kelas');

   }
}
