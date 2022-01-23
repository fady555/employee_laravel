<?php

namespace App\Http\Controllers\ControllerHr;

use App\Address;
use App\AllTypeSalary;
use App\Contract;
use App\Country;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Jop;
use App\Premisese;
use App\Rules\Arabic;
use App\Rules\Phone;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\This;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
{


    public function index()
    {
        $employee = Employee::with(['jop','addresses','salary'])->get();
        //dd($employee);
        return view('view_app.employee.index')->with('employees',$employee);
    }

    public function show($id)
    {
        $employee = Employee::with([
            'jop',
            'addresses.country',
            'addresses.city',
            'salary',
            'degree',
            'education',
            'levelExperience',
            'contract.type_of_work',
            'user',
        ])->where('id',$id)->first();
        return view('view_app.employee.show')->with('employee',$employee);
        //return $employee;
    }

    public function edit($id)
    {
        $employee = Employee::with([
            'jop',
            'addresses.country',
            'addresses.city',
            'salary',
            'degree',
            'education',
            'levelExperience',
            'contract.type_of_work',
            'user',
        ])->where('id',$id)->first();
        $jops = Jop::get();
        $countries = Country::get();
        $premisess = Premisese::get();
        return view('view_app.employee.edit')->with(['employee'=>$employee,'jops'=>$jops,'countries'=>$countries,'premisess'=>$premisess]);


    }


    public function update(Request $request, $id)
    {

        $id_for_same_user = User::where('username',$request->username)->value('id');

        $rules=[
            // THE FIREST ONE SECTION //personal information
            'full_name_en'=>['required','string','max:255'],
            'full_name_ar'=>['required','string',new Arabic(),'max:255'],
            'full_name_fr'=>['required','string','max:255'],
            'age'=>['required','numeric','max:100'],
            'email'=>['required','email','unique:employees,email,'.$id],
            'phone'=>['required',new Phone,'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'personal_identity_id'=>['required','digits_between:1,14','unique:employees,personal_identity_id,'.$id],
            'personal_identity_img'=>['file','mimes:pdf'],
            'avatar'=>['file','mimes:pdf'],
            'name_of_bank'=>['max:255'],
            'number_of_account'=>['nullable','numeric'],
            'number_of_wif_husband'=>['nullable','integer','between:1,4'],
            'number_of_wif_children'=>['nullable','integer','between:1,15'],
            // THE SECOND TWO SECTION jop
            'jop_id'=>['required','numeric','exists:jops,id'],
            'type_id'=>['required','numeric','exists:type_of_works,id'],
            'data_of_start_work'=>['required','string'],
            'time_of_attendees'=>['required','string'],
            'time_of_going'=>['required','string'],
            'contract'=>['file','mimes:pdf'],
            'fixed_salary'=>['numeric'],
            // THE THIREd three SECTION qalification
            'education_status_id'=>['required','exists:education_statuses,id'],
            'degree_id'=>['required','exists:degrees,id'],
            'level_experience_id'=>['required','exists:level_experiences,id'],
            'experience_description'=>['required'],
            // THE THIREd for  SECTION Address
            'country_id'=>['required','numeric','exists:countries,id'],
            'city_id'=>['nullable','numeric','exists:cities,id'],
            'address_desc_en'=>['required','string'],
            'address_desc_ar'=>['required','string',new Arabic()],
            'address_desc_fr'=>['string'],
            // THE five  SECTION user
            'username'=>['required','unique:users,username,'.$id_for_same_user],
            'password'=>['nullable','digits_between:8,255'],
            'premisess'=>['array'],
            'premisess.*'=>['required','exists:premisess,id'],

        ];

        $result =  validator($request->all(),$rules,[],$this->attrValidateion());

        if($result->fails()):return  redirect()->back()->withErrors($result)->withInput(); endif;

        $employee = Employee::with('contract')->find($id);




    #edit address
        $employee->addresses()->update([
            'country_id'=>$request->country_id,
            'city_id'=>$request->city_id,
            'address_desc_en'=>$request->address_desc_en,
            'address_desc_ar'=>$request->address_desc_ar,
            'address_desc_fr'=>$request->address_desc_fr,
        ]);
    #edit salary
        $employee->salary()->update([
            'fixed_salary'=>$request->fixed_salary,
        ]);
    #edit contract
        $contract = ['type_id'=>$request->type_id];

        if($request->contract_file != null):
            $contract['contract_file']= $request->file('contract_file')->store('/contracts');
        endif;
        $employee->contract()->update($contract);
    #edit employee


        $employee_data = [
            'full_name_en'=>$request->full_name_en,
            'full_name_ar'=>$request->full_name_ar,
            'full_name_fr'=>$request->full_name_fr,
            'age'=>$request->age,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'personal_identity_id'=>$request->personal_identity_id,
            'name_of_bank'=>$request->name_of_bank,
            'number_of_account'=>$request->number_of_account,
            'number_of_wif_husband'=>$request->number_of_wif_husband,
            'number_of_wif_children'=>$request->number_of_wif_children,
            'jop_id'=>$request->jop_id,
            'data_of_start_work'=>date( "Y-m-d", strtotime($request->data_of_start_work)),
            'time_of_attendees'=>date('h:m',strtotime($request->time_of_attendees)),
            'time_of_going'=>date('h:m',strtotime($request->time_of_going)),
            'education_status_id'=>$request->education_status_id,
            'degree_id'=>$request->degree_id,
            'level_experience_id'=>$request->level_experience_id,
            'experience_description'=>$request->experience_description,
            'number_of_day_vacancy_taken'=>0,
        ];

        #personal_identity_img
        if($request->personal_identity_img != null):
            $employee_data['personal_identity_img']= $request->file('personal_identity_img')->store('/personal_identity_img');
        endif;

        #avatar
        if($request->avatar != null):
            $employee_data['avatar']= $request->file('avatar')->store('/avatar_employee');
        endif;

        //$employee->update($employee_data);
        Employee::find($id)->update($employee_data);



        #if_file_change_delete the file old

        $depend_array = [
            'personal_identity_img'=>$employee->personal_identity_img,
            'avatar'=>$employee->avatar,
            'contract_file'=>$employee->contract->contract_file,
        ];

        if($employee){
            foreach ($depend_array as $item=>$value) {
                $path = storage_path('app/'.$value);
                if($request->file($item) != null &&  $value != null &&File::exists($path) ){unlink($path);}
            }
        }


    #edit user
        $data_user = [
            'username'=>$request->username,
        ];
        if(!empty($request->password)){$data_user['password'] =Hash::make($request->password);}
        if(!empty($request->premisess)){$data_user['premisses'] = json_encode($request->premisess);}

        $employee->user()->update($data_user);



            if(app()->getLocale() == "ar"){
                session()->flash('edit_employee',$employee->full_name_ar." ".trans('app.user edit success'));
            }else{
                session()->flash('edit_employee',trans('app.user edit success')." ".$employee->{ 'full_name_'.app()->getLocale() });
            }

            return redirect()->back();

    }


    public function create()
    {
        $jops = Jop::get();
        $countries = Country::get();
        $premisess = Premisese::get();
        return view('view_app.employee.create')->with(['jops'=>$jops,'countries'=>$countries,'premisess'=>$premisess]);
    }


    public function store(Request $request)
    {

       $result =  validator($request->all(),$this->reuleStore(),[],$this->attrValidateion());

       if($result->fails()):return  redirect()->back()->withErrors($result)->withInput(); endif;

        //create address and return id

        $address_table_id = Address::insertGetId([
            'country_id'=>$request->country_id,
            'city_id'=>$request->city_id,
            'address_desc_en'=>$request->address_desc_en,
            'address_desc_ar'=>$request->address_desc_ar,
            'address_desc_fr'=>$request->address_desc_fr,
        ]);

        $contract_table_id = Contract::insertGetId([
            'type_id'=>$request->type_id,
            //'contract_file'=> $request->file('contract_file')->store('public/contract'),
        ]);

        $salary_table_id = AllTypeSalary::insertGetId([
            'fixed_salary'=>$request->fixed_salary,
        ]);


        //create employee and return id

        $emp = [
            'full_name_en'=>$request->full_name_en,
            'full_name_ar'=>$request->full_name_ar,
            'full_name_fr'=>$request->full_name_fr,
            'age'=>$request->age,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'personal_identity_id'=>$request->personal_identity_id,
            'name_of_bank'=>$request->name_of_bank,
            'number_of_account'=>$request->number_of_account,
            'number_of_wif_husband'=>$request->number_of_wif_husband,
            'number_of_wif_children'=>$request->number_of_wif_children,
            'jop_id'=>$request->jop_id,
            'data_of_start_work'=>date( "Y-m-d", strtotime($request->data_of_start_work)),
            'time_of_attendees'=>date('h:m',strtotime($request->time_of_attendees)),
            'time_of_going'=>date('h:m',strtotime($request->time_of_going)),

            'contract_id'=>$contract_table_id,

            'salary_id'=>$salary_table_id,

            'education_status_id'=>$request->education_status_id,
            'degree_id'=>$request->degree_id,
            'level_experience_id'=>$request->level_experience_id,
            'experience_description'=>$request->experience_description,
            'address_id'=>$address_table_id,
            'number_of_day_vacancy_taken'=>0,
        ];

        $employee_tabel_id =Employee::insertGetId($emp);

        //create user

        $data_user = [
            'username'=>$request->username,
            'employee_id'=>$employee_tabel_id,
            'password'=>Hash::make($request->password),
        ];
        if(!empty($request->premisess)){$data_user['premisses'] = json_encode($request->premisess);}

        $userId = User::insertGetId($data_user);


        if($userId){

            $contract = Contract::find($contract_table_id);

            if($request->file('contract_file') == null){
                $file_contract="";
            }else{
                $file_contract = $request->file('contract_file')->store('/contracts');
            }

            $contract->update(array(
            'contract_file'=>$file_contract
            ));

            //=================================================

            $employee = Employee::find($employee_tabel_id);

            if($request->file('personal_identity_img') == null){ $file_personal_img = ""; }else{ $file_personal_img = $request->file('personal_identity_img')->store('/personal_identity_img');}
            if($request->file('avatar') == null){ $file_avatar = ""; }else{ $file_avatar = $request->file('avatar')->store('/avatar_employee');}

            $employee->update(array(
                'personal_identity_img'=>$file_personal_img,
                'avatar'=>$file_avatar,
        ));

            //return $userId;

            $employeeToUseMessage = Employee::find($employee_tabel_id);


            if(app()->getLocale() == "ar"){
                session()->flash('add_employee',trans('app.user add success'.$employeeToUseMessage->full_name_ar));
            }else{
                session()->flash('add_employee',trans('app.user add success')." ".$employeeToUseMessage->{ 'full_name_'.app()->getLocale() });
            }

            return redirect()->back();

        }

    }


    public function destroy($id)
    {
        $employee = Employee::where('id',$id)->first();

        if(isset($employee)):


                if(file_exists($employee->personal_identity_img)){unlink($employee->personal_identity_img);}else{}
                if(file_exists($employee->avatar)){unlink($employee->avatar);}else{}

                $file_contract =Contract::where('id',$employee->contract_id)->first();
                if(file_exists($file_contract->contract_file)){unlink($file_contract->contract_file);}

                $employee->addresses()->delete();
                $employee->salary()->delete();
                $employee->contract()->delete();
                $employee->delete();
                if(file_exists($file_contract->contract_file)){unlink($file_contract->contract_file);}

        endif;


        if(isset($employee)):

                    return json_encode(array('result'=>'success','message'=>trans('app.delete employee process')));

                    else:

                        return json_encode(array('result'=>'error','message'=>trans('app.delete employee fails')));

                    endif;

    }


    private function attrValidateion(){
        return [
            'full_name_en'=>trans('app.full_name_en'),
            'full_name_ar'=>trans('app.full_name_ar'),
            'full_name_fr'=>trans('app.full_name_fr'),
            'age'=>trans('app.age'),
            'email'=>trans('app.email'),
            'phone'=>trans('app.phone'),
            'personal_identity_id'=>trans('app.personal identity id'),
            'personal_identity_img'=>trans('app.personal identity img'),
            'avatar'=>trans('app.avatar'),
            'name_of_bank'=>trans('app.name_of_bank'),
            'number_of_account'=>trans('app.number_of_account'),
            'number_of_wif_husband'=>trans('app.number_of_wif_husband'),
            'number_of_wif_children'=>trans('app.number_of_wif_children'),
            // THE SECOND TWO SECTION jop
            'jop_id'=>trans('app.jop'),
            'type_id'=>trans('app.type of work'),
            'data_of_start_work'=>trans('app.start date'),
            'time_of_attendees'=>trans('app.time of attendance'),
            'time_of_going'=>trans('app.time of going'),
            'contract'=>trans('app.contract'),
            'fixed_salary'=>trans('app.fixed_salary'),
            // THE THIREd three SECTION qalification
            'education_status_id'=>trans('app.education'),
            'degree_id'=>trans('app.degree'),
            'level_experience_id'=>trans('app.level experience'),
            'experience_description'=>trans('app.experience description'),
            // THE THIREd for  SECTION Address
            'country_id'=>trans('app.country'),
            'city_id'=>trans('app.city'),
            'address_desc_en'=>trans('app.address_desc_en'),
            'address_desc_ar'=>trans('app.address_desc_ar'),
            'address_desc_fr'=>trans('app.address_desc_fr'),
            // THE five  SECTION user
            'username'=>trans('app.username'),
            'password'=>trans('app.password'),
            'premisess'=>trans('app.user premises'),
        ];

    }


    private function reuleStore(){
        return [
            // THE FIREST ONE SECTION //personal information
            'full_name_en'=>['required','string','max:255'],
            'full_name_ar'=>['required','string',new Arabic(),'max:255'],
            'full_name_fr'=>['required','string','max:255'],
            'age'=>['required','numeric','max:100'],
            'email'=>['required','email','unique:employees,email'],
            'phone'=>['required',new Phone,'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'personal_identity_id'=>['required','digits_between:1,14','unique:employees,personal_identity_id'],
            'personal_identity_img'=>['file','mimes:pdf'],
            'avatar'=>['file','mimes:pdf'],
            'name_of_bank'=>['max:255'],
            'number_of_account'=>['nullable','numeric'],
            'number_of_wif_husband'=>['nullable','integer','between:0,4'],
            'number_of_wif_children'=>['nullable','integer','between:0,15'],
            // THE SECOND TWO SECTION jop
            'jop_id'=>['required','numeric','exists:jops,id'],
            'type_id'=>['required','numeric','exists:type_of_works,id'],
            'data_of_start_work'=>['required','string'],
            'time_of_attendees'=>['required','string'],
            'time_of_going'=>['required','string'],
            'contract'=>['file','mimes:pdf'],
            'fixed_salary'=>['numeric'],
            // THE THIREd three SECTION qalification
            'education_status_id'=>['required','exists:education_statuses,id'],
            'degree_id'=>['required','exists:degrees,id'],
            'level_experience_id'=>['required','exists:level_experiences,id'],
            'experience_description'=>['required'],
            // THE THIREd for  SECTION Address
            'country_id'=>['required','numeric','exists:countries,id'],
            'city_id'=>['nullable','numeric','exists:cities,id'],
            'address_desc_en'=>['required','string'],
            'address_desc_ar'=>['required','string',new Arabic()],
            'address_desc_fr'=>['string'],
            // THE five  SECTION user
            'username'=>['required','unique:users,username'],
            'password'=>['required','digits_between:8,255'],
            'premisess'=>['array'],
            'premisess.*'=>['required','exists:premisess,id'],

        ];
    }
}
