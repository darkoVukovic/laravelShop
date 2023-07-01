<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
 


    public function create () {
        $this->template['view'] = 'users.register';
        $this->template['renderContentData'] = false;
        return view('eshop', $this->template);
    } 

    public function store (Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6'],
            'phone_number' => ['required', 'min:6']
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        auth()->login($user);

        return redirect('/')->with('message', 'korisnik napravljen i ulogovan');
    } 

    public function logout (Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'uspesno izlogovan korisnik');
    } 

    public function login () {
        
        $this->template['view'] = 'users.login';

        $this->template['renderContentData'] = false;

        return view('eshop', $this->template);
    } 

    public function authenticate (Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'uspesno ulogovan');
        }

        return back()->withErrors(['email' => 'neispravni podaci'])->onlyInput('email');
    } 

    public function storeFollowItem (Request $request) {
        $formFields = $request->validate([
            'item_id' => ['required'],
        ]);

        $formFields['user_id'] = auth()->id();        
        $userModel = new User();

        if($userModel->storeItemFollow($formFields) !== false) {
            echo "vec dodati item";
        }
        

    } 

    public function manageItems () {
        $itemsModel = new Items();
        $this->template['view'] = 'userItems';
        $this->template['items'] =  $itemsModel ->getUserItems(auth()->id());
        $this->template['renderContentData']= ['items'];
        return view('eshop', $this->template);
    } 
}
