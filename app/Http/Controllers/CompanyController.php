<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use App\Models\Company as Model;

class CompanyController extends Controller
{
    public function index()
    {
        $company = Model::first();
        return view('backend.company.index',compact('company'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'companyname' => 'required',
            'companypetname' => 'required',
            'companyslogan' => 'required',
            'companyaddress' => 'required',
            'companycontactno' => 'required',
            'companyemail' => 'required|email',
            'companywebsite' => 'required',
            'companycopyright' => 'required',
            'companylogo' => 'required|mimes:jpeg,png,jpg',
            'companyfavicon' => 'required|mimes:jpeg,png,jpg,ico,icon',
        ]);

        $company = Model::find($id);
        $company->company_name = $request->companyname;
        $company->company_pet_name = $request->companypetname;
        $company->company_slogan = $request->companyslogan;
        $company->company_address = $request->companyaddress;
        $company->company_contact_no = $request->companycontactno;
        $company->company_email = $request->companyemail;
        $company->company_website = $request->companywebsite;
        $company->company_copyright = $request->companycopyright;

        if($request->hasFile('companylogo'))
        {
            $logo_path = "backend/uploads/company/".$company->company_logo;
        
            if(File::exists($logo_path)) {
                File::delete($logo_path);
            }

            $companylogo = $request->file('companylogo');
            $company->company_logo = "logo_".time().".".$companylogo->getClientOriginalExtension();
            $destinationPath = public_path('backend/uploads/company/');
            $companylogo->move($destinationPath, $company->company_logo);
        }

        if($request->hasFile('companyfavicon'))
        {
            $favicon_path = "backend/uploads/company/".$company->company_favicon_icon;
        
            if(File::exists($favicon_path)) {
                File::delete($favicon_path);
            }

            $companyfavicon = $request->file('companyfavicon');
            $company->company_favicon_icon = "favicon_".time().".".$companyfavicon->getClientOriginalExtension();
            $destinationPath = public_path('backend/uploads/company/');
            $companyfavicon->move($destinationPath, $company->company_favicon_icon);
        }

        if($company->save())
        {
            $toastr = array('toastr' => 'company details change successfully','type' => 'success');
            return redirect()->route('company.index')->with($toastr);
        }
    }
}