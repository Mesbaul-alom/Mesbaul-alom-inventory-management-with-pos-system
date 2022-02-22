<?php
namespace App\Http\Controllers;
use App\Models\Company;
use Illuminate\Http\Request;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company =   Company::all()->count();
         return view('Company.companysetting')->with('company',$company);;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function CompanyinfoStore(Request $request)
    {
        $company= new Company;
        $company->company_name=$request->company_name;
        $company->company_phone=$request->company_phone;
        $company->company_address=$request->company_address;
        $newImageName=time().'-'.$request->username.'.'.$request->image->extension();
        $image=$request->image->move(public_path('admin_img'),$newImageName);
        $company->company_logo=$newImageName;
        $company->save();
        $company =   Company::all()->count();
         return view('Company.companysetting')->with('company',$company);;
    }
    public function CompanyinfoEdit()
    {
        $company =   Company::all();
        return view('Company.editcompanysetting')->with('company',$company);
    }
    public function CompanyinfoUpdate(Request $request , $id)
    {
        $company=Company::find($id);
        $company->company_name=$request->company_name;
        $company->company_phone=$request->company_phone;
        $company->company_address=$request->company_address;
          if($request->hasFile('image') && $request->image->isValid()){
            if(file_exists(public_path('admin_img/'.$company->company_logo))){
                unlink(public_path('admin_img/'.$company->company_logo));
            }
            $newImageName=time().'-'.$request->username.'.'.$request->image->extension();
            $image=$request->image->move(public_path('admin_img'),$newImageName);
            $company->company_logo=$newImageName;
        }
            $company->save();
        return redirect('/company/profile');
    }
}
