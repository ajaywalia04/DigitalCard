<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\LandingContactRequest;
use App\Http\Requests\LandingPageRequest;
use App\Http\Requests\LandingServiceRequest;
use App\Models\LandingContactUs;
use App\Models\LandingPage;
use App\Models\LandingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingPageController extends Controller
{
    public function index($slug){
        $landingPage = LandingPage::where('slug',$slug)->first();
        $services = $landingPage->user->landingServices;
        $socialMedias = $landingPage->user->socialMedias;
        if($landingPage){
            return view('web.landingPage.'.$landingPage->color_no, compact('landingPage','services','socialMedias'));
        }
        return redirect()->route('home.page')->with('error','The card does not exist or the link is invalid.');
    }

    public function create()
    {
        $user = Auth::user();
         if($user->landingPage){
           return redirect()->route('dashboard.landing.edit',['landingPage'=>$user->landingPage->uuid ]);
        }
        return view('auth.admin.landingPage.create' );
    }

    public function store(LandingPageRequest $request)
    {
        $request->validated();
        $user = Auth::user();
        $user->landingPage()->create([
            'main_heading' => $request->main_heading,
            'sub_heading' => $request->sub_heading,
            'about_us'=> $request->about_us,
            'service_heading'=> $request->service_heading,
            'contact_sub_heading'=> $request->contact_sub_heading,
            'color_no' => $request->color_no

        ]);

        return redirect()->route('dashboard.landing.service.view')
            ->with('success', 'landing page created successfully!');
    }

    public function edit(LandingPage $landingPage)
    {
        return view('auth.admin.landingPage.edit', compact('landingPage'));
    }

    public function update(LandingPageRequest $request, LandingPage $landingPage)
    {
        $request->validated();
        $landingPage->update([
            'main_heading' => $request->main_heading,
            'sub_heading' => $request->sub_heading,
            'about_us'=> $request->about_us,
            'service_heading'=> $request->service_heading,
            'contact_sub_heading'=> $request->contact_sub_heading,
            'color_no' => $request->color_no
        ]);


        return redirect()->route('dashboard.landing.service.view')
            ->with('success', 'landing page updated successfully!');
    }

    public function viewService()
    {
        $user = Auth::user();
        $services = $user->landingServices;
        return view('auth.admin.landingPage.service', compact('services'));
    }

    public function createService()
    {
        $user = Auth::user();
        return view('auth.admin.landingPage.create-service');
    }

    public function storeService(LandingServiceRequest $request)
    {
        $request->validated();
        $user = Auth::user();
        $user->landingServices()->create([
            'heading'    => $request->heading,
            'sub_heading'    => $request->sub_heading,
            'icon'    => $request->icon,

        ]);

        return redirect()->route('dashboard.landing.service.view')
            ->with('success', 'Service created successfully!');
    }

    public function editService(LandingService $landingService)
    {
        return view('auth.admin.landingPage.edit-service', compact('landingService'));
    }

    public function updateService(LandingServiceRequest $request, LandingService $landingService){
        $request->validated();
        $landingService->update([
            'heading'    => $request->heading,
            'sub_heading'    => $request->sub_heading,
            'icon'    => $request->icon,
        ]);

        return redirect()->route('dashboard.landing.service.view')
            ->with('success', 'Service updated successfully!');
    }

    public function storeContactUs(LandingContactRequest $request, LandingPage $landingPage){
        $user = $landingPage->user;
        LandingContactUs::create([
            'user_id'     => $user->id,
            'name'    => $request->name,
            'email'    => $request->email,
            'message'    => $request->message,

        ]);

        return redirect()->back()
            ->with('success', 'Message send successfully!');
    }

    public function viewMessage(Request $request){
        $user = Auth::user();
        $messages = $user->landingContactUs;
        $search = $request->input('search');

        $messages = $user->landingContactUs()
            ->when(!empty($search), function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%");
                });
            })
            ->paginate(10)
            ->appends(['search' => $search]);
        return view('auth.admin.landingPage.messages', compact('messages','search'));
    }

    public function showMessage(LandingContactUs $landingContactUs){
        return view('auth.admin.landingPage.message', compact('landingContactUs'));
    }
}
