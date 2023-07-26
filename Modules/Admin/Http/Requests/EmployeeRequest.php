<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // return ['name' => 'required', 'last_name' => 'required', 'email' => 'required|email|unique:employees,email,' . $this->id, 'mobile' => 'required|unique:employees,mobile,' . $this->id, 'nid' => 'required|unique:employees,nid,' . $this->id, 'bmdc_reg_no' => 'required|unique:employees,bmdc_reg_no,' . $this->id, 'bnc_reg_no' => 'required|unique:employees,bnc_reg_no,' . $this->id, 'username' => 'required|unique:employees,username,' . $this->id, 'password' => 'required', 'user_type' => 'required', 'employee_type' => 'required', 'status' => 'required', 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
