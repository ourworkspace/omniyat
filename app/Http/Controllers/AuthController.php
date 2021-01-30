<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response,Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
Use App\User;

use App\CategoriesModel as Categories;
use App\PortfoliosModel as Portfolios;
use App\PortfolioDetailsModel as PortfolioDetails;
use App\PortfolioGalleryDetailsModel as PortfolioGalleryDetails;
use App\WhatsOnMediaModel as WhatsOnMedia;
use App\PressReleasesModel as PressRelease;
use App\WhatsNewModel as WhatsNew;
use App\PressKitModel as PressKit;
use App\PressKitCategoriesModel as PressKitCategories;
use App\CsrModel as Csr;
use App\SponsorshipsModel as Sponsorships;
use App\SponsorshipsCategoriesModel as SponsorshipsCategories;
use App\LeadershipModel as Leadership;
use App\AboutModel as About;
use App\PhilosophyModel as Philosophy;
use App\ContactUsModel as ContactUs;

class AuthController extends Controller
{
    public function __construct()
    {
    }

    public function loginPage(Request $request)
    {
        if(Auth::check()){
            return Redirect::route("dashboard");
        }
        return view('auth.loginPage');
    }

    public function postLogin(Request $request)
    {
        request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }
        return Redirect::route("login")->withSuccess('Opp\'s! You have entered invalid credentials');
    }

    public function dashboardPage(Request $request)
    {
        if(Auth::check()){
            $portfolios = Portfolios::where('status', 1)->get();
            $whatsNew = WhatsNew::where('status', 1)->get();
            $WhatsOnMedia = WhatsOnMedia::where('status', 1)->get();
            $PressRelease = PressRelease::where('status', 1)->get();
            $PressKit = PressKit::where('status', 1)->get();
            $Csr = Csr::where('status', 1)->get();
            $Sponsorships = Sponsorships::where('status', 1)->get();
            $Leadership = Leadership::where('status', 1)->get();
            return view('dashboard.dashboard', compact('portfolios','whatsNew','WhatsOnMedia','PressRelease','PressKit','Csr','Sponsorships','Leadership'));
        }
        return Redirect::route("login")->withSuccess('Opps! You do not have access');
    }

    public function registerPage(Request $request)
    {
        return view('auth.registerPage');
    }

    public function postRegistration(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $data = $request->all();
        $check = $this->create($data);
        return Redirect::route("dashboard")->withSuccess('Great! You have Successfully loggedIn');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ])->id;
    }

    public function profile(Request $request){
        $user = User::where('id',Auth::User()->id)->first();
        if(isset($user->id)):
            return view('profile.profile', compact('user'));
        endif;
    }

    public function profileUpdate(Request $request)
    {
        $users = User::where('id',$request->edit_id)->get();
        if(count($users) > 0):
            if((isset($request->password) && !empty($request->password)) && (isset($request->cpassword) && !empty($request->cpassword))):
                if($request->password == $request->cpassword):
                    $updatedata = ['name'=>$request->name,'email'=>$request->email,'password'=>Hash::make($request->password)];
                else:
                    return redirect()->back()->with('failed','Password and confirm password should be same.');
                endif;
            else:
                $updatedata = ['name'=>$request->name,'email'=>$request->email];
            endif;
            $update = User::where('id',$request->edit_id)->update($updatedata);
            if($update > 0){
                return redirect()->back()->with('success','Successfully updated profile data.');
            }else{
                return redirect()->back()->with('failed','Failed to update profile data');
            }
        else:
            return redirect()->back()->with('failed','Invalid request to update profile details.');
        endif;
    }

    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
