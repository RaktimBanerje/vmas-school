<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserPermission;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Mail\NewUser;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view("admin.user.index", ["users" => $users]);
    }
    
    public function create()
    {
        return view("admin.user.create");
    }
    
    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => $this->passwordRules(),
        //     'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        // ])->validate();
        
        
        // if ($validator->fails()) {
        //     return redirect('post/create')
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }
        
        $password = Str::random(10);
        $photo = "";
        
        if ($request->file('photo')->isValid()) {
            $photo = $request->file('photo')->store('user_photo', 'public');
        }  
        
        
        $user = User::create([
            'name' => $request->name,
            'email' => strtolower($request->email),
            'photo' => $photo,
            'password' => Hash::make($password),
        ]);
        
        // if($user) {
        //     $data = [
        //       [ "permission" => "can_create_vehicle", "user_id" => $user->id ],
        //       [ "permission" => "can_view_vehicle", "user_id" => $user->id ],
        //       [ "permission" => "can_edit_vehicle", "user_id" => $user->id ],
        //       [ "permission" => "can_delete_vehicle", "user_id" => $user->id ],
              
        //       [ "permission" => "can_create_broker", "user_id" => $user->id ],
        //       [ "permission" => "can_view_broker", "user_id" => $user->id ],
        //       [ "permission" => "can_edit_broker", "user_id" => $user->id ],
        //       [ "permission" => "can_delete_broker", "user_id" => $user->id ],
              
        //       [ "permission" => "can_create_client", "user_id" => $user->id ],
        //       [ "permission" => "can_view_client", "user_id" => $user->id ],
        //       [ "permission" => "can_edit_client", "user_id" => $user->id ],
        //       [ "permission" => "can_delete_client", "user_id" => $user->id ],
              
        //       [ "permission" => "can_create_workorder", "user_id" => $user->id ],
        //       [ "permission" => "can_view_workorder", "user_id" => $user->id ],
        //       [ "permission" => "can_edit_workorder", "user_id" => $user->id ],
        //       [ "permission" => "can_delete_workorder", "user_id" => $user->id ],
              
        //       [ "permission" => "can_create_product", "user_id" => $user->id ],
        //       [ "permission" => "can_view_product", "user_id" => $user->id ],
        //       [ "permission" => "can_edit_product", "user_id" => $user->id ],
        //       [ "permission" => "can_delete_product", "user_id" => $user->id ],
              
        //       [ "permission" => "can_create_fuelstation", "user_id" => $user->id ],
        //       [ "permission" => "can_view_fuelstation", "user_id" => $user->id ],
        //       [ "permission" => "can_edit_fuelstation", "user_id" => $user->id ],
        //       [ "permission" => "can_delete_fuelstation", "user_id" => $user->id ],
              
        //       [ "permission" => "can_create_cash", "user_id" => $user->id ],
        //       [ "permission" => "can_view_cash", "user_id" => $user->id ],
        //       [ "permission" => "can_edit_cash", "user_id" => $user->id ],
        //       [ "permission" => "can_delete_cash", "user_id" => $user->id ],
              
        //       [ "permission" => "can_create_loading", "user_id" => $user->id ],
        //       [ "permission" => "can_view_loading", "user_id" => $user->id ],
        //       [ "permission" => "can_edit_loading", "user_id" => $user->id ],
        //       [ "permission" => "can_delete_loading", "user_id" => $user->id ],
              
        //       [ "permission" => "can_create_unloading", "user_id" => $user->id ],
        //       [ "permission" => "can_view_unloading", "user_id" => $user->id ],
        //       [ "permission" => "can_edit_unloading", "user_id" => $user->id ],
        //       [ "permission" => "can_delete_unloading", "user_id" => $user->id ],
              
        //       [ "permission" => "can_payment_entry_broker", "user_id" => $user->id ],
        //       [ "permission" => "can_payment_view_broker", "user_id" => $user->id ],
        //       [ "permission" => "can_payment_due_broker", "user_id" => $user->id ],
        //       [ "permission" => "can_view_report_broker", "user_id" => $user->id ],
        //       [ "permission" => "can_view_ledger_broker", "user_id" => $user->id ],
              
        //       [ "permission" => "can_create_bill_client", "user_id" => $user->id ],
        //       [ "permission" => "can_view_bill_client", "user_id" => $user->id ],
        //       [ "permission" => "can_view_unbilled_trips_client", "user_id" => $user->id ],
        //       [ "permission" => "can_payment_receipt_entry_client", "user_id" => $user->id ],
        //       [ "permission" => "can_view_payment_client", "user_id" => $user->id ],
              
        //       [ "permission" => "can_payment_fuelstation", "user_id" => $user->id ],
        //       [ "permission" => "can_extra_fuelentry_fuelstation", "user_id" => $user->id ],
        //       [ "permission" => "can_view_payment_fuelstation", "user_id" => $user->id ],
        //       [ "permission" => "can_view_ledger_fuelstation", "user_id" => $user->id ],
              
        //       [ "permission" => "can_view_cashbook_cash", "user_id" => $user->id ],
        //       [ "permission" => "can_create_transaction_cash", "user_id" => $user->id ],
        //       [ "permission" => "can_view_cashbook_ledger_cash", "user_id" => $user->id ],
              
        //       [ "permission" => "can_create_bill_owner", "user_id" => $user->id ],
        //       [ "permission" => "can_view_bill_owner", "user_id" => $user->id ],
        //       [ "permission" => "can_create_payment_owner", "user_id" => $user->id ],
        //       [ "permission" => "can_payment_view_owner", "user_id" => $user->id ],
        //       [ "permission" => "can_view_unbilled_trips_owner", "user_id" => $user->id ],
        //     ];
            
            
        //     UserPermission::insert($data);
        // }
        
        Mail::to($user)->send(new NewUser($user->email, $password));
        
        return redirect()->route("users");
    }
    
    public function edit(Request $request)
    {
        $user = User::find(auth()->user()->id);
        return view("admin.user.edit", ["user" => $user]);
    }
    
    public function update(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        
        $photo = $user->photo;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('user_photo', 'public');
        }
        $user->photo = $photo;
        
        $user->save();
        return redirect()->route("users.edit");
    }
    
    public function active(Request $request)
    {
        $user = User::find($request->user_id);
        $user->is_active = 1;
        
        $user->save();
        
        return redirect()->route("users");
    }

    public function deactive(Request $request)
    {
        $user = User::find($request->user_id);
        $user->is_active = 0;
        
        $user->save();
        
        return redirect()->route("users");
    }
    
    public function get_permission_manager(Request $request)
    {
        $data = UserPermission::where("user_id",  $request->user_id)->get();
        $user = User::find($request->user_id);
        
        $permission = [];
        foreach($data as $d) 
        {
            $permission[$d->permission] = $d->value;
        }
        
        return view("admin.user.permission", ["data" => $permission, "user" => $user]);
    }
    
    public function store_permission_manager(Request $request)
    {
        $user_permission = UserPermission::where(["user_id" => $request->user_id, "permission" => $request->permission])->first();
        
        if($user_permission->value == 1) {
            $user_permission->value = 0;
        }
        else {
            $user_permission->value = 1;
        }
        
        // $data = UserPermission::where("user_id",  $request->user_id)->get();
        // $user = User::find($request->user_id);
        
        // $permission = [];
        // foreach($data as $d) 
        // {
        //     $permission[$d->permission] = $d->value;
        // }
        
        // $request->session()->forget('permission');
        // $request->session()->put('permission', $permission);
        
        
        if($user_permission->save()) {
            return response()->json(["status" => true], 200);
        }
        else {
            return response()->json(["status" => false], 500);
        }
    }
}
