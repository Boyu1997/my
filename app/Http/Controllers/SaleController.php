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
        $customers_nation_for_dropdown = \App\Sale::customersNationForDropdown($privilege, $employee);
        return view('sale.createNew', compact('user', 'employee', 'privilege', 'employees_for_dropdown', 'customers_nation_for_dropdown'));
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
        $customers_nation_for_dropdown = \App\Sale::customersNationForDropdown($privilege, $employee);
        return view('sale.createOngoing', compact('user', 'employee', 'privilege', 'new_sales_for_dropdown', 'customers_nation_for_dropdown'));
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
        $agents_nation_for_dropdown = \App\Sale::agentsNationForDropdown($privilege, $employee);
        return view('sale.createAgent', compact('user', 'employee', 'privilege', 'employees_for_dropdown', 'agents_nation_for_dropdown'));
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
        $contacts = \Session::get('agent_contacts');
        $request->session()->forget('agent_contacts');
        if(sizeof($contacts)) foreach ($contacts as $key => $value) {
            $contact = \App\Contact::where('id', '=', $value)->first();
            $agent->contacts()->save($contact);
        }
        \Session::flash('success', '成功添加了新的代理商信息。');
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
        $customers_nation_for_dropdown = \App\Sale::customersNationForDropdown($privilege, $employee);
        return view('sale.createCustomer', compact('user', 'employee', 'privilege', 'employees_for_dropdown', 'customers_nation_for_dropdown'));
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

    public function getById($id = null) {
        list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
        if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $sale_array = \DB::table('sales')->where('id', '=', $id)->select('id', 'status', 'classification', 'specification', 'expect_model', 'expect_amount', 'expect_price', 'expect_sold_date',
            'bid_date', 'result', 'winning_company', 'sold_model', 'sold_amount', 'sold_price', 'agent_id', 'complement_id', 'customer_id', 'other_id', 'employee_id')->get();
        $sale = collect($sale_array)->first();
        if($privilege->master_admin==0 && $sale->employee_id!=$employee->id)
        {
            \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
            return redirect('/');
        }
        $sale_employee = \DB::table('users')->where('employee_id', '=', $sale->employee_id)->select('last_name', 'first_name')->first();
        $sale->employee_name = $sale_employee->last_name.$sale_employee->first_name;
        if($sale->agent_id)
        {
            $agent_array = \DB::table('agents')->where('id', '=', $sale->agent_id)->select('id', 'name', 'nation', 'province', 'city', 'address', 'phone_number', 'fax', 'remark')->get();
            $agent = collect($agent_array)->first();
            //agent's contact info need to add to $agent object.
        }
        else $agent = null;
        if($sale->complement_id)
        {
            $complement_array = \DB::table('complements')->where('id', '=', $sale->complement_id)->select('id', 'name', 'nation', 'province', 'city', 'address', 'phone_number', 'fax', 'remark')->get();
            $complement = collect($complement_array)->first();
            //agent's contact info need to add to $agent object.
        }
        else $complement = null;
        if($sale->customer_id)
        {
            $customer_array = \DB::table('customers')->where('id', '=', $sale->customer_id)->select('id', 'name', 'nation', 'province', 'city', 'address', 'phone_number', 'fax', 'remark')->get();
            $customer = collect($customer_array)->first();
            //agent's contact info need to add to $agent object.
        }
        else $hospital = null;
        if($sale->other_id)
        {
            $other_array = \DB::table('others')->where('id', '=', $sale->other_id)->select('id', 'name', 'nation', 'province', 'city', 'address', 'phone_number', 'fax', 'remark')->get();
            $other = collect($other_array)->first();
            //agent's contact info need to add to $agent object.
        }
        else $other = null;
        return view('sale.byId', compact('user', 'employee', 'privilege', 'sale', 'agent', 'complement', 'customer', 'other'));
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
            if($privilege->master_admin) $sale = \App\Sale::where('id', '=', $_GET["sale_id"])->first();
            else $sale = \App\Sale::where('employee_id', '=', $employee->id)->where('id', '=', $_GET["sale_id"])->first();
            if (sizeof($sale) == 0)
            {
                \Session::flash('danger', '危险的操作！(Error: 401 Unauthorized)');
                return redirect('/sale');
            }
            $data['classification'] = $sale->classification;
            $data['specification'] = $sale->specification;
            return $data;
        }
    }

    public function getCreateAgentNation() {
        if(\Request::ajax()) {
            list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
            if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
            {
                \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
                return redirect('/');
            }
            if($privilege->master_admin) $agents = \App\Agent::where('nation', '=', $_GET["nation"])->orderBy(\DB::raw('convert(province using gbk)'))->distinct()->get(['province']);
            else $agents = $employee->agents()->where('nation', '=', $_GET["nation"])->orderBy(\DB::raw('convert(province using gbk)'))->distinct()->get(['nation']);
            $data = "<option value='0'>请选择省份</option>";
            foreach ($agents as $agent) {
                $data = $data.'<option value="'.$agent->province.'">'.$agent->province.'</option>';
            }
            $data = $data."</select>";
            return $data;
        }
    }

    public function getCreateAgentProvince() {
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

    public function getCreateAgentCity() {
        if(\Request::ajax()) {
            list($user, $employee, $privilege) = \App\Privilege::privilegeAuth();
            if(sizeof($privilege)==0 || ($privilege->master_admin==0 && $privilege->sale==0))
            {
                \Session::flash('danger', '您没有权限访问此页面！(Error: 403 Forbidden)');
                return redirect('/');
            }
            if($privilege->master_admin) $agents = \App\Agent::where('nation', '=', $_GET["nation"])->where('province', '=', $_GET["province"])->where('city', '=', $_GET["city"])->orderBy(\DB::raw('convert(name using gbk)'))->distinct()->get(['name']);
            else $agents = $employee->agents()->where('nation', '=', $_GET["nation"])->where('province', '=', $_GET["province"])->where('city', '=', $_GET["city"])->orderBy(\DB::raw('convert(name using gbk)'))->distinct()->get(['name']);
            $data = "<option value='0'>请选择顾客名称</option>";
            foreach ($agents as $agent) {
                $data = $data.'<option value="'.$agent->id.'">'.$agent->name.'</option>';
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
            if($privilege->master_admin) $customers = \App\Customer::where('nation', '=', $_GET["nation"])->orderBy(\DB::raw('convert(province using gbk)'))->distinct()->get(['province']);
            else $customers = $employee->customers()->where('nation', '=', $_GET["nation"])->orderBy(\DB::raw('convert(province using gbk)'))->distinct()->get(['nation']);
            $data = "<option value='0'>请选择省份</option>";
            foreach ($customers as $customer) {
                $data = $data.'<option value="'.$customer->province.'">'.$customer->province.'</option>';
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
            if($privilege->master_admin) $customers = \App\Customer::where('nation', '=', $_GET["nation"])->where('province', '=', $_GET["province"])->orderBy(\DB::raw('convert(city using gbk)'))->distinct()->get(['city']);
            else $customers = $employee->customers()->where('nation', '=', $_GET["nation"])->where('province', '=', $_GET["province"])->orderBy(\DB::raw('convert(city using gbk)'))->distinct()->get(['city']);
            $data = "<option value='0'>请选择城市</option>";
            foreach ($customers as $customer) {
                $data = $data.'<option value="'.$customer->city.'">'.$customer->city.'</option>';
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
            $data = "<table class='table table-bordered'>";
            $data = $data."<tr><th>姓氏</th><th>".$_POST['last_name']."</th></tr>";
            $data = $data."<tr><th>名字</th><th>".$_POST['first_name']."</th></tr>";
            $data = $data."<tr><th>职位</th><th>".$_POST['job_title']."</th></tr>";
            $data = $data."<tr><th>邮箱地址</th><th>".$_POST['email']."</th></tr>";
            $data = $data."<tr><th>电话号</th><th>".$_POST['cellphone']."</th></tr>";

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

            if(sizeof(\Session::get('agent_contacts'))) $request->session()->regenerate();
            \Session::push("agent_contacts.".$contact->id, $contact->id);

            $data = "<table class='table table-bordered'>";
            $data = $data."<tr><th>姓氏</th><th>".$_POST['last_name']."</th></tr>";
            $data = $data."<tr><th>名字</th><th>".$_POST['first_name']."</th></tr>";
            $data = $data."<tr><th>职位</th><th>".$_POST['job_title']."</th></tr>";
            $data = $data."<tr><th>邮箱地址</th><th>".$_POST['email']."</th></tr>";
            $data = $data."<tr><th>电话号</th><th>".$_POST['cellphone']."</th></tr>";
            return $data;
        }
    }
}
