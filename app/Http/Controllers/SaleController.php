<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SaleController extends Controller
{
    public function getOverview() {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        if($privilege->master_admin)
        {
            $new_sales = \App\Sale::where('status', '=', 'new')->select('id', 'status', 'customer_id')->with('customer')->get();
            $ongoing_sales = \App\Sale::where('status', '=', 'ongoing')->select('id', 'status', 'customer_id')->with('customer')->get();
            $bid_sales = \App\Sale::where('status', '=', 'bid')->select('id', 'status', 'customer_id')->with('customer')->get();
        }
        else
        {
            $new_sales = \App\Sale::where('employee_id', '=', $employee->id)->where('status', '=', 'new')->select('id', 'customer_id')->with('customer')->get();
            $ongoing_sales = \App\Sale::where('employee_id', '=', $employee->id)->where('status', '=', 'ongoing')->select('id', 'customer_id', 'classification')->with('customer')->get();
            $bid_sales = \App\Sale::where('employee_id', '=', $employee->id)->where('status', '=', 'bid')->select('id', 'customer_id', 'classification')->with('customer')->get();

        }
        return \View::make('sale.overview', compact('user', 'employee', 'privilege', 'new_sales', 'ongoing_sales', 'bid_sales'));
    }

    public function getCreateNew() {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $employees_for_dropdown = \App\Sale::employeesNameForDropdown();
        return view('sale.createNew', compact('user', 'employee', 'privilege', 'employees_for_dropdown'));
    }

    public function postCreateNew(Request $request) {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }

        $this->validate($request, [
            'classification' => 'not_in:0',
            'specification' => 'required',
            'customer_id' => 'not_in:0',
            'employee_id' => 'not_in:0'
        ]);
        $data = $request->only('classification', 'specification', 'customer_id', 'employee_id');
        $sale = new \App\Sale();
        $sale->status = 'new';
        foreach ($data as $key => $value) {
            $sale->$key = $value;
        }
        $sale->save();
        \Session::flash('success', '成功创建了新的销售记录。');
        return redirect('/sale');
    }

    public function getCreateOngoing() {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $new_sales_for_dropdown = \App\Sale::newSalesForDropdown($privilege, $employee);
        $agents_nation_for_dropdown = \App\Sale::agentsNationForDropdown($privilege, $employee);
        $complements_nation_for_dropdown = \App\Sale::complementsNationForDropdown($privilege, $employee);
        $customers_nation_for_dropdown = \App\Sale::customersNationForDropdown($privilege, $employee);
        $others_nation_for_dropdown = \App\Sale::othersNationForDropdown($privilege, $employee);
        return view('sale.createOngoing', compact('user', 'employee', 'privilege', 'new_sales_for_dropdown', 'agents_nation_for_dropdown', 'complements_nation_for_dropdown', 'customers_nation_for_dropdown', 'others_nation_for_dropdown'));
    }

    public function postCreateOngoing(Request $request) {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }

        $this->validate($request, [
            'classification' => 'not_in:0',
            'specification' => 'required',
            'customer_id' => 'not_in:0',
            'employee_id' => 'not_in:0'
        ]);
        $data = $request->only('classification', 'specification', 'customer_id', 'employee_id');
        $sale = new \App\Sale();
        $sale->status = 'new';
        foreach ($data as $key => $value) {
            $sale->$key = $value;
        }
        $sale->save();
        \Session::flash('success', '成功创建了新的销售记录。');
        return redirect('/sale');

        $employees_for_dropdown = \App\Sale::employeesNameForDropdown();
        return view('sale.create', compact('user', 'employee', 'privilege', 'employees_for_dropdown'));
    }

    public function getCreateAgent() {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $employees_for_dropdown = \App\Sale::employeesNameForDropdown();
        return view('sale.createAgent', compact('user', 'employee', 'privilege', 'employees_for_dropdown'));
    }

    public function postCreateAgent(Request $request) {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $this->validate($request, [
            'name' => 'required',
            'nation' => 'not_in:0',
            'province' => 'not_in:0',
            'city' => 'not_in:0',
            'address' => 'required',
            'phone_number' => 'integer',
            'fax' => 'integer',
            'remark' => 'max:3000'
        ]);
        $agent = new \App\Agent();
        $agent->name = $request->name;
        $agent->nation = $request->nation;
        $agent->province = $request->province;
        $agent->city = $request->city;
        $agent->address = $request->address;
        $agent->phone_number = $request->phone_number;
        $agent->fax = $request->fax;
        $agent->remark = $request->remark;
        $agent->save();
        if(!$privilege->master_admin) $agent->employees()->save($employee);
        $add_contacts = $request->session()->get('add_contact');
        $request->session()->forget('add_contact');
        if(sizeof($add_contacts)) foreach ($add_contacts as $key => $value) {
            $contact = \App\Contact::where('id', '=', $value)->first();
            $agent->contacts()->save($contact);
        }
        $delete_contacts = $request->session()->get('delete_contact');
        $request->session()->forget('delete_contact');
        if(sizeof($delete_contacts)) foreach ($delete_contacts as $key => $value) {
            $contact = \App\Contact::where('id', '=', $value)->first();
            $agent->contacts()->detach($contact);
        }
        \Session::flash('success', '成功添加了新的代理商信息。');
        return redirect('/sale');
    }

    public function getEditAgentId($id, Request $request) {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        $agent = \App\Agent::where('id', '=', $id)->with('contacts')->first();
        if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $employees_for_dropdown = \App\Sale::employeesNameForDropdown();
        $request->session()->forget('add_contact');
        $request->session()->forget('delete_contact');
        return view('sale.editAgent', compact('user', 'employee', 'privilege', 'id', 'agent'));
    }

    public function postEditAgentId($id, Request $request) {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $this->validate($request, [
            'name' => 'required',
            'nation' => 'not_in:0',
            'province' => 'not_in:0',
            'city' => 'not_in:0',
            'address' => 'required',
            'phone_number' => 'integer',
            'fax' => 'integer',
            'remark' => 'max:3000'
        ]);
        if ($request->id != $id)
        {
            \Session::flash('danger', '危险的操作！(Error: 401 Unauthorized)');
            return redirect('/sale');
        }
        $agent = \App\Agent::find($request->id);
        $agent->name = $request->name;
        if(sizeof($request->nation) && sizeof($request->province) && sizeof($request->city))
        {
            $agent->nation = $request->nation;
            $agent->province = $request->province;
            $agent->city = $request->city;
        }
        $agent->address = $request->address;
        $agent->phone_number = $request->phone_number;
        $agent->fax = $request->fax;
        $agent->remark = $request->remark;
        $agent->save();
        if(!$privilege->master_admin) $agent->employees()->save($employee);
        $add_contacts = $request->session()->get('add_contact');
        $request->session()->forget('add_contact');
        if(sizeof($add_contacts)) foreach ($add_contacts as $key => $value) {
            $contact = \App\Contact::where('id', '=', $value)->first();
            $agent->contacts()->save($contact);
        }
        $delete_contacts = $request->session()->get('delete_contact');
        $request->session()->forget('delete_contact');
        if(sizeof($delete_contacts)) foreach ($delete_contacts as $key => $value) {
            $contact = \App\Contact::where('id', '=', $value)->first();
            $agent->contacts()->detach($contact);
        }
        \Session::flash('success', '代理商'.$request->name.'的信息已经成功修改。');
        return redirect('/sale');
    }

    public function getCreateCustomer() {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $employees_for_dropdown = \App\Sale::employeesNameForDropdown();
        return view('sale.createCustomer', compact('user', 'employee', 'privilege', 'employees_for_dropdown'));
    }

    public function postCreateCustomer(Request $request) {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $this->validate($request, [
            'name' => 'required',
            'nation' => 'not_in:0',
            'province' => 'not_in:0',
            'city' => 'not_in:0',
            'address' => 'required',
            'phone_number' => 'integer',
            'fax' => 'integer',
            'remark' => 'max:3000'
        ]);
        $customer = new \App\Customer();
        $customer->name = $request->name;
        $customer->nation = $request->nation;
        $customer->province = $request->province;
        $customer->city = $request->city;
        $customer->address = $request->address;
        $customer->phone_number = $request->phone_number;
        $customer->fax = $request->fax;
        $customer->remark = $request->remark;
        $customer->save();
        if(!$privilege->master_admin) $customer->employees()->save($employee);
        $contacts = \Session::get('customer_contacts');
        $request->session()->forget('customer_contacts');
        if(sizeof($contacts)) foreach ($contacts as $key => $value) {
            $contact = \App\Contact::where('id', '=', $value)->first();
            $customer->contacts()->save($contact);
        }
        \Session::flash('success', '成功添加了新的顾客信息。');
        return redirect('/sale');
    }

    public function getEditCustomerId($id) {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        $customer = \App\Customer::find($id)->with('contacts')->first();
        if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $employees_for_dropdown = \App\Sale::employeesNameForDropdown();
        return view('sale.editCustomer', compact('user', 'employee', 'privilege', 'id', 'customer'));
    }

    public function postEditCustomerId($id, Request $request) {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $this->validate($request, [
            'name' => 'required',
            'nation' => 'not_in:0',
            'province' => 'not_in:0',
            'city' => 'not_in:0',
            'address' => 'required',
            'phone_number' => 'integer',
            'fax' => 'integer',
            'remark' => 'max:3000'
        ]);
        if ($request->id != $id)
        {
            \Session::flash('danger', '危险的操作！(Error: 401 Unauthorized)');
            return redirect('/sale');
        }
        $customer = \App\Customer::find($request->id);
        $customer->name = $request->name;
        if(sizeof($request->nation) && sizeof($request->province) && sizeof($request->city))
        {
            $customer->nation = $request->nation;
            $customer->province = $request->province;
            $customer->city = $request->city;
        }
        $customer->address = $request->address;
        $customer->phone_number = $request->phone_number;
        $customer->fax = $request->fax;
        $customer->remark = $request->remark;
        $customer->save();
        if(!$privilege->master_admin) $customer->employees()->save($employee);
        $contacts = \Session::get('customer_contacts');
        $request->session()->forget('customer_contacts');
        if(sizeof($contacts)) foreach ($contacts as $key => $value) {
            $contact = \App\Contact::find($value);
            $customer->contacts()->save($contact);
        }
        \Session::flash('success', '用户'.$request->name.'的信息已经成功修改。');
        return redirect('/sale');
    }

    public function getById($id = null) {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        if($privilege->master_admin) $sale = \App\Sale::where('id', '=', $id)->with('agent.contacts', 'complement.contacts', 'customer.contacts', 'other.contacts')->first();
        else $sale = \App\Sale::where('id', '=', $id)->where('employee_id', '=', $employee->id)->with('agent.contacts', 'complement.contacts', 'customer.contacts', 'other.contacts')->first();
        if(sizeof($sale) == 0)
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $complements_nation_for_dropdown = \App\Sale::complementsNationForDropdown($privilege, $employee);
        $others_nation_for_dropdown = \App\Sale::othersNationForDropdown($privilege, $employee);

        return view('sale.byId', compact('id', 'user', 'employee', 'privilege', 'sale', 'complements_nation_for_dropdown', 'others_nation_for_dropdown'));
    }



    //ajax functions
    public function getCreateOngoingSale() {
        if(\Request::ajax()) {
            list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
            if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
            {
                \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
                return redirect('/');
            }
            if($privilege->master_admin) $sale = \App\Sale::where('id', '=', $_GET["sale_id"])->with('agent', 'complement', 'customer', 'other')->first();
            else $sale = \App\Sale::where('employee_id', '=', $employee->id)->where('id', '=', $_GET["sale_id"])->first();
            if (sizeof($sale) == 0)
            {
                \Session::flash('danger', '危险的操作！(Error: 401 Unauthorized)');
                return redirect('/sale');
            }

            $data['classification'] = $sale->classification;
            $data['specification'] = $sale->specification;
            $data['agent'] = $sale->agent()->select('nation', 'province', 'city', 'name')->first();
            $data['complement'] = $sale->complement()->select('nation', 'province', 'city', 'name')->first();
            $data['customer'] = $sale->customer()->select('nation', 'province', 'city', 'name')->first();
            $data['other'] = $sale->other()->select('nation', 'province', 'city', 'name')->first();
            return $data;
        }
    }

    public function getAgentNation() {
        if(\Request::ajax()) {
            list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
            if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
            {
                \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
                return redirect('/');
            }
            if($privilege->master_admin) $agents = \App\Agent::orderBy(\DB::raw('convert(nation using gbk)'))->distinct()->get(['nation']);
            else $agents = $employee->agents()->orderBy(\DB::raw('convert(nation using gbk)'))->distinct()->get(['nation']);
            $data = "<option value='0'>请选择国家</option>";
            foreach ($agents as $agent) {
                $data = $data.'<option value="'.$agent->nation.'">'.$agent->nation.'</option>';
            }
            $data = $data."</select>";
            return $data;
        }
    }

    public function getAgentProvince() {
        if(\Request::ajax()) {
            list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
            if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
            {
                \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
                return redirect('/');
            }
            if($privilege->master_admin) $agents = \App\Agent::where('nation', '=', $_GET["nation"])->orderBy(\DB::raw('convert(province using gbk)'))->distinct()->get(['province']);
            else $agents = $employee->agents()->where('nation', '=', $_GET["nation"])->orderBy(\DB::raw('convert(province using gbk)'))->distinct()->get(['province']);
            $data = "<option value='0'>请选择省份</option>";
            foreach ($agents as $agent) {
                $data = $data.'<option value="'.$agent->province.'">'.$agent->province.'</option>';
            }
            $data = $data."</select>";
            return $data;
        }
    }

    public function getAgentCity() {
        if(\Request::ajax()) {
            list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
            if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
            {
                \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
                return redirect('/');
            }
            if($privilege->master_admin) $agents = \App\Agent::where('nation', '=', $_GET["nation"])->where('province', '=', $_GET["province"])->orderBy(\DB::raw('convert(city using gbk)'))->distinct()->get(['city']);
            else $agents = $employee->agents()->where('nation', '=', $_GET["nation"])->where('province', '=', $_GET["province"])->orderBy(\DB::raw('convert(city using gbk)'))->distinct()->get(['city']);
            $data = "<option value='0'>请选择城市</option>";
            foreach ($agents as $agent) {
                $data = $data.'<option value="'.$agent->city.'">'.$agent->city.'</option>';
            }
            $data = $data."</select>";
            return $data;
        }
    }

    public function getAgentName() {
        if(\Request::ajax()) {
            list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
            if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
            {
                \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
                return redirect('/');
            }
            if($privilege->master_admin) $agents = \App\Agent::where('nation', '=', $_GET["nation"])->where('province', '=', $_GET["province"])->where('city', '=', $_GET["city"])->orderBy(\DB::raw('convert(city using gbk)'))->distinct()->get(['id', 'name']);
            else $agents = $employee->agents()->where('nation', '=', $_GET["nation"])->where('province', '=', $_GET["province"])->where('city', '=', $_GET["city"])->orderBy(\DB::raw('convert(city using gbk)'))->distinct()->get(['id', 'name']);
            $data = "<option value='0'>请选择代理商名称</option>";
            foreach ($agents as $agent) {
                $data = $data.'<option value="'.$agent->id.'">'.$agent->name.'</option>';
            }
            $data = $data."</select>";
            return $data;
        }
    }

    public function getCreateComplementNation() {
        if(\Request::ajax()) {
            list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
            if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
            {
                \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
                return redirect('/');
            }
            if($privilege->master_admin) $complements = \App\Complement::where('nation', '=', $_GET["nation"])->orderBy(\DB::raw('convert(province using gbk)'))->distinct()->get(['province']);
            else $complements = $employee->complements()->where('nation', '=', $_GET["nation"])->orderBy(\DB::raw('convert(province using gbk)'))->distinct()->get(['nation']);
            $data = "<option value='0'>请选择省份</option>";
            foreach ($complements as $complement) {
                $data = $data.'<option value="'.$complement->province.'">'.$complement->province.'</option>';
            }
            $data = $data."</select>";
            return $data;
        }
    }

    public function getCreateComplementProvince() {
        if(\Request::ajax()) {
            list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
            if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
            {
                \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
                return redirect('/');
            }
            if($privilege->master_admin) $complements = \App\Complement::where('nation', '=', $_GET["nation"])->where('province', '=', $_GET["province"])->orderBy(\DB::raw('convert(city using gbk)'))->distinct()->get(['city']);
            else $complements = $employee->complements()->where('nation', '=', $_GET["nation"])->where('province', '=', $_GET["province"])->orderBy(\DB::raw('convert(city using gbk)'))->distinct()->get(['city']);
            $data = "<option value='0'>请选择城市</option>";
            foreach ($complements as $complement) {
                $data = $data.'<option value="'.$complement->city.'">'.$complement->city.'</option>';
            }
            $data = $data."</select>";
            return $data;
        }
    }

    public function getCreateComplementCity() {
        if(\Request::ajax()) {
            list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
            if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
            {
                \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
                return redirect('/');
            }
            if($privilege->master_admin) $complements = \App\Complement::where('nation', '=', $_GET["nation"])->where('province', '=', $_GET["province"])->where('city', '=', $_GET["city"])->orderBy(\DB::raw('convert(name using gbk)'))->distinct()->get(['name']);
            else $complements = $employee->complements()->where('nation', '=', $_GET["nation"])->where('province', '=', $_GET["province"])->where('city', '=', $_GET["city"])->orderBy(\DB::raw('convert(name using gbk)'))->distinct()->get(['name']);
            $data = "<option value='0'>请选择配套商名称</option>";
            foreach ($complements as $complement) {
                $data = $data.'<option value="'.$complement->id.'">'.$complement->name.'</option>';
            }
            $data = $data."</select>";
            return $data;
        }
    }

    public function getCreateCustomerNation() {
        if(\Request::ajax()) {
            list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
            if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
            {
                \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
                return redirect('/');
            }
            if($privilege->master_admin) $customers = \App\Customer::orderBy(\DB::raw('convert(nation using gbk)'))->distinct()->get(['nation']);
            else $customers = $employee->customers()->orderBy(\DB::raw('convert(nation using gbk)'))->distinct()->get(['nation']);
            $data = "<option value='0'>请选择国家</option>";
            foreach ($customers as $customer) {
                $data = $data.'<option value="'.$customer->nation.'">'.$customer->nation.'</option>';
            }

            return $data;
        }
    }

    public function getCreateCustomerProvince() {
        if(\Request::ajax()) {
            list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
            if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
            {
                \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
                return redirect('/');
            }
            if($privilege->master_admin) $customers = \App\Customer::where('nation', '=', $_GET["nation"])->orderBy(\DB::raw('convert(province using gbk)'))->distinct()->get(['province']);
            else $customers = $employee->customers()->where('nation', '=', $_GET["nation"])->orderBy(\DB::raw('convert(province using gbk)'))->distinct()->get(['nation']);
            $data = "<option value='0'>请选择省份</option>";
            foreach ($customers as $customer) {
                $data = $data.'<option value="'.$customer->province.'">'.$customer->province.'</option>';
            }
            return $data;
        }
    }

    public function getCreateCustomerCity() {
        if(\Request::ajax()) {
            list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
            if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
            {
                \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
                return redirect('/');
            }
            if($privilege->master_admin) $customers = \App\Customer::where('nation', '=', $_GET["nation"])->where('province', '=', $_GET["province"])->orderBy(\DB::raw('convert(city using gbk)'))->distinct()->get(['city']);
            else $customers = $employee->customers()->where('nation', '=', $_GET["nation"])->where('province', '=', $_GET["province"])->orderBy(\DB::raw('convert(city using gbk)'))->distinct()->get(['city']);
            $data = "<option value='0'>请选择城市</option>";
            foreach ($customers as $customer) {
                $data = $data.'<option value="'.$customer->city.'">'.$customer->city.'</option>';
            }
            return $data;
        }
    }

    public function getCreateCustomerName() {
        if(\Request::ajax()) {
            list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
            if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
            {
                \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
                return redirect('/');
            }
            if($privilege->master_admin) $customers = \App\Customer::where('nation', '=', $_GET["nation"])->where('province', '=', $_GET["province"])->where('city', '=', $_GET["city"])->orderBy(\DB::raw('convert(name using gbk)'))->get();
            else $customers = $employee->customers()->where('nation', '=', $_GET["nation"])->where('province', '=', $_GET["province"])->where('city', '=', $_GET["city"])->orderBy(\DB::raw('convert(name using gbk)'))->get();
            $data = "<option value='0'>请选择顾客名称</option>";

            foreach ($customers as $customer) {
                $data = $data.'<option value="'.$customer->id.'">'.$customer->name.'</option>';
            }
            return $data;
        }
    }

    public function postCreateCustomerContact(Request $request) {
        if(\Request::ajax()) {
            list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
            if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
            {
                \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
                return redirect('/');
            }
            $this->validate($request, [
                'last_name' => 'required|max:30',
                'first_name' => 'required|max:30',
                'job_title' => 'required|max:30',
                'email' => 'required|email|max:100',
                'cellphone' => 'required|numeric|digits_between:2,30',
            ]);

            $contact = \App\Contact::where('last_name', '=', $request->last_name)->where('first_name', '=', $request->first_name)
                ->where('job_title', '=', $request->job_title)->where('email', '=', $request->email)->where('cellphone', '=', $request->cellphone)->first();
            if(sizeof($contact) == 0) {
                $contact = new \App\Contact();
                $contact->last_name = $request->last_name;
                $contact->first_name = $request->first_name;
                $contact->job_title = $request->job_title;
                $contact->email = $request->email;
                $contact->cellphone = $request->cellphone;
                $contact->save();
            }

            if(sizeof(\Session::get('customer_contacts'))) $request->session()->regenerate();
            \Session::push("customer_contacts.".$contact->id, $contact->id);

            $data = \App\Sale::showContactData($contact);
            return $data;
        }
    }

    public function getCreateOtherNation() {
        if(\Request::ajax()) {
            list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
            if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
            {
                \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
                return redirect('/');
            }
            if($privilege->master_admin) $others = \App\Other::where('nation', '=', $_GET["nation"])->orderBy(\DB::raw('convert(province using gbk)'))->distinct()->get(['province']);
            else $others = $employee->others()->where('nation', '=', $_GET["nation"])->orderBy(\DB::raw('convert(province using gbk)'))->distinct()->get(['nation']);
            $data = "<option value='0'>请选择省份</option>";
            foreach ($others as $other) {
                $data = $data.'<option value="'.$other->province.'">'.$other->province.'</option>';
            }
            $data = $data."</select>";
            return $data;
        }
    }

    public function getCreateOtherProvince() {
        if(\Request::ajax()) {
            list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
            if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
            {
                \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
                return redirect('/');
            }
            if($privilege->master_admin) $others = \App\Other::where('nation', '=', $_GET["nation"])->where('province', '=', $_GET["province"])->orderBy(\DB::raw('convert(city using gbk)'))->distinct()->get(['city']);
            else $others = $employee->others()->where('nation', '=', $_GET["nation"])->where('province', '=', $_GET["province"])->orderBy(\DB::raw('convert(city using gbk)'))->distinct()->get(['city']);
            $data = "<option value='0'>请选择城市</option>";
            foreach ($others as $other) {
                $data = $data.'<option value="'.$other->city.'">'.$other->city.'</option>';
            }
            $data = $data."</select>";
            return $data;
        }
    }

    public function getCreateOtherCity() {
        if(\Request::ajax()) {
            list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
            if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
            {
                \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
                return redirect('/');
            }
            if($privilege->master_admin) $others = \App\Other::where('nation', '=', $_GET["nation"])->where('province', '=', $_GET["province"])->where('city', '=', $_GET["city"])->orderBy(\DB::raw('convert(name using gbk)'))->distinct()->get(['name']);
            else $others = $employee->others()->where('nation', '=', $_GET["nation"])->where('province', '=', $_GET["province"])->where('city', '=', $_GET["city"])->orderBy(\DB::raw('convert(name using gbk)'))->distinct()->get(['name']);
            $data = "<option value='0'>请选择代理商名称</option>";
            foreach ($others as $other) {
                $data = $data.'<option value="'.$other->id.'">'.$other->name.'</option>';
            }
            $data = $data."</select>";
            return $data;
        }
    }

    public function postCreateAgentContact(Request $request) {
        if(\Request::ajax()) {
            list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
            if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
            {
                \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
                return redirect('/');
            }
            $this->validate($request, [
                'last_name' => 'required|max:30',
                'first_name' => 'required|max:30',
                'job_title' => 'required|max:30',
                'email' => 'required|email|max:100',
                'cellphone' => 'required|numeric|digits_between:2,30',
            ]);

            $contact = new \App\Contact();
            $contact->last_name = $request->last_name;
            $contact->first_name = $request->first_name;
            $contact->job_title = $request->job_title;
            $contact->email = $request->email;
            $contact->cellphone = $request->cellphone;
            $contact->save();

            if($request->session()->has('add_contact')) $request->session()->regenerate();
            $request->session()->push('add_contact.'.md5($contact->id), $contact->id);

            $data = \App\Sale::showContactData($contact);
            return $data;
        }
    }

    public function postDeleteAgentContact(Request $request) {
        if(\Request::ajax()) {
            list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
            if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
            {
                \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
                return redirect('/');
            }
            $this->validate($request, [
                'agent_id' => 'required|integer',
                'contact_id' => 'required|integer'
            ]);

            if($request->session()->has('add_contact.'.md5($request->contact_id)))
            {
                $request->session()->forget('add_contact.'.md5($request->contact_id));
            }
            else
            {
                $request->session()->push('delete_contact.'.md5($request->contact_id), $request->contact_id);
            }
            return "Success.";
        }
    }

    public function postSaleAddAgent(Request $request) {
        if(\Request::ajax()) {
            list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
            if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
            {
                \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
                return redirect('/');
            }
            $this->validate($request, [
                'agent_id' => 'not_in:0',
                'sale_id' => 'required|integer'
            ]);
            $sale = \App\Sale::find($request->sale_id);
            $sale->agent_id = $request->agent_id;
            $sale->save();

            return "Success.";
        }
    }
}
