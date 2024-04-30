<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct()
    {
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::orderBy('id', 'ASC')->paginate(10);

        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = new Company();
        return view('companies.create', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {

        if ($request->has('logo')) {

            $image = $request->file('logo');
            $path = 'public/logos';
            $filename = 'logo' . '-' . date('y-m-d') . '.' . $image->getClientOriginalExtension();
            $logo = $image->storeAs($path, $filename);
        } else {
            $logo = '';
        }

        Company::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'website' => $request->website,
                'logo' => $logo,
            ]
        );





        return to_route('companies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies._update_form', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        if ($request->has('logo')) {

            $image = $request->file('logo');
            $path = 'public/logos';
            $filename = 'logo' . '-' . date('y-m-d') . time() . '.' . $image->getClientOriginalExtension();
            $logo = $image->storeAs($path, $filename);
        } else {
            $logo = $company->logo;
        }

        $company->update([

            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'logo' => $logo,

        ]);

        return to_route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return  back();
    }
}
