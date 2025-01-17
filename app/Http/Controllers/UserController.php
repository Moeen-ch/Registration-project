<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
// use App\Models\product;
use Illuminate\Support\Facades\Auth;

// use Dotenv\Validator;

class UserController extends Controller
{
    public function index()
    {
        return view('Welcome');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'birthday' => 'required|date',
            'gender' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'ph_number' => 'required|string|max:20',
            'subject' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $newuser = new user;
        $newuser->fname = $request->fname;
        $newuser->lname = $request->lname;
        $newuser->birthday = $request->birthday;
        $newuser->gender = $request->gender;
        $newuser->email = $request->email;
        $newuser->password = $request->password;
        $newuser->ph_number = $request->ph_number;
        $newuser->subject = $request->subject;
        $newuser->save();



        //============================================
        // $validatedData = $request->validate([
        //     'fname' => 'required|string|max:255',
        //     'lname' => 'required|string|max:255',
        //     'birthday' => 'required|date',
        //     'gender' => 'required|string',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required',
        //     'confirm_password' => 'required|same:password',
        //     'ph_number' => 'required|string|max:20',
        //     'subject' => 'required|string|max:255'
        // ]);
        // dd($validatedData);

        // // Create a new user instance and save to the database
        // User::create(
        //     [
        //         'fname' => $validatedData['fname'],
        //         'lname' => $validatedData['lname'],
        //         'birthday' => $validatedData['birthday'],
        //         'gender' => $validatedData['gender'],
        //         'email' => $validatedData['email'],
        //         'password' => $validatedData['password'],
        //         'ph_number' => $validatedData['ph_number'],
        //         'subject' => $validatedData['subject'],
        //     ]
        // );
        //=======================================================




        return redirect()->route('login')->with('success', 'User registered successfully!');
    }

    public function login()
    {
        return view('login');
    }

    public function userLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);
        $credentials = $request->only("email", "password");

        if (Auth::attempt($credentials)) {
            return redirect()->route('home.page');
        }
    }

    public function home()
    {
        return view('home');
    }

    public function show()
    {
        $users = user::all();
        return view('userdetail', compact('users'));
    }

    public function edit($id)
    {
        $users = user::find($id);
        return view('update', compact('users'));
    }

    public function update(Request $request, string $id)
    {

        $validator = Validator::make($request->all(), [
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'gender' => 'required|string',
            'email' => 'required|email|'
        ]);
        // dd($validator);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        



        $users = user::Where('id', $id)

            ->update([
                'fname' => $request->fname,
                'lname' => $request->lname,
                'gender' => $request->gender,
                'email' => $request->email
            ]);
        return redirect()->route('get.show')->with('success', 'Data updated successfully!');
    }
    public function destroy(string $id)
    {
        $user = user::find($id);
        $user->delete();
        return redirect()->route('get.show');
    }
    public function logout()
    {
        Auth::logout();
        return view('login');
    }
    // public function userCount(){
    //     $totalCounts =user::count();
    //     // return redirect()->route('home.page',compact('totalCounts'));
    // }
    // public function userCount() {
    //     // Get the user count each time the dashboard is visited
    //     $totalCounts = User::count();

    //     return view('home', compact('totalCounts')); // Pass the count to the view
    // }



    // public function ordersView(){
    //     $users = user::all();
    //     dd($users);
        
    //     return view('product.productform', compact('users'));
    // }

}
