<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use DataTables;
use \App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function field(Request $request)
    {
        $email = $request->username;
        return filter_var($email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    }

    function check(Request $request)
    {

        $field = $this->field($request);
        //dd($field);
        //Validate Inputs
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);
        //dd($request->all());
        $creds = [
            $field  => $request->username,
            'password' => $request->password,
        ];


        //$creds = $request->only($field,'password');
        $remember = isset($request->remember) ? true : false;
        if (Auth::guard('admin')->attempt($creds, $remember)) {
            Session::flash('message', 'Selamat datang kembali ' . auth('admin')->user()->name);
            return redirect()->route('admin.home');
        } else {
            return redirect()->route('admin.login')->withErrors('Incorrect credentials');
        }
    }


    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }

    public function index(){
        return view('admin.useradmin.index');
   }

   public function dataTable(Request $request){
        if($request->ajax()) {
            //dd(auth('admin')->user()->id);
            $datas = Admin::select('*')->where('role','!=','developer')->where('id','!=',auth('admin')->user()->id);
            return DataTables::of($datas)
            ->addColumn('action', function($row){  
                $btn = '
                        <form id="fd'.$row->id.'" action="'.route("admin.user.destroy",['id' => $row->id]).'" method="POST">
                            <input type="hidden" name="_token" value="' . csrf_token() . '" />
                            <input type="hidden" name="_method" value="DELETE">
                            <div class="d-flex">
                                <button  type="button"  data-id="'.$row->id.'" 
                                                        data-name="'.$row->name.'"
                                                        data-role="'.$row->role.'"
                                                        data-email ="'.$row->email.'"
                                                        data-username  ="'.$row->username.'"
                                                        
                                                        data-toggle="tooltip"  data-original-title="Edit"  class="edit btn btn-primary shadow btn-xs sharp me-1" ><i class="fas fa-pencil-alt"></i></button>
                                <button  type="button" data-id="'.$row->id.'" data-name="'.$row->name.'" data-toggle="tooltip"  data-original-title="Delete" class="delete btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
                            <div>
                        </form>
                        ';
                return $btn;
            })
            ->addColumn('password', function($row){
                return '<button  type="button"  
                data-id="'.$row->id.'" 
                data-name="'.$row->name.'"
                data-type="'.$row->type_user.'"
                data-email ="'.$row->email.'"
                data-username  ="'.$row->username.'"
                
                data-bs-toggle="tooltip"  data-original-title="Edit"  class="password btn btn-info shadow btn-xs  me-1" >Change</button>';
            }) 
            /* ->editColumn('active', function($row) {
                $checked=($row->active == 1)?'checked':'';
                return'<input type="checkbox" name="publish" value="1" '.$checked.' data-id="'.$row->id.'" class="togglepublish"  data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="xs" data-width="70">';
            }) */
            ->rawColumns(['action','active','password'])   //merender content column dalam bentuk html
            ->escapeColumns()  //mencegah XSS Attack
            ->orderColumn('name',function ($query, $order) {
                $query->orderBy('id', $order);
            })
            ->toJson(); 


        }
   }

   public function store(Request $request,Admin $User){
        $request->validate([
            'name'      => 'required|max:255',
            'email'     => 'required|email:rfc,dns',
            'username'  => 'min:3|max:255|required|unique:admins,username',
            'password'  => 'required|min:6|max:255',
            'role'      => 'required',
        ]);

        //dd($request->All());
        $input=[
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'  =>  $request->role
        ];
        $User::create($input);
        return response()->json(['success'=> 'success add users']);
    }

    public function update(Request $request,Admin $User){
        $request->validate([
            'name'      => 'required|max:255',
            'email'     => 'sometimes|email:rfc,dns|email|unique:admins,email,'.$request->id,
            'username'  => 'min:3|max:255|required|unique:admins,username,'.$request->id,
            'role'      => 'required',
        ]);
        $input=[
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role'  =>  $request->role
        ];
        $user=$User::find($request->id);
        $user->update($input);
        return response()->json(['success'=> 'success Update users']);
    }

    public function password(Request $request,Admin $User){
        $request->validate([
            'password'      => 'required|min:6|max:255',
        ]);
        $input=[
            'password' => Hash::make($request->password),
        ];
        $user=$User::find($request->id);
        $user->update($input);
        return response()->json(['success'=> 'success Update users']);
    }

    /**delete */
    public function destroy($id,Request $request,Admin $User){
        $User::find($id)->delete();
        return redirect()->route('admin.user.index')
                ->with('success','Delete successfully');
    }

}
