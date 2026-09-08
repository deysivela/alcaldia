<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Level;
use App\Charge;
use App\Salarie;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('serve.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = Level::pluck('level_employee','id');
        $charges = Charge::pluck('charge_employee','id');
        $salaries = Salarie::pluck('salary_monthly','id');

        return view('serve.employee.create', compact('levels','charges','salaries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\EmployeeStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeStoreRequest $request)
    {
        $employee = Employee::create($request->except('photo'));

        if ($this->isAlcaldeCharge($request->charge_id) && $request->file('photo')) {
            $path = Storage::disk('public')->put('server/imagenes/funcionarios', $request->file('photo'));
            $employee->fill(['photo' => $path])->save();
        } else {
            $employee->fill(['photo' => $this->defaultPhotoForSex($request->sex)])->save();
        }

        return redirect()->route('employees.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('serve.employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $levels = Level::pluck('level_employee','id');
        $charges = Charge::pluck('charge_employee','id');
        $salaries = Salarie::pluck('salary_monthly','id');

        return view('serve.employee.edit', compact('employee','levels','charges','salaries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\EmployeeUpdateRequest  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeUpdateRequest $request, Employee $employee)
    {
        $employee->update($request->except('photo'));

        if ($this->isAlcaldeCharge($request->charge_id) && $request->file('photo')) {
            $path = Storage::disk('public')->put('server/imagenes/funcionarios', $request->file('photo'));
            $employee->fill(['photo' => $path])->save();
        } elseif (!$this->isAlcaldeCharge($request->charge_id)) {
            $employee->fill(['photo' => $this->defaultPhotoForSex($request->sex)])->save();
        }

        return redirect()->route('employees.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index');
    }

    /**
     * @param  string|null  $sex
     * @return string
     */
    private function defaultPhotoForSex($sex)
    {
        return $sex === 'Femenino'
            ? 'server/imagenes/funcionarios/default-female.png'
            : 'server/imagenes/funcionarios/default-male.png';
    }

    /**
     * @param  int|string|null  $chargeId
     * @return bool
     */
    private function isAlcaldeCharge($chargeId)
    {
        if ($chargeId === null || $chargeId === '') {
            return false;
        }

        $charge = Charge::find($chargeId);

        if (!$charge) {
            return false;
        }

        return mb_strtoupper(trim($charge->charge_employee)) === 'ALCALDE MUNICIPAL';
    }
}
